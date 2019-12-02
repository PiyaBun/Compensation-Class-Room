<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Br_name'] == ""){
          $errors['Br_name'] = 'กรุณาระบุ ชื่อสาขา';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("INSERT INTO branch (Br_name) VALUES (:Br_name)");
            $stmt->execute([
                'Br_name' => $_POST['Br_name'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/branch/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน

    $formdata = [ //กำหนดค่าตั้งต้นของ ฟอร์ม เป็น อาเรย์ไว้ เพราะเวลากด sumit แล้วมันไม่ค้างไว้(เวลากรอกไม่ครบ)
        'Br_name' => @$_POST['Br_name'],
    ]
?>

    <?php include(__DIR__.'/_form.php'); ?>