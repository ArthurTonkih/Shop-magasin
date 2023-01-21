<?
	$link = mysqli_connect('localhost', 'root', '', 'shop');
?>
<!DOCTYPE html>
<html>
<head>
		<title>SHOP-MAGAZIN</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
	<div class="social">
		<? if (!@$_COOKIE['id']) {
			echo "<a href='reg.php'>Регистрация</a>
			<a href='auth.php'>Вход</a>";
		} else {
			echo "<a href='?logout=1'>Выйти</a>";
		}
		?>
		<a href="admin/index.php">Вход в админ панель</a>
	</div>
</div>
	
	<div class="navbar">
		<div class="container">
			<a href="#" class="navbar-brand">SHOP-MAGAZIN</a>
			<div class="navbar-wrap">
			<ul class="navbar-menu">
				<li><a href="index.php">Главная</a></li>
				<li><a href="catalog.php">Каталог</a></li>
				<li><a href="news.php">Новости</a></li>
			</ul>
			<a href='cart.php'>
			 	<div class = "cart">
			 		<div class="number-product">0</div>
				<i class="fa fa-shopping-cart fa-2x"></i> 
				</div>
			</a>
		</div>
	</div>
		<hr>
</div>

