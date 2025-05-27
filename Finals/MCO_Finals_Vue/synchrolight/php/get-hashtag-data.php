<?php
//  RETURNS DAILY HASHTAG USAGE COUNTS FROM THIS MONTH AS JSON
include_once "config.php";

if (!isset($_GET['tag'])) {
    http_response_code(400);
    echo json_encode(["error" => "No tag provided"]);
    exit;
}

$tag = mysqli_real_escape_string($conn, $_GET['tag']);

// 1. Get first day of current month
$start_date = date('Y-m-01');

// 2. Get last post date with this hashtag
$result = mysqli_query($conn, "
    SELECT MAX(DATE(created_at)) AS latest
    FROM hashtags
    WHERE hashtag = '$tag'
");

$row = mysqli_fetch_assoc($result);
$end_date = $row['latest'] ?? date('Y-m-d');

// 3. Create a range of dates
$dates = [];
$period = new DatePeriod(
    new DateTime($start_date),
    new DateInterval('P1D'),
    (new DateTime($end_date))->modify('+1 day') // inclusive end date
);

foreach ($period as $date) {
    $dates[$date->format('Y-m-d')] = 0;
}

// 4. Fetch hashtag post counts
$sql = "
    SELECT DATE(created_at) as date, COUNT(*) as count
    FROM hashtags
    WHERE hashtag = '$tag'
    GROUP BY DATE(created_at)
";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $date = $row['date'];
    if (isset($dates[$date])) {
        $dates[$date] = (int)$row['count'];
    }
}

// 5. Convert to array format for JSON
$data = [];
foreach ($dates as $date => $count) {
    $data[] = ['date' => $date, 'count' => $count];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
