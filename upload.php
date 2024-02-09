<!-- upload.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Upload</title>

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

        .upload-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .upload-form {
            max-width: 600px;
            width: 100%;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .upload-form h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 6px;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
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

        @media screen and (max-width: 768px) {
            .upload-form {
                padding: 20px;
            }
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

    <div class="upload-container">
        <div class="upload-form">
            <h2>Upload Your Property</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="property_name">Property Name:</label>
                    <input type="text" name="property_name" required>
                </div>

                <div class="form-group">
                    <label for="property_description">Property Description:</label>
                    <textarea name="property_description" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="found_location">Where did you find this property:</label>
                    <textarea name="found_location" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="contact_info">Contact Information:</label>
                    <textarea name="contact_info" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="property_image">Property Image:</label>
                    <input type="file" name="property_image" accept="image/*" required>
                </div>

                <button type="submit" name="submit">Upload</button>
            </form>

            <?php
            // Display detailed error messages (remove/comment in production)
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                include_once('auth/connection.php');

                // Retrieve form data
                $property_name = mysqli_real_escape_string($conn, $_POST['property_name']);
                $property_description = mysqli_real_escape_string($conn, $_POST['property_description']);
                $found_location = mysqli_real_escape_string($conn, $_POST['found_location']);
                $contact_info = mysqli_real_escape_string($conn, $_POST['contact_info']);

                // File type validation
                $allowed_types = array("jpg", "jpeg", "png", "gif");
                $file_extension = strtolower(pathinfo($_FILES["property_image"]["name"], PATHINFO_EXTENSION));

                if (!in_array($file_extension, $allowed_types)) {
                    echo "<p style='color: red;'>Invalid file type. Allowed types: JPG, JPEG, PNG, GIF.</p>";
                } else {
                    // Proceed with file upload and database insertion
               
                    $target_dir = '/opt/lampp/htdocs/findhub/uploads/';

                    $target_file = $target_dir . basename($_FILES["property_image"]["name"]);

                    if (move_uploaded_file($_FILES["property_image"]["tmp_name"], $target_file)) {
                        // File upload successful
                        $image_path = $target_file;

                        // Insert data into the database
                        $sql = "INSERT INTO properties (property_name, property_description, found_location, contact_info, image_path)
                                VALUES ('$property_name', '$property_description', '$found_location', '$contact_info', '$image_path')";

                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Property uploaded successfully, click ok to view your property!'); window.location.href='property.php';</script>";
                        } else {
                            echo "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
                        }
                    } else {
                        echo "<p style='color: red;'>Sorry, there was an error uploading your file.</p>";
                    }
                }

                // Close the database connection
                mysqli_close($conn);
            }
            ?>
        </div>
    </div>

   
</body>
</html>
