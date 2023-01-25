<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <?php
            require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
            $query = "SELECT DISTINCT admArea FROM `field` ORDER BY admArea";
            $result = mysqli_query($connect, $query);
        ?>
        <div class="container">
            
            <div class="connection" id = "connection" style="position: absolute; top: 30%; left: 50%; transform: translateY(-40%); transform: translateX(-50%);">
                <form action="admArea.php" method="post">
                <h3> Выбери из списка административный округ Москвы и мы подберем для тебя катки в нем. </h3>
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
    <?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>