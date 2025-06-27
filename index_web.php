<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking System Registration Form</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Full height */
            font-family: Arial, sans-serif; /* Default font */
            background-color: #f4f4f4; /* Light background */
            margin: 0;
            padding: 20px;
        }

        header {
            background-color: #bfc9d3; /* Header color */
            color: white;
            padding: 20px;
            text-align: center;
        }

        main {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
            margin-bottom: 20px;
            flex: 1; /* Allow main to grow */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .return-button {
            margin: 20px 0;
            text-align: center;
        }

        .return-button .btn {
            padding: 10px 20px;
            background-color: #066106; /* Button color */
            color: white; /* Text color */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Transition effect */
        }

        .return-button .btn:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #007BFF; /* Footer color */
            color: white; /* Text color */
        }
    </style>
</head>
<body>
    <header>
        <h1>Parking System Registration Form</h1>
        <nav>
            <a href="rfid-display.php">View RFID Tag</a> <!-- Link to RFID display -->
        </nav>
    </header>

    <main>
        <form id="registrationForm" action="index.php" method="post"> <!-- Submit to register.php -->
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="rfid">RFID Tag:</label>
                <input type="text" id="rfid" name="rfid" required>
            </div>

            <div class="form-group">
                <label for="vehicle">Vehicle Type:</label>
                <select id="vehicle" name="vehicle">
                    <option value="two-wheeler">Two Wheeler</option>
                    <option value="three-wheeler">Three Wheeler</option>
                    <option value="four-wheeler">Four Wheeler</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </main>

    <div class="return-button">
        <a href="dashboard.php" class="btn">Return to Dashboard</a>
    </div> 

</body>
</html>
