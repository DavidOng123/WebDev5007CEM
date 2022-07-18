<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Reserve</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
</head>
<body>
<?php 
session_start();
if(isset($_SESSION['Logged in']) && $_SESSION['Logged in']==true){
    echo '<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose a time</h5>
                <button type="button" id="myButton" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form action="" method="post">
            <input style="margin-right:10px;" type="datetime-local" id="datetime" name="datetime"/><input type="number" id="pax" name="pax"/>pax
            <input type="submit" name="submitButton"/>
            </form>
            </div>
        </div>
    </div>
</div>';
    echo '<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "Restaurant.php";
    };
</script>';
    if (isset($_POST['submitButton'])){
        $host="localhost";
        $user="root";
        $pass="";
        $db="rrp";
        $conn=mysqli_connect($host,$user,$pass,$db) or die('Error in database connection');
        $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $fullurl= urldecode($fullurl);
        $res_name= substr($fullurl, strpos($fullurl, '?')+1);
        $id=$_SESSION['id'];
        $status='pending';
        $datetime=$_POST['datetime'];
        $query="SELECT res_id FROM restaurant WHERE res_name='$res_name'";
        $result2= mysqli_query($conn, $query);
        $res_id= mysqli_fetch_assoc($result2);
        $restaurant_id=$res_id['res_id'];
        echo $restaurant_id;
        $pax=$_POST['pax'];
        $sql="insert into history(id,res_id,date_time,pax,status) VALUES ('$id', '$restaurant_id', '$datetime','$pax', '$status')";
        
        mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location:History.php");
    }
}
else{
echo '
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Account</h5>
                <button type="button" id="myButton" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
				<p>Create or login an account to ease the reservation process.</p>
                
                   <a href="Sign in.php"> <button  class="btn btn-primary">Go</button></a>
                
            </div>
        </div>
    </div>
</div>';
echo '<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "Restaurant.php";
    };
</script>';
}?>
</body>
</html>

