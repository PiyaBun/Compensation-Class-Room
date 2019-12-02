<?php
admin_init();
$sql = "SELECT * FROM timetable 
             JOIN period ON timetable.Pe_id = period.Pe_id
             JOIN subject ON timetable.Su_id = subject.Su_id
             JOIN grouplern ON timetable.Gr_id = grouplern.Gr_id
             JOIN room ON timetable.Ro_id = room.Ro_id
             JOIN teacher ON timetable.Te_id = teacher.Te_id " ; 
$sth = $app['db'] -> prepare($sql);
$sth->execute([
    'Ti_id' => $_GET['id']
]);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'รายละเอียดตารางสอน';  ?> </h2>
<a href="?page=admin/timetable/index" class="btn btn-dark">รายการทั้งหมด</a>
<a href="?page=admin/timetable/create" class="btn btn-success">เพิ่ม</a>
<a href="?page=admin/timetable/update&id=<?= $result['Ti_id'] ?>" class="btn btn-primary ">แก้ไข</a>
<a href="?page=admin/timetable/delete&id=<?= $result['Ti_id'] ?>" class="btn btn-danger btn-delete">ลบ</a>
<table class="table ">
<?php foreach ($result as $row) : ?>
        <tbody>
            <tr> 
                <th style="width:200px">รหัส</th>
                    <td><?= $row['Ti_id'] ?></td>
            </tr>
            <tr>
                <th>วัน</th>
                    <td><?= $row['Ti_day'] ?></td>
            </tr>
            <tr>
                <th>เทอม</th>
                    <td><?= $row['Ti_term'] ?></td>
            </tr>
            <tr>
                <th>ปีการศึกษา</th>
                    <td><?= $row['Ti_year'] ?></td>
            </tr>
            <tr>
                <th>คาบเรียน</th>
                    <td><?= $row['Pe_name'] ?></td>
            </tr>
            <tr>
                <th>วิชา</th>
                    <td><?= $row['Su_name'] ?></td>
            </tr>
            <tr>
                <th>กลุ่มเรียน</th>
                    <td><?= $row['Gr_name'] ?></td>
            </tr>
            <tr>
                <th>ห้องเรียน</th>
                    <td><?= $row['Ro_name'] ?></td>
            </tr>
            <tr>
                <th>ครูผู้สอน</th>
                    <td><?= $row['Te_name'] ?></td>
            </tr>
        </tbody>
<?php endforeach; ?>
</table>

<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>