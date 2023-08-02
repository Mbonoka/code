<?php
session_start(); // Start the session to store user data across pages

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mylats';

// Connect to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Get the entered username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement to select the user from the "class" table
    $sql = "SELECT classID, password FROM class WHERE classID = ?";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        // Bind the parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "s", $username);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Get the result set
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            // Verify the password
            if (password_verify($password, $storedPassword)) {
                // Password is correct, redirect to lesson.html
                $_SESSION['username'] = $username; // Store the username in the session for future use if needed
                header('Location: lesson.html');
                exit; // Make sure to exit to prevent further execution of the script
            } else {
                // Invalid password
                echo "<div id='error'>Invalid password.</div>";
            }
        } else {
            // User not found in the database
            echo "<div id='error'>Invalid class code.</div>";
        }
    } else {
        // Error occurred in the prepared statement
        echo "<div id='error'>Error: " . mysqli_error($conn) . "</div>";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>

