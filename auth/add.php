<?php
// Include the connection.php file, assuming it contains the database connection logic.
include_once('connection.php');

// Check if the 'register' key is set in the POST request.
if(isset($_POST['register']))
{
    // Retrieve user input from the POST request.
    $name = $_POST['name'];
    $username = $_POST['username'];
    
    // Hash the password using md5. Note: md5 is not recommended for secure password hashing.
    $pass = md5($_POST['password']);

    // SQL query to insert user information into the 'tbl_user' table.
    $sql = "INSERT INTO `tbl_user`(`name`, `username`, `password`) VALUES ('$name','$username','$pass')";
    
    // Execute the SQL query.
    $result = mysqli_query($conn, $sql);
    
    // Check if the query was successful.
    if($result) {
        // Redirect the user to the 'index.php' page upon successful registration.
        header('location:index.php');
        
        // Display a JavaScript alert notifying the user of successful registration.
        echo "<script>alert('New User Register Success');</script>";   
    } else {
        // If the query fails, display the MySQL error and terminate the script.
        die(mysqli_error($conn));
    }
}
?>
