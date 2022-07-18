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
        
        $sql="SELECT * FROM history WHERE res_id='$res_id'";
        
        $result= mysqli_query($conn, $sql);?>
        <table>
            <tr>
                <th>Reserve ID</th>
                <th>Customer</th>
                <th>Date time</th>
                <th>Pax</th>
                <th>Status</th>
    </tr>
           <?php
           while($row= mysqli_fetch_array($result)){?>
    <tr>
        <?php
        if($row['status']=='success' || $row['status']=='cancel'){?>
        <?php
        
        $userID=$row['id'];
        $query="SELECT username FROM user INNER JOIN history ON user.id='$userID'";
        $result2= mysqli_query($conn, $query);
        $user_name= mysqli_fetch_assoc($result2);
            ?>
        <td><?php echo $row['reserve_id'];?></td>
        <td><?php echo $user_name['username'];?></td>
        <td><?php echo $row['date_time'];?></td>
        <td><?php echo $row['pax'];?></td>
        <td><?php if($row['status']=='success'){
            echo '<span id="label" class="labelGreen" style="background-color: #04AA6D;">Success</span>';
        } else if($row['status']=='cancel'){
            echo '<span id="label" class="labelOrange" style="background-color: red;">Rejected</span>';
        };?></td>
    </tr>
    
        <?php }}?>
    </table>
    
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-d3658f25-725e-4935-85f7-2e5bf68adebe"></div>
        <?php include ('footer.html');?> 
    </body>
    
</html>

