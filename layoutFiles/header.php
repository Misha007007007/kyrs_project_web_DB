<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:3000/css/main.css">
    <title>Ледовые поля</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Antonio:wght@100&display=swap" rel="stylesheet">
</head>
<body bgcolor="#fff">
    <header id = "header" class="header">
        <div class="container">
            <div class="nav">
                <ul class = "menu">
                    <li>
                        <a href="http://localhost:3000/index.php">
                            <img src="http://localhost:3000/logo4.svg" alt="Ise Field">
                        </a>
                    </li>
                    <?php
                        if (!$_SESSION){
                            echo '<li><a href="authorization.php">Личный кабинет</a></li>';
                        }
                        else if ($_SESSION["role"] == 1 || $_SESSION['role'] == 2){
                            echo '<li><a href="lk.php">Личный кабинет</a></li> <li><a href="exit.php">Выход</a></li>';  
                        } 
                        else if ($_SESSION["role"] == 3){
                            echo '<li><a href="lk.php">Личный кабинет</a></li> <li><a href="exit.php">Выход</a></li>';
                        }else{
                            echo '<li><a href="authorization.php">Личный кабинет</a></li>';
                        }
                        
                        
                    ?>