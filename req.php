<?
$link = mysqli_connect('localhost', 'root', '', 'shop');

if ($_POST['req']=='delcart'){
	$id=$_POST['id'];
	$req = 'DELETE FROM `cart` WHERE `id`= '.$id;
	mysqli_query($link, $req) or die(mysqli_error($link))
		echo 'ok';
	
}
?>