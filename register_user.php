<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <h1>User Registration</h1>
    </header>

    <main>
        <form action="register.php" method="post"> <!-- POST request to register.php -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit">Register</button>
            </div>

            <p>Already have an account? <a href="login_user.php">Login here</a></p> <!-- Link to login form -->
        </form>
    </main>
 
    
</body>
</html>
