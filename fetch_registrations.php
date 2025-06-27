<?php
// Database connection
$servername = "localhost"; // or your server name
$username = "root"; // replace with your database username
$password = "root"; // replace with your database password
$dbname = "parking_system"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get vehicle type filter if any
$vehicle_type = isset($_GET['vehicle_type']) ? $_GET['vehicle_type'] : 'all';

// Prepare the SQL query based on the vehicle type
if ($vehicle_type === 'all') {
    $sql = "SELECT * FROM registrations";
} else {
    $sql = "SELECT * FROM registrations WHERE vehicle_type = '$vehicle_type'";
}

$result = $conn->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['rfid']) . "</td>";
        echo "<td>" . htmlspecialchars($row['vehicle_type']) . "</td>";
        echo "<td>
                <form action='edit_registration.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <button type='submit' class='edit-btn'>Edit</button>
                </form>
                <form action='delete_registration.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <button type='submit' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this registration?\")'>Delete</button>
                </form>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No registrations found.</td></tr>";
}

// Close connection
$conn->close();
?>
