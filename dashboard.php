<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <h1>User Dashboard</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index_web.php">Customers Registration</a></li>
            <li><a href="register.html">Register</a></li>
            <li><a href="rfid-display.html">RFID Display</a></li>
            <li><a href="view_registrations.html">View Registrations</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <div class="welcome-message">
            <h2>Welcome to your Dashboard!</h2>
            <p>From here, you can navigate to different parts of the system.</p>
        </div>
        
        <div class="card-container">
            <div class="card">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.html">Customers Registration</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="rfid-display.html">RFID Display</a></li>
                    <li><a href="view_registrations.html">View Registrations</a></li>
                </ul>
            </div>

            <div class="card">
                <h3>Statistics</h3>
                <p>Total Registrations: <!-- PHP code to fetch count from database can be added here --></p>
            </div>

            <div class="card">
                <h3>Recent Activity</h3>
                <p>Latest Registration: <!-- PHP code to fetch latest registration can be added here --></p>
            </div>
        </div>
    </main>
    
    <footer>
        <p>&copy; 2024 Parking System. All rights reserved.</p>
    </footer>
</body>
</html>
