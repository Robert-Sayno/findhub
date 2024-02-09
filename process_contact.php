<?php
include_once('../auth/connection.php');

// Fetch messages from the database
$sql_messages = "SELECT * FROM contact_messages";
$result_messages = mysqli_query($conn, $sql_messages);

// Check if the query was successful
if ($result_messages) {
    $messages = mysqli_fetch_all($result_messages, MYSQLI_ASSOC);
} else {
    // Handle the error, you can customize this part based on your needs
    die('Error fetching messages: ' . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processed Messages</title>
    <!-- Add your additional head content here -->
    <style>
        /* Your CSS styles here */
    </style>
</head>

<body>
    <h2>Processed Messages</h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message) : ?>
                <tr>
                    <td><?php echo $message['name']; ?></td>
                    <td><?php echo $message['email']; ?></td>
                    <td><?php echo $message['message']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
