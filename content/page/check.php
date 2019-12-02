<?php
off_init();
$sql = "SELECT * FROM compen
            LEFT JOIN timetable ON timetable.Ti_id = compen.Ti_id
            LEFT JOIN teacher ON teacher.Te_id = compen.Te_id
        WHERE Cp_id=:Cp_id" ; 
$sth = $app['db'] -> prepare($sql);
$sth->execute([
    'Cp_id' => $_GET['id']
]);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'ข้อมูลการยื่นขอสอนชดเชย';  ?> </h2>
     <a href="?page=alright&id=<?= $result['De_id'] ?>" class="btn btn-success">ถูกต้อง</a>
     <a href="?page=mistake&id=<?= $result['De_id'] ?>" class="btn btn-warning">ผิดพลาด</a>
<table class="table table-borderd">
<?php foreach ($result as $row) : ?>
        <tbody>
            <tr>
                <th>วันที่ไม่ได้สอนชดเชย</th>
                    <td><?= $row['Cp_date_no'] ?></td>
            </tr>
            <tr>
                <th>วันทำการสอนชดเชย</th>
                    <td><?= $row['Cp_date_start'] ?></td>
            </tr>
            <tr>
                <th>เหตุผล</th>
                    <td><?= $row['Cp_why'] ?></td>
            </tr>
            <tr>
                <th>สาเหตุ</th>
                    <td><?= $row['Cp_detail'] ?></td>
            </tr>
            <tr>
                <th>สถานที่ไปราชการ</th>
                    <td><?= $row['Cp_place'] ?></td>
            </tr>
            <tr>
                <th>ครุผู้สอน</th>
                    <td><?= $row['Te_name'] ?></td>
            </tr>
            <tr>
                <th>รหัสตารางสอน</th>
                    <td><?= $row['Ti_id'] ?></td>
            </tr>
        </tbody>
        
<?php endforeach; ?>
</table>
