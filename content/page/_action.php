<?php
user_verify();
    $sth = $app['db'] -> prepare("SELECT * FROM timetable
                                    LEFT JOIN subject ON timetable.Su_id = subject.Su_id
                                    LEFT JOIN grouplern ON timetable.Gr_id = grouplern.Gr_id
                                    LEFT JOIN room ON timetable.Ro_id = room.Ro_id
                                  WHERE Ti_id = :Ti_id");       
    $sth->execute([
        'Ti_id' => $_GET['id']
    ]);
    $actiondata = $sth->fetch(PDO::FETCH_ASSOC);

    $sta = $app['db'] -> prepare("SELECT * FROM compen,de_compen");       
    $sta->execute();
    $actiondata2 = $sta->fetch(PDO::FETCH_ASSOC);

    $app['pagetitle'] = "เพิ่มข้อมูลการสอนชดเชย";
    $app['layout'] = __DIR__.'/../layouts/blank.php';
    $app['cssscript'][] = "
      body {
        background-color: #eee;
      }
      .form-compen {
        max-width : 500px;
        padding: 15px;
        margin: 0 auto;
      }
    ";
    
    include(__DIR__.'/_navbar.php');
    if($_POST){
      $stmt = $app['db'] -> prepare("INSERT INTO compen (Cp_date_no,Cp_date_start,Cp_why,Cp_place,Cp_detail,Ti_id,Te_id) 
                                    VALUES (:Cp_date_no,:Cp_date_start,:Cp_why,:Cp_place,:Cp_detail,:Ti_id,:Te_id)");
      $stmt->execute([
            'Cp_date_no' => $_POST['Cp_date_no'],
            'Cp_date_start' => $_POST['Cp_date_start'],
            'Cp_why' => $_POST['Cp_why'],
            'Cp_place' => $_POST['Cp_place'],
            'Cp_detail' => $_POST['Cp_detail'],
            'Ti_id' => $_POST['Ti_id'],
            'Te_id' => $_POST['Te_id']
            ]);

      $stm = $app['db'] -> prepare("INSERT INTO de_compen (De_start,De_end,Ro_id,Cp_id) 
                                    VALUES (:De_start,:De_end,:Ro_id,:Cp_id)");
      $stm->execute([
            'De_start' => $_POST['De_start'],
            'De_end' => $_POST['De_end'],
            'Ro_id' => $_POST['Ro_id'],
            'Cp_id' => $_GET['id'],
            ]);
      
      header('location: ?page=compensation');
            }
  ?>
<?php include(__DIR__.'/_formAction.php')?>