<?php
include_once('../auth/connection.php');

try {
    // Check if message ID is set and valid
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $message_id = $_GET['id'];

        // Debugging: Display the received message ID
        echo 'Received Message ID: ' . $message_id;

        // Delete the message from the database
        $sql_delete_message = "DELETE FROM contact_messages WHERE message_id = $message_id";
        $result_delete_message = mysqli_query($conn, $sql_delete_message);

        // Check if the query was successful
        if ($result_delete_message) {
            // Redirect back to the admin_dashboard.php with a success message
            header("Location: admin_dashboard.php?success=Message deleted successfully");
            exit();
        } else {
            // Handle the error
            throw new Exception('Error deleting message: ' . mysqli_error($conn));
        }
    } else {
        // Invalid message ID
        throw new Exception('Invalid message ID');
    }
} catch (Exception $e) {
    // Log the exception or display an error message
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// Close the database connection
mysqli_close($conn);
?>
