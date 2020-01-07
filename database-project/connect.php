<?php

    error_reporting(E_ALL);

    $conn = new mysqli('localhost','root','','fastest_work');
    $conn->set_charset('utf8');
    //echo $conn->connect_error; // แสดงเป็นโค้ด
    //echo $conn->connect_errno; // แสดงเป็นข้อความ
    if($conn->connect_errno){
        echo "Connect:".$conn->connect_errno;
        exit();
    }
        
    //include_once('connect.php');
    

    

?>