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
                        
                        <option value="район Аэропорт" name = "1">район Аэропорт</option>
                        <option value="район Бибирево" name = "2">район Бибирево</option>
                        <option value="район Бирюлёво Западное" name = "3">район Бирюлёво Западное</option>
                        <option value="район Вешняки" name = "4">район Вешняки</option>
                        <option value="район Зябликово" name = "5">район Зябликово</option>
                        <option value="район Коньково" name = "6">район Коньково</option>
                        <option value="район Косино-Ухтомский" name = "7">район Косино-Ухтомский</option>
                        <option value="район Котловка" name = "8">район Котловка</option>
                        <option value="район Крылатское" name = "9">район Крылатское</option>
                        <option value="район Крюково" name = "10">район Крюково</option>
                        <option value="район Кузьминки" name = "11">район Кузьминки</option>
                        <option value="район Кунцево" name = "12">район Кунцево</option>
                        <option value="район Лефортово" name = "13">район Лефортово</option>
                        <option value="район Марьина Роща" name = "14">район Марьина Роща</option>
                        <option value="район Марьино" name = "15">район Марьино</option>
                        <option value="район Москворечье-Сабурово" name = "16">район Москворечье-Сабурово</option>
                        <option value="район Ново-Переделкино" name = "17">район Ново-Переделкино</option>
                        <option value="район Новогиреево" name = "18">район Новогиреево</option>
                        <option value="район Орехово-Борисово Южное" name = "19">район Орехово-Борисово Южное</option>
                        <option value="район Отрадное" name = "20">район Отрадное</option>
                        <option value="район Перово" name = "21">район Перово</option>
                        <option value="район Покровское-Стрешнево" name = "22">район Покровское-Стрешнево</option>
                        <option value="район Преображенское" name = "23">район Преображенское</option>
                        <option value="район Раменки" name = "24">район Раменки</option>
                        <option value="район Савёлки" name = "25">район Савёлки</option>
                        <option value="район Северное Тушино" name = "26">район Северное Тушино</option>
                        <option value="район Сокол" name = "27">район Сокол</option>
                        <option value="район Сокольники" name = "28">район Сокольники</option>
                        <option value="район Солнцево" name = "29">район Солнцево</option>
                        <option value="район Строгино" name = "30">район Строгино</option>
                        <option value="район Тёплый Стан" name = "31">район Тёплый Стан</option>
                        <option value="район Тропарёво-Никулино" name = "32">район Тропарёво-Никулино</option>
                        <option value="район Филёвский Парк" name = "33">район Филёвский Парк</option>
                        <option value="район Фили-Давыдково" name = "34">район Фили-Давыдково</option>
                        <option value="район Хамовники" name = "35">район Хамовники</option>
                        <option value="район Ховрино" name = "36">район Ховрино</option>
                        <option value="район Хорошёво-Мнёвники" name = "37">район Хорошёво-Мнёвники</option>
                        <option value="район Чертаново Центральное" name = "38">район Чертаново Центральное</option>
                        <option value="район Южное Бутово" name = "39">район Южное Бутово</option>
                        <option value="район Южное Медведково" name = "40">район Южное Медведково</option>
                        <option value="район Южное Тушино" name = "41">район Южное Тушино</option>
                        <option value="район Ясенево" name = "42">район Ясенево</option>
                        <option value="Таганский район" name = "43">Таганский район</option> 
                        <option value="Хорошёвский район" name = "44">Хорошёвский район</option>
                        <option value="Южнопортовый район" name = "45">Южнопортовый район</option>
                        <option value="Бутырский район" name = "46">Бутырский район</option>
                        <option value="Даниловский район" name = "47">Даниловский район</option>
                        <option value="Дмитровский район" name = "48">Дмитровский район</option>
                        <option value="Донской район" name = "49">Донской район</option>
                        <option value="Можайский район" name = "50">Можайский район</option>
                        <option value="Нижегородский район" name = "51">Нижегородский район</option>
                        <option value="Останкинский район" name = "52">Останкинский район</option>
                        <option value="поселение Марушкинское" name = "53">поселение Марушкинское</option>
                        <option value="поселение Сосенское" name = "54">поселение Сосенское</option>
                        
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