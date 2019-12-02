<?php
    admin_init(); 
    $sth = $app['db'] -> prepare("SELECT * FROM  Room");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>จัดการข้อมูลห้องเรียน</h2>
<a href="?page=admin/Room/create" class="btn btn-success">เพิ่มข้อมูล</a>
<table class="table table-borderd" method="GET">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:100px">รหัส</th>
      <th scope="col" style="width:300px">ชื่อห้องเรียน</th>
      <th scope="col" style="width:150px">เพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) : ?>
    <tr>
      <th scope="row"><?= $row['Ro_id']; ?></th>
      <td>  <?= $row['Ro_name'];?></td>
      <!--<td>  <?php  
      /*        if($row['Ro_status'] == '0'){
                echo "ว่าง";
              }else {
                echo "ไม่ว่าง";
              }                                 */
            ?> 
      </td> -->
      <td>  <a href="?page=admin/Room/view&id=<?= $row['Ro_id'] ?>" class="btn btn-info btn-sm">ดู</a>
            <a href="?page=admin/Room/update&id=<?= $row['Ro_id'] ?>" class="btn btn-primary btn-sm">แก้ไข</a> <!--ส่งค่าโดยระบุตามไอดี-->
            <a href="?page=admin/Room/delete&id=<?= $row['Ro_id'] ?>" class="btn btn-danger btn-sm btn-delete">ลบ</a></td>
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