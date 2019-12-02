<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Gr_name'] == ""){
          $errors['Gr_name'] = 'กรุณาระบุ ชื่อกลุ่มเรียน';
        }
        if($_POST['Gr_num'] == ""){
            $errors['Gr_num'] = 'กรุณาระบุ จำนวนสมาชิคในกลุ่มเรียน';
        }
        if($_POST['Co_id'] == ""){
            $errors['Co_id'] = 'กรุณาระบุ หลักสูตร';
        }
        if($_POST['Le_id'] == ""){
            $errors['Le_id'] = 'กรุณาระบุ ระดับชั้น';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("INSERT INTO grouplern (Gr_name,Gr_num,Co_id,Le_id) VALUES (:Gr_name,:Gr_num,:Co_id,:Le_id)");
            $stmt->execute([
                'Gr_name' => $_POST['Gr_name'],
                'Gr_num' => $_POST['Gr_num'],
                'Co_id' => $_POST['Co_id'],
                'Le_id' => $_POST['Le_id'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/grouplern/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน

    $formdata = [ //กำหนดค่าตั้งต้นของ ฟอร์ม เป็น อาเรย์ไว้ เพราะเวลากด sumit แล้วมันไม่ค้างไว้(เวลากรอกไม่ครบ)
        'Gr_name' => @$_POST['Gr_name'],
        'Gr_num' => @$_POST['Gr_num'],
        'Co_id' => @$_POST['Co_id'],
        'Le_id' => @$_POST['Le_id'],
    ]
?>

    <?php include(__DIR__.'/_form.php'); ?>