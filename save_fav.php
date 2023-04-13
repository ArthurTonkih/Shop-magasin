<? 
$link = mysqli_connect("localhost", "root", "root", "shop");
if ($_POST['id_products']) {
	$del_fav = 'DELETE FROM `favourites` WHERE `id`= '.$id;
	$favor = $_POST['id']
	$id_products = $_POST['id_products'];
	$id_users = $_COOKIE['id'];
	if ($favor['id'])
	$req = "INSERT INTO `favourites` (`id_products`, `id_users`) VALUES ('".$id_products."','".$id_users."')";
	if (mysqli_query($link, $req) or die(mysqli_error($link))){
		echo ('ok');
	} if (mysqli_query($link, $del_fav) or die(mysqli_error($link))){
		echo ('okey');
	} 
	
}

?>