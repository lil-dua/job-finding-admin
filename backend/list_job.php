<?php

// Include the database connection file
include 'connect.php';

// Query to fetch jobs from the database
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

// Array to hold the list of jobs
$jobs = array();

// Check if there are any jobs in the database
if ($result->num_rows > 0) {
    // Fetch data from each row and create Job objects
    while($row = $result->fetch_assoc()) {
        $job = new stdClass();
        $job->jobId = $row["jobId"];
        // $job->image = $row["image"];
        $job->jobName = $row["jobName"];
        $job->typeOfWorkplace = $row["typeOfWorkplace"];
        $job->jobLocation = $row["jobLocation"];
        $job->company = $row["company"];
        $job->employmentType = $row["employmentType"];
        $job->jobDescription = $row["jobDescription"];
        $job->workExperience = $row["workExperience"];
        $job->salaryPerMonth = $row["salaryPerMonth"];
        $job->timeUpload = $row["timeUpload"];
        $job->companyId = $row["companyId"];
        // Add the Job object to the array
        $jobs[] = $job;
    }
} else {
    echo "No jobs found.";
}

// Close the database connection
$conn->close();

// Return the list of jobs as JSON
header('Content-Type: application/json');
echo json_encode($jobs);

?>