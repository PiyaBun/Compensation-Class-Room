<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  Room WHERE Ro_id=:Ro_id");
    $sth->execute([
        'Ro_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/Room/index');
    exit();
?>