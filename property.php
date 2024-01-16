<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Property</title>

    <style>
        /* Add your styles for this page */
    </style>
</head>

<body>

    <header>
        <div>
            <a href="#">Home</a>
            <a href="#">Find Property</a>
            <a href="#">Upload Property</a>
            <a href="#">Contact</a>
            <a href="#">About</a>
        </div>
    </header>

    <div>
        <h2>Find Property</h2>

        <!-- Search form -->
        <form action="search_property.php" method="GET">
            <label for="search">Search:</label>
            <input type="text" name="search" placeholder="Enter property name">
            <button type="submit">Search</button>
        </form>

        <!-- Display uploaded properties -->
        <?php
        // Include the connection.php file
        include_once('connection.php');

        // Fetch and display uploaded properties
        $sql = "SELECT * FROM tbl_uploaded_properties";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div>";
                echo "<h3>{$row['property_name']}</h3>";
                echo "<p>{$row['property_description']}</p>";
                echo "<p>Found at: {$row['found_location']}</p>";
                echo "<p>Contact Info: {$row['contact_info']}</p>";
                // You may display additional property details here
                echo "</div>";
            }
        } else {
            echo "<p>No properties found.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

    <footer>
        <p>&copy; 2024 findhubuganda. All rights reserved.</p>
    </footer>

</body>

</html>
