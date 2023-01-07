<?php require("header.php") ?>
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
<?php require("footer.php") ?>
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