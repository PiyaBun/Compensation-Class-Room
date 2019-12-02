<?php
    off_init();
?>
<?php
    $errors = [];
    if($_POST){
        
        if(!$errors){
            $stmt = $app['db'] -> prepare("INSERT INTO timetable (Ti_day,Ti_year,Ti_term,Ti_start,Ti_end,Su_id,Gr_id,Ro_id,Te_id) 
            VALUES (:Ti_day,:Ti_year,:Ti_term,:Ti_start,:Ti_end,:Su_id,:Gr_id,:Ro_id,:Te_id)");
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
                header('location: ?page=indexAdd');
                exit();
            }
    }
    //แยกฟอร์มทั้งหมดไปไว้ที่ _form แทน
    $sth = $app['db'] -> prepare("SELECT * FROM timetable");
    $sth->execute();
    $formdata = $sth->fetch(PDO::FETCH_ASSOC);

?>

    <?php include(__DIR__.'/_formAdd.php'); ?>