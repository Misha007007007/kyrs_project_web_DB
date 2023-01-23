<?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php") ?>

                </ul>
            </div>
        </div>
    </header>
<?php
    if (array_key_exists('type',$_GET) == false) $type = 'https://andreitsev.ru/user/reg.php?type=2';
    else $type = 'https://andreitsev.ru/user/reg.php?type=3';
?>
    <section id = "about" class="about">
        <div class="connection" id = "connection">
            <form action=<?php echo $type ?> method="post">
                <p><b>Регистрация</b></p><br>
                <input type="text" maxlength="30" size="40" name="login" placeholder="Введите логин"><br>
                <input type="password" maxlength="30" size="40" name="password" placeholder="Введите пароль">
                <input type="submit" value="Заергистрировать"><br>
                
            </form>
        </div>
    </section>

    <?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php") ?>