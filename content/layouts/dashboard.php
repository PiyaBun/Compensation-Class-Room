
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title><?php echo $app['pagetitle']; ?></title> 

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
    <link href="asset/boostrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/28cb1cc1c4.js"></script>

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
    <!-- Custom styles for this template -->
    <link href="asset/css/dashboard.css" rel="stylesheet">
    <?php layout_head(); ?> 
  </head>
  <body>
      <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
        <li class="nav-item">
          <span class="navbar-text"><?php echo 'ยินดีต้อนรับ '.$_SESSION['auth']['user']['Of_name'] ; ?> 
        </li>
          <li class="nav-item ">
            <a class="nav-link" href="?page=logout">ออกจากระบบ</a>
          </li>
        </ul>
      </nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="?page=admin/index">
              <span data-feather="home"></span>
              จัดการข้อมูลหลัก <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=admin/timetable/index">
              จัดการข้อมูลตารางสอน
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=admin/compen/index">
              <span data-feather="layers"></span>
              จัดการข้อมูลสอนชดเชย
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>จัดการข้อมูลทั่วไป</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
        </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="?page=admin/teacher/index">
                <span data-feather="layers"></span>
                จัดการข้อมูลผู้ใช้
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=admin/branch/index">
                จัดการข้อมูลสาขา
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=admin/faculty/index">
                <span data-feather="bar-chart-2"></span>
                จัดการข้อมูลคณะ
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=admin/room/index">
                จัดการข้อมูลห้องเรียน
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=admin/grouplern/index">
                <span data-feather="layers"></span>
                จัดการข้อมูลกลุ่มเรียน
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=admin/level/index">
                <span data-feather="layers"></span>
                จัดการข้อมูลระดับชั้น
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=admin/subject/index">
                <span data-feather="layers"></span>
                จัดการข้อมูลวิชา
              </a>
            </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2"></h1> <!-- อันนี้จดใจเว้นว่างไว้นะ ค่อยแก้แต่ละฟน้าเอา-->
            <?php layout_flash_messages(); ?>
            <?php echo $app['content']; ?> 
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      
    </main>
  </div>
</div>
<script src="asset/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="asset/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="asset/js/feather-icons/4.9.0/feather.min.js"></script>
        <script src="asset/js/Chart.min.js"></script>
        <script src="asset/js/dashboard.js"></script></body>
      <?php
        layout_end_body();
      ?>
</html>
