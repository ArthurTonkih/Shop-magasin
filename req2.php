<?
$link = mysql_connect("localhost", "root", "", "shop");
if ($POST['req2']=='delproducts'){
    $id=$_POST['id'];
    $req='DELETE FROM `req` WHERE `id` ='.$id;
    if (mysql_query($link,$req) or die(mysql_error($link))){
        echo "ok";
    }
}

?>