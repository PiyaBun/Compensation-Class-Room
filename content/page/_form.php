<?php
$year = (isset($_GET['year'])) ? $_GET['year'] : null;
$semen = (isset($_GET['semen'])) ? $_GET['semen'] : null;

if(isset($_GET['year'])&&isset($_GET['semen'])){
  extract($_GET);
  $sql = "SELECT * FROM timetable 
            LEFT JOIN subject ON timetable.Su_id = subject.Su_id
            LEFT JOIN grouplern ON timetable.Gr_id = grouplern.Gr_id
            LEFT JOIN room ON timetable.Ro_id = room.Ro_id
  WHERE Ti_year = ".$year." and Ti_term = ".$semen."  ";
}else{
  $sql = "SELECT * FROM timetable 
                LEFT JOIN subject ON timetable.Su_id = subject.Su_id
                LEFT JOIN grouplern ON timetable.Gr_id = grouplern.Gr_id
                LEFT JOIN room ON timetable.Ro_id = room.Ro_id";
}

$sth = $app['db'] -> prepare($sql);
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>  
<div class="col-md-auto " id="demo">
    <div class="form-group">
    <table class="table table-borderd" method="GET">
      <thead class="thead-dark">
        <tr>
          <th scope="col">วัน</th>
          <th scope="col">ภาคการศึกษา</th>
          <th scope="col">ปีการศึกษา</th>
          <th scope="col">จำนวนชั่วโมง</th>
          <th scope="col">เวลาเริ่มต้น</th>
          <th scope="col">เวลาสิ้นสุด</th>
          <th scope="col">วิชา</th>
          <th scope="col">กลุ่มเรียน</th>
          <th scope="col">ห้องเรียน</th>
          <th scope="col" style="width:150px">เพิ่มเติม</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($result as $row) : ?>
        <tr>
          <td>  <?=  $row['Ti_day'];?></td>
          <td>  <?=  $row['Ti_term'];?></td>
          <td>  <?=  $row['Ti_year'];?></td>
          <td>  <?=  $row['Ti_hour'];?></td>
          <td>  <?=  $row['Ti_start'];?></td>
          <td>  <?=  $row['Ti_end'];?></td>
          <td>  <?=  $row['Su_name'];?></td>
          <td>  <?=  $row['Gr_name'];?></td>
          <td>  <?=  $row['Ro_name'];?></td>
          <td><a href="?page=_action&id=<?= $row['Ti_id'] ?>" class="btn btn-info btn-sm">สอนชดเชย</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>
