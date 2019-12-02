<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  timetable WHERE Ti_id=:Ti_id");
    $sth->execute([
        'Ti_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/timetable/index');
    exit();
?>