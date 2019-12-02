<?php
    function admin_verify() {
        global $app; //กำหนดให้เป็น global ไว้สำหรับใช้ได้ทั้งหมด
        if(!isset($_SESSION['auth']) || !$_SESSION['auth']['isAuthenticated']) {
            header ('location: ?page=adminlogin');
            exit();
        }
    }

    function user_verify() {
        global $app;
        if(!isset($_SESSION['auth']) || !$_SESSION['auth']['isAuthenticated']) {
            header ('location: ?page=login');
            exit();
        }else {
            if(!$_SESSION['auth']['user']['is_admin']){
                header('HTTP/1.0 403 Forbidden');
                echo '403 not allow'; 
                $app['content'] =" <h2> คุณไม่ได้รับการอนุญาตในการใช้งานหน้านี้ </h2>";
                include(__DIR__.'/../layouts/blank.php');
                exit();
            }
        }
    }

    function admin_init() {
        global $app;
        admin_verify();
        $app['layout'] = __DIR__.'/../layouts/dashboard.php';
    }

    function off_init() {
        global $app;
        admin_verify();
        $app['layout'] = __DIR__.'/../layouts/dashboardAdd.php';
    }

    function layout_head() { //ตัวในแท็ก head เอาไปประกาศจะได้เหลือนิดเดียว
        global $app;

        // ปรับแต่ง css file 
        foreach ($app['cssfiles'] as $key => $cssfile) { 
            echo "<link href=\"$cssfile\" rel=\"stylesheet\"> \n"  ;
          }
        // ปรับแต่ง css script
        if(count($app['cssscript']) > 0 ){
            echo "<style>";
            foreach ($app['cssscript'] as $key => $cssscript) { //4...เผื่อว่ามีการแทรก css เข้ามาหลายตัว เลยตั้งอาเรให้ว่างไว้
              echo $cssscript. "\n"  ;
            } echo "</style>";
          }
    }

    function layout_flash_messages() { //ตัวคำสั่งตามชื่อ
        global $app;

        foreach ($app['flashMessages'] as $key => $flashMessage) {
            echo "<div class=\"alert alert-{$flashMessage['type']}\" role=\"alert\">{$flashMessage['text']}</div>";
        }
    }

    function layout_end_body() {
        global $app;

            //เผื่อแทรก js เพิ่มเติม
        foreach ($app['jsfiles'] as $key => $jsfile) { //4...เผื่อว่ามีการแทรก css เข้ามาหลายตัว เลยตั้งอาเรให้ว่างไว้
            echo "<script src=\"$jsfile\"></script> \n"  ;
        }
            //เผื่อแทรก js script เพิื่มเติม
        if(count($app['jsscript']) > 0 ){
            echo "<script type=\"text/javascript\">\n";
            echo "$(document).ready(function() {";
            foreach ($app['jsscript'] as $key => $jsscript) { //4...เผื่อว่ามีการแทรก css เข้ามาหลายตัว เลยตั้งอาเรให้ว่างไว้
            echo $jsscript. "\n"  ;
            }
            echo "}); \n";
            echo "</script> \n";
        }
    }

    function Hide_and_Show() {
        global $app;
        $x = document.getElementById("myDIV");
        if ($x.style.display === "none") {
          $x.style.display == "block";
        } else {
          $x.style.display == "none";
        }
      }
?>