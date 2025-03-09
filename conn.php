<?php


$server = "localhost";
$username = "root";
$password = "";
$dbname = "import-excel";


$conn = new mysqli($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    echo "Success!";
}
