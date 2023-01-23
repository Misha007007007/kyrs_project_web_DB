<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["pass"]);
unset($_SESSION["role"]);
header('Location: https://andreitsev.ru/index.php');
?>