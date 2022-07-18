    

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href='mystylesheet.css' rel='stylesheet'>
        <script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
    </head>
    <style>
        
#message  {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message2{
     display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

#message2 p{
   padding: 10px 35px;
  font-size: 18px; 
}

/* Add a green text color and a checkmark when the requirements are right */

    </style>
    
    <body>
        <?php include ('admin_header.php');?>
        <h1>Create Restaurant</h1><br>
       
               
        <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group first">
                <label for="res_name">Restaurant name</label>
                <input type="text" class="form-control" name="res_name" 
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
                <div class="form-group">
                <label for="res_des">Restaurant description</label>
                <input type="text" class="form-control" name="res_des" 
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
                <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" name="contact" 
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
                <div class="form-group">
                <label for="cuisine_type">Cuisine type</label>
                <input type="text" class="form-control" name="cuisine_type" 
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
                <div class="form-group last mb-4">
                <label for="file">Image</label>
                <input type="file" class="form-control" name="image" id='image'
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>
                
              </div>
                <br>
                <div class="form-group last mb-4">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id='address'
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>
                
              </div>
                <br>
                <div class="form-group">
                <label for="username">Username for account</label>
                <input type="text" class="form-control" name="username" 
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" 
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id='password'
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>
                
              </div>
                <br>
              
                

                <input type="submit" name="button" value="Register" class="button">

             
          
            </form>
           
        <?php
        if(isset($_POST['button'])){
        require_once ('Api.php');
        $api=new API();
        if(!empty($_FILES['image']['name'])){
            $fileName= basename($_FILES['image']['name']);
            $fileType= pathinfo($fileName,PATHINFO_EXTENSION);
            $allowTypes=array('jpg','png','jpeg','gif');
            if(in_array($fileType, $allowTypes)){
                $image=$_FILES['image']['tmp_name'];
                $imgContent= addslashes(file_get_contents($image));
            }
        }
        $api->insertRest($_POST['res_name'], $_POST['res_des'], $_POST['contact'], $_POST['cuisine_type'], $imgContent,$_POST['address'], $_POST['username'], $_POST['email'], $_POST['password']);
        echo '<script>window.alert("Insert successfully");'
        . 'window.location.href="admin.php";</script>';
        
        }
         ?>
   
    </body>
    
</html>
