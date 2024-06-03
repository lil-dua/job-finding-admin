<?php 
	
// Include the database connection file
include 'connect.php';

$image = isset($_POST['image'])?$_POST['image']:'';
$companyName = isset($_POST['companyName'])?$_POST['companyName']:'';
$companyLocation = isset($_POST['companyLocation'])?$_POST['companyLocation']:'';
$linkWebsite = isset($_POST['linkWebsite'])?$_POST['linkWebsite']:'';
$industry = isset($_POST['industry'])?$_POST['industry']:'';
$employmentSize = isset($_POST['employmentSize'])?$_POST['employmentSize']:'';
$headOffice = isset($_POST['headOffice'])?$_POST['headOffice']:'';
$companyType = isset($_POST['companyType'])?$_POST['companyType']:'';
$since = isset($_POST['since'])?$_POST['since']:'';
$specialization = isset($_POST['specialization'])?$_POST['specialization']:'';
$companyDescription = isset($_POST['companyDescription'])?$_POST['companyDescription']:'';


// Prepare and execute the SQL query to insert the user information into the database
$sql = "INSERT INTO company (companyId, image, companyName, companyLocation, linkWebsite, industry, employmentSize, headOffice, companyType, since, specialization, companyDescription) 
VALUES (null,'$image', '$companyName', '$companyLocation', '$linkWebsite', '$industry', '$employmentSize', '$headOffice', '$companyType', '$since', '$specialization', '$companyDescription')";

if ($conn->query($sql) === TRUE) {
    // If insertion is successful, return a success message
    echo "Company information uploaded successfully.";
} else {
    // If there's an error with the database query, return an error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
// Close the database connection
$conn->close();
 ?>