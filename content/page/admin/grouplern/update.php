<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Gr_name'] == ""){
            $errors['Gr_name'] = 'กรุณาระบุ ชื่อกลุ่มเรียน';
          }
          if($_POST['Gr_num'] == ""){
              $errors['Gr_num'] = 'กรุณาระบุ จำนวนสมาชิคในกลุ่มเรียน';
          }
          if($_POST['Co_id'] == ""){
              $errors['Co_id'] = 'กรุณาระบุ หลักสูตร';
          }
          if($_POST['Le_id'] == ""){
              $errors['Le_id'] = 'กรุณาระบุ ระดับชั้น';
          }

        if(!$errors){
            $stmt = $app['db'] -> prepare("UPDATE grouplern SET Gr_name=:Gr_name,Gr_num=:Gr_num,Co_id=:Co_id,Le_id=:Le_id WHERE Gr_id=:Gr_id ");
            $stmt->execute([
                'Gr_name' => $_POST['Gr_name'],
                'Gr_num' => $_POST['Gr_num'],                
                'Co_id' => $_POST['Co_id'],
                'Le_id' => $_POST['Le_id'],
                'Gr_id' => $_GET['id'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/grouplern/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน
    $sth = $app['db'] -> prepare("SELECT * FROM grouplern WHERE Gr_id = :Gr_id");
    $sth->execute([
        'Gr_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);

?>

    <?php include(__DIR__.'/_form.php'); ?>