<?php 
$year = "";
$semen = "";
user_verify();
$app['pagetitle'] = "ทำการสอนชดเชย";
$app['layout'] = __DIR__.'/../layouts/blank.php';
$app['cssscript'][] = "
  body {
    background-color: #eee;
  }
  .form-compen {
    max-width : 500px;
    padding: 15px;
    margin: 0 auto;
  }
";
//--กำหนดเงื่อนไขบอกให้แสดงเฉพาะอาจารคนนั้น(Where User)--//
              if($_SESSION['auth']['user']['Te_id'] == '1'){
                $whereUSER = 1;
              }else if($_SESSION['auth']['user']['Te_id'] == '2'){
                $whereUSER = 2;
              }else if($_SESSION['auth']['user']['Te_id'] == '3'){
                $whereUSER = 3;
              }else if($_SESSION['auth']['user']['Te_id'] == '4'){
                $whereUSER = 4;
              }else if($_SESSION['auth']['user']['Te_id'] == '5'){
                $whereUSER = 5;
              }else if($_SESSION['auth']['user']['Te_id'] == '6'){
                $whereUSER = 6;
              }else if($_SESSION['auth']['user']['Te_id'] == '7'){
                $whereUSER = 7;
              }else if($_SESSION['auth']['user']['Te_id'] == '8'){
                $whereUSER = 8;
              }else if($_SESSION['auth']['user']['Te_id'] == '9'){
                $whereUSER = 9;
              }else if($_SESSION['auth']['user']['Te_id'] == '10'){
                $whereUSER = 10;
              }
//--------------------------------------------------//

//กำหนดให้ เพิ่มข้อมูลทำการสอนชดเชย //
/*if($_POST)
{
  $stmt = $app['db'] -> prepare("INSERT INTO de_compen (De_date,Ro_id,Pe_id) 
                                 VALUES (:De_date,:Ro_id,:Pe_id)");
  $stm = $app['db'] -> prepare("INSERT INTO compen (Cp_num,Ca_id,Go_id,Te_id) 
                                 VALUES (:Cp_num,:Ca_id,:Go_id,:Te_id)");
  $stmt->execute([
      'De_date' => $_POST['De_date'],
      'Ro_id' => $_POST['Ro_id'],
      'Pe_id' => $_POST['Pe_id'],
                ]);
  $stm->execute([
      'Cp_num' => $_POST['Cp_num'],
      'Ca_id' => $_POST['Ca_id'],
      'Go_id' => $_POST['Go_id'],
      'Te_id' => $_POST['Te_id'],
                ]);
}
*/
//------------------------------//

?>
<!-- nav bar -->
<?php include(__DIR__.'/_navbar.php'); ?>
<!-- _______ -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" >ค้นหาข้อมูล</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" >
    <span class="navbar-toggler-icon"></span>
  </button>
<form class="form-inline my-2 my-lg-2" method="get" action="?page=compensation">
<input type="hidden" name="page" value="compensation">

  <input type ="text" class="form-control" name="year" id="year" placeholder="ปีการศึกษา" required>
  <input type="text" class="form-control" id="semen" name="semen" placeholder="ภาคการศึกษา" required>

  <div class="input-group mb-2 mb-sm-0">
      <button class="btn btn-outline-success my-2 my-sm-0 input-group-addon" type="submit">ค้นหา</button>
  </div>
</form>
</nav>

<!-- form selected -->

<?php include(__DIR__.'/_form.php'); ?>
</div>