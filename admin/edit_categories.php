<?
include "nav.php";
?>

<?
$id = $_GET['id'];
    $req = "SELECT * FROM `categories` WHERE `id` = $id";
    $result = mysqli_query($link, $req);
    $categories = mysqli_fetch_assoc($result);

?>


    <form method='POST' enctype="multipart/form-data">
        <div class="label-float">
            <input type="text" name="categories" placeholder=" "/ value='<?echo $categories['categories'] ?>'>
            <label>Категория</label>
        </div>

        <p><input type="submit" name="ok" value="Сохранять"></p>
    </form>


<?
if($_POST['ok']){
    $categories = $_POST['categories'];
    $req = "UPDATE `categories` SET `categories`='$categories'";
    $req.=" WHERE `id`=$id";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>