<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Fa_name'] == ""){
          $errors['Fa_name'] = 'กรุณาระบุ ชื่อคณะ';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("UPDATE faculty SET Fa_name=:Fa_name WHERE Fa_id=:Fa_id ");
            $stmt->execute([
                'Fa_name' => $_POST['Fa_name'],
                'Fa_id' => $_GET['id'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/faculty/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน
    $sth = $app['db'] -> prepare("SELECT * FROM faculty WHERE Fa_id = :Fa_id");
    $sth->execute([
        'Fa_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);

?>

    <?php include(__DIR__.'/_form.php'); ?>