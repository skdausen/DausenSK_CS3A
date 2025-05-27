<!-- HASHTAG PAGE/DASHBOARD -->
<!-- Displays posts with a specific hashtag from the URL, shows them on a page with a chart of hashtag usage over time, and converts hashtags in posts into clickable links. -->
<?php
include_once "php/config.php";

if (isset($_GET['tag'])) {
    $tag = mysqli_real_escape_string($conn, $_GET['tag']);

    $sql = "SELECT posts.*, users.username FROM posts 
            JOIN hashtags ON posts.post_id = hashtags.post_id
            JOIN users ON posts.user_id = users.user_id
            WHERE hashtags.hashtag = '$tag' ORDER BY posts.time DESC";

    $result = mysqli_query($conn, $sql);
} else {
    header("Location: feed.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>#<?php echo htmlspecialchars($tag); ?> Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hashtag.css">
</head>
<body>
    <div class="modal-style-container">
        <a href="feed.php" class="back-btn">&larr; Back to Feed</a>
        <h2>#<?php echo htmlspecialchars($tag); ?> Dashboard</h2>

        <canvas id="hashtagChart" height="150"></canvas>

        <h4 class="mt-4">Posts with #<?php echo htmlspecialchars($tag); ?></h4>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="card">
                <h5><?php echo htmlspecialchars($row['username']); ?></h5>
                <p>
                    <?php echo nl2br(
                        preg_replace(
                            '/#(\w+)/',
                            '<a href="hashtag.php?tag=$1" class="hashtag">#$1</a>',
                            ($row['content'])
                        )
                    ); ?>
                </p>
                <small class="text-muted"><?php echo htmlspecialchars($row['time']); ?></small>
            </div>
        <?php endwhile; ?>
    </div>
    <script>
        const tag = "<?php echo $tag; ?>";

        fetch("php/get-hashtag-data.php?tag=" + tag)
        .then(res => res.json())
        .then(data => {
            const labels = data.map(entry => entry.date);
            const values = data.map(entry => entry.count);

            new Chart(document.getElementById("hashtagChart"), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: `#${tag}`,
                        data: values,
                        borderColor: '#0c6192',
                        borderWidth: 2,
                        fill: true,
                        backgroundColor: 'rgba(253, 253, 150, 0.9)',
                        tension: 0.3,
                        pointRadius: 4,
                        pointBackgroundColor: '#0c6192'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 12 } }
                        },
                        y: {
                            beginAtZero: true,
                            grid: { display: false },
                            ticks: {
                                stepSize: 1,
                                font: { size: 12 }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
