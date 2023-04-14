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

        <div class="containers">
            <h3><input type="submit" class="neon-btn blue" name="ok" value="Добавить"></h3>
        </div>
    </form>


<?
if ($_POST['ok']) {
    $brands = $_POST['brands'];

    $req = "INSERT INTO `brands`(`brands`) VALUES ('$brands')";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>


<?
include "footer.php";
?>
