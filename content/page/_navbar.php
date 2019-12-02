<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">RUS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">หน้าแรก </span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="?page=approve">อนุมัติการสอนชดเชย</a>
      </li>
    </ul>
  </div>

    <ul class="navbar-nav my-2 my-lg-0">
    <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['isAuthenticated'] ) { ?>
      <li class="nav-item ">
        <span class="navbar-text"><?php echo 'ยินดีต้อนรับคุณ '.$_SESSION['auth']['user']['Te_name'] ?> </span>
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
</nav>