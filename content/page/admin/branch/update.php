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
            $stmt = $app['db'] -> prepare("UPDATE branch SET Br_name=:Br_name WHERE Br_id=:Br_id ");
            $stmt->execute([
                'Br_name' => $_POST['Br_name'],
                'Br_id' => $_GET['id'],
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
    $sth = $app['db'] -> prepare("SELECT * FROM branch WHERE Br_id = :Br_id");
    $sth->execute([
        'Br_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);

?>

    <?php include(__DIR__.'/_form.php'); ?>