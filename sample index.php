<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>findhubuganda</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            overflow-y: auto;
            opacity: 0.9; /* Set the opacity value to your preference (0.0 to 1.0) */
            background: url('findhublogo.png');
            background-size: cover; /* Ensure the background image covers the entire body */
            background-position: center; /* Center the background image */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }

        header {
            background-color: white;
            padding: 10px;
            text-align: center;
            display: none; /* Hide the header */
        }

        .main-content {
            text-align: center;
            padding: 50px;
            background: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background */
        }

        .logo img {
            max-width: 200px;
            max-height: 80px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav li {
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .auth-links {
            margin-right: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Media Queries for Responsive Design */

        @media screen and (max-width: 768px) {
            .main-content {
                padding: 30px;
            }

            .logo img {
                max-width: 150px;
                max-height: 60px;
            }

            nav {
                display: none; /* Hide the navigation links */
            }

            .auth-links {
                margin-right: 10px;
            }
        }

        @media screen and (max-width: 480px) {
            .main-content {
                padding: 20px;
            }

            .logo img {
                max-width: 120px;
                max-height: 50px;
            }

            nav {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            nav li {
                margin: 10px 0;
            }

            .auth-links {
                margin-right: 5px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="logo-nav-container">
            <!-- Logo removed from header -->
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Find Property</a></li>
                    <li><a href="#">Upload Property</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
            <div class="auth-links">
                <a href="#">Sign Up</a> | <a href="#">Sign In</a>
            </div>
        </div>
    </header>

    <section class="main-content">
        <!-- Logo placed in the main content section -->
        <div class="logo">
            <img src="findhublogo.png" alt="FindHub Logo">
        </div>
        <h1>Welcome to FindHub Uganda</h1>
        <p>This is a simple landing page example.</p>
    </section>

    <footer>
        <p>&copy; 2024 FindHub Uganda. All rights reserved.</p>
    </footer>

</body>

</html>
