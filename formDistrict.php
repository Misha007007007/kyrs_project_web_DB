<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
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
                        <a href="index.php">
                            Ice fields
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <p> Выбери из списка район Москвы и мы подберем для тебя катки в этом районе. </p>
            <div class="connection" id = "connection">
                <form action="district.php" method="post">
                    <select size="1" style="width: 1000px; " name = "district" id = "district">
                        <option disabled>Выберети один вариант</option>
                        <?php
                            include "connectdb.php";
                            $query = "SELECT DISTINCT district FROM `field` ORDER BY district";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['district']?>" name = "1"><?php echo $row['district']?></option>
                        <?php }?>                       
                    </select>
                    <input type="submit" value="Подобрать">
                </form>
            </div>
        </div>
    </section>

    <footer id = "footer" class="footer">
        <div class="container">
            <li>
                <?php
                    echo date('Сформировано d.m.Y в G:i:s', time()+3600*3);
                ?>
            </li>
        </div>
    </footer>
</body>
</html>