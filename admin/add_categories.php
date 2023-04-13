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

        <p><input type="submit" name="ok" value="Добавить"></p>
    </form>


<?
if ($_POST['ok']) {
    $categories = $_POST['categories'];

    $req = "INSERT INTO `categories`(`categories`) VALUES ('$categories')";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>