<!-- LOGIN PAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to SynchroLight Chat App</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">
    <!-- BACK BUTTON -->
    <a href="index.php" class="btn btn-light position-absolute top-0 start-0 m-3">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
    <div class="wrapper">
        <section class="form login">
            <!-- HEADER WITH LOGO AND TITLE -->
            <header class="text-center">
                 <img src="assets/synchrolight-logo.png" alt="">
                <h3 class="title mt-3">SynchroLight Chat App</h3>
            </header>
            <!-- LOGIN FORM -->
            <form action="" method="POST" class="form-login">
                <!-- ERROR MESSAGE CONTAINER -->
                <div class="error-txt"></div>
                <!-- USERNAME INPUT FIELD -->
                <div class="field input form-floating">
                    <input type="text" placeholder="Enter your username" class="form-control" name="username" required>
                    <label for="username" class="text-secondary">Username</label>
                </div>
                <!-- PASSWORD INPUT FIELD -->
                <div class="field input form-floating">
                    <input type="password" placeholder="Enter your password" class="form-control" name="password" id="password" required>
                    <label for="password" class="text-secondary">Password</label>
                    <i class="fas fa-eye position-absolute" id="togglePassword" style="top: 50%; right: 20px; transform: translateY(-50%); cursor: pointer;"></i>
                </div>
                <!-- SUBMIT BUTTON -->
                <div class="field button">
                    <input type="submit" value="Login">
                </div>
            </form>
            <!-- LINK TO SIGNUP PAGE -->
            <div class="link text-center">Don't have an account? <a href="signup.php">Sign up</a></div>
        </section>
    </div>
    <script src="js/login.js"></script>
</body>
</html>
