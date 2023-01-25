<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>

                </ul>
            </div>
        </div>
    </header>
<?php
    if (array_key_exists('type',$_GET) == false) $type = 'http://localhost:3000/user/reg.php?type=2';
    else $type = 'http://localhost:3000/user/reg.php?type=3';
?>
    <section id = "about" class="about">
        <div class="connection" id = "connection" style="position: absolute; top: 25%; left: 50%; transform: translateY(-40%); transform: translateX(-50%);">
            <form action=<?php echo $type ?> method="post">
                <p><b>Регистрация</b></p><br>
                <input type="text" maxlength="30" size="40" name="name" placeholder="Имя"><br>
                <input type="text" maxlength="30" size="40" name="surname" placeholder="Фамилия"><br>
                <input type="text" maxlength="30" size="40" name="login" placeholder="Логин"><br>
                <input type="text" maxlength="30" size="40" name="email" placeholder="Email"><br>
                <input type="password" maxlength="30" size="40" name="password" placeholder="Пароль">
                <input type="submit" value="Зарегистрировать"><br>               
            </form>
        </div>
    </section>

    <?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>