<?php
    admin_init(); 
    $sth = $app['db'] -> prepare("SELECT *,course.Co_name,level.Le_name 
                      FROM  grouplern
                      left JOIN course ON grouplern.Co_id = course.Co_id
                      left JOIN level ON grouplern.Le_id = level.Le_id");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>จัดการข้อมูลกลุ่มเรียน</h2>
<a href="?page=admin/grouplern/create" class="btn btn-success">เพิ่มข้อมูล</a>
<table class="table table-borderd" method="GET">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">จำนวนสมาชิค</th>
      <th scope="col">ปีหลักสูตร</th>
      <th scope="col">ระดับชั้น</th>
      <th scope="col" style="width:150px">เพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) : ?>
    <tr>
      <th scope="row"><?= $row['Gr_id']; ?></th>
      <td>  <?= $row['Gr_name'];?></td>
      <td>  <?= $row['Gr_num'];?></td>
      <td>  <?= $row['Co_name'];?></td>
      <td>  <?= $row['Le_name'];?></td>
      <td>  <a href="?page=admin/grouplern/view&id=<?= $row['Gr_id'] ?>" class="btn btn-info btn-sm">ดู</a>
            <a href="?page=admin/grouplern/update&id=<?= $row['Gr_id'] ?>" class="btn btn-primary btn-sm">แก้ไข</a> <!--ส่งค่าโดยระบุตามไอดี-->
            <a href="?page=admin/grouplern/delete&id=<?= $row['Gr_id'] ?>" class="btn btn-danger btn-sm btn-delete">ลบ</a></td>
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