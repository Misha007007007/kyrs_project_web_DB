<?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php") ?>

                    
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <h3> Выбери из списка район Москвы и мы подберем для тебя катки в этом районе. </h3>
            <div class="connection" id = "connection">
                <form action="https://andreitsev.ru/selectionByDistrict/district.php" method="post">
                    <select size="1" style="width: 250px; " name = "district" id = "district">
                        <option disabled>Выберети один вариант</option>
                        <?php
                            require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/connectdb.php");
                            $query = "SELECT DISTINCT district FROM `field` ORDER BY district";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['district']?>" name = "1"><?php echo $row['district']?></option>
                        <?php }?>                       
                    </select>
                    <input type="submit" value="Подобрать">
                </form>
            </div>
        </div>
    </section>
    <?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php") ?>