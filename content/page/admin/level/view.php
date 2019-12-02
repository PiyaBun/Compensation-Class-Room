<?php
admin_init();
    $sth = $app['db'] -> prepare("SELECT * FROM level WHERE Le_id = :Le_id");
    $sth->execute([
        'Le_id' => $_GET['id']
    ]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'รายชื่อระดับชั้น : '.$result['Le_name'] ?> </h2>
<a href="?page=admin/level/index" class="btn btn-dark">รายการทั้งหมด</a>
<a href="?page=admin/level/create" class="btn btn-success">เพิ่ม</a>
<a href="?page=admin/level/update&id=<?= $result['Le_id'] ?>" class="btn btn-primary ">แก้ไข</a>
<a href="?page=admin/level/delete&id=<?= $result['Le_id'] ?>" class="btn btn-danger btn-delete">ลบ</a>
<table class="table ">
        <tbody>
            <tr> 
                <th style="width:200px">ชื่อ</th>
                    <td><?= $result['Le_name'] ?></td>
            </tr>
        </tbody>
</table>

<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>