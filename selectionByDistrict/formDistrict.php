<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>

                    
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            
            <div class="connection" id = "connection" style="position: absolute; top: 30%; left: 50%; transform: translateY(-40%); transform: translateX(-50%);">
                <form action="district.php" method="post">
                    <h3> Выбери из списка район Москвы и мы подберем для тебя катки в этом районе. </h3>
                    <select size="1" style="width: 250px; " name = "district" id = "district">
                        <option disabled>Выберети один вариант</option>
                        <?php
                            require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
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
    <?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>