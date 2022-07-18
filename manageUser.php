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
    background-color:  red;
    padding: 8px;
    display: block;
    width: 100px;
}
        </style>
  
    </head>
    
    <body>
        <?php include ('admin_header.php');?>
        
       
        <hr>
         <div class="main">
            <h5>User</h5>
        </div>
        <hr>

        <?php
        
        $host="localhost";
        $user="root";
        $pass="";
        $db="rrp";
        $conn=mysqli_connect($host,$user,$pass,$db) or die('Error in database connection');
       
        
        $sql="SELECT * FROM user";
        
        $result= mysqli_query($conn, $sql);
        $sql_owner="SELECT * FROM restaurant";
        
        $result_owner= mysqli_query($conn, $sql_owner);?>
        <table>
            <tr>
                <th>UserID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile number</th>
                <th>Delete</th>
    </tr>
           <?php
           while($row= mysqli_fetch_array($result)){?>
    <tr>
        <?php
        $userID=$row['id'];
       
            ?>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['mobile_number'];?></td>
        <td><?php 
            echo '<form method="post"><button name="deleteButton" value="'.$row['id'].'" ><span id="label" class="label" ;">Delete</span></button></form>';
       ?></td>
    </tr>
           <?php }?>
        </table><br><br><br>
        <hr>
         <div class="main">
            <h5>Restaurant Owner</h5>
        </div>
        <hr>
        <table>
            <tr>
                <th>Restaurant ID</th>
                <th>Restaurant</th>
                <th>Cuisine Type</th>
                <th>Contact</th>
                
                <th>Delete</th>
    </tr>
           <?php
           while($row2= mysqli_fetch_array($result_owner)){?>
    <tr>
        <?php
        
            ?>
        <td><?php echo $row2['res_id'];?></td>
        <td><?php echo $row2['res_name'];?></td>
        <td><?php echo $row2['cuisine_type'];?></td>
        <td><?php echo $row2['contact'];?></td>
        
        <td><?php 
            echo '<form method="post"><button name="deleteOwnerButton" value="'.$row2['res_name'].'" ><span id="label" class="label" ;">Delete</span></button></form>';
       ?></td>
    </tr>
           <?php }?>
    </table>
       <?php
       if(isset($_POST['deleteButton'])){
           $user_id=$_POST['deleteButton'];
           $string="DELETE FROM history WHERE id='$user_id'";
           $result3= mysqli_query($conn, $string);
           $string2="DELETE FROM user WHERE id='$user_id'";
           $result4= mysqli_query($conn, $string2);
           header("Refresh:0");
       }
       if(isset($_POST['deleteOwnerButton'])){
           $res_name=$_POST['deleteOwnerButton'];
           $string="DELETE FROM history WHERE res_name='$res_name'";
           $result3= mysqli_query($conn, $string);
           $string2="DELETE FROM restaurant_owner WHERE res_name='$res_name'";
           $result4= mysqli_query($conn, $string2);
           $string3="DELETE FROM restaurant WHERE res_name='$res_name'";
           $result5= mysqli_query($conn, $string3);
           header("Refresh:0");
       }
       ?>

        
        
    </body>
    
</html>

