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
<body>
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
                        <a href="#">
                            Личный кабинет
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <div class = "fig">
                
            </div>

            <h1> Ледовые поля </h1>
            <p> Привет, здесь собрано большинство мест Москвы, где ты можешь покататься на коньках и отдохнуть. Выбери один их понравившихся тебе пунктов. </p>
            <ul class = "functionList">
                <li>
                    <a href="#">Просмотреть список всех добавленных</a>
                </li>
                <br>
                <li>
                    <a href="#">Подобрать в совем районе</a><br>
                </li>
                <br>
                <li>
                    <a href="#">Подобрать в административном округе</a>
                </li>
                <br>
                <li>
                    <a href="#">Добавить запись</a>
                </li>
                <br>
            </ul>
            
           
            
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