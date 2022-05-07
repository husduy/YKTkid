<?php 
require '../connect.php';
session_start();
$idp = $_SESSION['idp'];
$namep = $_SESSION['namep'];
$surnamep = $_SESSION['surnamep'];
$patronymicp = $_SESSION['patronymicp'];
$userpicp = $_SESSION['userpicp'];
$emailp = $_SESSION['emailp'];
$customer = $surname . ' ' . $name . ' ' . $patronymic;
$sql = 'SELECT * FROM orders';
$resultOrder = mysqli_query($link, $sql);
$sql = 'SELECT * FROM order_responses';
$resultResponses = mysqli_query($link, $sql);
$sql = 'SELECT * FROM teams';
$resultTest = mysqli_query($link, $sql);
$rowTest = mysqli_fetch_array($resultTest);
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.order {
			background-color: #eee;
		}
		.order img {
			width: 100px;
		}
		#orderDiv {
			display: none;
		}
		.bg-kid {
			background: #F8F4F4;
			border-radius: 10.935px;
			padding: 15px 30px;
		}
		.bg-kid p {
			margin: 0px;
		}
		a {
			text-decoration: none;
			color: #000;
		}
		a:hover {
			color: #FFC53A;
		}
	</style>
</head>
<body>
	<?php require 'header.php' ?>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-2">
				<img src="../<?= $userpicp; ?>">
			</div>
		</div>
		<h1>Личная информация</h1>
		<div class="row">
			<div class="col-6">
				<div class="row">
					<div class="col-6">
						<p>Имя</p>
						<div class="bg-kid">
							<p><?= $namep; ?></p>
						</div>
					</div>
					<div class="col-6">
						<p>Фамилия</p>
						<div class="bg-kid">
							<p><?= $surnamep; ?></p>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-6">
						<p>Email</p>
						<div class="bg-kid">
							<p><?= $emailp; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<h1>Оставить свой заказ</h1>
			<form action="../upload.php" method="post" enctype=multipart/form-data>
				<div class="mb-3">
				    <label class="form-label">Заголовок проекта</label>
				    <input type="text" class="form-control" name="title">
				</div>
				<div class="mb-3">
				    <label class="form-label">Категория проекта</label>
				    <select class="form-select" name="category">
					  	<option selected>Выберите категорию проекта</option>
					  	<option value="Разработка">Разработка</option>
					  	<option value="3D моделирование">3D моделирование</option>
					  	<option value="2D рисунок">2D рисунок</option>
					</select>
				</div>
				<div class="mb-3">
				    <label class="form-label">Полное описание проекта</label>
				    <input type="text" class="form-control" name="fulldescription">
				</div>
				<div class="mb-3">
				    <label class="form-label">Фото-материал</label>
				    <input type="file" class="form-control" name="photo">
				</div>
				<div class="mb-3">
				    <label class="form-label">Сроки</label>
				    <input type="text" class="form-control" name="deadline">
				</div>
				<div class="mb-3">
				    <label class="form-label">Бюджет</label>
				    <input type="text" class="form-control" name="budget">
				</div>
				<input type="hidden" class="form-control" name="customer" value="<?= $customer; ?>">
				<button type="submit" class="btn btn-primary" name="submitorderk">Оставить заказ</button>
			</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>