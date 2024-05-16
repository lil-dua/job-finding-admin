<?php

// Include the database connection file
include 'connect.php';

// Query to fetch jobs from the database
$sql = "SELECT * FROM recommend_profile";
$result = $conn->query($sql);

// Array to hold the list of jobs
$recommendProfiles = array();

// Check if there are any jobs in the database
if ($result->num_rows > 0) {
    // Fetch data from each row and create Job objects
    while($row = $result->fetch_assoc()) {
        $recommendProfile = new stdClass();
        $recommendProfile->profileId = $row["profileId"];
        $recommendProfile->profileName = $row["profileName"];
        $recommendProfile->resumeName = $row["resumeName"];
        $recommendProfile->resumeSize = $row["resumeSize"];
        $recommendProfile->resumeUpload = $row["resumeUpload"];
        $recommendProfile->resumeFilePath = $row["resumeFilePath"];
        $recommendProfile->userId = $row["userId"];
        // Add the Job object to the array
        $recommendProfiles[] = $recommendProfile;
    }
} else {
    echo "No recommend profiles found.";
}

// Close the database connection
$conn->close();

// Return the list of jobs as JSON
header('Content-Type: application/json');
echo json_encode($recommendProfiles);

?>