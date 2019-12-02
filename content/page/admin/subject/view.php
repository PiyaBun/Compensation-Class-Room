<?php
admin_init();
    $sth = $app['db'] -> prepare("SELECT * FROM subject WHERE Su_id = :Su_id");
    $sth->execute([
        'Su_id' => $_GET['id']
    ]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'รายชื่อกลุ่มเรียน : '.$result['Su_name'] ?> </h2>
        <a href="?page=admin/subject/index" class="btn btn-dark">รายการทั้งหมด</a>
        <a href="?page=admin/subject/create" class="btn btn-success">เพิ่ม</a>
        <a href="?page=admin/subject/update&id=<?= $result['Su_id'] ?>" class="btn btn-primary ">แก้ไข</a>
        <a href="?page=admin/subject/delete&id=<?= $result['Su_id'] ?>" class="btn btn-danger btn-delete">ลบ</a>
<table class="table ">
        <tbody>
            <tr> 
                <th style="width:200px">ชื่อวิชา</th>
                    <td><?= $result['Su_name'] ?></td>
            </tr>
            <tr> 
                <th style="width:200px">จำนวนหน่วยกิต</th>
                    <td><?= $result['Su_git'] ?></td>
            </tr>
        </tbody>
</table>

<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>