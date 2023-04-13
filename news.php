<?
include "nav.php";
?>

<dir class="header">
	<h2 align="center">Новости</h2>
</dir>

<?
$req = "SELECT * FROM `news`";
$result = mysqli_query($link, $req);
$news = [];
while ($row = mysqli_fetch_assoc($result))
    $news[] = $row;
?>

<?
for ($i = 0; $i < count($news); $i++){
	echo '<div class="news">';
    echo "<img src='../img/".$news[$i]['img']."'><br>
	<p>".$news[$i]['name']."</p>
   	<p>".$news[$i]['subtitle']."</p>
    <p>".$news[$i]['news']."</p>
	";
	echo '</div>';
}
?>



<?
include "footer.php";
?>