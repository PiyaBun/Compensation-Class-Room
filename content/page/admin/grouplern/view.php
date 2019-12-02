<?php
admin_init();
    $sth = $app['db'] -> prepare("SELECT * FROM grouplern WHERE Gr_id = :Gr_id");
    $sth->execute([
        'Gr_id' => $_GET['id']
    ]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'รายชื่อกลุ่มเรียน : '.$result['Gr_name'] ?> </h2>
        <a href="?page=admin/grouplern/index" class="btn btn-dark">รายการทั้งหมด</a>
        <a href="?page=admin/grouplern/create" class="btn btn-success">เพิ่ม</a>
        <a href="?page=admin/grouplern/update&id=<?= $result['Gr_id'] ?>" class="btn btn-primary ">แก้ไข</a>
        <a href="?page=admin/grouplern/delete&id=<?= $result['Gr_id'] ?>" class="btn btn-danger btn-delete">ลบ</a>
<table class="table ">
        <tbody>
            <tr> 
                <th style="width:200px">ชื่อ</th>
                    <td><?= $result['Gr_name'] ?></td>
            </tr>
            <tr>
                <th style="width:200px">จำนวนสมาชิค</th>
                    <td><?= $result['Gr_num'] ?></td>
                    
            </tr>
        </tbody>
</table>

<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>