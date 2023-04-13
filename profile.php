<?
include "nav.php";
?>

<link rel="stylesheet" type="text/css" href="style.css">

<?
$id = $_COOKIE['id'];
$req = "SELECT * FROM `users` WHERE `id` = $id";
$result = mysqli_query($link, $req);
$users = [];
while ($row = mysqli_fetch_assoc($result))
    $users[] = $row;
?>

<div class="title">
	<h2 align='center'>Профиль</h2>
</div>

<?
for ($i = 0; $i < count($users); $i++){
	if ($_COOKIE['id']) {
		echo "<div class='profile'>";
		echo "<span>Ваше Имя: </span><spen>".$users[$i]['name']."</spen></br>
			<span>Ваша Фамилия: </span><spen>".$users[$i]['surname']."</spen>";
    		echo "<div class='containers'>";
			echo "<a href='edit_profile.php?id=".$users[$i]['id']."' class='neon-btn purple'>Контактные данные</a>";
			echo "</div>";
		echo "</div>";
	} else {
		echo "<h4>Необходимо авторизоваться!</h4>";
	}
}
?>
<?
include "footer.php";
?>