<form method="post">
    <div class="form-group">
        <label for="Le_name">เพิ่มชื่อระดับชั้น</label>
        <input type="text" class="form-control <?php if(isset($errors['Le_name'])) { echo "is-invalid"; } ?>" 
            id="Le_name" 
            name="Le_name" 
            placeholder="เพิ่มชื่อระดับชั้น"
            value = "<?= $formdata['Le_name']; //กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Le_name'])) { echo $errors['Le_name']; } ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>