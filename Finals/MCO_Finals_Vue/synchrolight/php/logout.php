<?php
    // Checks if user is logged in; if logout_id is in the URL, updates user status to "Offline now", ends session, and redirects to login page; otherwise redirects to feed page.
    session_start();
    if(isset($_SESSION['user_id'])){ // check if the user is logged in by seeing if 'user_id' exists in the session; if not lgged in, redirect to index.php

        include_once "config.php";
        if(isset($_GET['logout_id'])){ // check if logout_id is passed in the URL
            $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
            $status = "Offline now";
            //once  user logout then it'll update this status to offline and in the login form
            //it'll update again the staus to active if user logged in succesfully
            $sql = mysqli_query($conn, "UPDATE users SET status  = '{$status}' WHERE user_id = '{$logout_id}'");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../index.php");
                exit();
            }
        }else{
            header("location: ../feed.php");
            exit();
        }
    }else{
        header("location: ../index.php");
        exit();
    }
?>
