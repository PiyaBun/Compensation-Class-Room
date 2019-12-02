<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Te_name'] == ""){
            $errors['Te_name'] = 'กรุณาระบุ ชื่อ';
        }
        if($_POST['Te_last'] == ""){
            $errors['Te_last'] = 'กรุณาระบุ นามสกุล';
        }
        if($_POST['Te_Tel'] == ""){
            $errors['Te_Tel'] = 'กรุณาระบุ เบอ์โทรศัพท์';
        }
        if($_POST['username'] == ""){
            $errors['username'] = 'กรุณาระบุ username';
        }
        if($_POST['password'] == ""){
            $errors['password'] = 'กรุณาระบุ password';
            }
        if($_POST['Br_id'] == ""){
            $errors['Br_id'] = 'กรุณาระบุ สาขา';
        }

        if(!$errors){
            $stmt = $app['db'] -> prepare("UPDATE teacher SET 
                                                Te_name=:Te_name,
                                                Te_last:Te_last,
                                                Te_Tel:Te_Tel,
                                                username:username,
                                                password:password,
                                                Br_id=:Br_id 
                                            WHERE Te_id=:Te_id ");
            $stmt->execute([
                'Te_name' => $_POST['Te_name'],
                'Te_last' => $_POST['Te_last'],
                'Te_Tel' => $_POST['Te_Tel'],
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'Br_id' => $_POST['Br_id'],
                'Te_id' => $_GET['id'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/teacher/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน
    $sth = $app['db'] -> prepare("SELECT * FROM teacher WHERE Te_id = :Te_id");
    $sth->execute([
        'Te_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);
?>

    <?php include(__DIR__.'/_form.php'); ?>