<!-- SIGN UP OAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up to SynchroLight Chat App</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="d-flex align-items-center justify-content-center mvh-100 overflow-hidden">
    <!-- BACK BUTTON -->
    <a href="index.php" class="btn btn-light position-absolute top-0 start-0 m-3">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
    <div class="wrapper p-2" style="transform: scale(0.85);">
        <section class="form signup py-3">
            <!-- HEADER WITH LOGO AND TITLE -->
            <header class="text-center">
                 <img src="assets/synchrolight-logo.png" alt="">
                <h3 class="title mt-3">SynchroLight Chat App</h3>
            </header>
            <!-- SIGNUP FORM -->
            <form action="" method="POST" class="form-signup m-3">
                <!-- ERROR MESSAGE CONTAINER -->
                <div class="error-txt"></div>
                <!-- FIRST AND LAST NAME FIELDS -->
                <div class="name-details d-flex">
                    <div class="field input form-floating me-1">
                        <input type="text" placeholder="First Name" class="form-control" name="fname" required>
                        <label for="fname" class="text-secondary">First Name</label>
                    </div>
                    <div class="field input form-floating ms-1">
                        <input type="text" placeholder="Last Name" class="form-control"name="lname" required>
                        <label for="lname" class="text-secondary">Last Name</label>
                    </div>
                </div>
                <!-- USERNAME FIELD -->
                <div class="field input form-floating">
                    <input type="text" placeholder="Enter your username" class="form-control" name="username" required>
                    <label for="username" class="text-secondary">Username</label>
                </div>
                <!-- EMAIL FIELD -->
                <div class="field input form-floating">
                    <input type="text" placeholder="Enter your email" class="form-control" name="email" required>
                    <label for="email_input" class="text-secondary">Email Address</label>
                </div>
                <!-- PASSWORD FIELD -->
                <div class="field input form-floating">
                    <input type="password" placeholder="Enter your new password" class="form-control" name="password" id="password" required>
                    <label for="password" class="text-secondary">Password</label>
                    <i class="fas fa-eye position-absolute toggle-password" id="togglePassword" style="top: 50%; right: 20px; transform: translateY(-50%); cursor: pointer;" data-target="password"></i>
                </div>
                <!-- CONFIRM PASSWORD FIELD -->
                <div class="field input form-floating">
                    <input type="password" placeholder="Enter your new password" class="form-control" name="confirm_password" id="confirm_password" required>
                    <label for="confirm_password" class="text-secondary">Confirm Password</label>
                    <i class="fas fa-eye position-absolute toggle-password" id="togglePassword" style="top: 50%; right: 20px; transform: translateY(-50%); cursor: pointer;" data-target="confirm_password"></i>
                </div>
                <!-- SUBMIT BUTTON -->
                <div class="field button">
                    <input type="submit" value="Sign Up">
                </div>
            </form>
            <!-- LINK TO LOGIN PAGE -->
            <div class="link text-center">Already Have Account? <a href="login.php">Login</a></div>
        </section>
    </div>
    <script src="js/signup.js"></script>
</body>
</html>
