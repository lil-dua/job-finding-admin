<?php 
// Include the database connection file
include 'connect.php';

// Retrieve job details from POST request
$userName = isset($_POST['userName']) ? $_POST['userName'] : '';
$userImage = isset($_POST['userImage']) ? $_POST['userImage'] : '';
$timeUpload = isset($_POST['timeUpload']) ? $_POST['timeUpload'] : '';
$title = isset($_POST['title']) ? $_POST['title'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$likeNumber = isset($_POST['likeNumber']) ? $_POST['likeNumber'] : 0; // Default to 0 if not provided
$commentNumber = isset($_POST['commentNumber']) ? $_POST['commentNumber'] : 0; // Default to 0 if not provided
$shareNumber = isset($_POST['shareNumber']) ? $_POST['shareNumber'] : 0; // Default to 0 if not provided
$userId = isset($_POST['userId']) ? $_POST['userId'] : '';

// Prepare SQL query to insert job data
$sql = "INSERT INTO posts (postId, userName, userImage, timeUpload, title, content, likeNumber, commentNumber, shareNumber, userId) 
VALUES (null,'$userName', '$userImage', '$timeUpload', '$title', '$content', '$likeNumber', '$commentNumber', '$shareNumber', '$userId')";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "Job information uploaded successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
