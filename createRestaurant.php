    

<?php
session_start();

  if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Unauthorized';
    exit;
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="admin.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                   
                    <div class="ms-3">
                        <h6 class="mb-0">Admin</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="admin.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <a href="manageUser.php" class="nav-item nav-link" ><i class="fa fa-laptop me-2"></i>Manage user</a>
                        
                    
                    <a href="createRestaurant.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Creation</a>
             
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        
        <div class="content">
            
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                
                <div class="navbar-nav align-items-center ms-auto">
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                           
                            <a href="Index.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <form method="post" action="" enctype="multipart/form-data">
                                <div class="mb-3">
                                     <label for="res_name" class="form-label">Restaurant name</label>
                                     <input type="text" class="form-control" name="res_name" id="exampleInputEmail1" style="border-color:white;"
                        required>
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="res_des" class="form-label">Restaurant description</label>
                <input type="text" class="form-control" name="res_des" class="form-control" style="border-color:white;" required>
                                </div>
                               <div class="mb-3">
                                   <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" name="contact" class="form-control" style="border-color:white;" required>

                                </div>
                <div class="mb-3">
                     <label for="cuisine_type" class="form-label">Cuisine type</label>
                <input type="text" class="form-control" name="cuisine_type" class="form-control" style="border-color:white;" required>
                                </div>
                <div class="mb-3">
                     <label for="file" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id='image' required>
                                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id='address' style="border-color:white;" required>
                                </div>
                <div class="mb-3">
                <label for="username" class="form-label">Username for account</label>
                <input type="text" class="form-control" name="username" style="border-color:white;" required>
                                </div>
                <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" style="border-color:white;" required>
                                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id='password' style="border-color:white;" required>
                     
                                </div>
                                <button type="submit" name="button" class="btn btn-primary">Create</button>
                            </form>

           

           

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Just Food</a>, All Right Reserved. 
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
    

 

        <?php
        if(isset($_POST['button'])){
            if(!empty($_FILES['image']['name'])){
            $fileName= basename($_FILES['image']['name']);
            $fileType= pathinfo($fileName,PATHINFO_EXTENSION);
            $allowTypes=array('jpg','png','jpeg','gif');
            if(in_array($fileType, $allowTypes)){
                $image=$_FILES['image']['tmp_name'];
                $imgContent= addslashes(file_get_contents($image));
            }
        }
        require_once ('Api.php');
        $api=new API();
       
        $api->insertRest($_POST['res_name'], $_POST['res_des'], $_POST['contact'], $_POST['cuisine_type'], $imgContent,$_POST['address'], $_POST['username'], $_POST['email'], $_POST['password']);
        echo '<script>window.alert("Insert successfully");'
        . 'window.location.href="admin.php";</script>';
        
        }
         ?>
   
    </body>
    
</html>
