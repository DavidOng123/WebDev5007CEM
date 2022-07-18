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
        

   
        <style>
        .error {
    border: 1px solid;
	margin: 10px auto;
	padding: 15px 10px 15px 50px;
	background-repeat: no-repeat;
	background-position: 10px center;
	max-width: 460px;
	color: #D8000C;
	background-color: #FFBABA;
	background-image: url('https://i.imgur.com/GnyDvKN.png');
}
        </style>
    </head>
    
    <body>
         <?php include ('admin_header.php');?>
        <form action="" method="post">
           
       <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>
             <?php 
                $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                
                if(strpos($fullurl, 'login=failed')==true){
                    echo '<p class="error">User Not Exist</p>';
                    
                }
                ?>
            <div class="form-outline mb-4">
               
                <input type="text" placeholder="Email" name="email" id="typeEmailX-2" class="form-control form-control-lg" required />
          
            </div>

            <div class="form-outline mb-4">
                <input type="password" placeholder="Password" name='password' id="typePasswordX-2" class="form-control form-control-lg" required />
             
            </div>


            <button name="button" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
            </form>
        
        <?php
        if(isset($_POST['button'])){
        $email=$_POST['email'];
        $password=$_POST["password"];
         require_once ('Api.php');
        $api=new API();
        if($api->checkAdmin($email, $password)==true){
            header("Location:admin.php");
        }else{
            header("Location:admin_login.php?login=failed");
        }
        }
        ?>
    </body>
    
</html>

