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
                        <a href="#">
                            Ice fields
                        </a>
                    </li>

                    <li>
                        <a href="authorization.php">
                            Личный кабинет
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <h1> Ледовые поля </h1>
            <h3> Привет, здесь собрано большинство мест Москвы, где ты можешь покататься на коньках и отдохнуть. Выбери один их понравившихся тебе пунктов. </h3>
            <p><ul class = "functionList">
                <li>
                    <a href="allInformation.php">Просмотр информации о ледовых полях</a>
                </li>
                <br>
                <li>
                    <a href="formDistrict.php">Подобрать в своем районе</a><br>
                </li>
                <br>
                <li>
                    <a href="formAdmArea.php">Подобрать в административном округе</a>
                </li>
                <br>
                <li>
                    <a href="interviewOne.php">Опрос для подбора ледового поля</a>
                </li>
                <br>
                <li>
                    <a href="create.php">Добавить запись</a>
                </li>
                <br>
            </ul></p>
            
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