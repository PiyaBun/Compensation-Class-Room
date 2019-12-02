<?php
    admin_init(); 
    $sth = $app['db'] -> prepare("SELECT * FROM  branch");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>จัดการข้อมูลสาขา</h2>
<a href="?page=admin/branch/create" class="btn btn-success">เพิ่มข้อมูล</a>
<table class="table table-borderd" method="GET">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อ</th>
      <th scope="col" style="width:150px">เพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) : ?>
    <tr>
      <th scope="row"><?= $row['Br_id']; ?></th>
      <td>  <?= $row['Br_name'];?></td>
      <td>  <a href="?page=admin/branch/view&id=<?= $row['Br_id'] ?>" class="btn btn-info btn-sm">ดู</a>
            <a href="?page=admin/branch/update&id=<?= $row['Br_id'] ?>" class="btn btn-primary btn-sm">แก้ไข</a> <!--ส่งค่าโดยระบุตามไอดี-->
            <a href="?page=admin/branch/delete&id=<?= $row['Br_id'] ?>" class="btn btn-danger btn-sm btn-delete">ลบ</a></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>