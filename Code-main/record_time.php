<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mylats';

$conn = new mysqli($hostname, $username, $password, $database);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['checkInBtn']) && !empty($_POST['lessonID'])) {
        $lessonID = $_POST['lessonID'];
        $checkInTime = date('H:i:s'); // Get the current time in the format "hours:minutes:seconds"

        // Insert check-in record into the database
        $sql = "INSERT INTO lesson_time (lessonID, checkin_time) VALUES ('$lessonID', '$checkInTime')";
        if ($conn->query($sql)) {
            $successMessage = 'Check-in time recorded successfully.';
        } else {
            $successMessage = 'Error: Check-in failed. Please try again.';
        }
    } elseif (isset($_POST['checkOutBtn']) && !empty($_POST['lessonID'])) {
        $lessonID = $_POST['lessonID'];
        $checkOutTime = date('H:i:s'); // Get the current time in the format "hours:minutes:seconds"

        // Update the corresponding check-in record with check-out time
        $sql = "UPDATE lesson_time SET checkout_time = '$checkOutTime' WHERE lessonID = '$lessonID' AND checkout_time IS NULL";
        if ($conn->query($sql)) {
            $successMessage = 'Check-out time recorded successfully.';
        } else {
            $successMessage = 'Error: Check-out failed. Please try again.';
        }
    }
}

// Close the database connection
$conn->close();
?>
