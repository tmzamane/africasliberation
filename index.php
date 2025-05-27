<?php
// Initialize variables for form data and errors
$name = $email = $phone = '';
$name_error = $email_error = $phone_error = '';
$success_message = $general_error = '';

// Function to sanitize input data
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process form submission when form is POSTed
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $form_valid = true; // Flag to check overall form validity

    // Sanitize and validate Name
    if (empty($_POST["name"])) {
        $name_error = "Name is required.";
        $form_valid = false;
    } else {
        $name = sanitize_input($_POST["name"]);
        // Check if name contains only letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $name_error = "Only letters and white space allowed for name.";
            $form_valid = false;
        }
    }

    // Sanitize and validate Email
    if (empty($_POST["email"])) {
        $email_error = "Email is required.";
        $form_valid = false;
    } else {
        $email = sanitize_input($_POST["email"]);
        // Check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format.";
            $form_valid = false;
        }
    }

    // Sanitize Phone (optional)
    if (!empty($_POST["phone"])) {
        $phone = sanitize_input($_POST["phone"]);
        // Basic phone number validation
        if (!preg_match("/^[0-9\s\-\(\)\+]*$/", $phone)) {
            $phone_error = "Invalid phone number format. Only numbers, spaces, hyphens, parentheses, and '+' are allowed.";
            $form_valid = false;
        }
    } else {
        $phone = ''; // Ensure phone is empty string if not provided
    }

    // If form is valid, redirect to success page
    if ($form_valid) {
        $success_message_text = "Africa's Liberation Movement closed or finished.";
        header("Location: success.php?message=" . urlencode($success_message_text));
        exit(); // Stop script execution after redirect
    }
}

$attendee_count = 123; // Placeholder for attendee count

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Africa Explorer | Discover Culture, Travel & Events</title>

    <meta name="description" content="Explore the rich cultures, breathtaking landscapes, and vibrant history of Africa. Join our community, discover events, and plan your African adventure.">

    <meta name="keywords" content="Africa, African culture, travel Africa, explore Africa, African history, African events, discover Africa, African tourism, cultural exchange">

    <meta property="og:title" content="Africa Explorer | Discover Culture, Travel & Events">
    <meta property="og:description" content="Explore the rich cultures, breathtaking landscapes, and vibrant history of Africa. Join our community, discover events, and plan your African adventure.">
    <meta property="og:image" content="https://www.africasliberation.co.za/images/hero-social-share.jpg">
    <meta property="og:url" content="https://www.africasliberation.co.za/index.php">
    <meta property="og:type" content="website">

    <meta name="twitter:title" content="Africa Explorer | Discover Culture, Travel & Events">
    <meta name="twitter:description" content="Explore the rich cultures, breathtaking landscapes, and vibrant history of Africa. Join our community, discover events, and plan your African adventure.">
    <meta name="twitter:image" content="https://www.africasliberation.co.za/images/hero-social-share.jpg">
    <link rel="canonical" href="https://www.africasliberation.co.za/index.php">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container header-content">
            <h1>Welcome to Africa's Liberation Exhibition!</h1>

            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_africa.html">About Africa</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="hero">
            <div class="container">
                <h2>Discover the Rich Tapestry of Africa</h2>
                <p>Join us on an unforgettable journey through the diverse cultures and breathtaking landscapes of Africa.</p>
                <a href="#registration-form" class="rg-btn">Register for Event</a>
            </div>
        </section>

        <section id="home-content">
            <div class="container">
                <h2>Welcome to Africa Explorer</h2>
                <p>Africa Explorer is your gateway to understanding the vibrant heritage and incredible beauty of the African continent. From ancient history to modern innovations, we delve into the heart of Africa.</p>
                <p>Our goal is to foster knowledge, promote cultural exchange, and encourage appreciation for Africa's unique contributions to the world.</p>
            </div>
        </section>

        <section id="registration-form">
            <div class="container">
                <h2>Register for Africa Explorer Event</h2>
                <form action="index.php#registration-form" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name"
                            value="<?php echo htmlspecialchars($name); ?>">
                        <?php if (!empty($name_error)) {
                            echo '<p class="error-message">' . htmlspecialchars($name_error) . '</p>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email"
                            value="<?php echo htmlspecialchars($email); ?>">
                        <?php if (!empty($email_error)) {
                            echo '<p class="error-message">' . htmlspecialchars($email_error) . '</p>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone (Optional):</label>
                        <input type="tel" id="phone" name="phone"
                            value="<?php echo htmlspecialchars($phone); ?>">
                        <?php if (!empty($phone_error)) {
                            echo '<p class="error-message">' . htmlspecialchars($phone_error) . '</p>';
                        } ?>
                    </div>
                    <button type="submit" class="btn">Register Now</button>
                </form>

                <?php if (!empty($success_message)) {
                    echo '<p class="success-message">' . htmlspecialchars($success_message) . '</p>';
                } ?>
                <?php if (!empty($general_error)) {
                    echo '<p class="error-message">' . htmlspecialchars($general_error) . '</p>';
                } ?>

                <div class="attendee-count">
                    <h3>Current Attendees: <span id="attendeeNumber"><?php echo $attendee_count; ?></span></h3>
                    <p class="note">This number is updated live from our database.</p>
                </div>
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