    

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
        
#message  {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message2{
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

#message2 p{
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
    <script>
            function Validate() {
                 var pattern= new RegExp("/^[0-9]{10}$/;");
                 var phone_number=document.getElementsByName('mobilenumber');
                 
                 if(phone_number.match(/^\d{10}$/)){
                    
                     return true;
                 }
                 
                 else{
                      alert('Phone number format incorrect.');
                     return false;
                 }
                 
                 var pw1=document.getElementsByName('password');
                 var pw2=document.getElementsByName('re-password');
                 
                 if(pw1!=pw2){
                     alert('Passwords do not match.');
                     return false;
                 }
                 else
                     return false;
                 
                 
}  

            
        </script>
    <body>
        <?php include ('Header.php');?>
        <div class="container">
      <div class="row">
        <div class="col-md-6">
            <img src="image/download_prev_ui.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign Up</h3>
              
            </div>
                 <?php 
                $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                
                if(strpos($fullurl, 'signup=exist')==true){
                    echo '<p class="error">User Exist</p>';
                    
                }
                ?>
                <form onsubmit="return verifyPassword()" action="signUpService.php" method="post">
              <div class="form-group first">
                <label for="fullname">Name</label>
                <input type="text" class="form-control" name="name" 
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
                <div class="form-group">
                <label for="mobilenumber">Mobile Number</label>
                <input type="text" class="form-control" name="mobilenumber" 
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" 
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>

              </div>
                <br>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id='password'
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>
                
              </div>
                <br>
              <div class="form-group last mb-4">
                <label for="re-password">Re-type Password</label>
                <input type="password" class="form-control" name="re-password" id='re-password'
                       style="width: 100%;padding:12px 20px; margin:8px 0; box-sizing: border-box;" required>
                
              </div>
                <br>
                <div id="message" >
  <h3>Password must fulfill the condition of:</h3>
 
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
  <p id=""></p>
  
</div>
                <div id="message2" >
  <h3>Password must fulfill the condition of:</h3>
 
  <p id="equal" class="invalid">Password <b>must be same.</b></p>
  
  
</div>
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0">
                    <span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                    <input type="checkbox" checked="checked" required/>
                  <div class="control__indicator"></div>
                </label>
              </div>
                <div class="g-recaptcha" 
                data-sitekey="6LenffQgAAAAAMjcg3NNQLRx9OEgWuTI5G9vSODH">
            </div>
                <input type="submit" value="Register" class="button">

             
          
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
       var pw2 = document.getElementById("re-password"); 
       var length = document.getElementById("length");
       var equal = document.getElementById("equal");
       pw1.onfocus = function() {
  document.getElementById("message").style.display = "block";
}
        pw2.onfocus=function(){
              document.getElementById("message2").style.display = "block";

        }

// When the user clicks outside of the password field, hide the message box
pw1.onblur = function() {
  document.getElementById("message").style.display = "none";
}
pw2.onblur = function() {
  document.getElementById("message2").style.display = "none";
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
pw2.onkeyup = function() {
if(pw2.value==pw1.value) {
    equal.classList.remove("invalid");
    equal.classList.add("valid");
  } else {
    equal.classList.remove("valid");
    equal.classList.add("invalid");
  }
}
    </script>
    </body>
    
</html>
