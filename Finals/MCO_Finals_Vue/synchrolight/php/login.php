<?php
    // This code checks if the username and password from the login form match a user in the database, updates their status to "Active now" if successful, starts a session with their ID, and returns success or error messages.
    session_start();
    include_once "config.php";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // echo "Hello World!";
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");

    if(!empty($username) && !empty($password)){
        if(mysqli_num_rows($sql) > 0){ //checks if account registered
            $row = mysqli_fetch_assoc($sql); //gets the user's data from the database result
                if($row['password'] == $password && $row['username'] == $username){ //checks if password & username match the db data
                    // $row = mysqli_fetch_assoc($sql);
                    $status = "Active now";
                    //updating user status to active now if user login successfully
                    $sql2 = mysqli_query($conn, "UPDATE users SET status  = '{$status}' WHERE user_id = '{$row['user_id']}'");
                    if($sql2){
                        $_SESSION['user_id'] = $row['user_id']; //using this session we used user unique_id in other php file
                        $_SESSION['unique_id'] = $row['unique_id'];
                        echo "SUCCESS";
                    }
                }else{
                    echo "Email or Password is incorrect";
                }
        }else{
            echo "Account is not registered";
        }
    }else{
        echo "ALL INPUT FIELDS ARE REQUIRED";
    }
?>