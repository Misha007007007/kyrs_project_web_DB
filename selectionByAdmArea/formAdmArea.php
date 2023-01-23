<?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <?php
            require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/connectdb.php");
            $query = "SELECT DISTINCT admArea FROM `field` ORDER BY admArea";
            $result = mysqli_query($connect, $query);
        ?>
        <div class="container">
            <h3> Выбери из списка административный округ Москвы и мы подберем для тебя катки в нем. </h3>
            <div class="connection" id = "connection">
                <form action="https://andreitsev.ru/selectionByAdmArea/admArea.php" method="post">
                    <select size="1" style="width: 330px; " name = "admArea" id = "admArea">
                        <option disabled>Выберети один вариант</option>
                        <?php while($row = mysqli_fetch_assoc($result)){?>
                            <option value="<?php echo $row['admArea']?>"><?php echo $row['admArea']?></option>
                        <?php }?>
                    </select>
                    <input type="submit" value="Подобрать">
                </form>
            </div>
        </div>
    </section>
    <?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php") ?>