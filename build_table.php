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

if ($conn->query("TRUNCATE TABLE Victims") == TRUE) {
    echo "Truncated table.\n";
}
else {
    echo "Error: " . $conn->error . "\n";
}

$jsmith = array(
    "firstname" => "john",
    "lastname" => "smith",
    "trace" => "jsmith.jpg",
    "quote" => "abcdefg",
    "event" => "xyz"
);

$jdoe = array(
    "firstname" => "jane",
    "lastname" => "doe",
    "trace" => "jdoe.jpg",
    "quote" => "hijklm",
    "event" => "xyz"
);

$jsmith2 = array(
    "firstname" => "john2",
    "lastname" => "smith2",
    "trace" => "jsmith2.jpg",
    "quote" => "theuheawoeihowiahr",
    "event" => "qrs"
);

$victims = array(
    "jsmith" => $jsmith,
    "jdoe" => $jdoe,
    "jsmith2" => $jsmith2
);

foreach ($victims as $v) {
    $insert = "INSERT INTO Victims (firstname, lastname, trace, quote, event) VALUES ("; 
    foreach ($v as $element) {
        $insert .= "'". $element . "', ";
    }
    $insert = substr($insert,0,-2);
    $insert .= ")";
    echo $insert . "\n";
    if ($conn->query($insert) == TRUE) {
        echo "Successful\n";
    }
    else {
        echo "Error: " . $conn->error . "\n";
    }
}

$conn->close();
?>