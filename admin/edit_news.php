<?
include "nav.php";
?>

<?
$link = mysqli_connect('localhost', 'root', '', 'shop');
$id = $_GET['id'];
$req = "SELECT * FROM `news` WHERE `id` = $id";
$result = mysqli_query($link, $req);
$news = mysqli_fetch_assoc($result);
if($_POST){
    $name = $_POST['name'];
    $subtitle = $_POST['subtitle'];
    $news = $_POST['news'];
    $req = "UPDATE `news` SET `name`='name', `subtitle`='$subtitle',`news`='$news' ";
    if ($_FILES['img']['name']){
        $req .= ', `img` = '.$_FILES['img']['name'];
        copy($_FILES['img']['tmp_name'], '../img/'.$_FILES['img']['name']);
    }
    $req = "WHERE `id` = $id";
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
        <p>Название новости: <input type="text" name="name" value='<?echo $news['name'] ?>'></p>
        <p>Подзаголовок новости: <input type="text" name="name" value='<?echo $news['subtitle'] ?>'></p>
        <p>Новость: <input type="text" name="name" value='<?echo $news['news'] ?>'></p>
        <p><input type="submit" value="Сохранять"></p>
    </form>
</body>
</html>
