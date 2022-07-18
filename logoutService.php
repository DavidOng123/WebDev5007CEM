<?php

session_start();
                $_SESSION['Logged in']=false;
                session_destroy();
                header('Location:Index.php');
                ?>


