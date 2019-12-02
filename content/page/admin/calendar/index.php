<?php
    admin_init(); 
    $sth = $app['db'] -> prepare("SELECT * FROM  calendar");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>จัดการข้อมูลปฏิทินวันหยุด</h2>
<a href="?page=admin/calendar/create" class="btn btn-success">เพิ่มข้อมูล</a>
<table class="table table-borderd" method="GET">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">วันที่</th>
      <th scope="col">ภาคเรียน</th>
      <th scope="col">ปีการศึกษา</th>
      <th scope="col" style="width:150px">เพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) : ?>
    <tr>
      <th scope="row"><?= $row['Ca_id']; ?></th>
      <td>  <?= $row['Ca_name'];?></td>
      <td>  <?= $row['Ca_date'];?></td>
      <td>  <?= $row['Ca_term'];?></td>
      <td>  <?= $row['Ca_year'];?></td>
      <td>  <a href="?page=admin/calendar/view&id=<?= $row['Ca_id'] ?>" class="btn btn-info btn-sm">ดู</a>
            <a href="?page=admin/calendar/update&id=<?= $row['Ca_id'] ?>" class="btn btn-primary btn-sm">แก้ไข</a> <!--ส่งค่าโดยระบุตามไอดี-->
            <a href="?page=admin/calendar/delete&id=<?= $row['Ca_id'] ?>" class="btn btn-danger btn-sm btn-delete">ลบ</a></td>
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