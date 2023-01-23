<?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php") ?>

                    
                </ul>
            </div>
        </div>
    </header>
<?php
?>
    <section id = "about" class="about">
        <div class="connection" id = "connection">
            <form action="https://andreitsev.ru/user/auth.php?" method="post">
                <p><b>Авторизация</b></p><br>
                <input type="text" maxlength="30" size="40" name="login" placeholder="Введите Ваш логин"><br>
                <input type="password" maxlength="30" size="40" name="password" placeholder="Введите Ваш пароль">
                <input type="submit" value="Авторизоваться">
                <div class="validation"><a href="https://andreitsev.ru/user/regUser.php?type=3"> Pегистрация </a></div>
            </form>
        </div>
    </section>
<?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php") ?>