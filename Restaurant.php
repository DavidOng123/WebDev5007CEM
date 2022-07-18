<?php
session_start();
?>

<html>
    <head>
        <title>Restaurant</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href='mystylesheet.css' rel='stylesheet'>
  
    </head>
    
    <body>
        <?php include ('Header.php');?>
        <br>
        <div class="main">
    <div class="row ">
        <?php

        require_once ('Api.php');
        $api=new API();
        $array=$api->fetchAllRestaurant();
        $data= json_decode($array,true);
        
        foreach ($data as $arr){
            echo '<div class="col-sm-6 col-md-4 col-lg-3">';
            echo '<div class="card" style="width: 18rem; ">';
            echo '<img class="card-img-top" style="height:200px;" src="data:image/jpeg;base64,'.$arr['image'].'" alt="Card image cap">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$arr['name'].'</h5>';
            echo '<p class="card-text">'.$arr['desc'].'</p>';
            echo '<a href="WesternDetail.php?Detail='.$arr['name'].'    " ><button class="button stretched-link">Reserve</button></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        
        ?>
        
        
        
    </div>
    </div>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-d3658f25-725e-4935-85f7-2e5bf68adebe"></div>
         <?php include ('footer.html');?>
    </body>
</html>

