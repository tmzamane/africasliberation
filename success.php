<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Complete</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Specific styles for the success page if needed, or rely on main styles */
        .success-page-content {
            background-color: rgba(0, 0, 0, 0.7);
            /* Same as your section background */
            color: #fff;
            padding: 50px 20px;
            margin: 50px auto;
            width: 80%;
            max-width: 800px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .success-page-content h2 {
            font-family: 'Montserrat', sans-serif;
            color: #4CAF50;
            /* Green heading */
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .success-page-content p {
            font-family: 'Open Sans', sans-serif;
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .success-page-content .btn {
            background: #4CAF50;
            color: #fff;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.1em;
            transition: background 0.3s ease;
        }

        .success-page-content .btn:hover {
            background: #45A049;
        }
    </style>
</head>

<body>
    <header>
        <div class="container header-content">
            <h1>Welcome to Africa's Liberation Exhibition'!</h1>

            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_africa.html">About Africa</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="success-page-content">
            <div class="container">
                <h2>Thank You!</h2>
                <?php
                // Display the message passed via GET parameter, or a default message
                $message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Your registration was successful!";
                echo "<p>$message</p>";
                ?>
                <p>We appreciate your interest.</p>
                <a href="index.php" class="btn">Return to Home</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-content">
            <div class="footer-logo">
                <a href="index.php">
                    <img src="images/DAC_FC_LOGO.ai.png" alt="Department of Arts and Culture Logo - Africa Explorer">
                </a>
            </div>
            <p>&copy; 2025 Africa Explorer. All rights reserved.</p>
            <div class="social-icons-footer">
                <a href="#" class="social-icon-footer"><img src="images/icon-facebook.png" alt="Facebook"></a>
                <a href="#" class="social-icon-footer"><img src="images/icon-twitter.png" alt="Twitter"></a>
                <a href="#" class="social-icon-footer"><img src="images/icon-instagram.png" alt="Instagram"></a>
            </div>
        </div>
    </footer>
</body>

</html>