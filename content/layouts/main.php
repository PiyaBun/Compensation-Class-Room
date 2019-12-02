<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?php echo $app['pagetitle']; ?></title> 
    <?php //4...แก้ชื่อตัวแปรเป็นอาเรย์ , แก้ไขเพิ่มเงื่อนไขเข้ามาถ้าหากว่าหน้านั้นไม่ได้กำหนดตัวแปร pagetitle ไว้ ?>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/jumbotron/">
    <script src="https://kit.fontawesome.com/28cb1cc1c4.js"></script>

    <!-- Bootstrap core CSS -->
<link href="asset/boostrap/css/bootstrap.min.css" rel="stylesheet" >


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
     <?php layout_head(); ?> 
  </head>
  <body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="https://www.rmutsb.ac.th/homepage/13Oct/"><img src="logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">หน้าแรก </span></a>
      </li>
    </ul>

    <ul class="navbar-nav my-2 my-lg-0">
    <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['isAuthenticated'] ) { ?>
      <li class="nav-item ">
        <span class="navbar-text "><?php echo 'ยินดีต้อนรับคุณ '.$_SESSION['auth']['user']['Te_name'] .' '.$_SESSION['auth']['user']['Te_last'] ?> </span>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="?page=logout">ออกจากระบบ</a>
      </li>

    <?php } else { ?>

      <li class="nav-item ">
        <a class="nav-link" href="?page=login">เข้าสู่ระบบ</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="?page=signup">สมัครสมาชิค</a>
      </li> 

    <?php } ?>

    </ul>
  
    </div>
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron  jumbotron-fluid" style="background-image: url(wall.png)">
    <div class="container">
      <h2 class="display-3 text-white">ยินดีต้อนรับ <?php echo @$_SESSION['auth']['user']['Te_name'] ;?></h2>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <div class="list-group">
         <a href="index.php" class="list-group-item list-group-item-action " >หน้าแรก </a>
          <a href="?page=compensation" class="list-group-item list-group-item-action">สำหรับอาจารย์ : ทำสอนชดเชย</a>
          <a href="?page=indexAdd" class="list-group-item list-group-item-action">สำหรับเจ้าหน้าที่ : จัดการตารางสอน</a>
          <a href="?page=adminlogin" class="list-group-item list-group-item-action disabled" >สำหรับเจ้าหน้าที่ : จัดการข้อมูล</a>
        </div>
      </div>
      <div class="col-md-8"> <!-- เนื้อหา !-->           
          <?php layout_flash_messages(); ?>
          <?php
           // if(isset($_SESSION['auth'])){
           //   print_r($_SESSION['auth']);
           // }
          ?>
          <?php echo $app['content']; ?>   <!-- 3...ข้อมูลทั้งหมดที่เก็บไว้ใน memory ถุกนำมาแสดงผลที่นี่   //4...แก้ชื่อเป็นตัวแปรอาเรย์ !-->                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
      </div>
    </div>


  </div> <!-- /container -->

</main>

<footer class="container fixed-bottom">
  <p>&copy; จัดทำขึ้นเพื่อการศึกษา <b>มหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ ศูนย์นนทบุรี</b></p>
</footer>

<script src="asset/js/jquery-3.3.1.slim.min.js" ></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="asset/js/bootstrap.bundle.min.js"></script></body>
     
      <?php
        layout_end_body();
      ?>
</html>
