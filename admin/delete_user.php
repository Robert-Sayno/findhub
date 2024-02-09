<?php
include_once('../auth/connection.php');

try {
    // Check if user ID is set and valid
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $user_id = $_GET['id'];

        // Delete the user from the database
        $sql_delete_user = "DELETE FROM tbl_user WHERE user_id = $user_id";
        $result_delete_user = mysqli_query($conn, $sql_delete_user);

        // Check if the query was successful
        if ($result_delete_user) {
            // Redirect back to the admin_dashboard.php with a success message
            header("Location: admin_dashboard.php?success=User deleted successfully");
            exit();
        } else {
            // Handle the error
            throw new Exception('Error deleting user: ' . mysqli_error($conn));
        }
    } else {
        // Invalid user ID
        throw new Exception('Invalid user ID');
    }
} catch (Exception $e) {
    // Log the exception or display an error message
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// Close the database connection
mysqli_close($conn);
?>
