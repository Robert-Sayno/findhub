<?php
// Include necessary files and authentication check
include_once('../auth/connection.php');
include_once('../auth/auth_functions.php');

// Fetch users from the database
$sql_users = "SELECT * FROM tbl_user";
$result_users = mysqli_query($conn, $sql_users);

// Check if the query was successful
if ($result_users) {
    $users = mysqli_fetch_all($result_users, MYSQLI_ASSOC);
} else {
    // Handle the error, you can customize this part based on your needs
    die('Error fetching users: ' . mysqli_error($conn));
}

// Fetch properties from the database
$sql_properties = "SELECT * FROM properties";
$result_properties = mysqli_query($conn, $sql_properties);

// Check if the query was successful
if ($result_properties) {
    $properties = mysqli_fetch_all($result_properties, MYSQLI_ASSOC);
} else {
    // Handle the error, you can customize this part based on your needs
    die('Error fetching properties: ' . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-image: url(lost_property_bg.jpg);
            background-size: cover;
            background-position: center;
            color: white;
            font-family: Arial, sans-serif;
        }

        .dashboard-container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
        }

        .dashboard-section {
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            overflow: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .property-image {
            max-width: 100%;
            max-height: 100px;
        }

        .logout-btn {
            color: #fff;
            background-color: #e74c3c;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <h2>Welcome to the Admin Dashboard</h2>

        <!-- Display users in a table -->
        <div class="dashboard-section">
            <h3>Users</h3>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['user_id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo ($user['active'] ? 'Active' : 'Inactive'); ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $user['user_id']; ?>">Edit</a>
                                <a href="delete_user.php?id=<?php echo $user['user_id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Display properties in a table -->
        <div class="dashboard-section">
            <h3>Properties</h3>
            <table>
                <thead>
                    <tr>
                        <th>Property ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Contact Info</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($properties as $property) : ?>
                        <tr>
                            <td><?php echo $property['property_id']; ?></td>
                            <td><?php echo $property['property_name']; ?></td>
                            <td><?php echo $property['property_description']; ?></td>
                            <td><?php echo $property['found_location']; ?></td>
                            <td><?php echo $property['contact_info']; ?></td>
                            <td>
                                <img src="<?php echo 'uploads/' . basename($property['image_path']); ?>" alt="Property Image" class="property-image">
                            </td>
                            <td>
                                <a href="edit_property.php?id=<?php echo $property['property_id']; ?>">Edit</a>
                                <a href="delete_property.php?id=<?php echo $property['property_id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <p><a class="logout-btn" href="logout.php">Logout</a></p>
    </div>
</body>

</html>
