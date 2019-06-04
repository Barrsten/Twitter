<meta charset="utf-8">
<form method="POST" action="update.php" enctype="multipart/form-data">
	<?php 
		echo '<input type="file" name="post_image">';
		echo '<input name="post_text" value="' . $_POST['post_text'] . '">';
		echo '<input name="id" value="' . $_POST['id'] . '" type="hidden">';
	?>
	<button>Сохранить</button>
</form>