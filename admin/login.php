<?php
include_once('../auth/connection.php');
include_once('../auth/auth_functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate the admin login credentials
        if (validateAdminLogin($username, $password)) {
            // Redirect to the admin dashboard upon successful login
            header('Location: dashboard.php');
            exit();
        } else {
            $error_message = 'Invalid username or password.';
        }
    } elseif (isset($_POST['signup'])) {
        // Redirect to the login page
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="admin-styles.css">
</head>

<body>
    <div class="login-container">
        <h2>Admin Login</h2>

        <?php if (isset($error_message)) : ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit" name="login">Login</button>
        </form>

        <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
    </div>
</body>

</html>
