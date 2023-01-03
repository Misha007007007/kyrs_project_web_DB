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
            <p> Для того чтобы добавить информацию о ледовом поле, которого еще нет в нашей базе данных, тебе необходимо заполнить все поля. </p>
            <p> В комментарии можешь указать какие удобства есть на новом ледовом поле (раздевалки, точки wifi, ...) или адрес места, где можно вкусно покушать. </p>
            <p> Но обязательно рядом. </p>
            <div class="connection" id = "connection">
                <form action="userAdd.php" method="post">
                    <input type="text" maxlength="50" size="70" name="user_name" placeholder="Ваше имя"><br>
                    <input type="text" maxlength="50" size="70" name="name" placeholder="Название ледового поля"><br>
                    <input type="text" maxlength="50" size="70" name="admArea" placeholder="Административный округ"><br>
                    <input type="text" maxlength="50" size="70" name="district" placeholder="Район"><br>
                    <input type="text" maxlength="50" size="70" name="address" placeholder="Адрес"><br>
                    <textarea name="comment" id="text" cols="61" rows="10" placeholder="Комментарий"></textarea><br>
                    <input type="submit" value="Добавить">
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