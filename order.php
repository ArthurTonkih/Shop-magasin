<?
include "nav.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
	$name_users = $_POST['name_users'];
    $phone_number = $_POST['phone_number'];
    $card_number = $_POST['card_number'];
    $req = "INSERT INTO `orders` (`name_users`,`phone_number`, `card_number`) VALUES ('$name_users','$phone_number','$card_number')";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>

</div>
</body>
</html>



<?
include "footer.php";
?>