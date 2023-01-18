<?php
if (@$_COOKIE['id']){
    $link = mysqli_connect('localhost', 'root', '', 'shop');
    $id_user = @$_COOKIE['id'];
    $result = mysqli_query($link, "SELECT `role` FROM `users` WHERE `id`=".$id_user);
    $user = mysqli_fetch_assoc($result);
    if ($user['role']=='user') {
        $new_url = 'admin/index.php';
        header('Location:'.$new_url);
    }
} else {
    $new_url = '../index.php';
    header('Location:'.$new_url);
}
