<form method="post">
    <div class="form-group">
        <label for="Cp_num">จำนวนวัน</label>
        <input type="text" class="form-control <?php if(isset($errors['Cp_num'])) { echo "is-invalid"; } ?>" 
            id="Cp_num" 
            name="Cp_num" 
            placeholder="จำนวนวัน"
            value = "<?= $formdata['Cp_num']; //กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Cp_num'])) { echo $errors['Cp_num']; } ?>
        </div>

        <?php $sql = "SELECT * FROM go" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="form-group">
            <label for="Go_id">ชื่อเรื่องไปราชการ</label>
            <select class="form-control <?php if(isset($errors['Go_id'])) { echo "is-invalid"; } ?>" 
                id="Go_id"
                name="Go_id" >
                    <option value="">กรุณาเลือกข้อมูล : ชื่อเรื่องไปราชการ</option>
                    <?php foreach ($result as $row) : ?> 
                        <option value="<?= $row['Go_id']; ?> "><?= $row['Go_name']?></option>
                    <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?php if(isset($errors['Go_id'])) { echo $errors['Go_id']; } ?></div>
        </div>

        <?php $sql = "SELECT * FROM calendar" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $resul = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="form-group">
            <label for="Ca_id">ปฏิทินวันหยุด</label>
            <select class="form-control <?php if(isset($errors['Ca_id'])) { echo "is-invalid"; } ?>" 
                id="Ca_id"
                name="Ca_id" >
                    <option value="">กรุณาเลือกข้อมูล : ปฏิทินวันหยุด</option>
                    <?php foreach ($resul as $row) : ?> 
                        <option value="<?= $row['Ca_id']; ?> "><?= $row['Ca_name']?></option>
                    <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?php if(isset($errors['Ca_id'])) { echo $errors['Ca_id']; } ?></div>
        </div>

        <?php $sql = "SELECT * FROM teacher" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $resule = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="form-group">
            <label for="Te_id">ครูผู้สอน</label>
            <select class="form-control <?php if(isset($errors['Te_id'])) { echo "is-invalid"; } ?>" 
                id="Te_id"
                name="Te_id" >
                    <option value="">กรุณาเลือกข้อมูล : ครูผู้สอน</option>
                    <?php foreach ($resule as $row) : ?> 
                        <option value="<?= $row['Te_id']; ?> "><?= $row['Te_name']?></option>
                    <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?php if(isset($errors['Te_id'])) { echo $errors['Te_id']; } ?></div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>