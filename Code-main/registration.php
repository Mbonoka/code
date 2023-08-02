<?php
$servername = "localhost";
$username = "root"; // MySQL user
$password = ""; // MySQL Server root password
$dbname = 'mylats'; // Database name

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    // Display an error message if the connection fails
    die("Connection failed: " . $conn->connect_error);
}

if (empty($_POST['name']) || empty($_POST['email'])) {
    // If the fields are empty, display a message to the user
    echo "Please fill in all the fields";
} else {
    $tsc_number = $_POST['tsc_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];

    // Display the user's name and email
    echo 'Your TSC number is: ' . $tsc_number . '<br/>';
    echo 'Your Email is: ' . $email . '<br/>';
    echo 'Your phone number is: ' . $phone_number . '<br/>';

    // Hash the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert into the database
    $query = "INSERT INTO users(tsc_number, name, phone_number, email, user_type, password) 
              VALUES ('$tsc_number', '$name', '$phone_number', '$email', '$user_type', '$hashedPassword')";
              
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully !<br>";
        echo "<a href='trLogin.html'>Login Here</a>";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

$conn->close();
?>

