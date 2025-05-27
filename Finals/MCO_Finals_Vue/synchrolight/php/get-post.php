<!-- GET POST -->
<!-- Fetches all posts with user info from the database, formats content by shortening text and linking hashtags, then generates HTML to display posts with like, comment, share, and view buttons; only runs if user is logged in, otherwise redirects. -->
<?php
session_start();
if (isset($_SESSION['user_id'])) { // CHECK IF USER IS LOGGED IN
    include_once "config.php";
    $output = "";

    function linkifyHashtags($text) {
        return preg_replace(
            '/#([\w-]+)/',
            '<a href="hashtag.php?tag=$1" class="hashtag text-primary">#$1</a>', // CONVERT #HASHTAGS INTO LINKS
            $text
        );
    }

    function shortenText($text, $maxLength = 50) {
        $text = html_entity_decode($text);     // CONVERT HTML ENTITIES TO CHARACTERS (E.G., &#039; → ')
        $text = strip_tags($text);             // REMOVE ANY HTML TAGS FROM TEXT
        if (strlen($text) > $maxLength) {
            $text = substr($text, 0, $maxLength) . '...'; // TRIM TEXT IF TOO LONG
        }
        return $text; // RETURN SHORTENED TEXT
    }

    $sql = "SELECT posts.*, users.username FROM posts 
            LEFT JOIN users ON users.user_id = posts.user_id 
            ORDER BY posts.post_id DESC"; // FETCH POSTS WITH USERNAMES, NEWEST FIRST

    // Executes the SQL query stored in the $sql variable using the database connection $conn.
    // The result is stored in the $query variable, which can be used to check success or fetch data.
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) { // Loops through each row of the query result, storing it as an associative array in $row with column names as keys.
            $output .= '
            <div class="post-container d-flex justify-content-center align-items-center mb-3">
                <div class="post-content p-3 pe-4 w-100">
                    <div class="photo m-auto">
                        <img src="assets/myphoto.jpg" alt="photo"> <!-- STATIC USER PHOTO -->
                    </div>
                    <div class="post-user d-flex flex-column justify-content-center align-items-start">
                        <span class="username fw-bold">@' . htmlspecialchars($row['username']) . '</span>
                        <p class="time m-0 text-secondary small">' . htmlspecialchars($row['time']) . '</p> <!-- POST TIME -->
                    </div>
                    <div class="post-details">
                        <p class="details small">' . linkifyHashtags(shortenText($row['content'], 50)) . '</p>'; // SHORTEN AND LINKIFY CONTENT

            if (!empty($row['img_path'])) {
                $output .= '<img src="php/' . htmlspecialchars($row['img_path']) . '" alt="Post Image" class="post-img mt-2">'; // DISPLAY POST IMAGE IF EXISTS
            }

            $output .= '
                    </div>
                    <div class="content-buttons d-flex flex-row mb-3">
                        <div class="social-buttons">
                                <button class="btn btn-primary mt-1 px-3"><i class="fa-solid fa-heart me-2"></i>Like</button>
                                <button class="btn btn-primary mt-1 px-3"><i class="fa-solid fa-comment me-2"></i>Comment</button>
                                <button class="btn btn-primary mt-1 px-3"><i class="fa-solid fa-share me-2"></i>Share</button>
                                <button 
                                        class="btn btn-primary mt-1 ms-3 px-3" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#postModal"
                                        data-username="' . htmlspecialchars($row['username']) . '"
                                        data-content="' . htmlspecialchars($row['content']) . '"
                                        data-img="' . htmlspecialchars($row['img_path']) . '"
                                        data-time="' . htmlspecialchars($row['time']) . '">
                                        <i class="fa-solid fa-eye"></i> <!-- VIEW POST DETAILS -->
                                </button>
                        </div>
                    </div>
                </div>
            </div>';
        }
        echo $output; // OUTPUT ALL POSTS
    }
} else {
    header("Location: ../index.php"); // REDIRECT IF NOT LOGGED IN
}
?>
