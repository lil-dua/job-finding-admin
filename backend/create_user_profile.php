<?php

// Include the database connection file
include 'connect.php';

// Check if the necessary POST parameters are set
if (
    isset($_POST['careerObject']) 
    && isset($_POST['educationList']) 
    && isset($_POST['workExperienceList'])
    && isset($_POST['languageList'])
    && isset($_POST['appreciationList'])
    && isset($_POST['skills'])
    && isset($_POST['resumeInfo'])) {
        
    // Sanitize and retrieve the user information
    $careerObject = $_POST['careerObject'];
    $educationList = $_POST['educationList'];
    $workExperienceList = $_POST['workExperienceList'];
    $languageList = $_POST['languageList'];
    $appreciationList = $_POST['appreciationList'];
    $skills = $_POST['skills'];
    $resumeInfo = $_POST['resumeInfo'];

    // Prepare and execute the SQL query to insert the user information into the database
    $sql = "INSERT INTO users (userId, careerObject, educationList, workExperienceList, languageList, appreciationList, skills, resumeInfo) 
    VALUES (null,'$careerObject', '$educationList', '$workExperienceList', '$languageList', '$appreciationList', '$skills', '$resumeInfo')";

    if ($conn->query($sql) === TRUE) {
        // If insertion is successful, return a success message
        echo "User information uploaded successfully.";
    } else {
        // If there's an error with the database query, return an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If any required parameter is missing, return an error message
    echo "Missing required parameters.";
}

// Close the database connection
$conn->close();

?>
