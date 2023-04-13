<?
include "nav.php";
?>


    <form method="POST" enctype = "multipart/form-data">
        <div class="label-float">
            <input type="text" name="name" placeholder=" "/>
            <label>Название</label>
        </div>

        <div class="label-float">
            <input type="text" name="subtitle" placeholder=" "/>
            <label>Подзаголовок</label>
        </div>

        <div class="label-float">
            <input type="text" name="news" placeholder=" "/>
            <label>Новость</label>
        </div>
        <p>Выберите картинку новости <input type="file" name="img"></p>
        <p><input type="submit" name="ok" value="Добавить"></p>
    </form>


<?
if ($_POST['ok']) {
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
