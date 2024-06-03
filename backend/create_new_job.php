<?php 
// Include the database connection file
include 'connect.php';

// Retrieve job details from POST request
$image = isset($_POST['image']) ? $_POST['image'] : '';
$jobName = isset($_POST['jobName']) ? $_POST['jobName'] : '';
$typeOfWorkplace = isset($_POST['typeOfWorkplace']) ? $_POST['typeOfWorkplace'] : '';
$jobLocation = isset($_POST['jobLocation']) ? $_POST['jobLocation'] : '';
$company = isset($_POST['company']) ? $_POST['company'] : '';
$employmentType = isset($_POST['employmentType']) ? $_POST['employmentType'] : '';
$jobDescription = isset($_POST['jobDescription']) ? $_POST['jobDescription'] : '';
$workExperience = isset($_POST['workExperience']) ? $_POST['workExperience'] : '';
$salaryPerMonth = isset($_POST['salaryPerMonth']) ? $_POST['salaryPerMonth'] : '';
$timeUpload = isset($_POST['timeUpload']) ? $_POST['timeUpload'] : '';
$isApproved = isset($_POST['isApproved']) ? $_POST['isApproved'] : 0; // Default to 0 if not provided
$companyId = isset($_POST['companyId']) ? $_POST['companyId'] : 0; // Default to 0 if not provided

// Prepare SQL query to insert job data
$sql = "INSERT INTO jobs (jobId, image, jobName, typeOfWorkplace, jobLocation, company, employmentType, jobDescription, workExperience, salaryPerMonth, timeUpload, isApproved, companyId) 
VALUES (null,'$image', '$jobName', '$typeOfWorkplace', '$jobLocation', '$company', '$employmentType', '$jobDescription', '$workExperience', '$salaryPerMonth', '$timeUpload', $isApproved, $companyId)";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "Job information uploaded successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
