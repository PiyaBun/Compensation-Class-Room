<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Go_name'] == ""){
          $errors['Go_name'] = 'กรุณาระบุ ชื่อเรื่อง';
        }
        if($_POST['Go_date'] == ""){
            $errors['Go_date'] = 'กรุณาระบุ วันเดือนปี';
        }
        if($_POST['Go_num'] == ""){
            $errors['Go_num'] = 'กรุณาระบุ เลขที่คำสั่ง';
        }
        if($_POST['Go_quan'] == ""){
            $errors['Go_quan'] = 'กรุณาระบุ จำนวน';
        }
        if($_POST['Pl_id'] == ""){
            $errors['Pl_id'] = 'กรุณาระบุ ข้อมูลสถานที่';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("INSERT INTO go (Go_name,Go_date,Go_num,Go_quan,Pl_id) VALUES (:Go_name,:Go_date,:Go_num,:Go_quan,:Pl_id)");
            $stmt->execute([
                'Go_name' => $_POST['Go_name'],
                'Go_date' => $_POST['Go_date'],
                'Go_num' => $_POST['Go_num'],
                'Go_quan' => $_POST['Go_quan'],
                'Pl_id' => $_POST['Pl_id'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/go/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน

    $formdata = [ //กำหนดค่าตั้งต้นของ ฟอร์ม เป็น อาเรย์ไว้ เพราะเวลากด sumit แล้วมันไม่ค้างไว้(เวลากรอกไม่ครบ)    
        'Go_name' => @$_POST['Go_name'],
        'Go_date' => @$_POST['Go_date'],
        'Go_num' => @$_POST['Go_num'],
        'Go_quan' => @$_POST['Go_quan'],
        'Pl_id' => @$_POST['Pl_id'],
    ]
?>

    <?php include(__DIR__.'/_form.php'); ?>