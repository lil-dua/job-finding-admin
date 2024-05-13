<?php

// Database credentials
$servername = "localhost"; // XAMPP default server name
$username = "root"; // XAMPP default MySQL username
$password = ""; // XAMPP default MySQL password
$database = "job_finding_app"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>