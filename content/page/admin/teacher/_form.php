<form method="post">
    <div class="form-group">
        <label for="Te_name">แก้ไขชื่อ</label>
        <input type="text" class="form-control <?php if(isset($errors['Te_name'])) { echo "is-invalid"; } ?>" 
            id="Te_name" 
            name="Te_name" 
            placeholder="แก้ไขชื่อ"
            value = "<?= $formdata['Te_name'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Te_name'])) { echo $errors['Te_name']; } ?>
        </div>
        <label for="Te_last">แก้ไขนามสกุล</label>
        <input type="text" class="form-control <?php if(isset($errors['Te_last'])) { echo "is-invalid"; } ?>" 
            id="Te_last" 
            name="Te_last" 
            placeholder="แก้ไขนามสกุล"
            value = "<?= $formdata['Te_last'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Te_last'])) { echo $errors['Te_last']; } ?>
        </div>
        <label for="Te_Tel">แก้ไขเบอร์โทรศัพท์</label>
        <input type="number" class="form-control <?php if(isset($errors['Te_Tel'])) { echo "is-invalid"; } ?>" 
            id="Te_Tel" 
            name="Te_Tel" 
            placeholder="แก้ไขเบอร์โทรศัพท์"
            value = "<?= $formdata['Te_Tel'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Te_Tel'])) { echo $errors['Te_Tel']; } ?>
        </div>
        <label for="username">Username</label>
        <input type="text" class="form-control <?php if(isset($errors['username'])) { echo "is-invalid"; } ?>" 
            id="username" 
            name="username" 
            placeholder="Username"
            value = "<?= $formdata['username'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['username'])) { echo $errors['username']; } ?>
        </div>
        
        <label for="password">Password</label>
        <input type="text" class="form-control <?php if(isset($errors['password'])) { echo "is-invalid"; } ?>" 
            id="password" 
            name="password" 
            placeholder="Password"
            value = "<?= $formdata['password'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['password'])) { echo $errors['password']; } ?>
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
    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
</form>