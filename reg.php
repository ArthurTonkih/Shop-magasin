<?
include "nav.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Регистрация пользователя</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <div class = "name">
    <h2 align="center">Регистрация</h2>
    </div>
    <div class = "reg">
    <form method="POST" action="reg.php">
        <p>Введите имя: <input type="text" name="name"></p>
        <p>Введите фамилию: <input type="text" name="surname"></p>
        <p>Введите логин: <input type="text" name="login"></p>
        <p>Введите пароль: <input type="text" name="password"></p>
        <h3><input type="submit" name="ok"></h3>
    </form>
    </div>
</body>
</html>


<?
    $link = mysqli_connect('localhost', 'root', '', 'shop');
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $reg = "INSERT INTO `users`(`name`, `surname`, `login`, `password`) VALUES ('$name','$surname','$login','$hash')";
    mysqli_query($link,$reg) or die(mysqli_error($link));
?>

<?
include "footer.php";
?>