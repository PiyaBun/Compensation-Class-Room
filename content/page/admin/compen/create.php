<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Cp_num'] == ""){
            $errors['Cp_num'] = 'กรุณาระบุ จำนวนวัน';
        }
        if($_POST['Go_id'] == ""){
            $errors['Go_id'] = 'กรุณาระบุ ชื่อเรื่องไปราชการ';
        }
        if($_POST['Ca_id'] == ""){
            $errors['Ca_id'] = 'กรุณาระบุ ปฏิทินวันหยุด';
        }
        if($_POST['Te_id'] == ""){
            $errors['Te_id'] = 'กรุณาระบุ ครูผู้สอน';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("INSERT INTO compen (Cp_num,Go_id,Ca_id,Te_id) VALUES (:Cp_num,:Go_id,:Ca_id,:Te_id)");
            $stmt->execute([
                'Cp_num' => $_POST['Cp_num'],
                'Go_id' => $_POST['Go_id'],
                'Ca_id' => $_POST['Ca_id'],
                'Te_id' => $_POST['Te_id'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/compen/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน

    $formdata = [ //กำหนดค่าตั้งต้นของ ฟอร์ม เป็น อาเรย์ไว้ เพราะเวลากด sumit แล้วมันไม่ค้างไว้(เวลากรอกไม่ครบ)    
        'Cp_num' => @$_POST['Cp_num'],
        'Go_name' => @$_POST['Go_name'],
        'Ca_name' => @$_POST['Ca_name'],
        'Te_name' => @$_POST['Te_name'],
    ]
?>

    <?php include(__DIR__.'/_form.php'); ?>