<?php 
// Include the database connection file
include 'connect.php';

// Retrieve job details from POST request
$userName = isset($_POST['userName']) ? $_POST['userName'] : '';
$jobName = isset($_POST['jobName']) ? $_POST['jobName'] : '';
$timeApplied = isset($_POST['timeApplied']) ? $_POST['timeApplied'] : '';
$appliedStatus = isset($_POST['appliedStatus']) ? $_POST['appliedStatus'] : '';
$workExperience = isset($_POST['workExperience']) ? $_POST['workExperience'] : '';
$userId = isset($_POST['userId']) ? $_POST['userId'] : 0; // Default to 0 if not provided
$jobId = isset($_POST['jobId']) ? $_POST['jobId'] : 0; // Default to 0 if not provided

// Prepare SQL query to insert job data
$sql = "INSERT INTO applying_resume (resumeId, userName, jobName, timeApplied, appliedStatus, workExperience,userId, jobId)
VALUES (null,'$userName', '$jobName', '$timeApplied', '$appliedStatus', '$workExperience', '$userId', '$jobId')";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "Job information uploaded successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
