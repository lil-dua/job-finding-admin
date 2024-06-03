<?php

// Include the database connection file
include 'connect.php';

// Check if userId parameter is set
if(isset($_POST['userId'])) {
    // Sanitize userId input
    $userId = $_POST['userId'];

    // Initialize user profile array
    $userInfo = array();

    // Fetch user profile data based on userId
    $sql = "SELECT * FROM account WHERE userId = '$userId'";
    $result = $conn->query($sql);

    // Check if user profile data exists
    if ($result->num_rows > 0) {
        // Fetch user profile data
        $row = $result->fetch_assoc();

        // Populate user profile array
        $userInfo['userName'] = $row["userName"];
        $userInfo['email'] = $row["email"];
        $userInfo['birthday'] = $row["birthday"];
        $userInfo['phoneNumber'] = $row["phoneNumber"];

        // Return the UserProfile object as JSON
        header('Content-Type: application/json');
        echo json_encode($userInfo);
    } else {
        echo "User information not found for the provided userId.";
    }

    // Close the database connection (optional, as PHP closes connections automatically)
    $conn->close();
} else {
    echo "userId parameter is missing.";
}

?>
