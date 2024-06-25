<?php
// PHP code for login functionality goes here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MuscleFreak - Login</title>
    <link rel="stylesheet" href="./pages/style/login.css">
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter your email">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">

            <div class="forgot-password">
                <a href="#">Lupa Password?</a>
            </div>

            <input type="checkbox" id="keep-me-logged-in" name="keep-me-logged-in">
            <label for="keep-me-logged-in">Keep Me Logged In</label>

            <button type="submit">LOG IN</button>

            <div class="new-to-musclefreak">
                <p>New to MuscleFreak? <a href="#">Join Us Now</a></p>
            </div>
        </form>
    </div>
</body>
</html>