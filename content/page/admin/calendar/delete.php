<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  calendar WHERE Ca_id=:Ca_id");
    $sth->execute([
        'Ca_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/calendar/index');
    exit();
?>