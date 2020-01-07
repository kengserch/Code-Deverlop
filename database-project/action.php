<?php

    $conn = new mysqli('localhost','root','','fastest_work');
    if(isset($_POST['save'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $location = $_POST['location'];
    
        $conn->query("INSERT INTO customer (firstnameCus,lastnameCus,phone,email,location) 
                            VALUES ('$firstname','$firstname','$firstname','$firstname','$firstname')") or 
                            die($mysql->error);
        }
    
?>