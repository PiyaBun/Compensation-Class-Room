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
            $stmt = $app['db'] -> prepare("UPDATE calendar SET Ca_name=:Ca_name ,Ca_date=:Ca_date,Ca_term =:Ca_term,Ca_year=:Ca_year,Ca_detail =:Ca_detail WHERE Ca_id=:Ca_id ");
            $stmt->execute([
                'Ca_name' => $_POST['Ca_name'],
                'Ca_date' => $_POST['Ca_date'],
                'Ca_term' => $_POST['Ca_term'],
                'Ca_year' => $_POST['Ca_year'],
                'Ca_detail' => $_POST['Ca_detail'],
                'Ca_id' => $_GET['id'],
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
    $sth = $app['db'] -> prepare("SELECT * FROM calendar WHERE Ca_id = :Ca_id");
    $sth->execute([
        'Ca_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);

?>

    <?php include(__DIR__.'/_form.php'); ?>