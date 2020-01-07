<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css" >
    <title>Instragram</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light" style="margin-bottom:20px;">
        <div class="container">
        
        <div class="pull-left">
            <i class="ct-icon fab fa-instagram"></i>
        </div>
        
        <div class="pull-right">
            <i class="ct-icon  far fa-compass"></i>
            <i class="ct-icon  far fa-heart"></i>
            <i class="ct-icon  far fa-user"></i>
        </div>
        
        </div>

        
    </nav>

    <div class="container"> 
        <div class="row flex-column-reverse flex-md-row">
            <div class="col-sm-8">
          <?php  require'db_connect.php';
          function time_elapsed_string($datetime, $full = false) {
            date_default_timezone_set("Asia/Bangkok");
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
        
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
        
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }

           $sql = "SELECT * FROM post ORDER BY created_at DESC" ;
           $result = $conn->query($sql);
           if($result->num_rows>0){
               while($row = $result->fetch_assoc()){
             ?>
                <div class="card post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                          <img class="profile" style="height:40px;width:40px;" src="img/profile.jpg">
                        </div>
                        <div class="col">
                        <p>KENGPRASERT.</p>
                        </div>
                    </div>
                    <!-- end row -->
                    
                    <img src="uploads/<?php echo $row['img'];?>" class="img-timeline" style="margin-top:10px;">
                    <div class="post-icon" style="margin-top:10px;">
                        <i class="ct-icon far fa-heart"></i>
                        <i class="ct-icon far fa-comment"></i>
                        <i class="ct-icon far fa-bookmark float-right"></i>
                    </div>
                    <p class="caption"><?php echo $row['caption'];?></p>
                    <p class="post-time"><?php echo time_elapsed_string($row['created_at']);?></p>
                </div>
            </div>
              <?php
            }
           }
          ?>
            


            

            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-3">
                        <img class="profile" src="img/profile.jpg">
                    </div>
                    <div class="col-9">
                        <h4>KENGPRASERT.</h4>
                        <p class="std-id">13600581</p>
                    </div>
                   
                </div> 
                <a href="upload.php"><button type="button" class="btn btn-info btn-sm w-100" style="margin-top:10px;font-size:12pt;">UPLOAD IMAGE
                <i class="fas fa-chevron-circle-up"></i></button></a>         
            </div>
        </div>
    </div>
</body>
</html>