<form method="post">
    <div class="form-group">

        <input type="hidden" class="form-control " 
                id="De_status" 
                name="De_status" 
                placeholder="เพิ่มข้อ Comment"
                value = "no">
        
        <input type="hidden" class="form-control " 
                id="Cp_id" 
                name="Cp_id" 
                placeholder="เพิ่มข้อ id"
                value = "<?= $_GET['Cp_id']; ?>">

        <input type="hidden" class="form-control " 
                id="Cp_date_start" 
                name="Cp_date_start" 
                placeholder="เพิ่มข้อ Comment"
                value = "<?= $formdata['Cp_date_start'] ;?>">

        <label for="De_comment">เพิ่มข้อ Comment</label>
            <input type="text" class="form-control" 
                id="De_comment" 
                name="De_comment" 
                placeholder="เพิ่มข้อ Comment"
                value = "<?= $formdata['De_comment'] ;?> ">

    </div>
    <button type="submit" class="btn btn-primary">บันทึก</button>
</form>