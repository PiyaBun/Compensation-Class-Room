<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Su_name'] == ""){
            $errors['Su_name'] = 'กรุณาระบุ ชื่อวิขา';
          }
          if($_POST['Su_git'] == ""){
              $errors['Su_git'] = 'กรุณาระบุ จำนวนหน่วยกิต';
          }

        if(!$errors){
            $stmt = $app['db'] -> prepare("UPDATE subject SET Su_name=:Su_name,Su_git=:Su_git WHERE Su_id=:Su_id ");
            $stmt->execute([
                'Su_name' => $_POST['Su_name'],
                'Su_git' => $_POST['Su_git'],

                'Su_id' => $_GET['id'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/subject/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน
    $sth = $app['db'] -> prepare("SELECT * FROM subject WHERE Su_id = :Su_id");
    $sth->execute([
        'Su_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);
?>

    <?php include(__DIR__.'/_form.php'); ?>