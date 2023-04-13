<?
$link = mysqli_connect('localhost', 'root', '', 'shop');

if ($_POST['req_news']=='delnews'){
	$id=$_POST['id'];
	$req_news = 'DELETE FROM `news` WHERE `id`= '.$id;
	if (mysqli_query($link, $req_news) or die(mysqli_error($link))){
		echo 'ok';
	}
}
?>