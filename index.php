<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "root"; // Default XAMPP password is usually empty
$dbname = "parking_system"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $rfid = $_POST['rfid'];
    $vehicle_type = $_POST['vehicle'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO registrations (name, rfid, vehicle_type) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $rfid, $vehicle_type);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
                alert('Registration successful!');
                window.location.href = 'index_web.php'; // Redirect to registration form
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href = 'index_web.php'; // Redirect back to registration form
              </script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
