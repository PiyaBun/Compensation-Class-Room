<?php
    off_init();
?>
<?php

    $sth = $app['db'] -> prepare("UPDATE compen SET Cp_status = 'yes' WHERE Cp_id=:Cp_id");
    $sth->execute([
        'Cp_id' => $_GET['id'],
    ]);
    $st = $app['db'] -> prepare("UPDATE de_compen SET De_status = 'yes', Cp_id=:Cp_idWHERE De_id=:De_id");
    $st->execute([
        'Cp_id' => $_GET['id'],
        'De_id' => $_GET['id'],
    ]);
    header('location: ?page=submit');
?>