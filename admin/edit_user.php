<?php
// Include authentication check and necessary files
include_once('../auth/auth_functions.php');
include_once('../auth/connection.php');

// Check if the user is authenticated, otherwise redirect to login
if (!isAuthenticated()) {
    header('Location: login.php');
    exit();
}

// Check if the user ID is provided in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch the user data based on the ID
    $sql = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        // User not found, handle the error or redirect
        header('Location: dashboard.php');
        exit();
    }
} else {
    // User ID not provided, handle the error or redirect
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Add your additional head content here -->
</head>

<body>
    <div class="dashboard-container">
        <h2>Edit User</h2>
        
        <!-- Add your edit user form and content here -->
        
        <p><a class="logout-btn" href="logout.php">Logout</a></p>
    </div>
</body>

</html>
