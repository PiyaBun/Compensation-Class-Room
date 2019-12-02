<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  compen WHERE Cp_id=:Cp_id");
    $sth->execute([
        'Cp_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/compen/index');
    exit();
?>