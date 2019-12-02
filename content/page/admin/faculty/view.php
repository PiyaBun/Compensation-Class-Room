<?php
admin_init();
    $sth = $app['db'] -> prepare("SELECT * FROM faculty WHERE Fa_id = :Fa_id");
    $sth->execute([
        'Fa_id' => $_GET['id']
    ]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'รายชื่อคณะ : '.$result['Fa_name'] ?> </h2>
<a href="?page=admin/faculty/index" class="btn btn-dark">รายการทั้งหมด</a>
<a href="?page=admin/faculty/create" class="btn btn-success">เพิ่ม</a>
<a href="?page=admin/faculty/update&id=<?= $result['Fa_id'] ?>" class="btn btn-primary ">แก้ไข</a>
<a href="?page=admin/faculty/delete&id=<?= $result['Fa_id'] ?>" class="btn btn-danger btn-delete">ลบ</a>
<table class="table ">
        <tbody>
            <tr> 
                <th style="width:200px">ชื่อ</th>
                    <td><?= $result['Fa_name'] ?></td>
            </tr>
        </tbody>
</table>

<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>