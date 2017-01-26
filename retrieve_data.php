<?php
$db_url = "mysql://b7f67a33c52809:fbca860c@us-cdbr-iron-east-04.cleardb.net/heroku_c0f1dc018862863?reconnect=true";
$url = parse_url($db_url);

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$select =
    "SELECT * FROM Victims"; 

$result = $conn->query($select);

if ($result) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    print_r($rows);
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
