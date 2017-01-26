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

$sql = "CREATE TABLE Victims ( 
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL, 
lastname VARCHAR(30) NOT NULL, 
trace MEDIUMBLOB NOT NULL, 
quote VARCHAR(1000) NOT NULL )";

if ($conn->query($sql) == TRUE) {
    echo "Table Victims created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
