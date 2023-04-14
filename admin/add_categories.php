<?
include "nav.php";
?>

<?
    $req = "SELECT * FROM `categories`";
    $result = mysqli_query($link,$req);
    $categories = [];
    while ($row = mysqli_fetch_assoc($result))
        $categories[] = $row;
?>

    <form method="POST" enctype = "multipart/form-data">
        <div class="label-float">
            <input type="text" name="categories" placeholder=" "/>
            <label>Категория</label>
        </div>

        <div class="containers">
            <h3><input type="submit" class="neon-btn blue" name="ok" value="Добавить"></h3>
        </div>
    </form>


<?
if ($_POST['ok']) {
    $categories = $_POST['categories'];

    $req = "INSERT INTO `categories`(`categories`) VALUES ('$categories')";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>

<?
include "footer.php";
?>
