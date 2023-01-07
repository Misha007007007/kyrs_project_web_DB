<?php require("header.php") ?>
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
        <?php
            include "connectdb.php";
            $query = "SELECT DISTINCT admArea FROM `field` ORDER BY admArea";
            $result = mysqli_query($connect, $query);
        ?>
        <div class="container">
            <p> Выбери из списка административный округ Москвы и мы подберем для тебя катки в нем. </p>
            <div class="connection" id = "connection">
                <form action="admArea.php" method="post">
                    <select size="1" style="width: 1000px; " name = "admArea" id = "admArea">
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
    <?php require("footer.php") ?>