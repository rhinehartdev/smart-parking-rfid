<?php
// Database connection (same as before)
$servername = "localhost"; // or your server name
$username = "root"; // replace with your database username
$password = "root"; // replace with your database password
$dbname = "parking_system"; // replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Delete the registration from the database
    $sql = "DELETE FROM registrations WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registration deleted successfully.";
    } else {
        echo "Error deleting registration: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
