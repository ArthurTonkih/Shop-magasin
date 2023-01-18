<?
include "nav.php";
?>


    <form method="POST" enctype = "multipart/form-data">
        <p>Введите название товара <input type="text" name="title"></p>
        <p>Введите описание товара <input type="text" name="description"></p>
        <p>Введите цену товара <input type="text" name="price"></p>
        <p>Выберите картинку товара <input type="file" name="img"></p>
        <p><input type="submit" name="ok" value="Добавить"></p>
    </form>


<?
if ($_POST['ok']) {
    $link = mysqli_connect('localhost', 'root', '', 'shop');
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    var_dump($_FILES);
    $img_name = $_FILES['img']['name'];
    copy($_FILES['img']['tmp_name'], '../img/'.$img_name);
    $req = "INSERT INTO `drinks`(`title`, `description`, `price`, `img`) VALUES ('$title','$description',$price,'$img_name')";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>


