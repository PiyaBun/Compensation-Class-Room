<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  subject WHERE Su_id=:Su_id");
    $sth->execute([
        'Su_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/subject/index');
    exit();
?>