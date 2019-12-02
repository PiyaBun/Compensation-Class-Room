<?php
    admin_init();
    $sth = $app['db'] -> prepare("SELECT * FROM timetable WHERE Ti_id = :Ti_id");
    $sth->execute([
        'Ti_id' => $_GET['id']
    ]);
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);
?>
<?php
    $errors = [];
    if($_POST){
        if($_POST['Ti_id'] == ""){
          $errors['Pe_id'] = 'กรุณาระบุ คาบ';
        }
        if($_POST['Ti_term'] == ""){
          $errors['Ti_term'] = 'กรุณาระบุ เทอม';
        }
        if($_POST['Ti_year'] == ""){
          $errors['Ti_year'] = 'กรุณาระบุ ปีการศึกษา';
        }
        if($_POST['Su_id'] == ""){
            $errors['Su_id'] = 'กรุณาระบุ วิชา';
          }
        if($_POST['Gr_id'] == ""){
            $errors['Gr_id'] = 'กรุณาระบุ กลุ่มเรียน';
          }
        if($_POST['Ro_id'] == ""){
            $errors['Ro_id'] = 'กรุณาระบุ ห้องเรียน';
          }
        if($_POST['Te_id'] == ""){
            $errors['Te_id'] = 'กรุณาระบุ ครูผู้สอน';
          }
         if($_POST['Ti_day'] == ""){
              $errors['Ti_day'] = 'กรุณาระบุ วัน';
            }

        if(!$errors){
            $sql = "UPDATE timetable SET Ti_day=:Ti_day,Ti_term=:Ti_term,Ti_year=:Ti_year,Pe_id=:Pe_id ,Su_id=:Su_id,Gr_id =:Gr_id,Ro_id=:Ro_id,Te_id=:Te_id WHERE Ti_id=:Ti_id";
            $stmt = $app['db'] -> prepare($sql);
            $stmt->execute([
                'Ti_day' => $_POST['Ti_day'],
                'Ti_term' => $_POST['Ti_term'],
                'Ti_year' => $_POST['Ti_year'],
                'Pe_id' => $_POST['Pe_id'],
                'Su_id' => $_POST['Su_id'],
                'Gr_id' => $_POST['Gr_id'],
                'Ro_id' => $_POST['Ro_id'],
                'Te_id' => $_POST['Te_id'],
                'Ti_id' => $_GET['id']
                ]);
            $errorInfo = $stmt->errorInfo();
            if ($errorInfo[2]) {
                $app['flashMessages'][] = [
                    'type' => 'warning',
                    'text' => $errorInfo[2], 
                ];

            }else{
                header('location: ?page=admin/timetable/index');
                exit();
            }
        }
    }
?>

    <?php include(__DIR__.'/_form.php'); ?>