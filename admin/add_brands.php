<?
include "nav.php";
?>

<?
    $req = "SELECT * FROM `brands`";
    $result = mysqli_query($link,$req);
    $brands = [];
    while ($row = mysqli_fetch_assoc($result))
        $brands[] = $row;
?>

    <form method="POST" enctype = "multipart/form-data">
        <div class="label-float">
            <input type="text" name="brands" placeholder=" "/>
            <label>Бренд</label>
        </div>

        <p><input type="submit" name="ok" value="Добавить"></p>
    </form>


<?
if ($_POST['ok']) {
    $brands = $_POST['brands'];

    $req = "INSERT INTO `brands`(`brands`) VALUES ('$brands')";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>