<?php 
user_verify();
$app['pagetitle'] = "ทำการสอนชดเชย";
$app['layout'] = __DIR__.'/../layouts/blank.php';
$app['cssscript'][] = "
  body {
    background-color: #eee;
  }
  .form-compen {
    max-width : 500px;
    padding: 15px;
    margin: 0 auto;
  }
";
?>
<?php include(__DIR__.'/_navbar.php'); ?>
<?php 
        $sql = "SELECT * FROM compen,de_compen 
                    LEFT JOIN room ON room.Ro_id = De_compen.Ro_id 
                WHERE compen.Cp_id = de_compen.De_id " ; 
        $sth = $app['db'] -> prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-md-auto " id="demo">
    <div class="form-group">
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
      <td class="text-success"><b>  <?= $row['Cp_status'];?> </b></td>
      <td>  <?= $row['De_comment'];?></td>
      <td>  <a href="?page=perfect&id=<?= $row['De_id'] ?>" class="btn btn-success btn-sm">อนุมัติ</a>
           
      </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>
</div>
