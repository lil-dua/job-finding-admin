<?php

// Get parameters from the request
$name = $_GET['name'];
$location = $_GET['location'];
$minSalary = $_GET['minSalary'];
$maxSalary = $_GET['maxSalary'];
$typeOfWorkplace = $_GET['typeOfWorkplace'];
$employmentType = $_GET['employmentType'];
$experience = $_GET['experience'];

// Prepare SQL query based on the parameters
$sql = "SELECT * FROM jobs WHERE 1=1"; // Start with a base query

if (!empty($name)) {
    $sql .= " AND name LIKE '%$name%'";
}
if (!empty($location)) {
    $sql .= " AND location LIKE '%$location%'";
}
if (!empty($minSalary)) {
    $sql .= " AND salary >= $minSalary";
}
if (!empty($maxSalary)) {
    $sql .= " AND salary <= $maxSalary";
}
if (!empty($typeOfWorkplace)) {
    $sql .= " AND typeOfWorkplace = '$typeOfWorkplace'";
}
if (!empty($employmentType)) {
    $sql .= " AND employmentType = '$employmentType'";
}
if (!empty($experience)) {
    $sql .= " AND experience = '$experience'";
}

// Execute the query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch data and store in an array
    $jobs = array();
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
    // Return JSON response
    echo json_encode($jobs);
} else {
    // No results found
    echo "No jobs found.";
}

// Close connection
$conn->close();
?>
