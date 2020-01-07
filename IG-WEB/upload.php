<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css" >
    <title>UPLOAD</title>
</head>
<body>
    <div class="container">
    <h1>UPLOAD</h1>
        <form action="post.php" method="post" enctype="multipart/form-data">
             
        <div class="form-group">
                 <label for="caption">Caption</label>
                 <textarea class="form-control" name="caption" rows="3" ></textarea>
             </div>
            
             <div class="form-group">
                <label for="img">IMAGE</label>
                 <input type="file" class="form-control-file" name="fileToUpload">
            </div>
           
            <button type="submit" class="btn btn-primary w-100">POST</button>
        </form>
    </div>
   
    
</body>
</html>