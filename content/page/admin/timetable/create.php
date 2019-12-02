<?php
    admin_init();
?>
<?php
    $errors = [];
    if($_POST){
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
              $stmt = $app['db'] -> prepare("INSERT INTO timetable (Ti_day,Ti_year,Ti_term,Su_id,Gr_id,Ro_id,Te_id,Ti_start,Ti_end) 
              VALUES (:Ti_day,:Ti_year,:Ti_term,:Pe_id,:Su_id,:Gr_id,:Ro_id,:Te_id,:Ti_start,:Ti_end)");
              $stmt->execute([
                  'Ti_day' => $_POST['Ti_day'],
                  'Ti_year' => $_POST['Ti_year'],
                  'Ti_term' => $_POST['Ti_term'],
                  'Su_id' => $_POST['Su_id'],
                  'Gr_id' => $_POST['Gr_id'],
                  'Ro_id' => $_POST['Ro_id'],
                  'Te_id' => $_POST['Te_id'],
                  'Ti_start' => $_POST['Ti_start'],
                  'Ti_end' => $_POST['Ti_end']
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
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน
    $formdata = [ //กำหนดค่าตั้งต้นของ ฟอร์ม เป็น อาเรย์ไว้ เพราะเวลากด sumit แล้วมันไม่ค้างไว้(เวลากรอกไม่ครบ)
        'Ti_day' => '',
        'Ti_year' => '',
        'Ti_term' => '',
        'Pe_id' => '',
        'Su_id' => '',
        'Gr_id' => '',
        'Ro_id' => '',
        'Te_id' => '',
    ]
?>
<?php include(__DIR__.'/_form.php'); ?>