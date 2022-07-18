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
        
    </head>
    <body>
        
        <?php include ('header_owner.php');?>
         <?php
      
        $res_id= $_SESSION['res_id'];
        require_once ('Api.php');
        $api=new API();
        $temp=$api->getResDetail($res_id);
        $array= json_decode($temp,true);
        
        foreach ($array as $data){
            $name=$data['name'];
            $desc=$data['desc'];
            $cuisine=$data['cuisine'];
            $image=$data['image'];
        }
      
         
         echo '<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="data:image/jpeg;base64,'.$image.'" width="250" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center p-4">
                            
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted cuisine">'.$cuisine.'</span>
                                <h5 class="text-uppercase">'.$name.'</h5>
                                
                            </div>
                            <p class="about">'.$desc.'</p>
                           
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Reserve</button> </div>
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


