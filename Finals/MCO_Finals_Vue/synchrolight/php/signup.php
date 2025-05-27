<?php 
    // Handles user signup: validates inputs, checks username/email uniqueness, verifies password length and match, inserts new user into DB, and returns success or error messages.

    // Starts a new session/resumes the existing one.
    // This must be called before any output is sent to the browser.
    // It allows to store and access session variables across multiple pages.
    session_start();
    include_once "config.php";
    // Sanitizes the inputs to prevent SQL injection
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    //mysqli_query sends a SQL query to the database
    $check_username = mysqli_query($conn, "SELECT username FROM users WHERE username = '{$username}'");
    if(!empty($fname) && !empty($lname) && !empty($username) && !empty($email) && !empty($password)){
        //check username already exist in db or not
        if(mysqli_num_rows($check_username) === 0){
            //CHECK IF USER EMAIL IS VALID OR NOT
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if email is valid
                //check email already exist in db or not
                $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($sql) > 0){ //checks if email already exist
                    echo "$email already exist";
                }else{
                    if(strlen($password) >= 8){ //checks if password has 8 minimum characs
                        if($password === $confirm_password){ //confirm passwords 
                            $status = "Offline now"; // when signed up, user status will be active
                            $random_id = rand(time(), 10000000); //creating random id for user

                            //insert all user data inside table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, username, email, password)
                                                        VALUES ({$random_id}, '{$fname}', '{$lname}', '{$username}','{$email}', '{$password}')");
                            if($sql2){//if these data inserted
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
                                // Check if the query ($sql3) returned any rows (meaning the user exists)
                                if(mysqli_num_rows($sql3) > 0){
                                    // Fetch the user data from the query result as an associative array
                                    // An associative array stores data with named keys so you can access values using their names instead of numbers.
                                    $row = mysqli_fetch_assoc($sql3);
                                    // Store the user's ID in the session to keep them logged in
                                    echo "SUCCESS";
                                }
                            }else{
                                echo "Something went wrong";
                            }
                        }else{
                            echo "Passwords do not match";
                        }
                    }else{
                         echo "Password must be at least 8 characters long";
                    }
                }
            }else{
                echo "$email is not a valid email";
            }
        }else{
            echo "Username taken. Please choose another one.";
        }
    }else{
        echo "ALL INPUT FIELDS ARE REQUIRED";
    }
?>