<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>

                    
                </ul>
            </div>
        </div>
    </header>
<?php
    session_abort();
?>
    <section id = "about" class="about">
        <div class="connection" id = "connection">
            <form action="auth.php?" method="post">
                <p><b>Авторизация</b></p><br>
                <input type="text" maxlength="30" size="40" name="login" placeholder="Введите Ваш логин"><br>
                <input type="password" maxlength="30" size="40" name="password" placeholder="Введите Ваш пароль"><br>
                <input type="submit" value="Авторизоваться"><br>
            </form>
        </div>
    </section>
    <?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>