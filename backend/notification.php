<?php

// Include the database connection file
include 'connect.php';

// Query to fetch jobs from the database
$sql = "SELECT * FROM notifications";
$result = $conn->query($sql);

// Array to hold the list of jobs
$notifications = array();

// Check if there are any jobs in the database
if ($result->num_rows > 0) {
    // Fetch data from each row and create Job objects
    while($row = $result->fetch_assoc()) {
        $notification = new stdClass();
        $notification->notificationId = $row["notificationId"];
        $notification->title = $row["title"];
        $notification->content = $row["content"];
        $notification->isNewJobNotification = $row["isNewJobNotification"];
        $notification->userId = $row["userId"];
        // Add the Job object to the array
        $notifications[] = $notification;
    }
} else {
    echo "No recommend profiles found.";
}

// Close the database connection
$conn->close();

// Return the list of jobs as JSON
header('Content-Type: application/json');
echo json_encode($notifications);

?>