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
            $stmt = $app['db'] -> prepare("UPDATE compen SET Cp_num=:Cp_num,Go_id=:Go_id,Ca_id=:Ca_id,Te_id=:Te_id WHERE Cp_id=:Cp_id ");
            $stmt->execute([
                'Cp_num' => $_POST['Cp_num'],
                'Go_id' => $_POST['Go_id'],                
                'Ca_id' => $_POST['Ca_id'],
                'Te_id' => $_POST['Te_id'],
                'Cp_id' => $_GET['id'],
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
    $sth = $app['db'] -> prepare("SELECT * FROM compen WHERE Cp_id = :Cp_id");
    $sth->execute([
        'Cp_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);

?>

    <?php include(__DIR__.'/_form.php'); ?>