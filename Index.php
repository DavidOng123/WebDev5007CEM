<?php
session_start();
require_once ('Api.php');
        $api=new API();
        
?>


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
        
        <?php include ('Header.php');?>
        
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="image/Korea.jpg" alt="Korea cuisine" class="d-block" style="width:600px;height: 400px; margin: auto;">
    </div>
    <div class="carousel-item">
        <img src="image/Chinese.png" alt="Chinese" class="d-block" style="width:600px;height: 400px; margin: auto;">
    </div>
    <div class="carousel-item">
      <img src="image/Japan.jpg" alt="Japan" class="d-block" style="width:600px;height: 400px; margin: auto;">
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
        <div class="main">
        
           

       
            <a style="color: black;font-size: 30px;"><b>Chinese</b></a><br>
        <div class="row"><?php
        $array=$api->fetchAllRestaurant();
        $data= json_decode($array,true);
            foreach ($data as $arr){
            if($arr['type']=="chinese"){
            echo '<div class="col-sm-6 col-md-4 col-lg-3">';
            echo '<div class="card" style="width: 18rem;">';
            echo '<img class="card-img-top" style="height:200px;" src="data:image/jpeg;base64,'.$arr['image'].'" alt="Card image cap">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$arr['name'].'</h5>';
            echo '<p class="card-text">'.$arr['desc'].'</p>';
            echo '<a href="WesternDetail.php?Detail='.$arr['name'].'    " ><button class="button stretched-link">Reserve</button></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';}
            }?></div>
             
        

        
            <br><br>
            <a style="color: black;font-size: 30px;"><b>Western</b></a><br><br>
            <div class="row"><?php
        $array=$api->fetchAllRestaurant();
        $data= json_decode($array,true);
            foreach ($data as $arr){
            if($arr['type']=="western"){
            echo '<div class="col-sm-6 col-md-4 col-lg-3">';
            echo '<div class="card" style="width: 18rem;">';
            echo '<img class="card-img-top" style="height:200px;" src="data:image/jpeg;base64,'.$arr['image'].'" alt="Card image cap">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$arr['name'].'</h5>';
            echo '<p class="card-text">'.$arr['desc'].'</p>';
            echo '<a href="WesternDetail.php?Detail='.$arr['name'].'    " ><button class="button stretched-link">Reserve</button></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';}
            }?></div>
            
            <br><br>
            <a style="color: black;font-size: 30px;"><b>Local cuisine</b></a><br><br>
            <div class="row"><?php
        $array=$api->fetchAllRestaurant();
        $data= json_decode($array,true);
            foreach ($data as $arr){
            if($arr['type']=="malay"){
            echo '<div class="col-sm-6 col-md-4 col-lg-3">';
            echo '<div class="card" style="width: 18rem;">';
            echo '<img class="card-img-top" style="height:200px;" src="data:image/jpeg;base64,'.$arr['image'].'" alt="Card image cap">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$arr['name'].'</h5>';
            echo '<p class="card-text">'.$arr['desc'].'</p>';
            echo '<a href="WesternDetail.php?Detail='.$arr['name'].'    " ><button class="button stretched-link">Reserve</button></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';}
            }?></div>
        
        <?php include ('footer.html');?>
        <script src='main.js'></script>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-d3658f25-725e-4935-85f7-2e5bf68adebe"></div>
    </body>
    
</html>



