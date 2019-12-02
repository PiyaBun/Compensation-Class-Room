<?php
    $app['pagetitle'] = "สมัครสมาชิค";
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
    // $sth = $app['db']->prepare("SELECT * FROM teacher");
    // $sth->execute();
    // $result = $sth->fetch(PDO::FETCH_ASSOC);
    // print_r($result);  

    //กรณี กรอกไม่ครบ ตั้งแง่ error ไว้
  $errors = [];  

    if($_POST){
        
         
            if($_POST['Te_name'] == "")
            {
              $errors['Te_name'] = 'กรุณาระบุ ชื่อ';
            }
            if($_POST['Te_last'] == "")
            {
              $errors['Te_last'] = 'กรุณาระบุ นามสกุล';
            }
            if($_POST['Te_tel'] == "")
            {
              $errors['Te_tel'] = 'กรุณาระบุ เบอร์โทรศัพท์';
            }
            if($_POST['username'] == "")
            {
              $errors['username'] = 'กรุณาระบุ ชื่อผู้ใช้งาน';
            }
            if($_POST['password'] == "")
            {
              $errors['password'] = 'กรุณาระบุ รหัสผ่าน';
            }

            if($errors){
             // foreach ($errors as $errors) {
               // $app['flashMessages'][] = [
                //  'type ' => 'danger',
                //  'text' => $errors
                // ];
             // }
              }else{
                  //กรณี ทำงานตามปกติ 
                  $stmt = $app['db'] -> prepare("INSERT INTO teacher (Te_name,Te_last,Te_tel,username,password) 
                                  VALUES (:Te_name,:Te_last,:Te_tel,:username,:password)");
                  $stmt->execute([
                  'Te_name' => $_POST['Te_name'],
                  'Te_last' => $_POST['Te_last'],
                  'Te_tel'  => $_POST['Te_tel'],
                  'username'  => $_POST['username'],
                  'password'  => $_POST['password'],
                  ]);
                  $errorInfo = $stmt->errorInfo();
                  if ($errorInfo[2]) {
                      $app['flashMessages'][] = [
                          'type' => 'danger',
                          'text' => $errorInfo[2]
                      ];
                  }else{
                      header('location: index.php');
                  }
            }
      }    
?>

<div class="card form-signup">
  <div class="card-body">
    <h5 class="card-title">สมัครสมาชิค</h5>
    <h6 class="card-subtitle mb-2 text-muted">กรุณาสมัครสมาชิคก่อนเข้าสู่ระบบ</h6>
    <div class="card-text">
      <form method="post">
        <div class="form-group" >
          <label for="Te_name">ชื่อ</label>
          <input type="text" class="form-control <?php if(isset($errors['Te_name'])) { echo "is-invalid"; } ?>" id="Te_name" name="Te_name" placeholder="กรุณาใส่ชื่อ">
            <div class="invalid-feedback">
            <?php if(isset($errors['Te_name'])) { echo $errors['Te_name']; } ?>
            </div>
        </div>
        <div class="form-group" >
            <label for="Te_last">นามสกุล</label>
            <input type="text" class="form-control <?php if(isset($errors['Te_last'])) { echo "is-invalid"; } ?>" id="Te_last" name="Te_last" placeholder="กรุณาใส่นามสกุล">
            <div class="invalid-feedback">
              <?php if(isset($errors['Te_last'])) { echo $errors['Te_last']; } ?>
            </div>
        </div>
        <div class="form-group">
            <label for="Te_tel">เบอร์โทรศัพท์</label>
            <input type="number" class="form-control <?php if(isset($errors['Te_tel'])) { echo "is-invalid"; } ?>" id="Te_tel" name ="Te_tel"   placeholder="กรุณาใส่เบอร์โทรศัพท์">
            <div class="invalid-feedback">
              <?php if(isset($errors['Te_tel'])) { echo $errors['Te_tel']; } ?>
            </div>
        </div>
        <div class="form-group" >
            <label for="username">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control <?php if(isset($errors['username'])) { echo "is-invalid"; } ?>" id="username" name="username" placeholder="กรุณาใส่ชื่อผู้ใช้งาน">
            <div class="invalid-feedback">
              <?php if(isset($errors['username'])) { echo $errors['username']; } ?>
            </div>
        </div>
        <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" class="form-control <?php if(isset($errors['password'])) { echo "is-invalid"; } ?>" id="password" name ="password" placeholder="กรุณาใส่รหัสผ่าน">
            <div class="invalid-feedback">
              <?php if(isset($errors['password'])) { echo $errors['password']; } ?>
            </div>
        </div>

        <?php $sql = "SELECT * FROM branch" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="form-group">
        <label for="Br_id">ชื่อสาขา</label>
            <select class="form-control <?php if(isset($errors['Br_id'])) { echo "is-invalid"; } ?>" 
                id="Br_id"
                name="Br_id" >
                    <option value="">กรุณาเลือกข้อมูล : ชื่อสาขา</option>
                    <?php foreach ($result as $row) : ?> 
                        <option value="<?= $row['Br_id']; ?> "><?= $row['Br_name']?></option>
                    <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?php if(isset($errors['Br_id'])) { echo $errors['Br_id']; } ?></div>
        </div>

          <button type="submit" class="btn btn-primary">ยืนยัน</button>
          <hr>
      </form>
    </div>
    <div class="card-body">
        <a href="index.php" class="card-link">กลับสู่หน้าหลัก</a>
        <a href="?page=login" class="card-link">เข้าสู่ระบบ</a>
    </div>
  </div>
</div>
