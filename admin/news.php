<?
include "nav.php";
?>

<?php
$req = "SELECT * FROM `news`";
$result = mysqli_query($link, $req);
$news = [];
while ($row = mysqli_fetch_assoc($result))
    $news[] = $row;

?>

    <h2>Таблица Новостей</h2>
    <table>
        <tr>
            <th>Название</th>
            <th>Подзаголовок</th>
            <th>Новость</th>
        </tr>
        <?
            for ($i = 0; $i < count($news); $i++){
                echo "<tr>";
                echo "<td>".$news[$i]['name']."</td>
                <td>".$news[$i]['subtitle']."</td>
                <td>".$news[$i]['news']."</td>
                <td>".$news[$i]['img']."</td>
                <td><img src='../img/".$news[$i]['img']."'></td>
                <td><a href= 'edit_news.php?id=".$news[$i]['id']."'><i class='fa fa-pencil fa-2x'></i> </a></td>
                <td><i class='fa fa-trash-o fa-fw news-delete' id=".$news[$i]['id']."></i></td>";

                echo "</tr>";
            }
        ?>

    </table>

    <? echo "<br>"; ?>
    <div class= 'add-news'><a href="add_news.php"><button>Добавление Новости</button></a></div>
    
<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js_news.js?<?php echo time() ?>"></script>
