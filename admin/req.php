<?
$link = mysqli_connect('localhost', 'root', '', 'shop');

if ($_POST['req']=='delproduct'){
	$id=$_POST['id'];
	$req = 'DELETE FROM `drinks` WHERE `id`= '.$id;
	if (mysqli_query($link, $req) or die(mysqli_error($link))){
		echo 'ok';
	}
}
?>