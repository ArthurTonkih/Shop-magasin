<?php
include "nav.php";
?>

	
<?
$id=$_GET['id']; 

$link = mysqli_connect('localhost', 'root', '', 'shop');
$req = "SELECT * FROM `drinks` WHERE `id` = $id";
$result = mysqli_query($link, $req);
$epms = mysqli_fetch_assoc($result);
echo "<div class = 'title'>";
echo "<h2>".$epms['title']."</h2>";
echo "</div>"
?>

<?


echo "<img src='img/".$epms['img']."'>";
echo "<h3>Описание товара</h3>";
echo "<p>".$epms['description']."</p>";
echo "<h3>".$epms['price']." $";
echo "<br>"."<br>";

if ($_COOKIE['id']) {
	echo "<div class = 'cartadd' id =".$epms['id'].">Добавить в корзину</div><br>";
} else {
	echo "<h4>Для того, чтобы добавить товар в корзину необходимо авторизоваться!</h4>";
}

?>

<?php
include "footer.php";
?>