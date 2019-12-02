<?php
    admin_init(); 
    $sth = $app['db'] -> prepare("SELECT * FROM  teacher 
                                  LEFT JOIN branch ON teacher.Br_id = branch.Br_id ");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>จัดการข้อมูลผู้ใช้</h2>
<table class="table table-borderd" method="GET">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">เบอร์โทรศัพท์</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">สาขา</th>
      <th scope="col" style="width:150px">เพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) : ?>
    <tr>
      <th scope="row"><?= $row['Te_id']; ?></th>
      <td>  <?= $row['Te_name'];?></td>
      <td>  <?= $row['Te_last'];?></td>
      <td>  <?= $row['Te_Tel'];?></td>
      <td>  <?= $row['username'];?></td>
      <td>  *************** </td>
      <td>  <?= $row['Br_name'];?></td>
      <td>  <a href="?page=admin/teacher/view&id=<?= $row['Te_id'] ?>" class="btn btn-info btn-sm">ดู</a>
            <a href="?page=admin/teacher/update&id=<?= $row['Te_id'] ?>" class="btn btn-primary btn-sm">แก้ไข</a> <!--ส่งค่าโดยระบุตามไอดี-->
            <a href="?page=admin/teacher/delete&id=<?= $row['Te_id'] ?>" class="btn btn-danger btn-sm btn-delete">ลบ</a></td>
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