<?php
session_start();

if(isset($_SESSION['Logged in'])&&$_SESSION['Logged in']==true){
    echo "<html>
    <head>
        <meta charset='UTF-8'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
       <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
        <link href='mystylesheet.css' rel='stylesheet'>
        
    </head>
    <body>";
        include 'Header.php';
        echo "
        <div class='container' >
      <div class='row'>
        
        <div class='col-md-6 contents'>
          <div class='row justify-content-center'>
            <div class='col-md-8'>
              <div class='mb-4'>
              <h3>Profile</h3>
              
            </div>
            <form action='' method='post'>
              <div class='form-group first'>
                <label for='fullname'>Name</label>
                <input type='text' name='username' class='form-control' id='Name' value='".$_SESSION['username']."' required>

              </div>
                
                <br>
                <div class='form-group'>
                <label for='mobile'>Mobile</label>
                <input type='text' name='mobile' class='form-control' id='mobile' value='".$_SESSION['mobile']."' required>

              </div>
                <br>
              <div class='form-group'>
                <label for='email'>Email</label>
                <input type='email' name='email' class='form-control' id='email' value='".$_SESSION['email']."' required>

              </div>
                <br>
             
                <br>
             

              <input name='button' type='submit' class='button'>

             
          
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
    <script src='js/jquery-3.3.1.min.js'></script>
    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/main.js'></script>";
        include ('footer.html');
        echo "
        <script src='https://apps.elfsight.com/p/platform.js' defer></script>
<div class='elfsight-app-d3658f25-725e-4935-85f7-2e5bf68adebe'></div>
    </body>
    
</html>";
}

?>

<?php
 
    
    if(isset($_POST['button'])){
         
        
            $name=$_POST['username'];
        
            $email=$_POST['email'];
       
            $mobile=$_POST['mobile'];
            
       
            
        require_once ('Api.php');
        $api=new API();
        $api->updateDetail($_SESSION['id'], $name, $email, $mobile);
        
             $_SESSION['username']=$name;
            $_SESSION['mobile']=$mobile;
            $_SESSION['email']=$email;
            header("Refresh:0");
    }
    
    

?>


