<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  go WHERE go_id=:go_id");
    $sth->execute([
        'go_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/go/index');
    exit();
?>