<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <h1>User Login</h1>
    </header>

    <main>
        <form action="login.php" method="post"> <!-- POST request to login.php -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit">Login</button>
            </div>

            <p>Don't have an account? <a href="register_user.php">Register here</a></p> <!-- Link to registration form -->
        </form>
    </main>
</body>
</html>
