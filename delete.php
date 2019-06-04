<?php 
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'barrsten');
	mysqli_query($connect, "DELETE FROM tweet WHERE id='" . $_POST['id'] . "'");
	header('Location: http://lyglaevartem/Twitter/index.php');
?>