<?php
    admin_init();
?>
<?php
    $sth = $app['db'] -> prepare("DELETE FROM  teacher WHERE Te_id=:Te_id");
    $sth->execute([
        'Te_id' => $_GET['id'],
    ]);
    header('location: ?page=admin/teacher/index');
    exit();
?>