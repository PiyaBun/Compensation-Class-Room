<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Le_name'] == ""){
          $errors['Le_name'] = 'กรุณาระบุ ชื่อระดับชั้น';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("INSERT INTO level (Le_name) VALUES (:Le_name)");
            $stmt->execute([
                'Le_name' => $_POST['Le_name'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/level/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน

    $formdata = [ //กำหนดค่าตั้งต้นของ ฟอร์ม เป็น อาเรย์ไว้ เพราะเวลากด sumit แล้วมันไม่ค้างไว้(เวลากรอกไม่ครบ)
        'Le_name' => @$_POST['Le_name'],
    ]
?>

    <?php include(__DIR__.'/_form.php'); ?>