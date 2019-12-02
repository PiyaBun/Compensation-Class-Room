<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  branch WHERE Br_id=:Br_id");
    $sth->execute([
        'Br_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/branch/index');
    exit();
?>