<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href='mystylesheet.css' rel='stylesheet'>
        <script src=
        "https://www.google.com/recaptcha/api.js" async defer>
    </script>
        
    </head>
    <style>
        
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
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
    
    <body>
        <?php include ('Header.php');?>
        <div class="container">
      <div class="row">
        <div class="col-md-6">
            <img src="image/stickman_prev_ui.png" alt="Image" class="img-fluid">
        </div>
          
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
                
              <div class="mb-4">
              <h3>Login</h3>
              
            </div>
                <br>
                <?php 
                $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                
                
                
                if(strpos($fullurl, 'login=nullpasswordoremail')==true){
                    echo '<p class="error">Please enter the email and password</p>';
                    
                }
                if(strpos($fullurl, 'login=password')==true){
                    echo '<p class="error">Password must more than 8 characters.</p>';
                    
                }
                if(strpos($fullurl, 'login=failed')==true){
                    echo '<p class="error">Email or password invalid</p>';
                    
                    
                }
                ?>
                
            <form action="loginService.php" method="post">
            
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name='email' id="email" style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br><br>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name='password' id="password" style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>
                
              </div>
                 <div id="message" >
  <h3>Password must fulfill the condition of:</h3>
 
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
  
</div>
                <br><br>
                 
                <a href="Sign up.php">Do not have an account?</a><br>
                <div class="g-recaptcha" 
                data-sitekey="6LenffQgAAAAAMjcg3NNQLRx9OEgWuTI5G9vSODH">
            </div>
                <input type="submit" value="Login" style="margin-top: 30px" class="button">

             
          
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
           
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-d3658f25-725e-4935-85f7-2e5bf68adebe"></div>
        <?php include ('footer.html');?>
    <script>
       var pw1 = document.getElementById("password");  
       var length = document.getElementById("length");
        pw1.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
pw1.onblur = function() {
  document.getElementById("message").style.display = "none";
}
pw1.onkeyup = function() {
if(pw1.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
    </script>
    </body>
    
</html>

