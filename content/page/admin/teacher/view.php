<?php
admin_init();
    $sth = $app['db'] -> prepare("SELECT * FROM teacher WHERE Te_id = :Te_id");
    $sth->execute([
        'Te_id' => $_GET['id']
    ]);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
?>
<h2> <?= $app['pagetitle'] = 'รายชื่อกลุ่มเรียน : '.$result['Te_name'] ?> </h2>
        <a href="?page=admin/teacher/index" class="btn btn-dark">รายการทั้งหมด</a>
        <a href="?page=admin/teacher/update&id=<?= $result['Te_id'] ?>" class="btn btn-primary ">แก้ไข</a>
        <a href="?page=admin/teacher/delete&id=<?= $result['Te_id'] ?>" class="btn btn-danger btn-delete">ลบ</a>
<table class="table ">
        <tbody>
            <tr> 
                <th style="width:200px">ชื่อ</th>
                    <td><?= $result['Te_name'] ?></td>
            </tr>
            <tr> 
                <th style="width:200px">นามสกุล</th>
                    <td><?= $result['Te_last'] ?></td>
            </tr>
            <tr> 
                <th style="width:200px">เบอร์โทรศัพท์</th>
                    <td><?= $result['Te_Tel'] ?></td>
            </tr>
            <tr> 
                <th style="width:200px">username</th>
                    <td><?= $result['username'] ?></td>
            </tr>
            <tr> 
                <th style="width:200px">password</th>
                    <td><?= $result['password'] ?></td>
            </tr>
            <tr> 
                <th style="width:200px">สาขา</th>
                    <td><?= $result['Br_id'] ?></td>
            </tr>
        </tbody>
</table>

<?php
$app['jsscript'][] = "
  $('.btn-delete').click(function(){
  if(!confirm('กรุณายืนยันการลบข้อมูล')) { return false }
  })";
?>