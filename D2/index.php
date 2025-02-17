<?php
$file = file_get_contents("data.json");
$data = json_decode($file, true);

$messageSend = [];
$messageRecv = [];
$characterSend = [];
$characterRecv = [];

foreach ($data["messages"] as $message) {
    if ($message["from"] == "Fahmi") {
        array_push($characterSend, strlen($message["text"]));
        array_push($messageSend, $message["text"]);
    } else {
        array_push($characterRecv, strlen($message["text"]));
        array_push($messageRecv, $message["text"]);
    }
}

// top 5 sent words
$words = [];
foreach ($messageSend as $message) {
    foreach (explode(" ", $message) as $word) {
        $word = str_replace(".", "", $word);
        $word = str_replace("?", "", $word);
        $word = str_replace("!", "", $word);
        $word = str_replace(",", "", $word);
        array_push($words, $word);
    }
}
$words = array_count_values($words);
$sort = arsort($words);
$words = array_slice($words, 0, 5);

// total sent and recv
$totalSend = count($messageSend);
$totalRecv = count($messageRecv);

// average char sent and recv
$avgSend = floor(array_sum($characterSend) / count(array_filter($characterSend)));
$avgRecv = floor(array_sum($characterRecv) / count(array_filter($characterRecv)));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Analytics</title>
</head>

<body>
    <ul>
        <li>

            Top 5 sent words
            <ul>
                <?php foreach ($words as $key => $value): ?>
                    <li>
                        <?php echo $key . "(" . $value . ")" ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </li>

        <li>Total message sent: <?php echo $totalSend ?></li>
        <li>Total message recv: <?php echo $totalRecv ?></li>
        <li>Average character sent: <?php echo $avgSend ?></li>
        <li>Average character recv: <?php echo $avgRecv ?></li>
    </ul>
</body>

</html>