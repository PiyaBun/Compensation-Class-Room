<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Ca_name'] == ""){
          $errors['Ca_name'] = 'กรุณาระบุ วันหยุด';
        }
        if($_POST['Ca_date'] == ""){
            $errors['Ca_date'] = 'กรุณาระบุ วันที่';
          }
        if($_POST['Ca_term'] == ""){
            $errors['Ca_term'] = 'กรุณาระบุ เทอม';
          }
        if($_POST['Ca_year'] == ""){
            $errors['Ca_year'] = 'กรุณาระบุ ปีการศึกษา';
          }

        if(!$errors){
            $stmt = $app['db'] -> prepare("INSERT INTO calendar (Ca_name,Ca_date,Ca_term,Ca_year,Ca_detail) VALUES (:Ca_name,:Ca_date,:Ca_term,:Ca_year,:Ca_detail)");
            $stmt->execute([
                'Ca_name' => $_POST['Ca_name'],
                'Ca_date' => $_POST['Ca_date'],
                'Ca_term' => $_POST['Ca_term'],
                'Ca_year' => $_POST['Ca_year'],
                'Ca_detail' => $_POST['Ca_detail'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/calendar/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน

    $formdata = [ //กำหนดค่าตั้งต้นของ ฟอร์ม เป็น อาเรย์ไว้ เพราะเวลากด sumit แล้วมันไม่ค้างไว้(เวลากรอกไม่ครบ)
        'Ca_name' => @$_POST['Ca_name'],
        'Ca_date' => @$_POST['Ca_date'],
        'Ca_term' => @$_POST['Ca_term'],
        'Ca_year' => @$_POST['Ca_year'],
        'Ca_detail' => @$_POST['Ca_detail'],
    ]
?>

    <?php include(__DIR__.'/_form.php'); ?>