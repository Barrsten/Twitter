<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>
<body>
	<?php 
		$connect = mysqli_connect('127.0.0.1', 'root', '', 'barrsten');
	?>
	<div class="col-12 red">
		<div class="row" style="width: 800px">
			<div class="row" style="margin-left: auto; margin-right: auto;">
				<img src="icons8-home-50.png" class="w-25 h-100">
				<a href="#">Домой</a>
			</div>
			<div class="row" style="margin-left: auto; margin-right: auto;">
				<img src="icons8-notification-50.png" class="w-25 h-100">
				<a href="#">Уведомления</a>
			</div>
			<div class="row" style="margin-left: auto; margin-right: auto;">
				<img src="icons8-new-post-50.png" class="w-25 h-100">
				<a href="#">Сообщения</a>
			</div>
			<div class="row" style="margin-left: auto; margin-right: auto;">
				<img src="icons8-twitter-50.png" class="w-75 h-100">
			</div>
		</div>
		
	</div>
	<div class="container">
		<div class="row">
			<!--левая колонка-->
			<div class="col-3 mt-2">
				<div>	
					<div class="row">	
						<img src="background.jpg">
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-4">
						<img src="avatar.jpg" class="rounded-circle">
					</div>
					<div class="col-8">
						<a href="#">Mary Smith</a>
						<br>
						<a href="#">@MarySmith</a>
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-6">
						<a href="#">Твиты</a>
						<br>
						<a href="#">276</a>
					</div>
					<div class="col-6">
						<a href="#">Читаемые</a>
						<br>
						<a href="#">206</a>
					</div>
				</div>
				<div class="mt-5">
					<h5>Актуальные темы для вас</h5>
					<?php 
					$result = mysqli_query($connect, "SELECT * FROM topics");
					
					$res = $result->fetch_assoc();
					for($i=0; $i<8;$i++){
						$res = $result->fetch_assoc();
					?>
					<?php  
						echo '<a href="' . $res["href"]  . '">' . $res["title"] .'</a>';
						echo '<br>';
					?>
					<?php } ?>
				</div>
			</div>
			<!--центральна колонка-->
			<div class="col-6 mt-2">
				<div class="mt-2">
					<form method="POST" action="insert.php">
						<div class="col-10">
							<div class="row">
								<div class="col-2">	
									<img src="avatar.jpg" class="rounded-circle w-50">
								</div>
								<div class="col-10">	
									<textarea placeholder="Что нового?" name="text" cols="60" rows="4"></textarea>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-4 row" style="margin-left: 2%">
									<div class="col-2"><img src="picture.png"></div>	
									<div class="col-2"><img src="gif.png"></div>
									<div class="col-2"><img src="graph.png"></div>
									<div class="col-2"><img src="placeholder.png"></div>
							</div>
							<div class="col-5"></div>
							<div class="row">
								<div class="col-3 mr-2">	
									<img src="plus.png">
								</div>
								<button type="submit" class="btn btn-info">Твитнуть</button>
							</div>
							
						</div>
					</form>
				</div>
				<?php 
					$result = mysqli_query($connect, "SELECT * FROM tweet");
					for($i=0; $i<$result->num_rows;$i++){
						$res = $result->fetch_assoc();
					?>
						<div class="row mt-2">
					<?php
					echo '<div class="col-2"><img src="' . $res["account_image"] . '"></div>';
					echo '<div class="col-10">';
					echo '<div class="row">';
					echo '<h5>' . $res["account_name"] . '</h5>';
					echo '<a href="#">' . $res["account_link"] . '</a>';
					echo '</div>';
					echo '<div>';
					echo '<p>' . $res["post_text"] .'</p>';
					echo '</div>';	
					echo '<div>';
					echo '<img src="' . $res["post_image"] . '" class="w-100">';
					echo '</div>';
					echo '<div class="row">';
					echo '<div class="col-3"><img src="comment.png"></div><div class="col-3"><img src="like.png"></div><div class="col-3"><img src="retweet.png" ></div><div class="col-3"><img src="envelope.png" ></div></div></div>';
					?>
					<form action="delete.php" method="POST">
						<?php  
							echo "<button class='btn btn-info' name='id' value='" . $res['id'] . "'>Удалить</button>";
						?>
					</form>
					<form method="POST" action="change.php">
					<?php 
						echo '<input name="post_text" value="' . $res['post_text'] . '" type="hidden">' ;
						echo '<input name="post_image" value="' . $res['post_image'] . '" type="hidden">' ;
						echo '<input name="id" value="' . $res['id'] . '" type="hidden">' ;
					?>
					<button class="btn btn-info ml-2">Редактировать</button>
					</form>
					</div>
				<?php } ?>
			</div>
			<!--правая колонка-->
			<div class="col-3 mt-2">
				<div class="row">
					<div class="col-4">
						<h5>Кого читать</h5>
					</div>
					<div class="col-8">
						<a href="#">Обновить Все</a>
					</div>
				</div>
				<?php 
					$result = mysqli_query($connect, "SELECT * FROM recomendation");
					for($i=0; $i<3;$i++){
						$res = $result->fetch_assoc();
					?>
					<?php  
				echo '<div>';
					echo '<div class="row mt-2">';
							echo '<div class="col-4">';
								echo '<img src="'. $res["rec_img"] . '" class="rounded-circle">';
							echo '</div>';
							echo '<div class="col-8">';
								echo '<a href="#">' . $res["rec_name"] . '</a>';
								echo '<span class="size">' . $res["rec_link"] . '</span>';
								echo '<button type="button" class="btn btn-info">Читать</button>';
							echo '</div>';
						echo '</div>';
				echo '</div>';
				?>
				<?php } ?>
				<div class="row">	
					<div class="col-4">
						<img src="gmail.png" class="w-75 h-50">
					</div>			
					<div class="col-8">
						<h5 class="text-primary">Найдите знакомых</h5>
						<span class="text-info">Импортируйте контакты из gmail</span>
					</div>
				</div>
				<p class="text-info">Подключить другие адресные книги</p>
				<div class="mt-2">
					<div class="row">
						<p>© Twitter, 2018</p>
						<p class="text-info">О нас Справочный центр Условия Политика конфиденциальности Файлы cookie О рекламе Бренд Блог Состояние Приложения Вакансии Маркетинг Компаниям Разработчикам </p>
					</div>
				</div>
			</div>

		</div>
	</div>
</body>
</html>