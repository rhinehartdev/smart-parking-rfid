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
    $name = $_POST['name'];
    $rfid = $_POST['rfid'];
    $vehicle_type = $_POST['vehicle_type'];

    // Update the registration in the database
    $sql = "UPDATE registrations SET name='$name', rfid='$rfid', vehicle_type='$vehicle_type' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registration updated successfully.";
    } else {
        echo "Error updating registration: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
