<?
if ($_POST['req']=='delcart'){
	$id=$_POST['id'];
	$req = 'DELETE FROM `cart` WHERE `id`= '.$id;
	if (mysqli_query($link, $req) or die(mysqli_error($link))){
		echo 'ok';
	}
}
?>