<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="card.css">
    <title>Карточка</title>
</head>
<body style="background-color: #c1e8f8">
    
</body>
</html>





<?

$link = mysqli_connect('localhost', 'root', 'root', 'shop');

$req = "SELECT * FROM `drinks`";
$result = mysqli_query($link, $req);
$drinks = [];
while ($row = mysqli_fetch_assoc($result))
    $drinks[] = $row;



for ($i = 0; $i < count($drinks); $i++){
    echo "<h4>".$drinks[$i]['Title']."</h4>
    <p>".$drinks[$i]['img']."</p>
    <p><img src='../img/".$drinks[$i]['img']."'></p>
    <p>".$drinks[$i]['description']."</p>
    <h3>".$drinks[$i]['Price']." "."</h3>
    <a href= 'fullProduct.php?id =".$drinks[$i]['id']."'>Подробнение</a>

";

    echo "</div>";
}
?>



