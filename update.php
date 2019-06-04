<?php 
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'barrsten');
	$file_tmp = $_FILES['post_image']['tmp_name'];
	$file_name = $_FILES['post_image']['name'];
	if($file_name != null){
	move_uploaded_file($file_tmp, $file_name);
	$query = mysqli_query($connect, "UPDATE tweet SET post_text='" . $_POST['post_text'] . "', post_image='" . $file_name . "' WHERE id ='" . $_POST['id'] . "'");
	header('Location: http://lyglaevartem/Twitter/index.php');
}else{
	$query = mysqli_query($connect, "UPDATE tweet SET post_text='" . $_POST['post_text'] . "', post_image='" . $file_name . "' WHERE id ='" . $_POST['id'] . "'");
	header('Location: http://lyglaevartem/Twitter/index.php');
}
?>