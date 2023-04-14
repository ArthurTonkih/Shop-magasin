<?
include "nav.php";
?>

<?
    $req = "SELECT * FROM `categories`";
    $result = mysqli_query($link,$req);
    $categories = [];
    while ($row = mysqli_fetch_assoc($result))
        $categories[] = $row;
    
    $req = "SELECT * FROM `brands`";
    $result = mysqli_query($link,$req);
    $brands = [];
    while ($row = mysqli_fetch_assoc($result))
        $brands[] = $row;

    $id = $_GET['id'];

    $req = "SELECT * FROM `drinks` WHERE `id` = $id";
    $result = mysqli_query($link, $req);
    $drinks = mysqli_fetch_assoc($result);
?>



    <form method='POST' enctype="multipart/form-data">
        <div class="label-float">
            <input type="text" name="title" placeholder=" "/ value='<?echo $drinks['title'] ?>'>
            <label>Название</label>
        </div>

        <div class="label-float">
            <input type="text" name="description" placeholder=" "/ value='<?echo $drinks['description'] ?>'>
            <label>Описание</label>
        </div>

        <div class="label-float">
            <input type="text" name="price" placeholder=" "/ value='<?echo $drinks['price'] ?>'>
            <label>Цена</label>
        </div>

        <p>Выберите картинку товара: <input type="file" name="img" value='<?echo $drinks['img'] ?> '></p>

        <select name='categories'>
            <?
            foreach ($categories as $item) {
                if ($item['id']==$drinks['categories']) {
                    echo "<option value='".$item['id']."' selected> ".$item['categories']."</option>";
                } else {
                    echo "<option value='".$item['id']."'>".$item['categories']."</option>";
                }
            }
            echo "</select>";
            echo "<select name='brands'>";

             foreach ($brands as $item) {
                if ($item['id']==$drinks['brands']) {
                    echo "<option value='".$item['id']."' selected> ".$item['brands']."</option>";
                } else {
                    echo "<option value='".$item['id']."'>".$item['brands']."</option>";
                }
            }
            echo '</select>';
            ?>
            

        <div class="containers">
            <h3><input type="submit" class="neon-btn blue" name="ok" value="Сохранить"></h3>
        </div>
    </form>



<?
if($_POST['ok']){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $categories = $_POST['categories'];
    $brands = $_POST['brands'];
    $req = "UPDATE `drinks` SET `title`='$title', `description`='$description',`price`=$price, `categories`=$categories, `brands`=$brands";
    if ($_FILES['img']['name']){
        $req = ', `img` = '.$_FILES['img']['name'];
        copy($_FILES['img']['tmp_name'], '../img/'.$_FILES['img']['name']);
        $req.=", `img`='$img'";
    }
    $req.=" WHERE `id`=$id";
    echo $req;
    mysqli_query($link,$req) or die(mysqli_error($link));

}


?>
<?
include "footer.php";
?>
