<?php 
	include 'C:\xampp\htdocs\job_finding_app\backend\connect.php';

	$postId = isset($_POST['postId'])?$_POST['postId']:'';
	if($postId != ''){
		//Nếu người dùng xóa thông qua mã sinh viên 
		$sql = "UPDATE posts SET isApproved = 1 WHERE postId =".$postId;
	}else{
		//Nếu người dùng xóa trực tiếp trên danh sách sinh viên
		$postId = isset($_GET['postId'])?$_GET['postId']:'';
		$sql = "UPDATE posts SET isApproved = 1 WHERE postId =".$postId;
	}

	//Thực hiện hàm sql
	if ($conn->query($sql)) {
		echo '<script type = "text/javascript">';
		echo 'alert("Post was approved!")';
		echo '</script>';
	} else {
		echo '<script type = "text/javascript">';
		echo 'alert("Error approve post!)';
		echo '</script>';
	}
	$conn->close();
	include 'basic_elements.php';
 ?>