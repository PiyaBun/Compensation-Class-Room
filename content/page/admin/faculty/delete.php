<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  faculty WHERE Fa_id=:Fa_id");
    $sth->execute([
        'Fa_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/faculty/index');
    exit();
?>