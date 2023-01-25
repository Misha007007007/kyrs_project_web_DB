<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>

                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <h3> Выбери из списка район Москвы в котором вы бы хотели подобрать ледовое поле. </h3>
            <h3> Также отметьте важные для Вас пункты, представленные в списке ниже. </h3>
            <h3> Возможно, Вам не подходит ни один пункт. В таком случае, оставьте поля пустыми. </h3>
            <div class="connectiontwo" id = "connection">
                <form action="pollHandler.php" method="post">
                    <select size="1" style="width: 300px; " name = "district" id = "district">
                        <option disabled>Выберети один вариант</option>
                        <option value="Район не важен" name = "2">Район не важен</option>
                        <?php
                            require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
                            $query = "SELECT DISTINCT district FROM `field` ORDER BY district";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['district']?>" name = "2"><?php echo $row['district']?></option>
                        <?php }?>    
                                      
                    </select>
                   
                    <div class="check">
                        <!-- если отмечено - on
                        если не отмечено - null -->
                        <fieldset>   
                            <input type="checkbox" name="hasEquipmentRental" id="hasEquipmentRental" value="да"> Прокат оборудования <br>
                            <input type="checkbox" name="hasTechService" id="hasTechService" value="да">  Сервис технического обслуживания <br>
                            <input type="checkbox" name="hasDressingRoom" id="hasDressingRoom" value="да"> Наличие раздевалки <br>
                            <input type="checkbox" name="hasEatery" id="hasEatery" value="да"> Наличие точки питания <br>
                            <input type="checkbox" name="hasToilet" id="hasToilet" value="да"> Наличие туалета <br>
                            <input type="checkbox" name="hasWifi" id="hasWifi" value="да"> Наличие точки Wi-Fi <br>
                            <input type="checkbox" name="hasCashMachine" id="hasCashMachine" value="да"> Наличие банкомата <br>
                            <input type="checkbox" name="hasFirstAidPost" id="hasFirstAidPost" value="да"> Наличие медпункта <br>
                            <input type="checkbox" name="hasMusic" id="hasMusic" value="да"> Наличие звукового сопровождения <br>
                            <input type="checkbox" name="paid" id="paid" value="бесплатно"> Бесплатная форма посещения <br>
                            <input type="checkbox" name="seats" id="seats" value="1"> Наличие оборудованных посадочных мест <br>
                        </fieldset>  
                    </div>
                    <input type="submit" value="Подобрать">
                </form>
            </div>
        </div>
    </section>
    <?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>