<form method="post">
    <div class="form-group">
        <label for="Go_name">เพิ่มชื่อเรื่อง</label>
        <input type="text" class="form-control <?php if(isset($errors['Go_name'])) { echo "is-invalid"; } ?>" 
            id="Go_name" 
            name="Go_name" 
            placeholder="เพิ่มชื่อเรื่อง"
            value = "<?= $formdata['Go_name']; //กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Go_name'])) { echo $errors['Go_name']; } ?>
        </div>

        <label for="Go_date">เพิ่มวันเดือนปี</label>
        <input type="date" class="form-control <?php if(isset($errors['Go_date'])) { echo "is-invalid"; } ?>" 
            id="Go_date" 
            name="Go_date" 
            placeholder="เพิ่มวันเดือนปี"
            value = "<?= $formdata['Go_date'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Go_date'])) { echo $errors['Go_date']; } ?>
        </div>

        <label for="Go_num">เพิ่มเลขที่คำสั่ง</label>
        <input type="text" class="form-control <?php if(isset($errors['Go_num'])) { echo "is-invalid"; } ?>" 
            id="Go_num" 
            name="Go_num" 
            placeholder="เพิ่มเลขที่คำสั่ง"
            value = "<?= $formdata['Go_num'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Go_num'])) { echo $errors['Go_num']; } ?>
        </div>
        
        <label for="Go_quan">เพิ่มจำนวน</label>
        <input type="text" class="form-control <?php if(isset($errors['Go_quan'])) { echo "is-invalid"; } ?>" 
            id="Go_quan" 
            name="Go_quan" 
            placeholder="เพิ่มจำนวน"
            value = "<?= $formdata['Go_quan'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Go_quan'])) { echo $errors['Go_quan']; } ?>
        </div>

        <?php $sql = "SELECT * FROM place" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $resul = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="form-group">
            <label for="Pl_id">เพิ่มข้อมูลสถานที่</label>
            <select class="form-control <?php if(isset($errors['Pl_id'])) { echo "is-invalid"; } ?>" 
                id="Pl_id"
                name="Pl_id" >
                    <option value="">กรุณาเลือกข้อมูล : สถานที่</option>
                    <?php foreach ($resul as $row) : ?> 
                        <option value="<?= $row['Pl_id']; ?> "><?= $row['Pl_name']?></option>
                    <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?php if(isset($errors['Pl_id'])) { echo $errors['Pl_id']; } ?></div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>