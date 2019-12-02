<form method="post">
    <div class="form-group">
        <label for="Fa_name">เพิ่มชื่อคณะ</label>
        <input type="text" class="form-control <?php if(isset($errors['Fa_name'])) { echo "is-invalid"; } ?>" 
            id="Fa_name" 
            name="Fa_name" 
            placeholder="เพิ่มชื่อคณะ"
            value = "<?= $formdata['Fa_name']; //กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Fa_name'])) { echo $errors['Fa_name']; } ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>