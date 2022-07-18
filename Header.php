<?php

require_once ('Api.php');
$api=new API();
$data=$api->viewData();

?>
<?php

if(isset($_SESSION['Logged in']) && $_SESSION['Logged in']==true ){
 echo ' <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
  <div class="container">
      <a class="navbar-brand" href="my_html1.html">Just Food</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
         <div class="background-one">
            <div class="link-container">
                <a class="nav-link" href="index.php">Home</a>
            </div>
         </div>
        </li>
        <li class="nav-item">
             <div class="background-one">
            <div class="link-container">
                <a class="nav-link" href="Restaurant.php">Restaurant</a>
            </div>
         </div>
          
        </li>
        <li class="nav-item">
            <div class="background-one">
            <div class="link-container">
                <a class="nav-link" href="History.php">History</a>
            </div>
         </div>
          
        </li>
        <li class="nav-item">
             <div class="background-one">
            <div class="link-container">
                 <a class="nav-link" href="Profile.php">Profile</a>
            </div>
         </div>
         
        </li>
        
         <li class="nav-item">
         <div class="background-one">
            <div class="link-container">
         <form action="search.php" method="post"><input id="searchBox" class="searchbar" name="name" type="text" placeholder="Search.." style="  float: right;padding: 6px;order: none;margin-top: 13px;margin-right: 16px;font-size: 25px;" oninput=search(this.value)></form>
</div>
         </div>         
</li>
        <li class="nav-item">
            <div class="background-one">
            <div class="link-container">
            <a class="nav-link" >'.$_SESSION['username'].'</a>
                </div>
         </div> 
        </li>
        <li class="nav-item">
            <div class="background-one">
            <div class="link-container">
            <a style="display:block;margin-left:auto;margin-right:auto; margin-top:15px;" href="logoutService.php"><span><button class="w3-button w3-red">Log out</button></span></a>
        </div>
         </div> 
</li>
      </ul>
    </div>
  </div>
</nav>

<script src="main.js"></script>';
 
    
    
}
else{
       echo ' <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
  <div class="container">
      <a class="navbar-brand" href="my_html1.html">Just Food</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
         <div class="background-one">
            <div class="link-container">
                <a class="nav-link" href="index.php">Home</a>
            </div>
         </div>
        </li>
        <li class="nav-item">
             <div class="background-one">
            <div class="link-container">
                <a class="nav-link" href="Restaurant.php">Restaurant</a>
            </div>
         </div>
          
        </li>
        <li class="nav-item">
            <div class="background-one">
            <div class="link-container">
                <a class="nav-link" href="History.php">History</a>
            </div>
         </div>
          
        </li>
       
        
        <li class="nav-item"">
        <div class="background-one">
            <div class="link-container">
        <form action="search.php" method="post"><input id="searchBox" class="searchbar" name="name" type="text" placeholder="Search.." style="  float: right;padding: 6px;order: none;margin-top: 13px;margin-right: 16px;font-size: 25px;"oninput=search(this.value)></form>
             </div>
         </div>
</li>
        <li class="nav-item">
             <div class="background-one">
            <div class="link-container">
            <a class="nav-link" href="Sign in.php"><span><i class="far fa-user-circle" style="font-size:36px"></i></span></a>
</div>
         </div>        
</li>
        
      </ul>
    </div>
  </div>
</nav>

<script src="main.js"></script>';
}



?>
<div style="width: 100%; ">
    
    <ul id='dataViewer' style="text-align:right; list-style-type:none; margin-right: 180px;display: none;font-size: 30px" >
    <?php    foreach ($data as $i){?>
    <li><?php echo '<a href="WesternDetail.php?Detail='.$i['res_name'].'">'.$i['res_name'].'</a>';?></li>
    <?php }?>
</ul>
</div>

<script>
    var bar=document.getElementById('searchBox');
    bar.onfocus = function() {
  document.getElementById("dataViewer").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
//bar.onblur = function() {
//  document.getElementById("dataViewer").style.display = "none";
//}
</script>

        
  
       
        
      