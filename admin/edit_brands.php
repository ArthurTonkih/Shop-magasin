<?
include "nav.php";
?>

<?
$id = $_GET['id'];
    $req = "SELECT * FROM `brands` WHERE `id` = $id";
    $result = mysqli_query($link, $req);
    $brands = mysqli_fetch_assoc($result);

?>


    <form method='POST' enctype="multipart/form-data">

        <div class="label-float">
            <input type="text" name="brands" placeholder=" "/ value='<?echo $brands['brands'] ?>'>
            <label>Бренд</label>
        </div>


        <p><input type="submit" name="ok" value="Сохранять"></p>
    </form>


<?
if($_POST){
    $brands = $_POST['brands'];
    $req = "UPDATE `brands` SET `brands`='$brands'";
    $req.=" WHERE `id`=$id";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>