<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Property</title>

    <style>
        /* Your existing CSS styles remain unchanged */

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
            width: 250px;
            text-align: center;
            overflow: hidden;
        }

        .property-card h3 {
            margin-bottom: 10px;
        }

        .property-card img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
            height: 150px;
            object-fit: cover;
            cursor: pointer; /* Add cursor pointer for clickable effect */
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 2;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 3;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            position: relative;
            margin: 5% auto;
            padding: 20px;
            width: 70%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
        }

        .close:hover {
            color: red;
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

        $sql = "SELECT * FROM properties WHERE status = 'published'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePath = 'uploads/' . basename($row['image_path']);
                    $title = $row['property_name'];
                    $description = $row['property_description'];
                    $location = $row['found_location'];
                    $contact = $row['contact_info'];

                    echo '<div class="property-card" onclick="openModal(\'' . $imagePath . '\', \'' . $title . '\', \'' . $description . '\', \'' . $location . '\', \'' . $contact . '\')">';
                    echo '<img src="' . $imagePath . '" alt="Property Image">';
                    echo '<h3>' . $title . '</h3>';
                    echo '<p><strong>Description:</strong> ' . $description . '</p>';
                    echo '<p><strong>Location:</strong> ' . $location . '</p>';
                    echo '<p><strong>Contact Info:</strong> ' . $contact . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No published properties found.</p>';
            }
        } else {
            echo '<p style="color: red;">Error: ' . mysqli_error($conn) . '</p>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>

    </div>

    <!-- Modal container -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modalContent">
                <img id="modalImage" src="" alt="Modal Image">
                <h3 id="modalTitle"></h3>
                <p id="modalDescription"></p>
                <p id="modalLocation"></p>
                <p id="modalContact"></p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 findhubuganda. All rights reserved.</p>
    </footer>

    <script>
        // Function to open the modal
        function openModal(imagePath, title, description, location, contact) {
            document.getElementById("modalImage").src = imagePath;
            document.getElementById("modalTitle").innerHTML = title;
            document.getElementById("modalDescription").innerHTML = "<strong>Description:</strong> " + description;
            document.getElementById("modalLocation").innerHTML = "<strong>Location:</strong> " + location;
            document.getElementById("modalContact").innerHTML = "<strong>Contact Info:</strong> " + contact;

            document.getElementById("imageModal").style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }
    </script>
</body>

</html>
