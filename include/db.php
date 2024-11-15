<?php
// Database credentials
$host = "localhost";      // Host name
$username = "root";       // Database username (default is "root" for XAMPP/MAMP)
$password = "";           // Database password (leave empty if using default XAMPP/MAMP)
$dbname = "ess";   // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
