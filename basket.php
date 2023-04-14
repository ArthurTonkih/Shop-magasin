<?
include "nav.php";
$req = "SELECT * FROM `cart` WHERE `id_users` =". $_COOKIE['id'];
$result = mysqli_query($link, $req);
$cart = [];
while ($row = mysqli_fetch_assoc($result))
    $cart[] = $row;
?>
<div class="title">
	<h2 align="center">Корзина</h2>
</div>


<?
for ($i = 0; $i < count($cart); $i++){
	$req = "SELECT * FROM `drinks` WHERE `id` =". $cart[$i]['idProduct'];
	$result = mysqli_query($link, $req);
	$drinks = mysqli_fetch_assoc($result);
		echo '<div class="product">';
		echo "<p><img src='../img/".$drinks['img']."'></p>
 			<p>".$drinks['title']."</p>
     		<p>".$drinks['price']."</p>
			<a><i class='fa fa-trash-o fa-fw cart-delete'></i></a>
			</div>
     		";
    $sum += $drinks['price'];
}
echo '<h3>Итоговая сумма:</h3>';
echo $sum." рублей";



echo "<div class='containers'>";
echo "<a href='order.php?id=".$cart[$i]['idProduct']."' class='neon-btn purple'>Оформить заказ</a>";
echo "</div>";
?>


<?
include "footer.php";
?>

<script type="text/javascript" src="js_basket.js?<?php echo time(); ?>"></script>