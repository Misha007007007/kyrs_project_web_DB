<?php
require("connectdb.php");

$result = mysqli_query($connect, "SELECT * FROM user WHERE
    login='".$_POST["login"]."' AND
    password_hash='".md5($_POST["password"])."'
");

//echo $_POST["login"];
//echo md5($_POST["password"]);

if(!$result || mysqli_num_rows($result) == 0){
	echo "Такой пользователь не существует или введены неверные данные.";
	exit;
}else{
    session_start();
    $_SESSION["user"] = mysqli_fetch_assoc($result);
    header("Location: lk.php");
}
?>