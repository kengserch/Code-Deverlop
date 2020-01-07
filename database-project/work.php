<?php

    include_once('connect.php');

    $sql = "SELECT * FROM work";
    $result = $conn->query($sql) or die($conn->error);
    $conn = new mysqli('localhost','root','','fastest_work');
    mysqli_set_charset($conn,"utf8");
    
    if (isset($_GET['delete'])){
        $id = $_GET['delete'];
        $conn->query("DELETE FROM work WHERE idWork=$id") or die($conn->error());

        $_SESSION['message'] = "Record has been delete!";
        $_SESSION['msg_type'] = "Danger";

        header("location: work.php");
    }

    if(isset($_POST['save'])){
        $idWork = $_POST['idWork'];
        $workname = $_POST['workname'];
        $typework = $_POST['typework'];
        $startwork = $_POST['startwork'];
        $endwork = $_POST['endwork'];
        
    
        $conn->query("INSERT INTO work (idWork,workName,workType,workStart,workEnd) 
                            VALUES ('$idWork','$workname','$typework','$startwork','$endwork')") or 
                            die($mysql->error);

        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg_type'] = "Success";

        header("location: work.php");
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
        
    </style>
</head>
<body>


    
    <header>
        <div class="container-fluid  " style="background : #ff5252;">
            <div class="row justify-content-center">
                <div class="col-12 text-center p-2 " style="font-size:2em; color:white;">
                <a href="index.php">FASTER WORK</a> 
                </div>
                

            </div>
            
        </div>
    </header> 
    

    <div class="banner ">
       
        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2550&h=720" class="img-fluid" alt="Responsive image">
         
    </div>

    <br>
    <div class="container">
        <div class="row">
            <div class="col-6 justify-content-end p-3">
            <button type="button" class="btn btn-dark" style="font-weight:bold;"><a href="index.php">
                BACK TO HOMEPAGE </a></button>
            
            </div>
        </div>
    </div>
    <br>

    <div class="container text-center" style="font-size:1.5em;">
    <form action="work.php" method="post">
        
        <div class="row" >
            <h1 class="col-12  p-4 rounded" style="font-weight:bold;">ADD WORK  </h1>


            <div class="col-6" >
            <div class="input-group input-group-lg p-4" >
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="inputGroup-sizing-lg" style="background: #ff5252;color:white;" >ชื่องาน</span>
                 </div>
                    <input type="text" name="workname" placeholder="Enter Your Workname"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="border: solid 1px #ff5252;">
            </div>
            </div>
            <div class="col-6" >
            <div class="input-group input-group-lg p-4" >
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="inputGroup-sizing-lg" style="background: #ff5252;color:white;" >ประเภทงาน</span>
                 </div>
                    <input type="text" name="typework" placeholder="Enter Your Type Work"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="border: solid 1px #ff5252;">
            </div>
            </div>
            <div class="col-6" >
            <div class="input-group input-group-lg p-4" >
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="inputGroup-sizing-lg" style="background: #ff5252;color:white;" >เริ่มงาน</span>
                 </div>
                    <input type="text" name="startwork" placeholder="Enter Your StartWork Ex. YYYY-MM-DD"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="border: solid 1px #ff5252;">
            </div>
            </div>

            <div class="col-6" >
            <div class="input-group input-group-lg p-4" >
                <div class="input-group-prepend" >
                    <span class="input-group-text" id="inputGroup-sizing-lg" style="background: #ff5252;color:white;" >เสร็จงาน</span>
                 </div>
                    <input type="text" name="endwork" placeholder="Enter Your EndWork Ex. YYYY-MM-DD" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="border: solid 1px #ff5252;">
            </div>
            </div>
            <div class="col-12">
                
                    
                    <button type="submit" class="btn btn-outline-success btn-block p-2" name="save" style="font-weight:bold;">INSERT </button>
    
                
            </div>
                
      <br><br>

      <div class="container text-center">
        <div class="row">
            <div class="col-6">
             
            </div>
            <div class="col-6">
             <button type="button"  class="btn btn-info  btn-lg btn-block"  id="btn-hs" value="hide/show">ดูรายชื่องาน</button>
            </div>
        </div>
    </div>

   <br><br>

        </div>
    </div>
    </form>

    <?php
        if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
        </div>
            <?php endif; ?>
    

    <div class="container text-center" style="font-size:1.5em; display : none;" id="myDIV">
        <div class="row" >
            
        
        <br><br><br>

        <table class="table text-center">
                <thead class="thead" style="background: #ff5252; color: #fff;">
                    <tr>
                        <th>รหัสงาน</th>
                        <th>ชื่องาน</th>
                        <th>ประเภทงาน</th>
                        <th>เริ่มงาน</th>
                        <th>เสร็จงาน</th>
                        <th>ลบรายการ</th>
                    </tr>
                </thead>
        
                <tbody>

                    <!-- <tr>
                        <td>WK00123</td>
                        <td>Logo ร้านขนมหวาน</td>
                        <td>ออกแบบ LOGO</td>
                        <td>8/10/2562</td>
                        <td>10/10/2562</td>
                        <td><button type="button" class="btn btn-danger">ลบ</button></td>
                    </tr> -->

                    

                        <?php
                            while($rowWork = $result->fetch_assoc()):  ?>
                                
                                <tr>
                                    <td><?php echo "WK00",$rowWork['idWork']; ?></td>
                                    <td><?php echo $rowWork['workName'];?></td>
                                    <td><?php echo $rowWork['workType'];?></td>
                                    <td><?php echo $rowWork['workStart'];?></td>
                                    <td><?php echo $rowWork['workEnd'];?></td>
                                    <td> <a href="work.php?delete=<?php echo $rowWork['idWork'];?>" class="btn btn-outline-danger">DELETE</a>
                                
                                    </td>
                                </tr>
                             <?php endwhile; ?>
                            
                           <?php $count = $result->num_rows; ?>
                                  
                </tbody>
            </table>
        

        <div class="headerExample container text-right">
            <h3>จำนวนงานทั้งหมด <?php echo $count ?> รายการ</h3>
        </div>
        <br><br>
            
           
            

        </div>
    </div>

    <br><br><br><br>

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