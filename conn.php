<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "import-excel";


$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}
