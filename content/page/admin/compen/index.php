<?php
    admin_init(); 
    $sth = $app['db'] -> prepare("SELECT *,calendar.Ca_name,go.Go_name,teacher.Te_name
                      FROM  compen
                      LEFT JOIN calendar ON compen.Ca_id = calendar.Ca_id
                      LEFT JOIN go ON compen.Go_id = go.Go_id
                      LEFT JOIN teacher ON compen.Te_id = teacher.Te_id");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>จัดการข้อมูลสอนชดเชย</h2>
<a href="?page=admin/compen/create" class="btn btn-success">เพิ่มข้อมูล</a>
<table class="table table-borderd" method="GET">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">จำนวนวัน</th>
      <th scope="col">ชื่อเรื่องไปราชการ</th>
      <th scope="col">ปฏิทินวันหยุด</th>
      <th scope="col">ครูผู้สอน</th>
      <th scope="col" style="width:150px">เพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) : ?>
    <tr>
      <th scope="row"><?= $row['Cp_id']; ?></th>
      <td>  <?= $row['Cp_num'];?></td>
      <td>  <?= $row['Go_name'];?></td>
      <td>  <?= $row['Ca_name'];?></td>
      <td>  <?= $row['Te_name'];?></td>
      <td>  <a href="?page=admin/compen/view&id=<?= $row['Cp_id'] ?>" class="btn btn-info btn-sm">ดู</a>
            <a href="?page=admin/compen/update&id=<?= $row['Cp_id'] ?>" class="btn btn-primary btn-sm">แก้ไข</a> <!--ส่งค่าโดยระบุตามไอดี-->
            <a href="?page=admin/compen/delete&id=<?= $row['Cp_id'] ?>" class="btn btn-danger btn-sm btn-delete">ลบ</a></td>
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