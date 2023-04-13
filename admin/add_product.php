<?
include "nav.php";
?>

<?
    $req = "SELECT * FROM `categories`";
    $result = mysqli_query($link,$req);
    $categories = [];
    while ($row = mysqli_fetch_assoc($result))
        $categories[] = $row;
    
    $req = "SELECT * FROM `brands`";
    $result = mysqli_query($link,$req);
    $brands = [];
    while ($row = mysqli_fetch_assoc($result))
        $brands[] = $row;
?>

    <form method="POST" enctype = "multipart/form-data">
        <div class="label-float">
            <input type="text" name="title" placeholder=" "/>
            <label>Название</label>
        </div>
        <div class="label-float">
            <input type="text" name="description" placeholder=" "/>
            <label>Описание</label>
        </div>
        <div class="label-float">
            <input type="text" name="price" placeholder=" "/>
            <label>Цена</label>
        </div>
        <p>Выберите картинку товара <input type="file" name="img"></p>

        <select name="categories">
            <?
            for ($i=0; $i < count($categories); $i++){
                echo "<option value=".$categories[$i]['id'].">".$categories[$i]['categories']."</option>";
            }
            ?>
        </select>
        <select name="brands">
            <?
            for ($i=0; $i < count($brands); $i++){
                echo "<option value=".$brands[$i]['id'].">".$brands[$i]['brands']."</option>";
            }
            ?>
        </select>

        <p><input type="submit" name="ok" value="Добавить"></p>
    </form>


<?
if ($_POST['ok']) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $categories = $_POST['categories'];
    $brands = $_POST['brands'];

    $img_name = $_FILES['img']['name'];
    copy($_FILES['img']['tmp_name'], '../img/'.$img_name);
    $req = "INSERT INTO `drinks`(`title`, `description`, `price`, `img`, `categories`, `brands`) VALUES ('$title','$description',$price,'$img_name',$categories ,$brands)";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>



