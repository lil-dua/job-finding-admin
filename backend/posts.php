<?php

// Include the database connection file
include 'connect.php';

// Query to fetch jobs from the database
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

// Array to hold the list of jobs
$posts = array();

// Check if there are any jobs in the database
if ($result->num_rows > 0) {
    // Fetch data from each row and create Job objects
    while($row = $result->fetch_assoc()) {
        $post = new stdClass();
        $post->postId = $row["postId"];
        $post->userName = $row["userName"];
        $post->userImage = $row["userImage"];
        $post->timeUpload = $row["timeUpload"];
        $post->title = $row["title"];
        $post->content = $row["content"];
        $post->likeNumber = $row["likeNumber"];
        $post->commentNumber = $row["commentNumber"];
        $post->shareNumber = $row["shareNumber"];
        $post->userId = $row["userId"];
        // Add the Job object to the array
        $posts[] = $post;
    }
} else {
    echo "No recommend profiles found.";
}

// Close the database connection
$conn->close();

// Return the list of jobs as JSON
header('Content-Type: application/json');
echo json_encode($posts);

?>