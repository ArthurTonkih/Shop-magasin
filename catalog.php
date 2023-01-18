<?
include "nav.php";
?>

<?
$link = mysqli_connect('localhost', 'root', '', 'shop');

$req = "SELECT * FROM `drinks`";

if (isset($_GET['search'])) {
	$search = $_GET['search'];
	$req = "SELECT * FROM `drinks` WHERE `title` LIKE '%$search%'";
}

$result = mysqli_query($link, $req);
$drinks = [];
while ($row = mysqli_fetch_assoc($result))
    $drinks[] = $row;
?>

		<dir class="catalog">
			<h2 align="center">Каталог</h2>
		</dir>

		<form class="search" method="GET">
			<input type="search" name="search" placeholder="Поиск.." class="search-input">
			<input type="submit" name="oksearch" placeholder="Искать" class="submit-search">
		</form>
		<? echo"<br>"; ?>

<form>
		<div class="filters">
 	<ul class="categories-filters">
 		<h3>Категория</h3>
	<?
	$req = "SELECT * FROM `categories`";
	$result = mysqli_query($link, $req);
	$categories = array();
	while ($row = mysqli_fetch_assoc($result))
   		$categories[] = $row;
	for ($i=0; $i < count($categories); $i++) {
		echo "<li><label><input type='radio' name='categories' value='.$categories[$i]['id'].'>".$categories[$i]['categories']."</label></li>";
	}
	?>
	</ul>

 	<ul class="brands-filters">
 		<h3>Бренды</h3>
 	<?
	$req = "SELECT * FROM `brands`";
	$result = mysqli_query($link, $req);
	$brands = array();
	while ($row = mysqli_fetch_assoc($result))
    	$brands[] = $row;
	for ($i=0; $i < count($brands); $i++) {
		echo "<li><label><input type='checkbox' name='brands[]' value='.$brands[$i]['id'].'>".$brands[$i]['brands']."</label></li>";
	}
	?>
	</ul>

	<div class='filters-price'>
		<h3>Цена</h3>
		<input type="number" name="from" placeholder="99"> - <input type="number" name="to" placeholder="500">
	</div>

	<div class="soft-filters">
		<select name="sort">
			<option value="title-ASC">По названию А-Я</option>
			<option value="title-DESC">По названию Я-А</option>
			<option value="price-ASC">По возрастанию цены</option>
			<option value="price-DESC">По убыванию цены</option>
		</select>
	</div>
	<br>
		<input type="submit" name="okprice">

		</div>
		<br>
</form>


<div class="text">
	<?
	for ($i = 0; $i < count($drinks); $i++)
    	echo "<p><img src='../img/".$drinks[$i]['img']."'></p>
		<p>".$drinks[$i]['title']."</p>
    	<p>".$drinks[$i]['price']."</p>
		<a href='fullProduct.php?id=".$drinks[$i]['id']."'><button>Подробнение</button></a>
		";
	?>
</div>


<?
include "footer.php";
?>