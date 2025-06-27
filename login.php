<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session

// Database connection parameters
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password is usually empty
$dbname = "parking_system"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true; // Set session variable
            header("Location: dashboard.php"); // Redirect to the main page
            exit;
        } else {
            echo "<script>alert('Invalid username or password.'); window.location.href = 'login_user.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href = 'login_user.php';</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
