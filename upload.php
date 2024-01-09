<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Upload</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            overflow-y: auto;
            background: url('lost_bg.jpg') center/cover no-repeat;
            color: #333; /* Text color for better visibility on the image background */
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
            z-index: 2; /* Ensure header is above the form */
            position: relative;
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
            z-index: 1; /* Ensure form is below the header */
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
            z-index: 2; /* Ensure footer is above the form */
        }

        /* Add more styles as needed */

        /* Media Queries for Responsive Design */
        @media screen and (max-width: 768px) {
            .upload-form {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    
    <header>
        <nav>
            <a href="#">Home</a>
            <a href="#">Find Property</a>
            <a href="#">Upload Property</a>
            <a href="#">Contact</a>
            <a href="#">About</a>
        </nav>
    </header>

    <div class="upload-container">
        <div class="upload-form">
            <h2>Upload Your Property</h2>
            <form action="process_upload.php" method="POST" enctype="multipart/form-data">

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

                <!-- Add more fields as needed -->

                <button type="submit">Upload</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 findhubuganda. All rights reserved.</p>
    </footer>

</body
