<form method="post">
    <div class="form-group">
        <label for="Gr_name">เพิ่มชื่อกลุ่มเรียน</label>
        <input type="text" class="form-control <?php if(isset($errors['Gr_name'])) { echo "is-invalid"; } ?>" 
            id="Gr_name" 
            name="Gr_name" 
            placeholder="เพิ่มชื่อกลุ่มเรียน"
            value = "<?= $formdata['Gr_name']; //กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Gr_name'])) { echo $errors['Gr_name']; } ?>
        </div>

        <label for="Gr_name">เพิ่มจำนวนสมาชิคในกลุ่มเรียน</label>
        <input type="text" class="form-control <?php if(isset($errors['Gr_num'])) { echo "is-invalid"; } ?>" 
            id="Gr_num" 
            name="Gr_num" 
            placeholder="เพิ่มจำนวนสมาชิคในกลุ่มเรียน"
            value = "<?= $formdata['Gr_num'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Gr_num'])) { echo $errors['Gr_num']; } ?>
        </div>

        <?php $sql = "SELECT * FROM course" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="form-group">
            <label for="Co_id">เพิ่มข้อมูลหลักสูตร</label>
            <select class="form-control <?php if(isset($errors['Co_id'])) { echo "is-invalid"; } ?>" 
                id="Co_id"
                name="Co_id" >
                    <option value="">กรุณาเลือกข้อมูล : หลักสูตร</option>
                    <?php foreach ($result as $row) : ?> 
                        <option value="<?= $row['Co_id']; ?> "><?= $row['Co_name']?></option>
                    <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?php if(isset($errors['Co_id'])) { echo $errors['Co_id']; } ?></div>
        </div>

        <?php $sql = "SELECT * FROM level" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $resul = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="form-group">
            <label for="Le_id">เพิ่มข้อมูลระดับชั้น</label>
            <select class="form-control <?php if(isset($errors['Le_id'])) { echo "is-invalid"; } ?>" 
                id="Le_id"
                name="Le_id" >
                    <option value="">กรุณาเลือกข้อมูล : ระดับชั้น</option>
                    <?php foreach ($resul as $row) : ?> 
                        <option value="<?= $row['Le_id']; ?> "><?= $row['Le_name']?></option>
                    <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?php if(isset($errors['Le_id'])) { echo $errors['Le_id']; } ?></div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>