<?php

return [ // แก้ให้เป็นรีเทินค่ากลับมาแทน
 'pagename' => 'index',
 'pagetitle' => 'สวัสดี',
 'cssfiles' => [] ,//4...เผื่อว่ามีการแทรก css เข้ามาหลายตัว เลยตั้งอาเรให้ว่างไว้
 'cssscript' => [],
 'jsscript' => [],
 'jsfiles' => [],    
 'db' => include(__DIR__.'/db.php'),
 'flashMessages' =>[],
 'layout' => __DIR__.'/../layouts/main.php',
 ];
 
?>
