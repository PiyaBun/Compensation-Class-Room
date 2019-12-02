<?php
admin_init();
    $sth = $app['db'] -> prepare("SELECT * FROM go WHERE go_id = :go_id");
    $sth->execute([
        'go_id' => $_GET['id']
    ]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM place" ;
    $sth = $app['db'] -> prepare($sql);
    $sth->execute();
    $resul = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'รายชื่อกลุ่มเรียน : '.$result['Go_name'] ?> </h2>
        <a href="?page=admin/go/index" class="btn btn-dark">รายการทั้งหมด</a>
        <a href="?page=admin/go/create" class="btn btn-success">เพิ่ม</a>
        <a href="?page=admin/go/update&id=<?= $result['go_id'] ?>" class="btn btn-primary ">แก้ไข</a>
        <a href="?page=admin/go/delete&id=<?= $result['go_id'] ?>" class="btn btn-danger btn-delete">ลบ</a>
<table class="table ">
        <tbody>
            <tr> 
                <th style="width:200px">รหัส</th>
                    <td><?= $result['Go_id'] ?></td>
            </tr>
            <tr>
                <th style="width:200px">ชื่อ</th>
                    <td><?= $result['Go_name'] ?></td>  
            </tr>
            <tr>
                <th style="width:200px">วันเดือนปี</th>
                    <td><?= $result['Go_date'] ?></td>  
            </tr>
            <tr>
                <th style="width:200px">เลขที่คำสั่ง</th>
                    <td><?= $result['Go_num'] ?></td>  
            </tr>
            <tr>
                <th style="width:200px">จำนวนคน</th>
                    <td><?= $result['Go_quan'] ?></td>  
            </tr>
            <tr>
                <th style="width:200px">สถานที่</th>
                    <td>
                        <?php foreach ($resul as $row) : ?> 
                            <?= $row['Pl_name']?></option>
                        <?php endforeach; ?>
                    </td>  
            </tr>

        </tbody>
</table>

<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>