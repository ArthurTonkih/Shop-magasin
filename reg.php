<?
include "nav.php";
?>


    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <div class = "title">
    <h2 align="center">Регистрация</h2>
    </div>
    <div class = "reg">
    <form method="POST" action="reg.php">
        <div class="label-float">
            <input type="text" name="name" placeholder=" "/>
            <label>Имя</label>
        </div>
        <div class="label-float">
            <input type="text" name="surname" placeholder=" "/>
            <label>Фамилия</label>
        </div>
        <div class="label-float">
            <input type="text" name="login" placeholder=" "/>
            <label>Логин</label>
        </div>
        <div class="label-float">
            <input type="text" name="password" placeholder=" "/>
            <label>Пароль</label>
        </div>
        <div class="containers">
            <h3><input type="submit" class="neon-btn blue" name="ok" value="Зарегистрироваться"></h3>
        </div>
    </form>
    </div>



<?
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