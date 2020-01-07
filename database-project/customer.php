<?php

    include_once('connect.php');

    $sql = "SELECT * FROM customer";

    $result = $conn->query($sql) or die($conn->error);
    $conn = new mysqli('localhost','root','','fastest_work');
    mysqli_set_charset($conn,"utf8");
   
        $id = 0;
        $update = false;
        $firstname = '';
        $lastname = '';
        $mobile = '';
        $orderid = '';
        $email = '';
        $location = '';

    if(isset($_POST['save'])){
        
        $idCus = $_POST['idcus'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mobile = $_POST['mobile'];
        $orderid = $_POST['orderid'];
        $email = $_POST['email'];
        $location = $_POST['location'];
    
        $conn->query("INSERT INTO customer (idCus,firstnameCus,lastnameCus,phone,idOrder,email,location) 
                            VALUES ('$idCus','$firstname','$lastname','$mobile','$orderid','$email','$location')") or 
                            die($mysql->error);

        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg_type'] = "Success";

        header("location: customer.php");
    }

    if (isset($_GET['delete'])){
        $id = $_GET['delete'];
        $conn->query("DELETE FROM customer WHERE idCus=$id") or die($conn->error());

        $_SESSION['message'] = "Record has been delete!";
        $_SESSION['msg_type'] = "Danger";

        header("location: customer.php");
    }

    if (isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result1 = $conn->query("SELECT * FROM customer WHERE idCus=$id")or die($conn->error());

            
            $row = $result1->fetch_array(); 
            $idCus = $row['idCus'];
            $firstname = $row['firstnameCus'];
            $lastname = $row['lastnameCus'];
            $mobile = $row['phone'];
            $orderid = $row['idOrder'];
            $email = $row['email'];
            $location = $row['location'];
        
    }

    if(isset($_POST['update'])){

        $idCus = $_POST['idcus'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mobile = $_POST['mobile'];
        $orderid = $_POST['orderid'];
        $email = $_POST['email'];
        $location = $_POST['location'];

        $conn->query("UPDATE customer SET firstnameCus='$firstname' , lastnameCus='$lastname' , phone='$mobile' , idOrder='$orderid' ,email='$email' , location='$location'  ") or 
                            die($mysql->error);

        $_SESSION['message'] = "Record has been update!";
        $_SESSION['msg_type'] = "warning";
        header("location: customer.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">
   
    <style>
        body{font-family: 'Chakra Petch', sans-serif;}
        a{
            color: white; /* blue colors for links too */
            text-decoration: inherit;
        }
        a:hover{
            color: white;
            
        }
        /* #myDIV{
            display : none;
        }  */
        .class1{
            display : none;
        }
        
    </style>
</head>
<body>
    
        <?php
            if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
        </div>
            <?php endif; ?>

    <header>
        <div class="container-fluid " style="background : #ff5252;">
            <div class="row justify-content-center">
                <div class="col-12 text-center p-2 " style="font-size:2em; color:white;">
                <a href="index.php" style="font-weight:bold;">FASTER WORK</a> 
                </div>
                

            </div>
            
        </div>
    </header> 
    

    <div class="banner ">
       
        <img src="https://images.unsplash.com/photo-1497091071254-cc9b2ba7c48a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2106&h=720" class="img-fluid" alt="Responsive image">
         
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6 justify-content-end p-3">
            <button type="button" class="btn btn-dark"><a href="index.php">
                BACK TO HOMEPAGE </a></button>
            
            </div>
        </div>
    </div>
   
    
    <div class="container text-center" style="font-size:1.5em;">
    <form action="customer.php" method="post">
        
        <div class="row" >
            <h1 class="col-12  p-4 rounded" style="font-weight:bold;">ADD MEMBER  </h1>


            <div class="col-6" >
            <div class="input-group input-group-lg p-4" >
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="inputGroup-sizing-lg" style="background: #ff5252;color:white;" >Firstname</span>
                 </div>
                    <input type="text" name="firstname" placeholder="Enter Your Firstname" value="<?php echo $firstname; ?>" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="border: solid 1px #ff5252;">
            </div>
            </div>

            <div class="col-6" >
            <div class="input-group input-group-lg p-4" >
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="inputGroup-sizing-lg" style="background: #ff5252;color:white;" >Lastname</span>
                 </div>
                    <input type="text" name="lastname" placeholder="Enter Your Lastname" value="<?php echo $lastname ;?>" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="border: solid 1px #ff5252;">
            </div>
            </div>

            <div class="col-6" >
            <div class="input-group input-group-lg p-4" >
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="inputGroup-sizing-lg" style="background: #ff5252;color:white;" >Mobile-Phone</span>
                 </div>
                    <input type="text" name="mobile" placeholder="Enter Your Mobile Phone" value="<?php echo $mobile ;?>" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="border: solid 1px #ff5252;">
            </div>
            </div>

            <div class="col-6" >
            <div class="input-group input-group-lg p-4" >
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="inputGroup-sizing-lg" style="background: #ff5252;color:white;" >OrderID</span>
                 </div>
                    <input type="text" name="orderid" placeholder="Enter Your Mobile Phone" value="<?php echo $orderid ;?>" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="border: solid 1px #ff5252;">
            </div>
            </div>

            <div class="col-6" >
            <div class="input-group input-group-lg p-4" >
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="inputGroup-sizing-lg" style="background: #ff5252;color:white;" >Email</span>
                 </div>
                    <input type="text" name="email" placeholder="Enter Your Email" value="<?php echo $email ;?>" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="border: solid 1px #ff5252;">
            </div>
            </div>

            <div class="col-12" >
            <div class="input-group input-group-lg p-4" >
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="inputGroup-sizing-lg" style="background: #ff5252;color:white;" >Location</span>
                 </div>
                    <input type="text" name="location" placeholder="Enter Your Location" value="<?php echo $location ;?>"class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="border: solid 1px #ff5252;">
            </div>
            </div>
            <div class="col-12">
                <br>
               
                <?php 
                if($update == true):
                ?>
                    <button type="submit" class="btn btn-info btn-block p-2" name="update" style="font-weight:bold;">UPDATE </button>
                <?php else: ?>
                    <button type="submit" class="btn btn-outline-success btn-block p-2" name="save" style="font-weight:bold;">INSERT </button>
                <?php endif ; ?>
                
            </div>
                
       

        </div>
    </div>
    </form>
    
    <br><br>

    <div class="container text-center">
        <div class="row">
            <div class="col-6">
             
            </div>
            <div class="col-6">
             <button type="button"  class="btn btn-info  btn-lg btn-block"  id="btn-hs" value="hide/show">ดูรายชื่อลูกค้า</button>
            </div>
        </div>
    </div>
   
<br><br>

    <div class="container-fluid text-center" style="font-size:1.1em; display : none;" id="myDIV" >
        <div class="row" >
            <h1 class="col-12  p-4 rounded" style="font-weight:bold;">EMPLOYEE LIST</h1>
                
        
    
        
        <br><br>


        <table class="table text-center">
                <thead class="thead" style="background: #ff5252; color: #fff;">
                    <tr>
                        <th>รหัสลูกค้า</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>เบอร์โทร</th>
                        <th>รหัสใบสั่งงาน</th>
                        <th>อีเมล</th>
                        <th>ที่อยู่</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
        
                <tbody>
                    <!-- <tr> 
                        <td>WK00123</td>
                        <td>Logo ร้านขนมหวาน</td>
                        <td>ออกแบบ LOGO</td>
                        <td>8/10/2562</td>  

                    </tr> -->

    

                        <?php
                            while($rowCus = $result->fetch_assoc()):  ?>
                                
                                <tr>
                                    <td><?php echo "C00",$rowCus['idCus']; ?></td>
                                    <td><?php echo $rowCus['firstnameCus'];?></td>
                                    <td><?php echo $rowCus['lastnameCus'];?></td>
                                    <td><?php echo $rowCus['phone'];?></td>
                                    <td><?php echo $rowCus['idOrder'];?></td>
                                    <td><?php echo $rowCus['email'];?></td>
                                    <td><?php echo $rowCus['location'];?></td>
                                    <td> <a href="customer.php?edit=<?php echo $rowCus['idCus']; ?>" class="btn btn-outline-warning">EDIT</a></td>
                                    <td> <a href="customer.php?delete=<?php echo $rowCus['idCus'];?>" class="btn btn-outline-danger">DELETE</a> </td>
                                
                                   
                                </tr>
                             <?php endwhile; ?>
                            
                           <?php $count = $result->num_rows; ?>
                    
                </tbody>
            </table>
        

        <div class="headerExample container text-right">
           <br><br>
            <h3>จำนวนลูกค้าทั้งหมด <?php echo $count ?> รายการ</h3>
        </div>
        <br>
            
           
            

        </div>
    </div>

    <br><br>

    <footer>

    <div class="container-fluid text-center" style="background: #ff5252;color: #fff; ">
    <div class="row">
        
        <div class="col-12 p-3"><h4>FASTEST WORK</h4> <br> COPYRIGHT BY FASTEST WORK 2019 </div>
        
    </div>
    </div>
    </footer>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
    

<script>

// $(document).ready(function(){
//   $(".btn-hs").click(function(){
      
//     $("#myDIV").toggle();
//   });
// });

jQuery(document).ready(function(){
    jQuery('#btn-hs').on('click', function(event) {        
        jQuery('#myDIV').toggle('show');
    });
});

</script>