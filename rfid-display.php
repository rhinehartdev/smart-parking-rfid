<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFID Reader Display</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the existing CSS file -->
</head>
<body>
    <header>
        <h1>Latest RFID Tag:</h1>
        <nav>
            <a href="index_web.php">Back to Registration Form</a>
        </nav>
    </header>

    <main>
        <div class="rfid-display">
            <p id="rfidDisplay">Waiting for RFID data...</p>
        </div>
    </main>

    <script>
        function fetchRFIDData() {
            fetch('rfid-data.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('rfidDisplay').innerHTML = data;
                })
                .catch(error => console.error('Error fetching RFID data:', error));
        }

        // Refresh the RFID data every 5 seconds
        setInterval(fetchRFIDData, 5000);
    </script>
    <div class="return-button">
        <a href="dashboard.php" class="btn">Return to Dashboard</a>
    </div>
    
</body>
</html>
