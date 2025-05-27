<!-- NEWSFEED/ MAIN FEED -->
<?php 
    session_start();
    include_once "php/config.php";
    if(!isset($_SESSION['user_id'])){
        header("location: index.php"); //REDIRECTS TO LOGIN PAGE IF USER NOT LOGGED IN
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Newsfeed</title>
    <link rel="stylesheet" href="css/feed.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body class="align-items-center">
    <div class="container-fluid p-0">
            <!-- HEADER -->
        <header class="header position-sticky px-3">
            <div class="header-container row align-items-center">
                <!-- LOGO AND NAME -->
                <div class="logo-container d-flex col-md-6 mt-3">
                    <img src="assets/synchrolight-logo.png" alt="logo" class="mt-1 mx-3">
                    <h1 class="h3 mt-4 mx-2">SynchroLight</h1>
                </div>
                <!-- NAVBAR LINKS ICONS -->
                <div class="navbar-container col-md-6 p-0 justify-content-end overflow-hidden">
                    <nav class="navbar d-flex mt-3 justify-content-end gap-3">
                        <a href="#" class="nav-link text-decoration-none" title="Home"><i class="fa-solid fa-house fs-4 my-3 mx-2"></i></a>
                        <a href="#" class="nav-link text-decoration-none" title="Notifications"><i class="fa-solid fa-bell fs-3 my-3 mx-2"></i></a>
                        <a href="#" class="nav-link text-decoration-none" title="Messages"><i class="fa-solid fa-message fs-4 my-3 mx-2"></i></a>
                        <a href="#" class="nav-link text-decoration-none" title="Profile"><i class="fa-solid fa-user fs-4 my-3 mx-2"></i></a>
                        <a href="php/logout.php?logout_id=<?php echo $_SESSION['user_id']; ?>" class="nav-link text-decoration-none" title="Logout"><i class="fa-solid fa-arrow-right-from-bracket fs-4 my-3 mx-2"></i></a>
                    </nav>
                </div>
            </div>
        </header>
        <div class="main-content row vw-100 align-items-start">
            <!-- LEFT SIDEBAR -->
            <div class="left-sidebar col-md-3">
                <div class="p-3 ps-4 w-100">
                    <!-- NAV IN UNORDERED LIST -->
                    <ul class="nav flex-column gap-0">
                        <li class="nav-item fs-5 p-2 my-1">
                            <a href="#" class="text-decoration-none"><i class="fa-solid fa-house fs-4 my-3 mx-2"></i> Home</a>
                        </li>
                        <li class="nav-item fs-5 p-2 my-1">
                            <a href="#" class="text-decoration-none"><i class="fa-solid fa-bell fs-3 my-3 mx-2"></i> Notifications</a>
                        </li>
                        <li class="nav-item fs-5 p-2 my-1">
                            <a href="#" class="text-decoration-none"><i class="fa-solid fa-message fs-4 my-3 mx-2"></i> Messages</a>
                        </li>
                        <li class="nav-item fs-5 p-2 my-1">
                            <a href="#" class="text-decoration-none"><i class="fa-solid fa-user fs-4 my-3 mx-2"></i> Profile</a>
                        </li>
                        <li class="nav-item fs-5 p-2 my-1">
                            <a href="php/logout.php?logout_id=<?php echo $_SESSION['user_id']; ?>" class="text-decoration-none"><i class="fa-solid fa-arrow-right-from-bracket fs-4 my-3 mx-2"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- NEWSFEED -->
            <div class="main col-md-6 d-flex flex-column align-items-center">
                <div class="px-3 justify-content-center align-items-center w-75">
                    <!-- POST BOX- WHERE USER WILL POST -->
                    <div class="postbox-area my-3">
                        <div class="post-box p-3 pe-4 w-100">
                            <div class="photo d-flex mt-4 align-content-center justify-content-center">
                                <img src="assets/myphoto.jpg" alt="photo" id="your-photo" class="">
                            </div>
                            <form action="#" method="POST" class="typing-area flex-grow-1 mt-3 w-100" enctype="multipart/form-data">
                                <textarea name="content" class="form-control textarea pt-3 border-0" rows="2" placeholder="What's going on?" required></textarea>
                                <label class="image-upload mt-2">
                                    <i class="fas fa-camera image-upload-icon"></i>
                                    <input type="file" name="image" accept="image/*"> <!-- IMAGE UPLOAD -->
                                </label>
                                <div class="post-button d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mt-3 px-4">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- NEWSFEED POSTS -->
                <div class="nf-post w-75 px-3 mt-4">
                    <div class="posts-list d-flex flex-column">
                        <!-- POSTS WILL BE LOADED HERE DYNAMICALLY -->
                    </div>
                </div>
            </div>
            <!-- RIGHT SIDEBAR -->
            <div class="right-sidebar col-md-3 justify-content-center">
                <!-- USERS LIST -->
                <div class="w-100 px-4 pt-4">
                    <div class="fr d-flex justify-content-between m-0">
                        <h6>USERS</h6>
                    </div>
                    <div class="users-list mt-4">
                        <!-- USER ENTRIES -->
                         <?php include "php/status.php"; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer justify-content-start w-25 mt-5">
            <p class="text-center pt-3">&copy; SynchroLight 2025 </p>
        </footer>
    </div>
    <!-- POST MODAL FOR VIEWING POSTS-->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mh-75">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="postModalLabel">Post Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="user d-grid">
                <img src="assets/myphoto.jpg" alt="" class="user-img">
                <div class="user-details">
                    <div class="details d-flex flex-column">
                        <h5 id="modalUsername" class="my-1 fw-bold"></h5>
                        <p id="modalTime" class="text-secondary small"></p>
                    </div>
                </div>
            </div>
                <p id="modalContent"></p>
            <img id="modalImage" src="" alt="Post image" class="img-fluid d-none">
        </div>
        </div>
    </div>
    </div>
    <script src="js/modal.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/feed.js"></script>
</body>
</html>
