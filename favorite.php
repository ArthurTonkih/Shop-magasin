<?
include "nav.php";
$req = "SELECT * FROM `favourites` WHERE `id_users` =". $_COOKIE['id'];
$result = mysqli_query($link, $req);
$favourites = [];
while ($row = mysqli_fetch_assoc($result))
    $favourites[] = $row;
?>
<div class="title">
	<h2 align="center">Избранное</h2>
</div>







<?
for ($i = 0; $i < count($favourites); $i++){
	$req = "SELECT * FROM `drinks` WHERE `id` =". $favourites[$i]['id_products'];
	$result = mysqli_query($link, $req);
	$drinks = mysqli_fetch_assoc($result);
		echo "<div class='product'>
			<p><img src='../img/".$drinks['img']."'></p>
 			<p>".$drinks['title']."</p>
     		<p>".$drinks['price']."</p>
			</div>
     		";
}

?>

<?
include "footer.php";
?>