<?
include "nav.php";
?>

<?
$req = "SELECT * FROM `drinks`";
$result = mysqli_query($link, $req);

$drinks = [];
while ($row = mysqli_fetch_assoc($result))
    $drinks[] = $row
?>
<div class = "">
	<h2>Товары дня</h2>
</div>
<?
	$pop = "SELECT idProduct, count(`idProduct`) AS `popular` FROM `cart` GROUP BY `idProduct` ORDER BY count(`idProduct`) DESC LIMIT 3";
	$result = mysqli_query($link, $pop);
	$popular = [];
	while ($row = mysqli_fetch_assoc($result))
    $popular[] = $row;
	


for ($i = 0; $i < count($popular); $i++){
	$req = "SELECT * FROM `drinks` WHERE `id` =". $popular[$i]['idProduct'];
	$result = mysqli_query($link, $req);
	$drinks = mysqli_fetch_assoc($result);

    echo "
    <div class='product'>
	<div class='photo'><p><img src='../img/".$drinks['img']."'></p></div>
	<p>".$drinks['title']."</p>
    <p>".$drinks['price']."</p>
	<a href='fullProduct.php?id=".$drinks['id']."' class='btn'>Подробнее</a>
	</div>
	";
}
?>
<div class = "main">
<h2 align="center">На нашем сайте самые <a href="#">выгодные</a> цены!</h2>
</div>

<?
include "footer.php";
?>