<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Le_name'] == ""){
          $errors['Le_name'] = 'กรุณาระบุ ระดับชั้น';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("UPDATE level SET Le_name=:Le_name WHERE Le_id=:Le_id ");
            $stmt->execute([
                'Le_name' => $_POST['Le_name'],
                'Le_id' => $_GET['id'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/level/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน
    $sth = $app['db'] -> prepare("SELECT * FROM level WHERE Le_id = :Le_id");
    $sth->execute([
        'Le_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);

?>

    <?php include(__DIR__.'/_form.php'); ?>