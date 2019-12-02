<?php
    $app['pagetitle'] = "เข้าสู่ระบบสำหรับเจ้าหน้าที่";
    $app['layout'] = __DIR__.'/../layouts/blank.php';
    $app['cssscript'][] = "
      body {
        background-color: #eee;
      }


      .form-signup {
        max-width : 330px;
        padding: 15px;
        margin: 0 auto;
      }
    ";
    if ($_POST){
      $sth = $app['db'] -> prepare("SELECT * FROM officer WHERE username = :username");
      $sth->execute([
        'username'  => $_POST['username'] 
        ]);
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      if($result){
        $_SESSION['auth'] = [
          'isAuthenticated' => true,
          'user' => [
                      'Of_id' => $result['Of_id'],
                      'username' => $result['username'],
                      'Of_name' => $result['Of_name'],
                      'Of_last' => $result['Of_last'],
                      'Of_Tel' => $result['Of_Tel']
                    ],
        ];
        if( $result['is_admin'] == '0' ) {
          header('location: ?page=admin/index');
        }else{
          header('location: ?page=indexAdd');
        }
      //echo $result['password'];
    } else {
      echo 'การเข้าสู่ระบบล้มเหลว';
    }
  }
?>
<div class="card form-signup">
  <div class="card-body">
    <h5 class="card-title">เข้าสู่ระบบ</h5>
    <div class="card-text">
      <form method="post">
        <div class="form-group" >
          <label for="username">ชื่อผู้ใช้งาน</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="กรุณาใส่ชื่อผู้ใช้งาน">
        </div>
        <div class="form-group">
          <label for="password">รหัสผ่าน</label>
          <input type="password" class="form-control" id="password" name ="password" placeholder="กรุณาใส่รหัสผ่าน">
        </div>
        <button type="submit" class="btn btn-primary">ยืนยัน</button>
        <hr>
      </form>
    </div>
      <div class="card-body">
        <a href="index.php" class="card-link">กลับสู่หน้าหลัก</a>
      </div>
  </div>
</div>