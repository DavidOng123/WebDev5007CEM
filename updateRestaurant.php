<?php
session_start();?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href='mystylesheet.css' rel='stylesheet'>
        <style>
           
            
            
        </style>
        
    </head>
    <body>
        <?php  require_once ('Api.php');
        $api=new API();
        $array=$api->getResDetail($_SESSION['res_id']);
        $data= json_decode($array,true);?>
        <?php include ('header_owner.php');?>
<form action="" method="post" enctype="multipart/form-data">
     <?php foreach ($data as $arr){?>
              <div class="form-group first">
                <label for="res_name">Restaurant name</label>
               
                <input type="text" class="form-control" name="res_name" value="<?php echo $arr['name'];?>"
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
                <div class="form-group">
                <label for="res_des">Restaurant description</label>
                <input type="text" class="form-control" name="res_des" value="<?php echo $arr['desc'];?>"
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
                <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" name="contact" value="<?php echo $arr['contact'];?>"
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
                <div class="form-group">
                <label for="cuisine_type">Cuisine type</label>
                <input type="text" class="form-control" name="cuisine_type" value="<?php echo $arr['cuisine'];?>"
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
                <input type="text" class="form-control" name="address" id='address' value="<?php echo $arr['location'];?>"
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>
                
                </div>
              <?php }?>
                 <input type="submit" name="button" value="Register" class="button">
</form>
        
        <?php  
        
        if(isset($_POST['button'])){
            if(!empty($_FILES['image']['name'])){
            $fileName= basename($_FILES['image']['name']);
            $fileType= pathinfo($fileName,PATHINFO_EXTENSION);
            $allowTypes=array('jpg','png','jpeg','gif');
            if(in_array($fileType, $allowTypes)){
                $image=$_FILES['image']['tmp_name'];
                $imgContent= addslashes(file_get_contents($image));
            }
        }
            $res_id=$_SESSION['res_id'];
            $res_name=$_POST['res_name'];
            $res_des=$_POST['res_des'];
            $contact=$_POST['contact'];
            $cuisine_type=$_POST['cuisine_type'];
            $location=$_POST['address'];
            $api->updateRes($res_id, $res_name, $res_des, $contact, $cuisine_type, $imgContent, $location);
             echo '<script>window.alert("Update successfully");'
        . 'window.location.href="res_owner.php";</script>';
        
        
        }
        ?>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-d3658f25-725e-4935-85f7-2e5bf68adebe"></div>
         <?php include ('footer.html');?>
    </body>

</html>