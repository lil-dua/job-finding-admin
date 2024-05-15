<?php

// Include the database connection file
include 'connect.php';

// Check if userId parameter is set
if(isset($_POST['userId'])) {
    // Sanitize userId input
    $userId = $_POST['userId'];

    // Initialize user profile array
    $userProfile = array();

    // Fetch user profile data based on userId
    // Assuming there's a table named 'user_profile' containing all profile data
    $sql = "SELECT * FROM user_profile WHERE userId = '$userId'";
    $result = $conn->query($sql);

    // Check if user profile data exists
    if ($result->num_rows > 0) {
        // Fetch user profile data
        $row = $result->fetch_assoc();

        // Populate user profile array
        $userProfile['userId'] = $row["userId"];
        $userProfile['careerObject'] = $row["careerObject"];
        // $userProfile['educationList'] = json_decode($row["educationList"]);
        // $userProfile['workExperienceList'] = json_decode($row["workExperienceList"]);
        // $userProfile['languageList'] = json_decode($row["languageList"]);
        // $userProfile['appreciationList'] = json_decode($row["appreciationList"]);
        // $userProfile['skills'] = json_decode($row["skills"]);
        // $userProfile['resumeInfo'] = $row["resumeInfo"];

        // Return the UserProfile object as JSON
        header('Content-Type: application/json');
        echo json_encode($userProfile);
    } else {
        echo "User profile not found for the provided userId.";
    }

    // Close the database connection (optional, as PHP closes connections automatically)
    $conn->close();
} else {
    echo "userId parameter is missing.";
}

?>
