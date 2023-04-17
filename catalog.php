
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?
include "nav.php";
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?
// $req = "SELECT * FROM `drinks`";


// ! Справка 
// if ($a>0) {
// 	$sum = $a
// } else {
// 	$sum = 0
// } 


// $sum = ($a>0)? $a : 0

$minPrice = ($_GET['from']) ? (int)$_GET['from'] : 1;
$maxPrice = ($_GET['to']) ? (int)$_GET['to'] : 10000000;
$brands = ($_GET['brands']) ? implode(',', $_GET['brands']) : null;
$categories = ($_GET['categories']) ? (int)$_GET['categories'] : 0;
$categoryWhere = ($categories !== 0)? "`categories` = $categories and ": '';
$brandsWhere = ($brands !== null) ? "`brands` in ($brands) and ": '';

$sort = ($_GET['sort']) ? " ORDER BY ".explode('-', $_GET['sort'])[0]." ".explode('-', $_GET['sort'])[1] : '';

$req = "SELECT * FROM `drinks` WHERE $categoryWhere $brandsWhere (`price` between $minPrice and $maxPrice) $sort";


if (isset($_GET['search'])) {
	$search = $_GET['search'];
	$req = "SELECT * FROM `drinks` WHERE `title` LIKE '%$search%'";
}
$result = mysqli_query($link, $req);
$drinks = [];
while ($row = mysqli_fetch_assoc($result))
    $drinks[] = $row;
?>

		<div class="title">
			<h2 align="center">Каталог</h2>
		</div>


		<form class="search" method="GET">
			<input type="search" name="search" placeholder="Поиск.." class="search-input">
			<input type="submit" name="oksearch" placeholder="Искать" class="submit-search">
		</form>
<div class='cataloges'>
<form>
		<div class="filter">
 	<ul class="categories filters">
 		<h3>Категория</h3>
	<?
	$req = "SELECT * FROM `categories`";
	$result = mysqli_query($link, $req);
	$categories = array();
	while ($row = mysqli_fetch_assoc($result))
   		$categories[] = $row;
	for ($i=0; $i < count($categories); $i++) {
		echo "<li><label><input type='radio' name='categories' value='".$categories[$i]['id']."'>".$categories[$i]['categories']."</label></li>";
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
		echo "<li><label><input type='checkbox' name='brands[]' value='".$brands[$i]['id']."'>".$brands[$i]['brands']."</label></li>";
	}
	?>
	</ul>

	<div class='filters-price'>
		<h3>Цена</h3>
		<input type="number" name="from" placeholder="1"> - <input type="number" name="to" placeholder="10000000">
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

<div class="tovar">
<?
for ($i = 0; $i < count($drinks); $i++){
    echo "
    <div class='product'>
	<div class='favor'><i class='fa fa-star-o fa-2x' id =".$drinks[$i]['id']."></i></div>
	<div class='photo'><p><img src='../img/".$drinks[$i]['img']."'></p></div>
	<p>".$drinks[$i]['title']."</p>
    <p>".$drinks[$i]['price']."</p>
	<a href='fullProduct.php?id=".$drinks[$i]['id']."' class='btn'>Подробнее</a>
	</div>
	";

}
?>
</div>

</div>


<?
include "footer.php";
?>