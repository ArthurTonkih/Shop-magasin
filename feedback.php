<?
include "nav.php";
?>
<?
$req = "SELECT * FROM `feedback`";
$result = mysqli_query($link, $req);

$feedback = [];
while ($row = mysqli_fetch_assoc($result))
    $feedback[] = $row
?>

<div class="title">
	<h2 align="center">Отзывы</h2>
</div>

<?for ($i = 0; $i < count($favourites); $i++){
    $req = "SELECT * FROM `feedback` WHERE `id` =". $feedback[$i]['id_products'];
    $result = mysqli_query($link, $req);
	$feedback = mysqli_fetch_assoc($result);
}?>
<form method="POST" enctype = "multipart/form-data">
	
	<h4>Ввидети свою имя <input type="text" name="name"></h4>
	<h4>Оставить отзыв <input type="text" name="feedback"></h4>
	<h4>Количество звезд (от 1 до 5) <input type="text" name="stars"></h4>
	<p><input type="submit" name="ok" value="Добавить"></p>
</form>

<?
if ($_POST['ok']) {
	$id_products = $_POST['id_products'];
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];
	$stars = $_POST['stars'];
    $req = "INSERT INTO `feedback` (`id_products`,`name`, `feedback`, `stars`) VALUES ('$id_products','$name','$feedback','$stars')";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>




<?
include "footer.php";
?>