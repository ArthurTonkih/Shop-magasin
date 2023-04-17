<?
include "nav.php";
$link = mysqli_connect('localhost','root','','shop');
$req = "SELECT * FROM `cart` WHERE `id_users` =". $_COOKIE['id'];
$result = mysqli_query($link, $req);
$cart = [];
while ($row = mysqli_fetch_assoc($result))
    $cart[] = $row;
?>



<form method="POST" enctype = "multipart/form-data">
<div class="order">
	<div class="order_user">
		<h3>Форма заполнение заявки:</h3>
		<div class="label-float">
            <input type="text" name="name_users" placeholder=" "/>
            <label>Имя</label>
        </div>
        <div class="label-float">
            <input type="text" name="phone_number" placeholder=" "/>
            <label>Номер телефона</label>
        </div>
	</div>

	<div class="order_bank">
		<h3>Данный карты:</h3>
		<div class="label-float">
            <input type="text" name="card_number" placeholder=" "/>
            <label>Номер карты</label>
        </div>
	</div>

	<div class="order_checkbox">
		<input type='checkbox' name=''>Я согласен с условиями конфиденциальности 
	</div>

		<div class="containers">
            <h3><input type="submit" class="neon-btn purple" name="ok" value="Оплатить"></h3>
        </div>

</form>

<?
if ($_POST['ok']) {
    $req = "SELECT * FROM `cart` WHERE `idProduct` =". $_COOKIE['id'];
    $result = mysqli_query($link, $req);
    $cart = [];
        while ($row = mysqli_fetch_assoc($result))
    $cart[] = $row;
	$name_users = $_POST['name_users'];
    $phone_number = $_POST['phone_number'];
    $card_number = $_POST['card_number'];
    $id_product1 = $_COOKIE['id'];
    $id_product2 = $_COOKIE['id'];
    $id_product3 = $_COOKIE['id'];
    $req = "INSERT INTO `orders` (`name_users`,`phone_number`, `card_number`,`id_product1`,`id_product2`, `id_product3`) VALUES ('$name_users','$phone_number','$card_number','$id_product1','$id_product2','$id_product3')";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>

</div>


<?
include "footer.php";
?>