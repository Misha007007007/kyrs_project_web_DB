<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>

                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <h3> Для того чтобы добавить информацию о ледовом поле, которого еще нет в нашей базе данных, тебе необходимо заполнить все поля. </h3>
            <h3> В комментарии можешь указать какие удобства есть на новом ледовом поле (раздевалки, точки wifi, ...) или адрес места, где можно вкусно покушать. </h3>
            <h3> Но обязательно рядом. </h3>
            <div class="connection" id = "connection">
                <form action="userAdd.php" method="post">
                    <input type="text" maxlength="50" size="45" name="user_name" placeholder="Ваше имя"><br>
                    <input type="text" maxlength="50" size="45" name="name" placeholder="Название ледового поля"><br>
                    <input type="text" maxlength="50" size="45" name="admArea" placeholder="Административный округ"><br>
                    <input type="text" maxlength="50" size="45" name="district" placeholder="Район"><br>
                    <input type="text" maxlength="50" size="45" name="address" placeholder="Адрес"><br>
                    <textarea name="comment" id="text" cols="45" rows="10" placeholder="Комментарий"></textarea>
                    <input type="submit" value="Добавить">
                </form>
            </div>
        </div>
    </section>
    <?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>