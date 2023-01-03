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
        <?php
            include "connectdb.php";
            $query = "SELECT DISTINCT admArea FROM `field` ORDER BY admArea";
            $result = mysqli_query($connect, $query);
        ?>
        <div class="container">
            <p> Выбери из списка административный округ Москвы и мы подберем для тебя катки в нем. </p>
            <div class="connection" id = "connection">
                <form action="admArea.php" method="post">
                    <select size="1" style="width: 1000px; " name = "admArea" id = "admArea">
                        <option disabled>Выберети один вариант</option>
                        <?php while($row = mysqli_fetch_assoc($result)){?>
                            <option value="<?php echo $row['admArea']?>"><?php echo $row['admArea']?></option>
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