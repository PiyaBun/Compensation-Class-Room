<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  level WHERE Le_id=:Le_id");
    $sth->execute([
        'Le_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/level/index');
    exit();
?>