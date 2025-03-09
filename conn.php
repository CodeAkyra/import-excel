<?php
// Secure database connection (conn.php)

// Enable strict error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Load environment variables
$dotenv = parse_ini_file(__DIR__ . '/.env');

$server = $dotenv['DB_SERVER'];
$username = $dotenv['DB_USERNAME'];
$password = $dotenv['DB_PASSWORD'];
$dbname = $dotenv['DB_NAME'];

try {
    // Create a new database connection
    $conn = new mysqli($server, $username, $password, $dbname);
    $conn->set_charset("utf8mb4"); // Secure character encoding

} catch (Exception $e) {
    // Log error instead of displaying it
    error_log("Database Connection Error: " . $e->getMessage());
    exit('Database connection failed.'); // Prevents error exposure
}


// eto daw pinaka secured na db connection sabi ni gpt XD

// create new file ".env"
// insert the folling inside .env
// DB_SERVER= localhost
// DB_USERNAME= root
// DB_PASSWORD=
// DB_NAME= (db_name)
