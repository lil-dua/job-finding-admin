<?php

// Include the database connection file
include 'connect.php';

// Check if userId parameter is set
if (isset($_POST['jobId'])) {
    // Sanitize jobInfoId input
    $jobId = $_POST['jobId'];;

    // Initialize jobInfo info array
    $jobInfo = array();

    // Fetch user profile data based on userId
    $sql = "SELECT * FROM jobs WHERE jobId = '$jobId'";
    $result = $conn->query($sql);

    // Check if user profile data exists
    if ($result->num_rows > 0) {
        // Fetch user profile data
        $row = $result->fetch_assoc();

        // Populate jobInfo info array
        $jobInfo['jobId'] = (int) $row["jobId"];
        $jobInfo['image'] = $row["image"];
        $jobInfo['jobName'] = $row["jobName"];
        $jobInfo['typeOfWorkplace'] = $row["typeOfWorkplace"];
        $jobInfo['jobLocation'] = $row["jobLocation"];
        $jobInfo['company'] = $row["company"];
        $jobInfo['employmentType'] = $row["employmentType"];
        $jobInfo['jobDescription'] = $row["jobDescription"];
        $jobInfo['workExperience'] = $row["workExperience"];
        $jobInfo['salaryPerMonth'] = $row["salaryPerMonth"];
        $jobInfo['timeUpload'] = $row["timeUpload"];
        $jobInfo['companyId'] = (int) $row["companyId"];

        // Return the UserProfile object as JSON
        header('Content-Type: application/json');
        echo json_encode($jobInfo);
    } else {
        echo "User profile not found for the provided userId.";
    }

    // Close the database connection (optional, as PHP closes connections automatically)
    $conn->close();
} else {
    echo "userId parameter is missing.";
}

?>
