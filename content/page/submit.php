<?php
    off_init(); 
    $sql = "SELECT * FROM compen,de_compen 
              LEFT JOIN room ON room.Ro_id = De_compen.Ro_id 
            WHERE de_compen.Cp_id = de_compen.De_id" ; 
    $sth = $app['db'] -> prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>รายการยื่นขอสอนชดเชย</h2>
<table class="table table-borderd" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">วันที่สอนชดเชย</th>
      <th scope="col">เวลาเริ่มต้น</th>
      <th scope="col">เวลาสิ้นสุด</th>
      <th scope="col">ห้องเรียน</th>
      <th scope="col">สถานะ</th>
      <th scope="col">Comment</th>
      <th scope="col">เพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>

    <?php
      $i=1;
      foreach ($result as $row) : 
    ?>
    <tr>
      <td>  <?= $row['Cp_date_start'];?></td>
      <td>  <?= $row['De_start'];?></td>
      <td>  <?= $row['De_end'];?></td>
      <td>  <?= $row['Ro_name'];?></td>
      <td>  <?= $row['Cp_status'];?></td>
      <td>  <?= $row['De_comment'];?></td>
      <td>  <a href="?page=check&id=<?= $row['De_id'] ?>" class="btn btn-success btn-sm">ตรวจสอบ</a>
           
      </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>