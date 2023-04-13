<?
include "nav.php";
?>

	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

<?
$id=$_GET['id']; 

$req = "SELECT * FROM `drinks` WHERE `id` = $id";

$result = mysqli_query($link, $req);
$epms = mysqli_fetch_assoc($result);

$drinks = [];
while ($row = mysqli_fetch_assoc($result))
    $drinks[] = $row
?>
<?
$req = "SELECT * FROM `feedback`";
$result = mysqli_query($link, $req);

$feedback = [];
while ($row = mysqli_fetch_assoc($result))
    $feedback[] = $row
?>

<div class = 'fullProd'>
<div class="fullProduct">
<?
	
	$rating = "SELECT AVG(`stars`) AS `avg` FROM `feedback` WHERE `id_products` = $id";
	$result = mysqli_query($link, $rating);
	$rating = mysqli_fetch_assoc($result)['avg'];

	echo round($rating,2)."<i class='fa fa-star' aria-hidden='true'></i>";

echo "<div class = 'title'>";
echo "<h2>".$epms['title']."</h2>";
echo "</div>";

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
</div>



<form method="POST" enctype = "multipart/form-data">
		<div class = 'title'><h3>Отзывы</h3></div>
	<ul class="star">
		<? 
		echo "<li><label><input type='radio' name='stars' value='1'>1<i class='fa fa-star' aria-hidden='true'></i>"."</label></li>";
		echo "<li><label><input type='radio' name='stars' value='2'>2<i class='fa fa-star' aria-hidden='true'></i>"."</label></li>";
		echo "<li><label><input type='radio' name='stars' value='3'>3<i class='fa fa-star' aria-hidden='true'></i>"."</label></li>";
		echo "<li><label><input type='radio' name='stars' value='4'>4<i class='fa fa-star' aria-hidden='true'></i>"."</label></li>";
		echo "<li><label><input type='radio' name='stars' value='5'>5<i class='fa fa-star' aria-hidden='true'></i>"."</label></li>";
		?>
	</ul>

		<div class="label-float">
            <input type="text" name="name" placeholder=" "/>
            <label>Имя</label>
        </div>
        <div class="label-float">
            <input type="text" name="feedback" placeholder=" "/>
            <label>Отзыв</label>
        </div>

        <div class="containers">
            <h3><input type="submit" class="neon-btn blue" name="ok" value="Добавить"></h3>
        </div>
</form>

<?
if ($_POST['ok']) {
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];
	$stars = $_POST['stars'];
    $req = "INSERT INTO `feedback`(`id_products`, `name`, `feedback`, `stars`) VALUES ($id,'$name','$feedback', $stars)";
    mysqli_query($link,$req) or die(mysqli_error($link));
    header("Location: fullProduct.php?id=$id");

}


	$req = "SELECT * FROM `feedback` WHERE `id_products` = $id";
	$result = mysqli_query($link, $req);

	$feedback = [];
	while ($row = mysqli_fetch_assoc($result))
    	$feedback[] = $row;
?>
<?
 	for ($i = 0; $i < count($feedback); $i++){
			echo "
			<div class = 'feedback'>
			<h6>".$feedback[$i]['name']."</h6>
			<h5>".$feedback[$i]['feedback']."</h5>
			<p>".$feedback[$i]['stars']."<i class='fa fa-star' aria-hidden='true'></i>"."</p>
			</div>
			";
	 	}
?>


</div>
<?
include "footer.php";
?>