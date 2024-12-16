<?php
// Database connection variables
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // leave empty if you're using default settings
$dbname = "FoodSaverDB"; // the database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
