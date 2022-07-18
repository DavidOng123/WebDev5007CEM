<?php
session_start();?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
                

        <link href='mystylesheet.css' rel='stylesheet'>
        <style>
           
body{background-color: #000}
.card{border:none}
.product{background-color: #eee}
.cuisine{font-size: 13px}
.about{font-size: 14px}


.btn-danger{background-color: #ff0000 !important;border-color: #ff0000 !important}
.btn-danger:hover{background-color: #da0606 !important;border-color: #da0606 !important}
.btn-danger:focus{box-shadow: none}.cart i{margin-right: 10px}
        </style>
        
    </head>
    <body>
        <?php include ('Header.php');?>
       <?php
       $host="localhost";
        $user="root";
        $pass="";
        $db="rrp";
        $conn=mysqli_connect($host,$user,$pass,$db) or die('Error in database connection');
        $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $fullurl= urldecode($fullurl);
        $res_name= substr($fullurl, strpos($fullurl, '=')+1);
        
        
        $sql="select * FROM restaurant WHERE res_name ='$res_name'";
        
        $result=mysqli_query($conn,$sql) ;
         $row = mysqli_fetch_row($result);
         $desc=$row[1];
         $contact=$row[2];
         $cuisine=$row[3];
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
                                <p class="about">Location:  '.$location.'</p>
                           
                            <div class="cart mt-4 align-items-center"> <a href="reserveService.php?'.$res_name.'"><button class="btn btn-danger text-uppercase mr-2 px-4">Reserve</button> </a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
       ?>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-d3658f25-725e-4935-85f7-2e5bf68adebe"></div>
        <?php include ('footer.html');?>
    </body>
    
</html>



