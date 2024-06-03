<?php

// Include the database connection file
include 'connect.php';

// Check if userId parameter is set
if(isset($_POST['companyId'])) {
    // Sanitize userId input
    $companyId = $_POST['companyId'];

    // Initialize user profile array
    $companyInfo = array();

    // Fetch user profile data based on userId
    $sql = "SELECT * FROM company WHERE companyId = '$companyId'";
    $result = $conn->query($sql);

    // Check if user profile data exists
    if ($result->num_rows > 0) {
        // Fetch user profile data
        $row = $result->fetch_assoc();

        // Populate user profile array
        $companyInfo['companyId'] = (int) $row["companyId"];
        $companyInfo['image'] = $row["image"];
        $companyInfo['companyName'] = $row["companyName"];
        $companyInfo['companyLocation'] = $row["companyLocation"];
        $companyInfo['linkWebsite'] = $row["linkWebsite"];
        $companyInfo['industry'] = $row["industry"];
        $companyInfo['employmentSize'] = $row["employmentSize"];
        $companyInfo['headOffice'] = $row["headOffice"];
        $companyInfo['companyType'] = $row["companyType"];
        $companyInfo['since'] = $row["since"];
        $companyInfo['specialization'] = $row["specialization"];
        $companyInfo['companyDescription'] = $row["companyDescription"];

        // Return the UserProfile object as JSON
        header('Content-Type: application/json');
        echo json_encode($companyInfo);
    } else {
        echo "User information not found for the provided userId.";
    }

    // Close the database connection (optional, as PHP closes connections automatically)
    $conn->close();
} else {
    echo "userId parameter is missing.";
}

?>
