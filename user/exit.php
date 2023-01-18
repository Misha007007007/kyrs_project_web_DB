<?php
require("C:/localhost/front/kyrs_project_web/layoutFiles/session.php");
session_destroy();
header('Location: http://localhost:3000/index.php');
?>