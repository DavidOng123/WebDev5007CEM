<?php
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
  <div class="container">
      <a class="navbar-brand" href="my_html1.html">Just Food</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        
        <li class="nav-item">
             <div class="background-one">
            <div class="link-container">
                <a class="nav-link" href="reservation.php">Reservation</a>
            </div>
         </div>
          
        </li>
        
<li class="nav-item">
             <div class="background-one">
            <div class="link-container">
                <a class="nav-link" href="history_owner.php">History</a>
            </div>
         </div>
          
        </li>
       
        <li class="nav-item">
             <div class="background-one">
            <div class="link-container">
                 <a class="nav-link" href="res_profile.php">Profile</a>
            </div>
         </div>
         
        </li>
        
        <li class="nav-item">
        <div class="background-one">
            <div class="link-container">
        <input id="input" class="searchbar" type="text" placeholder="Search.." style="  float: right;padding: 6px;order: none;margin-top: 13px;margin-right: 16px;font-size: 25px;">
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
            <a class="nav-link" href="logoutService.php"><span><button class="w3-button w3-red">Log out</button></span></a>
              </div>
         </div>
        </li>
      </ul>
    </div>
  </div>
</nav>';

?>

