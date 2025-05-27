<!-- HOMEPAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Newsfeed</title>
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css"> <!--font awesome icons-->
</head>
<body class="align-items-center m-0 p-0">
    <div class="container-fluid p-0">
            <!-- HEADER -->
        <header class="header position-sticky px-3">
            <div class="header-container row justify-content-between align-items-center">
                <!-- LOGO AND NAME -->
                <div class="logo-container d-flex col-md-4 mt-6">
                    <img src="assets/synchrolight-logo.png" alt="logo" class="mt-1 mx-3">
                    <h1 class="h3 align-items-center mt-4 pt-1 mx-2">SynchroLight</h1>
                </div>
                <!-- NAVBAR LINKS ICONS -->
                <div class="navbar-container justify-content-end col-md-6 p-0 overflow-hidden">
                    <nav class="navbar d-flex mt-3 mx-3 justify-content-end gap-3">
                        <!-- HOME ICON LINK -->
                        <a href=""  title="Home" class="nav-link text-decoration-none"><i class="fa-solid fa-house fs-4 my-3 mx-2"></i></a>
                        <!-- LOGIN PAGE LINK -->
                        <a href="login.php" title="Log In" class="nav-link text-decoration-none"><i class="fa-solid fa-arrow-right-to-bracket fs-4 my-3 mx-2"></i></a>
                        <!-- SIGNUP PAGE LINK -->
                        <a href="signup.php" title="Sign Up" class="nav-link text-decoration-none"><i class="fa-solid fa-pen-to-square fs-4 my-3 mx-2"></i></a>
                    </nav>
                </div>
            </div>
        </header>
        <!-- HERO SECTION & SECTION ABOUT SOCIAL MEDIA -->
        <div class="main d-flex row vw-100">
            <!-- LEFT INTRO SECTION  -->
            <div class="intro col-md-6">
                <div class="intro-img">
                    <img src="assets/synchrolight-logo.png" alt="">
                </div>
                <div class="intro-txt">
                    <h1 class="intro-title mb-3">Synchro<span>Light</span></h1>
                    <p class= "fw-bold fs-4 m-0">Feel the beat, See the light </p>
                    <p> and sync with your k-pop friends
                    on SynchroLight.</p>  
                </div>
            </div>
            <!-- RIGHT SLIDER AND BUTTONS SECTION -->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                <div class="slider position-relative overflow-hidden rounded shadow">
                    <!-- SLIDES CONTAINER -->
                    <div class="slides d-flex transition">
                        <!-- IMAGES-->
                        <div class="slide w-100 d-flex justify-content-center align-items-center bg-black">
                            <img src="assets/LANDINGPAGE.png" class="img-fluid rounded" alt="">
                        </div>
                        <div class="slide w-100 d-flex justify-content-center align-items-center bg-black">
                            <img src="assets/SIGNUP.png" class="img-fluid rounded" alt="">
                        </div>
                        <div class="slide w-100 d-flex justify-content-center align-items-center bg-black">
                            <img src="assets/LOGIN.png" class="img-fluid rounded" alt="">
                        </div>
                        <div class="slide w-100 d-flex justify-content-center align-items-center bg-black">
                            <img src="assets/OTP-VERIFICATION.png" class="img-fluid rounded" alt="">
                        </div>
                        <div class="slide w-100 d-flex justify-content-center align-items-center bg-black">
                            <img src="assets/NEWSFEED.png" class="img-fluid rounded" alt="">
                        </div>
                        <div class="slide w-100 d-flex justify-content-center align-items-center bg-black">
                            <img src="assets/VIEW-POST.png" class="img-fluid rounded" alt="">
                        </div>
                        <div class="slide w-100 d-flex justify-content-center align-items-center bg-black">
                            <img src="assets/HASHTAG-DASHBOARD.png" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    <!-- DOT NAVIGATION TO SWITCH SLIDES -->
                    <div class="dots d-flex justify-content-center position-absolute bottom-0 start-50 translate-middle-x mb-2">
                        <span class="dot mx-1" onclick="showSlide(0)"></span>
                        <span class="dot mx-1" onclick="showSlide(1)"></span>
                        <span class="dot mx-1" onclick="showSlide(2)"></span>
                        <span class="dot mx-1" onclick="showSlide(3)"></span>
                        <span class="dot mx-1" onclick="showSlide(4)"></span>
                        <span class="dot mx-1" onclick="showSlide(5)"></span>
                        <span class="dot mx-1" onclick="showSlide(6)"></span>
                    </div>
                </div>
                <!-- LOGIN AND SIGNUP BUTTONS -->
                <div class="buttons pt-5 text-center align-items-center">
                    <a class="login-btn me-3 p-3 fw-bold" href="login.php">Log In</a>
                    <a class="signup-btn ms-3 p-3 fw-bold" href="signup.php">Sign Up</a>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <footer class="footer justify-content-start align-content-end m-0">
            <p class="text-center m-0">&copy; SynchroLight 2025 &bull; TEAM VUE &bull; Abellera &bull; Dausen &bull; Gironella &bull; Paulo </p>
        </footer>
    
    </div>
    <script src="js/slider.js"></script>
</body>
</html>
