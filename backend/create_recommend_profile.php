<?php 
// Include the database connection file
include 'connect.php';

// Retrieve job details from POST request
$profileName = isset($_POST['profileName']) ? $_POST['profileName'] : '';
$resumeName = isset($_POST['resumeName']) ? $_POST['resumeName'] : '';
$resumeSize = isset($_POST['resumeSize']) ? $_POST['resumeSize'] : '';
$resumeUpload = isset($_POST['resumeUpload']) ? $_POST['resumeUpload'] : '';
$resumeFilePath = isset($_POST['resumeFilePath']) ? $_POST['resumeFilePath'] : '';
$userId = isset($_POST['userId']) ? $_POST['userId'] : '';

// Prepare SQL query to insert job data
$sql = "INSERT INTO recommend_profile (profileId, profileName, resumeName, resumeSize, resumeUpload, resumeFilePath, userId) 
VALUES (null,'$profileName', '$resumeName', '$resumeSize', '$resumeUpload', '$resumeFilePath', '$userId')";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "Job information uploaded successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
