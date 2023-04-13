<?
include "nav.php";
?>

<?php
$req = "SELECT * FROM `categories`";
$result = mysqli_query($link, $req);
$categories = [];
while ($row = mysqli_fetch_assoc($result))
    $categories[] = $row;

$req = "SELECT * FROM `brands`";
$result = mysqli_query($link,$req);
$brands = [];
while ($row = mysqli_fetch_assoc($result))
    $brands[] = $row;

?>

    <h2>Категории</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Категория</th>
        </tr>
        <?
            for ($i = 0; $i < count($categories); $i++){
                echo "<tr>";
                echo "<td>".$categories[$i]['id']."</td>
                <td>".$categories[$i]['categories']."</td>

                <td><a href= 'edit_categories.php?id=".$categories[$i]['id']."'><i class='fa fa-pencil fa-2x'></i> </a></td>
                <td><i class='fa fa-trash-o fa-fw categories-delete' id=".$categories[$i]['id']."></i></td>";

                echo "</tr>";
            }
        ?>
    </table>
    <? echo "<br>"; ?>
<div class= 'add_categories'><a href="add_categories.php"><button>Добавление категории</button></a></div>


<h2>Бренды</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Бренд</th>
        </tr>
        <?
            for ($i = 0; $i < count($brands); $i++){
                echo "<tr>";
                echo "<td>".$brands[$i]['id']."</td>
                <td>".$brands[$i]['brands']."</td>

                <td><a href= 'edit_brands.php?id=".$brands[$i]['id']."'><i class='fa fa-pencil fa-2x'></i> </a></td>
                <td><i class='fa fa-trash-o fa-fw brands-delete' id=".$brands[$i]['id']."></i></td>";

                echo "</tr>";
            }
        ?>
    </table>
    <? echo "<br>"; ?>
<div class= 'add_brands'><a href="add_brands.php"><button>Добавление бренда</button></a></div>


<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js_categories.js?<?php echo time() ?>"></script>
<script type="text/javascript" src="js_brands.js?<?php echo time() ?>"></script>

