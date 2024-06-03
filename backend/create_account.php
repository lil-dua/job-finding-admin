<?php 
	
// Include the database connection file
include 'connect.php';

$username = isset($_POST['userName'])?$_POST['userName']:'';
$email = isset($_POST['email'])?$_POST['email']:'';
$password = isset($_POST['password'])?$_POST['password']:'';
$birthday = isset($_POST['birthday'])?$_POST['birthday']:'';
$phoneNumber = isset($_POST['phoneNumber'])?$_POST['phoneNumber']:'';
$isCompany = isset($_POST['isCompany'])?$_POST['isCompany']:'';


// Prepare and execute the SQL query to insert the user information into the database
$sql = "INSERT INTO account (userId, userName, email, password, birthday, phoneNumber, isCompany) 
VALUES (null,'$username', '$email', '$password', '$birthday', '$phoneNumber', '$isCompany')";

if ($conn->query($sql) === TRUE) {
    // If insertion is successful, return a success message
    echo "Account information uploaded successfully.";
} else {
    // If there's an error with the database query, return an error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
// Close the database connection
$conn->close();
 ?>