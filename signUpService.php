
        <?php
        $name=$_POST['name'];
        $mobile=$_POST['mobilenumber'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $host="localhost";
        $user="root";
        $pass="";
        $db="rrp";
        $recaptcha = $_POST['g-recaptcha-response'];
        $secret_key = '6LenffQgAAAAAHo5XDcst5MGm4WW2A2ImP7pX6rA';
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha;
        $response = file_get_contents($url);
        $response = json_decode($response);
        
         
    $repassword=$_POST['re-password'];
    
//    if($password!=$repassword){
//        echo '<script>alert("Password not matched!!");'
//        . 'window.location.href="Sign Up.php";</script>")';
//       
//    }
        
        $conn=mysqli_connect($host,$user,$pass,$db);
        
        
        if($response->success == true){
        if($conn){
            
        $sql = "SELECT email FROM user WHERE email='{$email}'";
$result = mysqli_query($conn,$sql) or die("Query unsuccessful") ;
$sql_owner = "SELECT email FROM restaurant_owner WHERE email='{$email}'";
$result_owner = mysqli_query($conn,$sql_owner) or die("Query unsuccessful") ;
      if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result_owner) > 0) {
        header("Location: Sign up.php?signup=exist");
                exit();
      } 
      
        
        
        
        else{
            
        
        
           
        
        $sql="insert into user(username,email,password,mobile_number) VALUES ('$name', '$email', '$password', '$mobile')";
        
        mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location:Sign in.php");
        }
        
        
          }else{
              echo '<script>alert("Failed to sign up")</script>';
          }       
        }else{
        echo '<script>alert("Error in Google reCAPTACHA")</script>';
    }  
        ?>

