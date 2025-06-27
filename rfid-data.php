<?php
// Get RFID data from ESP32
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rfid = $_POST['rfid'];

    // Here you can store the RFID in a database or display it
    // For this example, we'll just display the RFID tag
    echo "RFID Tag Received: " . htmlspecialchars($rfid);
}
?>
