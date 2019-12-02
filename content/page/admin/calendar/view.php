<?php
admin_init();
    $sth = $app['db'] -> prepare("SELECT * FROM calendar WHERE Ca_id = :Ca_id");
    $sth->execute([
        'Ca_id' => $_GET['id']
    ]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'รายชื่อวันหยุด : '.$result['Ca_name'] ?> </h2>
<a href="?page=admin/calendar/index" class="btn btn-dark">รายการทั้งหมด</a>
<a href="?page=admin/calendar/create" class="btn btn-success">เพิ่ม</a>
<a href="?page=admin/calendar/update&id=<?= $result['Ca_id'] ?>" class="btn btn-primary ">แก้ไข</a>
<a href="?page=admin/calendar/delete&id=<?= $result['Ca_id'] ?>" class="btn btn-danger btn-delete">ลบ</a>
<table class="table ">
        <tbody>
            <tr> 
                <th style="width:200px">ชื่อ</th>
                    <td><?= $result['Ca_name'] ?></td>
            </tr>
            <tr>
                <th>วันที่</th>
                    <td><?= $result['Ca_date'] ?></td>
            </tr>
            <tr>
                <th>เทอม</th>
                    <td><?= $result['Ca_term'] ?></td>
            </tr>
            <tr>
                <th>ข้อมูลปีการศึกษา</th>
                    <td><?= $result['Ca_year'] ?></td>
            </tr>
            <tr>
                <th>ข้อมูลรายละเอียด</th>
                    <td><?= $result['Ca_detail'] ?></td>
            </tr>
        </tbody>
</table>

<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>