<?php 
	include 'C:\xampp\htdocs\job_finding_app\backend\connect.php';

	$jobId = isset($_POST['jobId'])?$_POST['jobId']:'';
	if($jobId != ''){
		//Nếu người dùng xóa thông qua mã sinh viên 
		$sql = "UPDATE jobs SET isApproved = 1 WHERE jobId =".$jobId;
	}else{
		//Nếu người dùng xóa trực tiếp trên danh sách sinh viên
		$jobId = isset($_GET['jobId'])?$_GET['jobId']:'';
		$sql = "UPDATE jobs SET isApproved = 1 WHERE jobId =".$jobId;
	}

	//Thực hiện hàm sql
	if ($conn->query($sql)) {
		echo '<script type = "text/javascript">';
		echo 'alert("Job was approved!")';
		echo '</script>';
	} else {
		echo '<script type = "text/javascript">';
		echo 'alert("Error approve job!)';
		echo '</script>';
	}
	$conn->close();
	include 'dropdowns.php';
 ?>