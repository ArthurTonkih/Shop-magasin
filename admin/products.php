<?
include "nav.php";
?>

<?php
$link = mysqli_connect('localhost', 'root', '', 'shop');

$req = "SELECT * FROM `drinks`";
$result = mysqli_query($link, $req);
$drinks = [];
while ($row = mysqli_fetch_assoc($result))
    $drinks[] = $row;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица товаров</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    <h2>Таблица товаров</h2>
    <table>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Изоброжение</th>
        </tr>
        <?
            for ($i = 0; $i < count($drinks); $i++){
                echo "<tr>";
                echo "<td>".$drinks[$i]['title']."</td>
                <td>".$drinks[$i]['description']."</td>
                <td>".$drinks[$i]['price']."</td>
                <td>".$drinks[$i]['img']."</td>
                <td><img src='../img/".$drinks[$i]['img']."'></td>
                <td><a href= 'edit.php?id=".$drinks[$i]['id']."'><i class='fa fa-pencil fa-2x'></i> </a></td>
                <td><i class='fa fa-trash-o fa-fw gds-delete' id=".$drinks[$i]['id']."></i></td>";

                echo "</tr>";
            }
        ?>
    </table>
    <? echo "<br>"; ?>
<div class= 'add-products'><a href="add_product.php"><button>Добавление товара</button></a></div>

<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js.js"></script>
</body>
</html>

