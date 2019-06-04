<?php 
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'barrsten');
	$insert = mysqli_query($connect, "INSERT INTO tweet (post_text, post_image, account_name, account_link, account_image) VALUES ('" . $_POST['text'] . "', '', 'Mary Smith', '@MarySmith', 'avatar.jpg')");
	header('Location: http://lyglaevartem/Twitter/index.php');
?>