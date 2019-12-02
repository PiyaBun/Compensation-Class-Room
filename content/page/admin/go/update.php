<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Go_name'] == ""){
            $errors['Go_name'] = 'กรุณาระบุ ชื่อเรื่อง';
          }
          if($_POST['Go_date'] == ""){
              $errors['Go_date'] = 'กรุณาระบุ วันเดือนปี';
          }
          if($_POST['Go_num'] == ""){
              $errors['Go_num'] = 'กรุณาระบุ เลขที่คำสั่ง';
          }
          if($_POST['Go_quan'] == ""){
              $errors['Go_quan'] = 'กรุณาระบุ จำนวน';
          }
          if($_POST['Pl_id'] == ""){
              $errors['Pl_id'] = 'กรุณาระบุ ข้อมูลสถานที่';
          }

        if(!$errors){
            $stmt = $app['db'] -> prepare("UPDATE go SET Go_name=:Go_name,Go_date=:Go_date,Go_num=:Go_num,Go_quan=:Go_quan,Pl_id=:Pl_id WHERE go_id=:go_id ");
            $stmt->execute([
                'Go_name' => $_POST['Go_name'],
                'Go_date' => $_POST['Go_date'],                
                'Go_num' => $_POST['Go_num'],
                'Go_quan' => $_POST['Go_quan'],
                'go_id' => $_GET['id'],
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];
            }else{
                header('location: ?page=admin/go/index');
                exit();
            }
        }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน
    $sth = $app['db'] -> prepare("SELECT * FROM go WHERE go_id = :go_id");
    $sth->execute([
        'go_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);

?>

    <?php include(__DIR__.'/_form.php'); ?>