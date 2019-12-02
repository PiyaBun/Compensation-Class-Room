<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Ro_name'] == ""){
          $errors['Ro_name'] = 'กรุณาระบุ ห้องเรียน';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("UPDATE Room SET Ro_name=:Ro_name WHERE Ro_id=:Ro_id ");
            $stmt->execute([
                'Ro_name' => $_POST['Ro_name'],
                'Ro_id' => $_GET['id'],
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
    $sth = $app['db'] -> prepare("SELECT * FROM Room WHERE Ro_id = :Ro_id");
    $sth->execute([
        'Ro_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);

?>

    <?php include(__DIR__.'/_form.php'); ?>