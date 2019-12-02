<?php
    admin_init(); 
    $sth = $app['db'] -> prepare("SELECT *,place.Pl_name
                      FROM  go
                      left JOIN place ON go.Go_id = place.Pl_id");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>จัดการข้อมูลไปราชการ</h2>
<a href="?page=admin/go/create" class="btn btn-success">เพิ่มข้อมูล</a>
<table class="table table-borderd" method="GET">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อเรื่อง</th>
      <th scope="col">วันเดือนปี</th>
      <th scope="col">เลขที่คำสั่ง</th>
      <th scope="col">จำนวนคน</th>
      <th scope="col">สถานที่</th>
      <th scope="col" style="width:150px">เพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) : ?>
    <tr>
      <th scope="row"><?= $row['Go_id']; ?></th>
      <td>  <?= $row['Go_name'];?></td>
      <td>  <?= $row['Go_date'];?></td>
      <td>  <?= $row['Go_num'];?></td>
      <td>  <?= $row['Go_quan'];?></td>
      <td>  <?= $row['Pl_name'];?></td>
      <td>  <a href="?page=admin/go/view&id=<?= $row['Go_id'] ?>" class="btn btn-info btn-sm">ดู</a>
            <a href="?page=admin/go/update&id=<?= $row['Go_id'] ?>" class="btn btn-primary btn-sm">แก้ไข</a> <!--ส่งค่าโดยระบุตามไอดี-->
            <a href="?page=admin/go/delete&id=<?= $row['Go_id'] ?>" class="btn btn-danger btn-sm btn-delete">ลบ</a></td>
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