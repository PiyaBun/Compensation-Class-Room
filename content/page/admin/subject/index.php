<?php
    admin_init(); 
    $sth = $app['db'] -> prepare("SELECT * FROM  subject");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>จัดการข้อมูลชื่อวิชา</h2>
<a href="?page=admin/subject/create" class="btn btn-success">เพิ่มข้อมูล</a>
<table class="table table-borderd" method="GET">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">หน่วยกิต</th>
      <th scope="col" style="width:150px">เพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) : ?>
    <tr>
      <th scope="row"><?= $row['Su_id']; ?></th>
      <td>  <?= $row['Su_name'];?></td>
      <td>  <?= $row['Su_git'];?></td>
      <td>  <a href="?page=admin/subject/view&id=<?= $row['Su_id'] ?>" class="btn btn-info btn-sm">ดู</a>
            <a href="?page=admin/subject/update&id=<?= $row['Su_id'] ?>" class="btn btn-primary btn-sm">แก้ไข</a> <!--ส่งค่าโดยระบุตามไอดี-->
            <a href="?page=admin/subject/delete&id=<?= $row['Su_id'] ?>" class="btn btn-danger btn-sm btn-delete">ลบ</a></td>
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