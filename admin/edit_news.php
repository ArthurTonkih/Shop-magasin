<?
include "nav.php";
?>

<?
$id = $_GET['id'];

    $req = "SELECT * FROM `news` WHERE `id` = $id";
    $result = mysqli_query($link, $req);
    $news = mysqli_fetch_assoc($result);
?>


    <form method='POST' enctype="multipart/form-data">
        <div class="label-float">
            <input type="text" name="name" placeholder=" "/ value='<?echo $news['name'] ?>'>
            <label>Название</label>
        </div>

        <div class="label-float">
            <input type="text" name="subtitle" placeholder=" "/ value='<?echo $news['subtitle'] ?>'>
            <label>Подзаголовок</label>
        </div>

        <div class="label-float">
            <input type="text" name="news" placeholder=" "/ value='<?echo $news['news'] ?>'>
            <label>Новость</label>
        </div>
        <p>Выберите картинку новости: <input type="file" name="img" value='<?echo $news['img'] ?> '></p>
        <div class="containers">
            <h3><input type="submit" class="neon-btn blue" name="ok" value="Сохранить"></h3>
        </div>
    </form>

<?
if($_POST){
    $name = $_POST['name'];
    $subtitle = $_POST['subtitle'];
    $news = $_POST['news'];
    $img = $_POST['img'];
    $req = "UPDATE `news` SET `name`='$name',`subtitle`='$subtitle',`news`='$news'";
    if ($_FILES['img']['name']){
        $req .= ', `img` = '.$_FILES['img']['name'];
        copy($_FILES['img']['tmp_name'], '../img/'.$_FILES['img']['name']);
        $req.=", `img`='$img'";
    }
    $req.=" WHERE `id`=$id";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>

<?
include "footer.php";
?>
