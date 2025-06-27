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

    // Fetch the existing data
    $sql = "SELECT * FROM registrations WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "No registration found.";
        exit;
    }

    // Display the edit form
    ?>
    <form action="update_registration.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required></label>
        <label>RFID Tag: <input type="text" name="rfid" value="<?php echo $row['rfid']; ?>" required></label>
        <label>Vehicle Type:
            <select name="vehicle_type" required>
                <option value="two-wheeler" <?php if($row['vehicle_type'] == 'two-wheeler') echo 'selected'; ?>>Two-Wheeler</option>
                <option value="three-wheeler" <?php if($row['vehicle_type'] == 'three-wheeler') echo 'selected'; ?>>Three-Wheeler</option>
                <option value="four-wheeler" <?php if($row['vehicle_type'] == 'four-wheeler') echo 'selected'; ?>>Four-Wheeler</option>
            </select>
        </label>
        <button type="submit">Update Registration</button>
    </form>
    <?php
}

// Close connection
$conn->close();
?>
