<form method="post">
    <div class="form-group">
        <label for="Br_name">เพิ่มชื่อสาขา</label>
        <input type="text" class="form-control <?php if(isset($errors['Br_name'])) { echo "is-invalid"; } ?>" 
            id="Br_name" 
            name="Br_name" 
            placeholder="เพิ่มชื่อคณะ"
            value = "<?= $formdata['Br_name']; //กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Br_name'])) { echo $errors['Br_name']; } ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>