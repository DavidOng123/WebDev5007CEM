        <?php
        session_start();
        
        $username_err = $password_err = $login_err = "";
        $password=$_POST['password'];
        $email=$_POST['email'];
        $host="localhost";
        $user="root";
        $pass="";
        $db="rrp";
        $error='';
        $recaptcha = $_POST['g-recaptcha-response'];
        $secret_key = '6LenffQgAAAAAHo5XDcst5MGm4WW2A2ImP7pX6rA';
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha;
        $response = file_get_contents($url);
        $response = json_decode($response);
        
        if (!isset($password) || !isset($email)){
            header("Location: Sign in.php?login=nullpasswordoremail");
                exit();
        }
        
        if (strlen($password)<8){
            header("Location: Sign in.php?login=password");
                exit();
        }
        
        $conn=mysqli_connect($host,$user,$pass,$db);
        
        if($response->success == true){
       
        if($conn){
           
        
        $sql="select * FROM user WHERE email ='$email' and password='$password'";
        $sql_owner="select * FROM restaurant_owner WHERE email ='$email' and password='$password'";
        
        $result=mysqli_query($conn,$sql) ;
        $result_owner=mysqli_query($conn,$sql_owner) ;
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          $row_owner = mysqli_fetch_array($result_owner,MYSQLI_ASSOC);
     // $active = $row['active'];
        $count = mysqli_num_rows($result);
        $count_owner = mysqli_num_rows($result_owner);
        
        
        if($count==1 || $count_owner==1){
            
                if($count==1){
                $_SESSION['user']='user';
                $_SESSION['Logged in']=true;
                $_SESSION['username']=$row['username'];
                $_SESSION['mobile']=$row['mobile_number'];
                $_SESSION['email']=$row['email'];
                $_SESSION['id']=$row['id'];
                mysqli_close($conn);
                 header('Location:Index.php');
                }
                if($count_owner==1){
                    $_SESSION['user']='restaurant_owner';
                    $_SESSION['res_id']=$row_owner['res_id'];
                    $_SESSION['username']=$row_owner['username'];
                    mysqli_close($conn);
                 header('Location:res_owner.php');
                }
            }else{
                header("Location: Sign in.php?login=failed");
                exit();
            }
        }
        
       
        
        else{
            echo '<script>alert("Error in Google reCAPTACHA")</script>';
        }
        
        }else{
        echo '<script>alert("Error in Google reCAPTACHA")</script>';
    }  
        
                        
        ?>