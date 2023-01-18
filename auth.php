<?php
$link = mysqli_connect('localhost', 'root', '', 'shop');
if ($_POST['ok']){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $result = mysqli_query($link, "SELECT * FROM `users` WHERE `login`='".$login."'");
    if (mysqli_num_rows($result)>0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            setcookie('id',$user['id'],time()+60*60*24);
            $new_url='index.php';
            header('Location: '.$new_url);
        } else {
            echo "Пароль не верный";
        }
    } else {
        echo "Логин или пароль не верный";
    }
}
?>


<?
include "nav.php";
?>



<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class= "auth">
    <h2 align="center">Авторизация</h2>
    </div>
    <div class= "in">
    <form method="POST">
        <input type="text" name="login" placeholder="Логин"><br>
        <input type="password" name="password" placeholder="Пароль"><br>
        <input type="submit" name="ok">
    </form>
    </div>
</body>
</html>


<?
include "footer.php";
?>