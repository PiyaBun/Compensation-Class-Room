<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Ro_name'] == ""){
          $errors['Ro_name'] = 'กรุณาระบุ ชื่อห้อง';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("INSERT INTO Room (Ro_name) VALUES (:Ro_name)");
            $stmt->execute([
                'Ro_name' => $_POST['Ro_name'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/Room/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน

    $formdata = [ //กำหนดค่าตั้งต้นของ ฟอร์ม เป็น อาเรย์ไว้ เพราะเวลากด sumit แล้วมันไม่ค้างไว้(เวลากรอกไม่ครบ)
        'Ro_name' => @$_POST['Ro_name'],
    ]
?>

    <?php include(__DIR__.'/_form.php'); ?>