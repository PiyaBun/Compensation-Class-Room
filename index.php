<?php
    session_start();
    $config = include(__DIR__.'/content/libs/config.php'); //4....ใส่ค่าเริ่มต้นของตัวแปรอาเรย์ต่างๆ เช่น $app['$pagename'] = (isset($_GET['page'])) ? $_GET['page'] : 'index'; <<< เป็น index 
    $app = include(__DIR__.'/content/libs/app.php'); //5... ให้เป็นตัวแปร app 
    include(__DIR__.'/content/libs/functions.php'); //12..กำหนดให้includeฟังชั่นมา (ตอนนี้คือตรวจสอบว่าเป็นแอดมินจริงไหม)
    $app['pagename'] = (isset($_GET['page'])) ? $_GET['page'] : 'index'; //ถ้าเข้ามาแล้วจะ include ไฟล์ index อัตโนมัติ ถ้าแต่ส่งค่าไหนก็ไปค่านั้นได้เหมือนกัน isset มีแล้วในเล่ม ข้างหน้า true : false ปล.index ในโฟลเดอ content นะ //4..สร้างตัวแปรอาเรชื่อ app เก็บค่าจาก page -> pagename
    $app['pagefile'] = __DIR__.'/content/page/'.$app['pagename'].'.php'; 
    ob_start();  //3..ให้มันเริ่มทำการเก็บขอมูลต่างๆเข้าไว้ในmemoryก่อน หลังจากเก็บเสร็จ 
    if(is_file($app['pagefile']))   //เช็คว่าข้อมูลที่ส่งมามันปิดหรือถูก //4..แก้ชื่อ file -> pagefile
    {
        include($app['pagefile']);
    }else{
        echo "<h1>Page Not Found</h1>";
        header ("HTTP/1.0 404 Not Found");
          }  
    $app['content'] = ob_get_contents(); //3...ให้เอาผลลัพจาก memory เก็บไว้ใน $content //4..สร้างตัวแปรอาเรชื่อ app เก็บค่าจาก content 
    ob_end_clean(); //3...จากนั้นก็ให้เคลียค่าใน memory ซะ
?>  

<?php
  include($app['layout']); 
?>

<?php
 $app['db'] = null;
 ?>