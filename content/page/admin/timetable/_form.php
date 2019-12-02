<form method="post">
    <div class="form-group">
        
        <label for="Ti_term">เพิ่มข้อมูลเทอม</label>
            <input type="text" class="form-control <?php if(isset($errors['Ti_term'])) { echo "is-invalid"; } ?>" 
                id="Ti_term" 
                name="Ti_term" 
                placeholder="เพิ่มข้อมูลเทอม"
                value = "<?= $formdata['Ti_term'] ;?> ">
        <div class="invalid-feedback">
            <?php if(isset($errors['Ti_term'])) { echo $errors['Ti_term']; } ?>
        </div>

        <label for="Ti_year">เพิ่มข้อมูลปีการศึกษา</label>
            <input type="text" class="form-control <?php if(isset($errors['Ti_year'])) { echo "is-invalid"; } ?>" 
                id="Ti_year" 
                name="Ti_year" 
                placeholder="เพิ่มข้อมูลปีการศึกษา"
                value = "<?= $formdata['Ti_year'] ; ?> ">
        <div class="invalid-feedback">
            <?php if(isset($errors['Ti_year'])) { echo $errors['Ti_year']; } ?>
        </div>

        <label for="Ti_day">เพิ่มข้อมูลวัน</label>
            <select class="form-control <?php if(isset($errors['Ti_day'])) { echo "is-invalid"; } ?>" 
                id="Ti_day"
                name="Ti_day" >
                    <option value="">กรุณาเลือกข้อมูล : วัน</option>
                    <option >จันทร์</option>
                    <option >อังคาร</option>
                    <option >พุธ</option>
                    <option >พฤหัสบดี</option>
                    <option >ศุกร์</option>
            </select>
        <div class="invalid-feedback">
            <?php if(isset($errors['Ti_day'])) { echo $errors['Ti_day']; } ?>
        </div>
        
        <label for="Ti_start">เพิ่มข้อมูลเวลาเริ่มต้น</label>
            <input type="time" class="form-control <?php if(isset($errors['Ti_start'])) { echo "is-invalid"; } ?>" 
                id="Ti_start" 
                name="Ti_start" 
                placeholder="เพิ่มข้อมูลเวลาเริ่มต้น"
                value = "<?= $formdata['Ti_start'] ; ?> ">
        <div class="invalid-feedback">
            <?php if(isset($errors['Ti_start'])) { echo $errors['Ti_start']; } ?>
        </div>

        <label for="Ti_end">เพิ่มข้อมูลเวลาสิ้นสุด</label>
            <input type="time" class="form-control <?php if(isset($errors['Ti_end'])) { echo "is-invalid"; } ?>" 
                id="Ti_end" 
                name="Ti_end" 
                placeholder="เพิ่มข้อมูลเวลาเริ่มต้น"
                value = "<?= $formdata['Ti_end'] ; ?> ">
        <div class="invalid-feedback">
            <?php if(isset($errors['Ti_end'])) { echo $errors['Ti_end']; } ?>
        </div>

        <?php $sql = "SELECT * FROM subject" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $resul = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label for="Su_id">เพิ่มข้อมูลวิชา</label>
            <select class="form-control <?php if(isset($errors['Su_id'])) { echo "is-invalid"; } ?>" 
                id="Su_id"
                name="Su_id" >
                    <option value="">กรุณาเลือกข้อมูล : วิชา</option>
                    <?php foreach ($resul as $row) : ?> 
                        <option value="<?= $row['Su_id']; ?> "><?= $row['Su_name']?></option>
                    <?php endforeach; ?>
            </select>
        <div class="invalid-feedback">
            <?php if(isset($errors['Su_id'])) { echo $errors['Su_id']; } ?></div>
        </div>

        <?php $sql = "SELECT * FROM grouplern" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $resulf = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <label for="Gr_id">เพิ่มข้อมูลกลุ่มเรียน</label>
            <select class="form-control <?php if(isset($errors['Gr_id'])) { echo "is-invalid"; } ?>" 
                id="Gr_id"
                name="Gr_id" >
                    <option value="">กรุณาเลือกข้อมูล : กลุ่มเรียน</option>
                    <?php foreach ($resulf as $row) : ?> 
                        <option value="<?= $row['Gr_id']; ?> "><?= $row['Gr_name']?></option>
                    <?php endforeach; ?>
            </select>
        <div class="invalid-feedback">
            <?php if(isset($errors['Gr_id'])) { echo $errors['Gr_id']; } ?></div>
        </div>
        
        <?php $sql = "SELECT * FROM teacher" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $resulo = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label for="Te_id">เพิ่มข้อมูลครูผู้สอน</label>
            <select class="form-control <?php if(isset($errors['Te_id'])) { echo "is-invalid"; } ?>" 
                id="Te_id"
                name="Te_id" >
                    <option value="">กรุณาเลือกข้อมูล : ครูผู้สอน</option>
                    <?php foreach ($resulo as $row) : ?> 
                        <option value="<?= $row['Te_id']; ?> "><?= $row['Te_name']?></option>
                    <?php endforeach; ?> </select>
        <div class="invalid-feedback">
            <?php if(isset($errors['Te_id'])) { echo $errors['Te_id']; } ?></div>
        </div>

        <?php $sql = "SELECT * FROM room" ;
                $sth = $app['db'] -> prepare($sql);
                $sth->execute();
                $resulm = $sth->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label for="Ro_id">เพิ่มข้อมูลห้องเรียน</label>
            <select class="form-control <?php if(isset($errors['Ro_id'])) { echo "is-invalid"; } ?>" 
                id="Ro_id"
                name="Ro_id">
                    <option value="">กรุณาเลือกข้อมูล : ห้องเรียน</option>
                    <?php foreach ($resulm as $row) : ?> 
                        <option value="<?= $row['Ro_id']; ?> "><?= $row['Ro_name']?></option>
                    <?php endforeach; ?> </select></select>
        <div class="invalid-feedback">
            <?php if(isset($errors['Ro_id'])) { echo $errors['Ro_id']; } ?></div>
        </div>


    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
</form>