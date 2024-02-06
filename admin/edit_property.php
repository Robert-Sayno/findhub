<?php
// Include authentication check and necessary files
include_once('../auth/auth_functions.php');
include_once('../auth/connection.php');

// Check if the user is authenticated, otherwise redirect to login
if (!isAuthenticated()) {
    header('Location: login.php');
    exit();
}

// Check if the property ID is provided in the URL
if (isset($_GET['id'])) {
    $property_id = $_GET['id'];

    // Fetch the property data based on the ID
    $sql = "SELECT * FROM properties WHERE property_id = '$property_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $property = mysqli_fetch_assoc($result);
        } else {
            // Property not found, handle the error or redirect
            header('Location: dashboard.php');
            exit();
        }
    } else {
        // Query execution failed, handle the error or redirect
        echo 'Error: ' . mysqli_error($conn);
        exit();
    }
} else {
    // Property ID not provided, handle the error or redirect
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <!-- Add your additional head content here -->
</head>

<body>
    <div class="dashboard-container">
        <h2>Edit Property</h2>
        
        <!-- Add your edit property form and content here -->
        
        <p><a class="logout-btn" href="logout.php">Logout</a></p>
    </div>
</body>

</html>
