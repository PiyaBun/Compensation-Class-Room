<form method="post">
    <div class="form-group">
        <label for="Su_name">เพิ่มชื่อวิชา</label>
        <input type="text" class="form-control <?php if(isset($errors['Su_name'])) { echo "is-invalid"; } ?>" 
            id="Su_name" 
            name="Su_name" 
            placeholder="เพิ่มชื่อกลุ่มเรียน"
            value = "<?= $formdata['Su_name'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Su_name'])) { echo $errors['Su_name']; } ?>
        </div>

        <label for="Su_git">เพิ่มชื่อหน่วยกิต</label>
        <input type="text" class="form-control <?php if(isset($errors['Su_git'])) { echo "is-invalid"; } ?>" 
            id="Su_git" 
            name="Su_git" 
            placeholder="เพิ่มชื่อหน่วยกิต"
            value = "<?= $formdata['Su_git'] ;//กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Su_git'])) { echo $errors['Su_git']; } ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>