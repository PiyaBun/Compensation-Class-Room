<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  grouplern WHERE Gr_id=:Gr_id");
    $sth->execute([
        'Gr_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/grouplern/index');
    exit();
?>