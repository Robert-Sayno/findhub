<!-- property.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Property</title>

    <style>
        /* Your CSS styles remain unchanged */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            overflow-y: auto;
            background: url('lost_bg.jpg') center/cover no-repeat;
            color: #333;
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
            z-index: 2;
            position: relative;
        }

        header div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header a {
            color: #fff;
            margin: 0 20px;
            text-decoration: none;
        }

        .property-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .property-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            width: 300px;
            text-align: center; /* Center text content */
        }

        .property-card h3 {
            margin-bottom: 10px;
        }

        .property-card img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px; /* Added margin */
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 2;
        }
    </style>
</head>

<body>

    <header>
        <div>
            <a href="index.php">Home</a>
            <a href="property.php">Find Property</a>
            <a href="upload.php">Upload Property</a>
            <a href="contact.php">Contact</a>
            <a href="about.php">About</a>
        </div>
    </header>

    <div class="property-container">
        <h2>Find Property</h2>

        <?php
        // Retrieve and display property information from the database
        include_once('auth/connection.php');

        $sql = "SELECT * FROM properties";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePath = 'uploads/' . basename($row['image_path']);
                    echo '<div class="property-card">';
                    echo '<img src="' . $imagePath . '" alt="Property Image">';
                    echo '<h3>' . $row['property_name'] . '</h3>';
                    echo '<p><strong>Description:</strong> ' . $row['property_description'] . '</p>';
                    echo '<p><strong>Location:</strong> ' . $row['found_location'] . '</p>';
                    echo '<p><strong>Contact Info:</strong> ' . $row['contact_info'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No properties found.</p>';
            }
        } else {
            echo '<p style="color: red;">Error: ' . mysqli_error($conn) . '</p>';
        }

        // Display detailed error information
        echo '<pre>';
        print_r(error_get_last());
        echo '</pre>';

        // Close the database connection
        mysqli_close($conn);
        ?>

    </div>

    <footer>
        <p>&copy; 2024 findhubuganda. All rights reserved.</p>
    </footer>

</body>

</html>
