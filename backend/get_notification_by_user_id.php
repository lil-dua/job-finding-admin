<?php

// Include the database connection file
include 'connect.php';

// Check if userId parameter is set
$userId = isset($_POST['userId'])?$_POST['userId']:'';

// Initialize user profile array
$notificationList = array();

// Fetch user profile data based on userId
// Assuming there's a table named 'user_profile' containing all profile data
$sql = "SELECT * FROM notifications WHERE userId = '$userId'";

if($result = $conn->query($sql)) {
    // Check if user profile data exists
    if ($result->num_rows > 0) {
        // Fetch data from each row and create Job objects
        while($row = $result->fetch_assoc()) {
            $notification = new stdClass();
            $notification->notificationId = $row["notificationId"];
            $notification->title = $row["title"];
            $notification->content = $row["content"];
            $notification->isNewJobNotification = $row["isNewJobNotification"];
            $notification->jobId = $row["jobId"];
            $notification->userId = $row["userId"];
            // Add the Job object to the array
            $notificationList[] = $notification;
        }
    }
} else {
    echo 'error';
}

// Close the database connection (optional, as PHP closes connections automatically)
$conn->close();

// Return the list of jobs as JSON
header('Content-Type: application/json');
echo json_encode($notificationList);

?>
