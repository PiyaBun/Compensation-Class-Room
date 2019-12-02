<form method="post">
    <div class="form-group">
        <label for="Ro_name">เพิ่มชื่อห้องเรียน</label>
        <input type="text" class="form-control <?php if(isset($errors['Ro_name'])) { echo "is-invalid"; } ?>" 
            id="Ro_name" 
            name="Ro_name" 
            placeholder="เพิ่มชื่อห้องเรียน"
            value = "<?= $formdata['Ro_name']; //กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Ro_name'])) { echo $errors['Ro_name']; } ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>