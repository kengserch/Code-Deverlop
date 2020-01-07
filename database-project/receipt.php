<?php

    include_once('connect.php');
    
    $sql = "SELECT * FROM receipt";
    $result = $conn->query($sql) or die($conn->error);
    $conn = new mysqli('localhost','root','','fastest_work');
    mysqli_set_charset($conn,"utf8");
    

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
        
    </style>
</head>
<body>
    
    <header>
        <div class="container-fluid" style="background : #ff5252;">
            <div class="row justify-content-center">
                <div class="col-12 text-center p-2 " style="font-size:2em; color:white;">
                <a href="index.php">FASTER WORK</a> 
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
            <button type="button" class="btn btn-dark" style="font-weight:bold;"><a href="index.php">
                BACK TO HOMEPAGE </a></button>
            
            </div>
        </div>
    </div>
    

    <div class="container text-center" style="font-size:1.5em;">
        <div class="row" >
            <h1 class="col-12  p-4 rounded" style="font-weight:bold;">RECEIPT AND STATUS</h1>
                
           
        
        <br><br><br>

        <table class="table text-center">
                <thead class="thead" style="background: #ff5252; color: #fff;">
                    <tr>
                        <th>รหัสใบเสร็จ</th>
                        <th>รหัสใบสั่งงาน</th>
                        <th>รหัสลูกค้า</th>
                        <th>รหัสพนักงาน</th>
                        <th>สถานะ</th>
                        
                    </tr>
                </thead>
        
                <tbody>
                    <!-- <tr>
                        <td>R001</td>
                        <td>OD001</td>
                        <td>C001</td>
                        <td>E001</td>
                        <td>เสร็จสิ้น</td>
                        <td><button type="button" class="btn btn-warning>EDIT</button></td>
                    </tr> -->



                        <?php
                            while($rowReceipt = $result->fetch_assoc()):  ?>
                                
                                <tr>
                                    <td><?php echo $rowReceipt['idReceipt']; ?></td>
                                    <td><?php echo $rowReceipt['idOrder'];?></td>
                                    <td><?php echo $rowReceipt['idCus'];?></td>
                                    <td><?php echo $rowReceipt['idEmp'];?></td>
                                    <td><?php echo $rowReceipt['status'];?></td>
                                    
                                </tr>
                             <?php endwhile; ?>
                            
                           <?php $count = $result->num_rows; ?>
                    

                    
                </tbody>
            </table>

            

               
        

        <div class="headerExample container text-right">
            <h3>จำนวนใบเสร็จทั้งหมด <?php echo $count ?> รายการ</h3>
        </div>
        <br><br>
            
           
            

        </div>
    </div>

    <br><br><br><br>

    footer>

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
    function myFunction() {
  var x = document.getElementById("showEdit");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>