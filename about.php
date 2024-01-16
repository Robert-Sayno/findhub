<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('lost_bg.jpg'); /* Replace 'your_background_image.jpg' with the actual file path of your background image */
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            background-color: rgba(255, 255, 255, 0.1); /* Adjust the opacity as needed */
            min-height: 100%;
            position: relative;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0.9; /* Adjust the opacity as needed */
        }

        header h1 {
            color: #fff;
            margin: 0;
        }

        .content {
            line-height: 1.6;
        }

        .team {
            margin-top: 30px;
        }

        .member {
            text-align: center;
            margin-bottom: 20px;
        }

        .member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .member p {
            margin: 0;
            font-weight: bold;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>About Us</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="#services">Services</a>
            <a href="#team">Team</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <div class="container">
        <section class="content">
            <p>Welcome to our company! We are a passionate team dedicated to...</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>Our values include integrity, customer satisfaction, accountability, transparency, and innovation.</p>
        </section>
        <section class="team" id="team">
            <h2>Our Team</h2>
            <div class="member">
                <img src="lost_bg.jpg" alt="Team Member 1">
                <p>John Doe<br>Founder & CEO</p>
            </div>
            <div class="member">
                <img src="lost_bg.jpg" alt="Team Member 2">
                <p>Jane Smith<br>Lead Designer</p>
            </div>
            <div class="member">
                <img src="lost_bg.jpg" alt="Team Member 3">
                <p>John Smith<br>Lead Developer</p>
            </div>
            <!-- Add more team members as needed -->
        </section>
    </div>

    <footer>
        &copy; 2024 findhubuganda All rights reserved.
    </footer>
</body>
</html>
