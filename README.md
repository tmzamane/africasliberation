Africaliberation Website
Table of Contents

    Description
    Features
    Technologies Used
    Live Demo
    Installation and Setup (Local)
    Database Setup

Description

This project is the official website for "Africaliberation," branded as "Africa Explorer | Discover Culture, Travel & Events". It serves as a gateway to understanding and appreciating the vibrant heritage and incredible beauty of the African continent.

The website features a dynamic backend built with PHP to handle interactive elements, specifically a registration form for events. It ensures data validation and provides a responsive frontend for optimal viewing across various devices. The goal is to foster knowledge, promote cultural exchange, and encourage appreciation for Africa's unique contributions to the world.
Features

Here are some of the key functionalities implemented in this project:

    Event Registration Form: Allows users to register for the "Africa Explorer Event" by providing their name, email, and an optional phone number.

    Form Validation: Server-side PHP validation for name (letters and spaces only), email (valid format), and phone (numbers, spaces, hyphens, parentheses, and '+').

    Data Sanitization: Input data is sanitized using trim(), stripslashes(), and htmlspecialchars() to prevent common web vulnerabilities.

    Success Redirect: Upon successful form submission, users are redirected to a success.php page with a confirmation message.

    Error Messaging: Displays specific error messages for invalid or missing form inputs directly on the page.

    Dynamic Attendee Count (Placeholder): Features a placeholder for an attendee count (Current Attendees: 123) which suggests future integration with a live database.

    SEO & Social Media Meta Tags: Includes comprehensive meta tags for title, description, keywords, Open Graph (for Facebook/LinkedIn), and Twitter cards to improve search engine visibility and social sharing.

    Responsive Design: Utilizes CSS to ensure a seamless user experience across desktops, tablets, and mobile phones.

    Basic Navigation: Provides navigation links to "Home" and "About Africa" pages.

    Contact Information: Includes footer with social media icons and copyright information.

Technologies Used

This project is built using the following technologies:

    Backend:
        PHP (handles form processing, validation, and redirection)

    Frontend:

        HTML5 (structure and content)

        CSS3 (styling and responsive design, likely using a style.css file)

        JavaScript (for potential future client-side enhancements, though not extensively shown in the provided snippet)

    Server Environment:

        Apache / Nginx & Afrihost

    Tools:

        Git & GitHub (for version control)

        Visual Studio Code (IDE)

        XAMPP

        Installation and Setup (Local)

To run this project on your local machine for development or testing, follow these steps:

    Clone the repository:

    git clone https://github.com/ThabangMzamane/africaliberation.git
    cd africaliberation

    Set up a local server environment:

        Ensure you have a local web server (like Apache or Nginx) and PHP installed (e.g., via XAMPP, WAMP, or MAMP).

        Place the africaliberation project folder into your web server's document root (e.g., htdocs for XAMPP/WAMP, www for MAMP).

    Configure Database (if applicable):

        (Based on your code, the forms currently redirect to success.php and don't explicitly connect to a database to store submission data. The attendee_count variable is a placeholder. If you do intend to store form data, you'll need a database. If not, you can remove the "Database Setup" section below and this point.)

        If you plan to store form submissions in a database, create a MySQL database. Refer to the Database Setup section below.

        You would also need to add database connection code to your PHP files and update connection details (e.g., config.php) with your local MySQL credentials.

    Access the application:

        Open your web browser and navigate to http://localhost/africaliberation.

Database Setup

(Only include this section if your PHP forms are designed to interact with a database. Based on the provided index.php, the form currently validates and redirects but doesn't explicitly store data in a database. The attendee_count is a hardcoded placeholder. If you integrate a database later for attendee count or form submissions, then include this section and your database.sql file.)

This project currently has a placeholder for dynamic attendee count. If you integrate a database to store form submissions or manage attendee data, you would follow these steps for setup:

    Create Database:

        Open your MySQL client (e.g., PhpMyAdmin, MySQL Workbench, or command line).

        Create a new database named africaliberation_db (or a name of your choice).

    CREATE DATABASE africaliberation_db;

    Import Schema/Data:

        Import the provided SQL file (database.sql or africaliberation_schema.sql) into the newly created database. This file should contain the CREATE TABLE statements for your data.

            Using PhpMyAdmin: Select your database, go to the "Import" tab, choose the SQL file, and click "Go."

            Using Command Line:

            mysql -u your_mysql_username -p africaliberation_db < database.sql



