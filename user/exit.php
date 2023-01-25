<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["pass"]);
unset($_SESSION["role"]);
unset($_SESSION["id_user"]);
header('Location: http://localhost:3000/index.php');
?>