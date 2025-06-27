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
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $new_username, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
                alert('Registration successful!');
                window.location.href = 'login_user.php'; // Redirect to login form
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href = 'register_user.php'; // Redirect back to registration form
              </script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
