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
        
        <?php include ('header_owner.php');?>
         <?php
       $host="localhost";
        $user="root";
        $pass="";
        $db="rrp";
        $conn=mysqli_connect($host,$user,$pass,$db) or die('Error in database connection');
        
        $res_id= $_SESSION['res_id'];
        
        
        $sql="select * FROM restaurant WHERE res_id ='$res_id'";
        
        $result=mysqli_query($conn,$sql) ;
         $row = mysqli_fetch_row($result);
         $desc=$row[1];
         $contact=$row[2];
         $cuisine=$row[3];
         $res_name=$row[0];
         $location=$row[5];
         
         echo '<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="data:image/jpeg;base64,'.base64_encode($row[4]).'" width="250" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center p-4">
                            
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted cuisine">'.$cuisine.'</span>
                                <h5 class="text-uppercase">'.$res_name.'</h5>
                                
                            </div>
                            <p class="about">'.$desc.'</p>
                                <p class="about">Location: '.$location.'</p>
                           
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Reserve</button> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
       ?>
        <div style="  height: 200px;position: relative;">
            <div style="  margin: 0;position: absolute;top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">
                <a href="updateRestaurant.php"> <button class="button" ">Edit</button></a>
            </div>
        </div>
          
            <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-d3658f25-725e-4935-85f7-2e5bf68adebe"></div>
        <?php include ('footer.html');?>
    </body>
    
</html>


