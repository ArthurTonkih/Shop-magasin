<?
include "nav.php";
?>


    <form method="POST" enctype = "multipart/form-data">
        <p>Введите название новости <input type="text" name="name"></p>
        <p>Введите подзаголовок новости <input type="text" name="subtitle"></p>
        <p>Введите новость <input type="text" name="news"></p>
        <p>Выберите картинку новости <input type="file" name="img"></p>
        <p><input type="submit" name="ok" value="Добавить"></p>
    </form>


<?
if ($_POST['ok']) {
    $link = mysqli_connect('localhost', 'root', '', 'shop');
    $name = $_POST['name'];
    $subtitle = $_POST['subtitle'];
    $news = $_POST['news'];
    var_dump($_FILES);
    $img_news = $_FILES['img']['name'];
    copy($_FILES['img']['tmp_name'], '../img/'.$img_news);
    $req = "INSERT INTO `news`(`name`, `subtitle`, `news`, `img`) VALUES ('$name','$subtitle','$news','$img_news')";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>
