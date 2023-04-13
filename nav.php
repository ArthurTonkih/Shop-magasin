<?

if (isset($_GET['logout'])) {
	setcookie('id','');
	header("Location: /");
}

	$link = mysqli_connect('localhost', 'root', '', 'shop');
	if (@$_COOKIE['id']){
		$query = "SELECT COUNT(`idProduct`) as `count` FROM `cart` WHERE `id_users` = ".$_COOKIE['id'];
		$res = mysqli_query($link, $query);
		$count = mysqli_fetch_assoc($res)['count'];
	} else {
		$count = 0;
	}
?>
<!DOCTYPE html>
<html>
<head>
		<title>SHOP-MAGAZIN</title>
		<link rel="stylesheet" type="text/css" href="style.css?<?php echo time() ?>">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
				<li><a href="profile.php">Профиль</a></li>
				<li><a href="catalog.php">Каталог</a></li>
				<li><a href="news.php">Новости</a></li>
				<li><a href="favorite.php">Избранное</a></li>
			</ul>
			<a href='basket.php'>
			 	<div class = "cart">
			 		<div class="number-product"><? echo $count?></div>
				<i class="fa fa-shopping-cart fa-2x"></i> 
				</div>
			</a>
		</div>
	</div>
		<hr>
</div>


