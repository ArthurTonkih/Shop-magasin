<?
$link = mysqli_connect('localhost', 'root', '', 'shop');
?>
<!DOCTYPE html>
<html>
<head>
		<title>Admin-Panel</title>
		<link rel="stylesheet" type="text/css" href="../style.css?<?php echo time() ?>">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>


	<div class="navbar">
		<div class="container">
			<a href="#" class="navbar-brand">Admin-Panel</a>
			<div class="navbar-wrap">
			<ul class="navbar-menu">
				<li><a href="index.php">Главная</a></li>
				<li><a href="products.php">Товары</a></li>
				<li><a href="news.php">Новости</a></li>
				<li><a href="categories.php">Категории</a></li>
				<li><a href="../index.php">Магазин</a></li>
			</ul>
			</div>
		</div>
			<hr>
	</div>
