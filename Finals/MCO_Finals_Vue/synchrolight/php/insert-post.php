<!-- INSERT POST -->
<!-- Handles creating a new post by logged-in user: saves text and optional image to database, extracts hashtags from content and stores them, then returns success or error message. -->
<?php
session_start();
if (isset($_SESSION['user_id'])) { // CHECK IF USER IS LOGGED IN
    include_once "config.php";

    $user_id = $_SESSION['user_id'];
    //mysqli_real_escape_string is a PHP function used to sanitize input data (like ' " \) before using it in a SQL query.
    // This line safely gets the 'content' input from a form and escapes special characters to prevent SQL injection before using it in a database query.
    $content = mysqli_real_escape_string($conn, $_POST['content']); // ESCAPE POST CONTENT
    $time = date("Y-m-d H:i:s"); // GET CURRENT TIME
    $img_path = '';

    // Check if an image was uploaded
    if (!empty($_FILES['image']['name'])) { // IF IMAGE FILE EXISTS
        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $upload_path = 'assets/uploads/';
        $img_folder = $upload_path . time() . '_' . basename($img_name); // CREATE UNIQUE FILE NAME

        // Create uploads directory if it doesn't exist
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true); // CREATE FOLDER WITH PERMISSIONS
        }

        if (move_uploaded_file($tmp_name, $img_folder)) { // MOVE FILE TO UPLOAD FOLDER
            $img_path = mysqli_real_escape_string($conn, $img_folder); // ESCAPE IMAGE PATH FOR DB
        } else {
            echo "Failed to upload image."; // ERROR IF IMAGE NOT MOVED
            exit;
        }
    }

    if (!empty($content) || !empty($img_path)) { // IF CONTENT OR IMAGE EXISTS
        $sql = mysqli_query($conn, "INSERT INTO posts(user_id, content, img_path, time) VALUES('$user_id', '$content', '$img_path', '$time')");
        
        if ($sql) {
            // This gets the ID number of the most recent item you just added to the database (like a new post).
            // You can use this ID to keep track of that specific post later.
            $post_id = mysqli_insert_id($conn); // GET ID OF INSERTED POST

            // This looks through the $content text and finds all the words that start with a # (hashtags).
            // It saves all those hashtags it finds into the $matches variable.
            //preg_match_all is a PHP function that searches a string for all matches of a pattern (using regular expressions).
            preg_match_all('/#(\w+)/', $content, $matches); // FIND ALL HASHTAGS
            $hashtags = $matches[1]; // EXTRACT HASHTAGS WITHOUT #

            foreach ($hashtags as $tag) {
                $clean_tag = mysqli_real_escape_string($conn, $tag); // ESCAPE EACH TAG
                mysqli_query($conn, "INSERT INTO hashtags(post_id, user_id, hashtag) VALUES($post_id, $user_id, '$clean_tag')"); // SAVE TO DB
            }

            echo "Post added successfully"; // SUCCESS MESSAGE
        } else {
            echo "Error: " . mysqli_error($conn); // ERROR IF INSERT FAILS
        }
    } else {
        echo "Post content or image is required."; // IF BOTH CONTENT AND IMAGE ARE EMPTY
    }
} else {
    header("Location: ../login.php"); // REDIRECT IF NOT LOGGED IN
}
?>
