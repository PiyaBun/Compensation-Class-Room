<?php
admin_init();
    $sth = $app['db'] -> prepare("SELECT * FROM Room WHERE Ro_id = :Ro_id");
    $sth->execute([
        'Ro_id' => $_GET['id']
    ]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'รายชื่อห้องเรียน : '.$result['Ro_name'] ?> </h2>
<a href="?page=admin/Room/index" class="btn btn-dark">รายการทั้งหมด</a>
<a href="?page=admin/Room/create" class="btn btn-success">เพิ่ม</a>
<a href="?page=admin/Room/update&id=<?= $result['Ro_id'] ?>" class="btn btn-primary ">แก้ไข</a>
<a href="?page=admin/Room/delete&id=<?= $result['Ro_id'] ?>" class="btn btn-danger btn-delete">ลบ</a>
<table class="table ">
        <tbody>
            <tr> 
                <th style="width:200px">ชื่อ</th>
                    <td><?= $result['Ro_name'] ?></td>
            </tr>
        </tbody>
</table>

<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>