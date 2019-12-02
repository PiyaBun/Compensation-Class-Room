<form method="POST" class="form-group">
<div class="container">
<div class="row">
        <div class="card-body col-md-auto">
            <h4 class="card-title">เพิ่มข้อมูลการสอนชดเชย</h5>
            <h6 class="card-subtitle mb-2 text-muted"><b>ข้อมูลเบื้องต้น</b></h6>
            <!--ซ่อนค่าไว้เพิ่มในตาราง!--><input type="hidden" class="form-control" id="Te_id" name="Te_id" value="<?= $result['Te_name'] = 6 ;?>" >
            <!--ซ่อนค่าไว้เพิ่มในตาราง!--><input type="hidden" class="form-control" id="Ti_id" name="Ti_id" value="<?= $result['Te_name'] = $_GET['id'];?>" >
            <h6 class="card-subtitle mb-2 text-muted">วิชาที่เลือก</h6>
            <div class="form-group">
                <div class="form-group">
                    <label>สาเหตุที่สอนชดเชย</label>
                    <select class="form-control" id="Cp_why" name="Cp_why" >
                        <option value="">กรุณาเลือกข้อมูล : สาเหตุ</option>
                            <option value="ไปราชการ">ไปราชการ</option>
                            <option value="วันหยุดราชการ">วันหยุดราชการ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>เลขที่ไปราชการ / ชื่อวันหยุดราชการ</label>
                    <input type="text" class="form-control" id="Cp_detail" name="Cp_detail">
                </div>
                <div class="form-group">
                    <label>สถานที่ไปราชการ</label>
                    <input type="text" class="form-control" id="Cp_place" name="Cp_place" >
                </div>
                <hr>
            </div>
            <h6 class="card-subtitle mb-2 text-muted">วันเดือนปีที่ทำการสอนชดเชย</h6>
            <div class="form-group col-md-auto">
                <div class="form-group">
                    <label >วันเดือนปี : ไม่ได้สอนชดเชย</label>
                    <input type="date" class="form-control" id="Cp_date_no" name="Cp_date_no">
                </div>
                <div class="form-group">
                    <label >วันเดือนปี : สอนชดเชย</label>
                    <input type="date" class="form-control" id="Cp_date_start" name="Cp_date_start">
                </div>
            <h6 class="card-subtitle mb-2 text-muted">ข้อมูลการสอนชดเชย</h6>
                <div class="form-group">
                <?php 
                    $sql = "SELECT * FROM room" ;
                    $sth = $app['db'] -> prepare($sql);
                    $sth->execute();
                    $resul = $sth->fetchAll(PDO::FETCH_ASSOC);
                ?>  
                    <label>ห้องเรียน</label>
                    <select class="form-control" id="Ro_id" name="Ro_id" >
                        <option value="">ข้อมูลห้องเรียน : </option>
                        <?php foreach ($resul as $row) : ?>
                            <option value="<?= $row['Ro_id'] ?>"><?= $row['Ro_name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?php /*
                            for ($i=0;$i<=$actiondata['Ti_hour']-1;$i++){
                        */ 
                        ?>
                            <label>เวลาเริ่มต้น</label>
                            <input type="time" class="form-control" id="De_start" name="De_start">
                        <?php
                        /* $i+1  ใส่หลังคำว่า เวลาเริ่มต้น */
                            // }
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php /*
                            for ($i=0;$i<=$actiondata['Ti_hour']-1;$i++){
                        */ 
                        ?> 
                            <label>เวลาสิ้นสุด</label>
                            <input type="time" class="form-control" id="De_end" name="De_end">
                        <?php
                            // }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body col-md-auto">
                                    <?php 
                                    $sql = "SELECT * FROM compen,de_compen 
                                                LEFT JOIN room ON room.Ro_id = De_compen.Ro_id 
                                            WHERE compen.Cp_id = de_compen.De_id " ; 
                                    $sth = $app['db'] -> prepare($sql);
                                    $sth->execute();
                                    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                <div class="form-group">
                            <h3>รายการสอนชดเชยที่มี </h3>
                                <table class="table table-borderd" >
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">วันที่สอนชดเชย</th>
                                            <th scope="col">เวลาเริ่มต้น</th>
                                            <th scope="col">เวลาสิ้นสุด</th>
                                            <th scope="col">ห้องเรียน</th>
                                            <th scope="col">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        foreach ($result as $row) : 
                                        ?>
                                        <tr>
                                            <td>  <?= $row['Cp_date_start'];?></td>
                                            <td>  <?= $row['De_start'];?></td>
                                            <td>  <?= $row['De_end'];?></td>
                                            <td>  <?= $row['Ro_name'];?></td>
                                            <td class="text-success"><b>  <?= $row['Cp_status'];?> </b></td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                    </div>
                    </div>
            </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>    
        </div>
</div>
</div>
</form>
