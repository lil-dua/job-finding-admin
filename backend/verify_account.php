<?php 
// Include the database connection file
include 'connect.php';
$email = isset($_POST['email'])?$_POST['email']:'';
$password = isset($_POST['password'])?$_POST['password']:'';

$sql = 'SELECT * FROM account WHERE email = "'.$email.'"';

if($result = $conn->query($sql)) {
    $row = $result->fetch_assoc();
    if($row) {
        if($password == $row['password']) {
            echo json_encode($row['userId']);
        } else {
            echo json_encode(0);
        }
    } else {
        echo json_encode(0);
    }
} else {
    echo 'error';
}

// Close the database connection
$conn->close();

 ?>