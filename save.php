<? 
$link = mysqli_connect("localhost", "root", "", "shop");
if ($_POST['idProduct']) {
	$idProduct = $_POST['idProduct'];
	$id_users = $_COOKIE['id'];
	$price = $_COOKIE['price'];
	$req = "INSERT INTO `cart`(`idProduct`, `id_users`) VALUES ('$idProduct','$id_users')";
	mysqli_query($link, $req) or die(mysqli_error($link));
	echo ('ok');
}
?>