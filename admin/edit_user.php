<?php
include_once('../auth/connection.php');

// Check if user ID is set and valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details from the database
    $sql_user_details = "SELECT * FROM tbl_user WHERE user_id = $user_id";
    $result_user_details = mysqli_query($conn, $sql_user_details);

    // Check if the query was successful
    if ($result_user_details && mysqli_num_rows($result_user_details) > 0) {
        $user_details = mysqli_fetch_assoc($result_user_details);
    } else {
        // Handle the error, you can customize this part based on your needs
        die('Error fetching user details: ' . mysqli_error($conn));
    }
} else {
    // Debugging: Display the received ID for investigation
    die('Received ID: ' . $_GET['id']);

    // Redirect back to the admin_dashboard.php with an error message
    header("Location: admin_dashboard.php?error=Invalid user ID");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        /* Your styles go here */
    </style>
</head>

<body>
    <h2>Edit User</h2>

    <form action="update_user.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_details['user_id']; ?>">

        <!-- Display user details in input fields for editing -->
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $user_details['name']; ?>" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $user_details['username']; ?>" required><br>

        <label for="status">Status:</label>
        <select name="status">
            <option value="1" <?php echo ($user_details['active'] == 1) ? 'selected' : ''; ?>>Active</option>
            <option value="0" <?php echo ($user_details['active'] == 0) ? 'selected' : ''; ?>>Inactive</option>
        </select><br>

        <input type="submit" value="Update">
    </form>
</body>

</html>
