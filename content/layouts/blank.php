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
     body {
        background-color: #eee;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .form-signup {
        max-width : 450px;
        padding: 15px;
        margin: 0 auto;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
      <!-- ปรับแต่ง css -->
    <link href="asset/css/jumbotron.css" rel="stylesheet">
    <?php layout_head(); ?> 
  </head>
  <body>
    
      <?php layout_flash_messages(); ?>
          <?php echo $app['content']; ?>   <!-- 3...ข้อมูลทั้งหมดที่เก็บไว้ใน memory ถุกนำมาแสดงผลที่นี่   //4...แก้ชื่อเป็นตัวแปรอาเรย์ !-->                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
      
      <!--boostrap core javascript !-->
      <script src="asset/js/jquery-3.3.1.slim.min.js" ></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="asset/js/bootstrap.bundle.min.js"></script></body>
     
      <?php
        layout_end_body();
      ?>
</html>