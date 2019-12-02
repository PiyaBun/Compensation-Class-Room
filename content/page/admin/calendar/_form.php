<form method="post">
    <div class="form-group">
        <label for="Ca_name">เพิ่มชื่อวันหยุด</label>
        <input type="text" class="form-control <?php if(isset($errors['Ca_name'])) { echo "is-invalid"; } ?>" 
            id="Ca_name" 
            name="Ca_name" 
            placeholder="กรุณากรอกวันหยุด"
            value = "<?= $formdata['Ca_name']; //กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Ca_name'])) { echo $errors['Ca_name']; } ?>
        </div>

        <label for="Ca_date">เพิ่มข้อมูลวันที่</label>
        <input type="date" class="form-control <?php if(isset($errors['Ca_date'])) { echo "is-invalid"; } ?>" 
            id="Ca_date" 
            name="Ca_date" 
            placeholder="กรุณากรอกวันที่"
            value = "<?= $formdata['Ca_date']; //กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Ca_date'])) { echo $errors['Ca_date']; } ?>
        </div>

        <div class="form-group">
            <label for="Ca_term">เพิ่มข้อมูลเทอม</label>
            <select class="form-control <?php if(isset($errors['Ca_term'])) { echo "is-invalid"; } ?>" 
                id="Ca_term"
                name="Ca_term" >
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <div class="invalid-feedback"><?php if(isset($errors['Ca_term'])) { echo $errors['Ca_term']; } ?></DIV>
        </div>

        <label for="Ca_year">เพิ่มข้อมูลปีการศึกษา</label>
        <input type="number" class="form-control <?php if(isset($errors['Ca_year'])) { echo "is-invalid"; } ?>" 
            id="Ca_year" 
            name="Ca_year" 
            placeholder="กรุณากรอกปีการศึกษา"
            value = "<?= $formdata['Ca_year']; //กำหนดค่าตั้งต้นจากไฟล์ create ?> ">
        <div class="invalid-feedback">
        <?php if(isset($errors['Ca_year'])) { echo $errors['Ca_year']; } ?>
        </div>


        <label for="Ca_detail">เพิ่มข้อมูลรายละเอียด</label>
        <textarea type="text"class="form-control <?php if(isset($errors['Ca_detail'])) { echo "is-invalid"; } ?>" 
            rows="5" 
            id="Ca_detail" 
            name="Ca_detail" 
            placeholder="กรุณากรอกรายละเอียด"
            ><?= $formdata['Ca_detail'] //กำหนดค่าตั้งต้นจากไฟล์ create กำหนดตรงนี้ถูกแล้ว?></textarea>
        <div class="invalid-feedback">
        <?php if(isset($errors['Ca_detail'])) { echo $errors['Ca_detail']; } ?>

        </div>
    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>