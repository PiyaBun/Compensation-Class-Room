<?php
    off_init();
?>
<?php
    if($_POST){
        
            $stmt = $app['db'] -> prepare("UPDATE de_compen SET De_status=:De_status, De_comment=:De_comment ,Cp_id=:Cp_id
            WHERE Cp_id=:Cp_id)");
            $stmt->execute([
                'Cp_id' => $_POST['Cp_id'],
                'De_status' => $_POST['De_status'],
                'De_comment' => $_POST['De_comment'],
                'Cp_id' => $_GET['id'],
            ]);
                header('location: ?page=submit');
                exit();
            
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน
    $sth = $app['db'] -> prepare("SELECT * FROM de_compen,compen WHERE de_compen.De_id = de_compen.Cp_id");
    $sth->execute();
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);

?>

    <?php include(__DIR__.'/_formSubmit.php'); ?>