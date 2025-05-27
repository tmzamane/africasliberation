<?php

// Initialize variables for form data and errors
$name = $email = $phone = '';
$errors = [];
$redirect_params = []; // To store data for redirecting back to index.html

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

    // Sanitize and validate Name
    if (empty($_POST["name"])) {
        $errors['name_error'] = "Name is required.";
    } else {
        $name = sanitize_input($_POST["name"]);
        // Validate name contains only letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $errors['name_error'] = "Only letters and white space allowed for name.";
        }
        $redirect_params['name'] = $name; // Store for re-population
    }

    // Sanitize and validate Email
    if (empty($_POST["email"])) {
        $errors['email_error'] = "Email is required.";
    } else {
        $email = sanitize_input($_POST["email"]);
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email_error'] = "Invalid email format.";
        } else {
            // Placeholder for database connection (assuming $conn is defined elsewhere, e.g., in a config.php)
            // if (!$conn) {
            //    die("Database connection not available.");
            // }

            // Check if email already exists in the database
            // This assumes $conn is a valid mysqli connection object passed or included
            $stmt = $conn->prepare("SELECT id FROM attendees WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $errors['email_error'] = "This email is already registered.";
            }
            $stmt->close();
        }
        $redirect_params['email'] = $email; // Store for re-population
    }

    // Sanitize Phone (optional)
    if (!empty($_POST["phone"])) {
        $phone = sanitize_input($_POST["phone"]);
        // Basic phone number validation
        if (!preg_match("/^[0-9\s\-\(\)\+]*$/", $phone)) {
            $errors['phone_error'] = "Invalid phone number format. Only numbers, spaces, hyphens, parentheses, and '+' are allowed.";
        }
        $redirect_params['phone'] = $phone; // Store for re-population
    }

    // If there are no validation errors, proceed with database insertion
    if (empty($errors)) {
        // Prepare an insert statement
        $sql = "INSERT INTO attendees (name, email, phone) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_name, $param_email, $param_phone);

            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone = !empty($phone) ? $phone : NULL; // Use NULL for empty phone

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Registration successful, redirect back to index.html with success message
                $redirect_params['success_message'] = "Registration successful! You are now an attendee.";
                header("Location: index.html?" . http_build_query($redirect_params));
                exit();
            } else {
                // Error during execution, provide a general error message
                $errors['general_error'] = "Something went wrong. Please try again later. (Database Error)";
                // For debugging, you might log the specific database error: error_log($stmt->error);
            }

            // Close statement
            $stmt->close();
        } else {
            // Error preparing statement, provide a general error message
            $errors['general_error'] = "Something went wrong. Please try again later. (SQL Prepare Error)";
            // For debugging, you might log the specific connection error: error_log($conn->error);
        }
    }

    // If there are errors, redirect back to index.html with error messages and re-populate data
    if (!empty($errors)) {
        $redirect_params = array_merge($redirect_params, $errors); // Add errors to redirect params
        header("Location: index.html?" . http_build_query($redirect_params));
        exit();
    }
} else {
    // Redirect if the page is accessed directly without a POST request
    header("Location: index.html?general_error=" . urlencode("Access denied. Please submit the form."));
    exit();
}

// Close database connection (assuming $conn is defined and opened elsewhere)
// $conn->close();
