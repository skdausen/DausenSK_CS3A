<?php
// Fetches and displays the logged-in user and all other users with their names, usernames, and online/offline status in the users list.
include_once "config.php";

//Session
$current_user_id = $_SESSION['user_id'];
//User logged in
$you_query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$current_user_id}");
// Get all users except the logged-in one
$users_query = mysqli_query($conn, "SELECT * FROM users WHERE NOT user_id = {$current_user_id}");


if ($row = mysqli_fetch_assoc($you_query)) {
    $status_text = ($row['status'] == "Offline now") ? "Offline" : "Active now";
    $status_class = ($row['status'] == "Offline now") ? "text-secondary" : "text-success";
    //THIS WOULD BE DISPLAYED AT THE USERS-LIST DIV
    echo '
    <div class="user d-flex pb-3">
        <div class="photo me-3 align-content-center">
            <img src="assets/myphoto.jpg" alt="photo" class="m-0">
        </div>
        <div class="users">
            <span class="name m-0">' . $row['fname'] . ' ' . $row['lname'] . ' (You) </span>
            <p class="username text-secondary small m-0">@' . $row['username'] . '</p>
            <p class="user-status small m-0 ' . $status_class . '">' . $status_text . '</p>
        </div>
    </div>';
}

while ($row = mysqli_fetch_assoc($users_query)) {
    $status_text = ($row['status'] == "Offline now") ? "Offline" : "Active now";
    $status_class = ($row['status'] == "Offline now") ? "text-secondary" : "text-success";
    //THIS WOULD BE DISPLAYED AT THE USERS-LIST DIV
    echo '
    <div class="user d-flex pb-3">
        <div class="photo me-3 align-content-center">
            <img src="assets/myphoto.jpg" alt="photo" class="m-0">
        </div>
        <div class="users">
            <span class="name m-0">' . $row['fname'] . ' ' . $row['lname'] . '</span>
            <p class="username text-secondary small m-0">@' . $row['username'] . '</p>
            <p class="user-status small m-0 ' . $status_class . '">' . $status_text . '</p>
        </div>
    </div>';
}
?>
