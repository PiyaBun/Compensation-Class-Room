<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Su_name'] == ""){
          $errors['Su_name'] = 'กรุณาระบุ ชื่อวิขา';
        }
        if($_POST['Su_git'] == ""){
            $errors['Su_git'] = 'กรุณาระบุ จำนวนหน่วยกิต';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("INSERT INTO subject (Su_name,Su_git) VALUES (:Su_name,:Su_git)");
            $stmt->execute([
                'Su_name' => $_POST['Su_name'],
                'Su_git' => $_POST['Su_git'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/subject/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน

    $formdata = [ //กำหนดค่าตั้งต้นของ ฟอร์ม เป็น อาเรย์ไว้ เพราะเวลากด sumit แล้วมันไม่ค้างไว้(เวลากรอกไม่ครบ)
        'Su_name' => @$_POST['Su_name'],
        'Su_git' => @$_POST['Su_git'],
        
    ]
?>

    <?php include(__DIR__.'/_form.php'); ?>