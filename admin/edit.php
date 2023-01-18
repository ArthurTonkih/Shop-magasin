<?
include "nav.php";
?>

<?
$link = mysqli_connect('localhost', 'root', '', 'shop');
$id = $_GET['id'];
$req = "SELECT * FROM `drinks`";
$result = mysqli_query($link, $req);
$drinks = mysqli_fetch_assoc($result);
if($_POST){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $categories = $_POST['categories'];
    $brands = $_POST['brands'];
    $req = "UPDATE `drinks` SET `title`='title', `description`='$description',`price`=$price, `categories`=$categories, `brands`=$brands";
    if ($_FILES['img']['name']){
        $req = ', `img` = '.$_FILES['img']['name'];
        copy($_FILES['img']['tmp_name'], '../img/'.$_FILES['img']['name']);
    }
    $req = " WHERE `id` = $id";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение товара</title>
</head>
<body>
    <form method='POST' enctype="multipart/form-data">
        <p>Название товара: <input type="text" name="title" value='<?echo $drinks['title'] ?>'></p>
        <p>Описание товара: <input type="text" name="description" value='<?echo $drinks['description'] ?>'></p>
        <p>Цена товара: <input type="text" name="description" value='<?echo $drinks['price'] ?>'></p>
        <p>Выберите картинку товара: <input type="file" name="img" value='<?echo $drinks['img'] ?> '></p>
        <p>Номер категории: <input type="text" name="categories" value='<?echo $drinks['categories'] ?>'></p>
        <p>Номер бренда: <input type="text" name="brands" value='<?echo $drinks['brands'] ?>'></p>
        <p><input type="submit" value="Сохранять"></p>
    </form>
</body>
</html>

