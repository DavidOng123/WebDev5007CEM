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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>
        <style>
            table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #04AA6D;
  color: white;
}
.label{
    color: white;
    padding: 8px;
    display: block;
    width: 100px;
}
        </style>
  
    </head>
    
    <body>
        <?php include ('header_owner.php');?>
        
       
        <hr>
         <div class="main">
            <h5>Here's your reservation history.</h5>
        </div>
        <hr>

        <?php
        $host="localhost";
        $user="root";
        $pass="";
        $db="rrp";
        $conn=mysqli_connect($host,$user,$pass,$db) or die('Error in database connection');
        
        $res_id=$_SESSION['res_id'];
        
         require_once ('Api.php');
        $api=new API();
        $array=$api->getReservation($res_id);
        $data= json_decode($array,true);
       ?>
        
        <table>
            <tr>
                <th>Reserve ID</th>
                <th>Customer</th>
                <th>Date time</th>
                <th>Pax</th>
                <th>Status</th>
    </tr>
           <?php
                  foreach ($data as $arr){?>
    <tr>
        <?php
        $userID=$arr['id'];
        $query="SELECT username FROM user INNER JOIN history ON user.id='$userID'";
        $result2= mysqli_query($conn, $query);
        $user_name= mysqli_fetch_assoc($result2);
            ?>
        <td><?php echo $arr['res_id'];?></td>
        <td><?php echo $user_name['username'];?></td>
        <td><?php echo $arr['date_time'];?></td>
        <td><?php echo $arr['pax'];?></td>
        <td><form method="post" action=""><input type="submit" class="btn btn-success" name="action" value="Approve" />
           
            <input type="submit" class="btn btn-danger" name="action" value="Reject"/>
            <input type="hidden" name="id" value="<?php echo $arr['res_id'];?>"/>
            </form></td>
          
    </tr>
           <?php }?>
    </table>
       
       <?php
       if(isset($_POST["action"] )){
       if($_POST["action"]=='Approve'){
           
           $reserve_id=$_POST['id'];
           $string="UPDATE history SET status='success' WHERE reserve_id='$reserve_id'";
           $result3= mysqli_query($conn, $string);
           header("reservation.php");
       }
       }
       if(isset($_POST["action"]) ){
       if($_POST["action"]=="Reject"){
           $reserve_id=$_POST['id'];
           $string="UPDATE history SET status='cancel' WHERE reserve_id='$reserve_id'";
           $result3= mysqli_query($conn, $string);
           header("reservation.php");
       }
       }
       ?>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-d3658f25-725e-4935-85f7-2e5bf68adebe"></div>
        <?php include ('footer.html');?> 
    </body>
    
</html>

