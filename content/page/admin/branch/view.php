<?php
admin_init();
    $sth = $app['db'] -> prepare("SELECT * FROM branch WHERE Br_id = :Br_id");
    $sth->execute([
        'Br_id' => $_GET['id']
    ]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'รายชื่อสาขา : '.$result['Br_name'] ?> </h2>
<a href="?page=admin/branch/index" class="btn btn-dark">รายการทั้งหมด</a>
<a href="?page=admin/branch/create" class="btn btn-success">เพิ่ม</a>
<a href="?page=admin/branch/update&id=<?= $result['Br_id'] ?>" class="btn btn-primary ">แก้ไข</a>
<a href="?page=admin/branch/delete&id=<?= $result['Br_id'] ?>" class="btn btn-danger btn-delete">ลบ</a>
<table class="table ">
        <tbody>
            <tr> 
                <th style="width:200px">ชื่อ</th>
                    <td><?= $result['Br_name'] ?></td>
            </tr>
        </tbody>
</table>

<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>