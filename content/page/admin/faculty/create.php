<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Fa_name'] == ""){
          $errors['Fa_name'] = 'กรุณาระบุ ชื่อคณะ';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("INSERT INTO faculty (Fa_name) VALUES (:Fa_name)");
            $stmt->execute([
                'Fa_name' => $_POST['Fa_name'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/faculty/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน

    $formdata = [ //กำหนดค่าตั้งต้นของ ฟอร์ม เป็น อาเรย์ไว้ เพราะเวลากด sumit แล้วมันไม่ค้างไว้(เวลากรอกไม่ครบ)
        'Fa_name' => @$_POST['Fa_name'],
    ]
?>

    <?php include(__DIR__.'/_form.php'); ?>