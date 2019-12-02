<?php
    off_init(); 
    $sql = "SELECT * FROM timetable 
                LEFT JOIN subject ON timetable.Su_id = subject.Su_id
                LEFT JOIN grouplern ON timetable.Gr_id = grouplern.Gr_id
                LEFT JOIN room ON timetable.Ro_id = room.Ro_id
                LEFT JOIN teacher ON timetable.Te_id = teacher.Te_id  " ; 

    $sth = $app['db'] -> prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>ตารางสอนทั้งหมด</h2>
<a href="?page=createAdd" class="btn btn-success">เพิ่มข้อมูล</a>
<table class="table table-borderd" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">ลำดับที่</th>
      <th scope="col">เทอม</th>
      <th scope="col">ปีการศึกษา</th>
      <th scope="col">วัน</th>
      <th scope="col">จำนวนชั่วโมง</th>
      <th scope="col">เวลาเริ่มต้น</th>
      <th scope="col">เวลาสิ้นสุด</th>
      <th scope="col">วิชา</th>
      <th scope="col">กลุ่มเรียน</th>
      <th scope="col">ห้องเรียน</th>
      <th scope="col">ครูผู้สอน</th>
    </tr>
  </thead>
  <tbody>

    <?php
      $i=1;
      foreach ($result as $row) : ?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td>  <?= $row['Ti_term'];?></td>
      <td>  <?= $row['Ti_year'];?></td>
      <td>  <?= $row['Ti_day'];?></td>
      <td>  <?=  $row['Ti_hour'];?></td>
      <td>  <?=  $row['Ti_start'];?></td>
      <td>  <?=  $row['Ti_end'];?></td>
      <td>  <?= $row['Su_name'];?></td>
      <td>  <?= $row['Gr_name'];?></td>
      <td>  <?= $row['Ro_name'];?></td>
      <td>  <?= $row['Te_name'];?></td>
    </tr>
    
    <?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>
<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>