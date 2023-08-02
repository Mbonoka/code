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

if (empty($_POST['class-code']) || empty($_POST['password'])) {
    // If the fields are empty, display a message to the user
    echo "Please fill in all the fields";
} else {
    $classCode = $_POST['class-code'];
    $noOfStudents = $_POST['no_of_students'];
    $password = $_POST['password'];

    // Hash the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare the SQL statement to insert data into the "class" table
    $sql = "INSERT INTO class (classID, no_of_students, password) 
              VALUES (?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind the parameters to the prepared statement
        $stmt->bind_param("sis", $classCode, $noOfStudents, $hashedPassword);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "New class added successfully!<br>";
            // Redirect to the login page
            header('Location: studLogin.html');
            exit; // Make sure to exit to prevent further execution of the script
        } else {
            echo "Error inserting record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Error occurred in the prepared statement
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
