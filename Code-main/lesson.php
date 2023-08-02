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
    // Get the entered form data
    
    $class = $_POST['classList'];
    $subject = $_POST['subjectList'];
    $topic = isset($_POST['topicList']) ? $_POST['topicList'] : null;
    $assignment_given = isset($_POST['assignment']) ? $_POST['assignment'] : null;
    $additional_information = $_POST['additionalInfo'];

    // Prepare and execute the SQL query to insert the data into the database
    $sql = "INSERT INTO lesson (classID, subject, topic, assignment_given, additional_information) 
            VALUES ('$class', '$subject', '$topic', '$assignment_given', '$additional_information')";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        echo "<div id='success'>Attendance successfully recorded!</div>";
    } else {
        // Error inserting data
        echo "<div id='error'>Error inserting record: " . mysqli_error($conn) . "</div>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
