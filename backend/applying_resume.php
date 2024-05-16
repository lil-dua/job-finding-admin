<?php

// Include the database connection file
include 'connect.php';

// Query to fetch jobs from the database
$sql = "SELECT * FROM applying_resume";
$result = $conn->query($sql);

// Array to hold the list of jobs
$applyingResumes = array();

// Check if there are any jobs in the database
if ($result->num_rows > 0) {
    // Fetch data from each row and create Job objects
    while($row = $result->fetch_assoc()) {
        $applyingResume = new stdClass();
        $applyingResume->resumeId = $row["resumeId"];
        $applyingResume->userName = $row["userName"];
        $applyingResume->jobName = $row["jobName"];
        $applyingResume->timeApplied = $row["timeApplied"];
        $applyingResume->appliedStatus = $row["appliedStatus"];
        $applyingResume->workExperience = $row["workExperience"];
        $applyingResume->userId = $row["userId"];
        $applyingResume->jobId = $row["jobId"];
        // Add the Job object to the array
        $applyingResumes[] = $applyingResume;
    }
} else {
    echo "No recommend profiles found.";
}

// Close the database connection
$conn->close();

// Return the list of jobs as JSON
header('Content-Type: application/json');
echo json_encode($applyingResumes);

?>