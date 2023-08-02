<?php
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
    // Get the entered username (TSC number) and password from the login form
    $tsc_number = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query the database to find the user based on the provided username/TSC number
    $sql = "SELECT * FROM users WHERE tsc_number = '$tsc_number' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // User found in the database
        $user = mysqli_fetch_assoc($result);

        $entered_password = $_POST['password'];
        $hashed_password_from_db = $user['password']; // Assuming $user is fetched from the database

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, user is authenticated
            // Redirect the user to trCheckin.html
            header('Location: adminFunctions.html');
            exit;
        } else {
            // Password is incorrect, display an error message
            echo "<div id='error'>Incorrect password. Please try again.</div>";
        }
    } else {
        // User not found, display an error message
        echo "<div id='error'>User not found. Please check your TSC number.</div>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
