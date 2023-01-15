<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php") ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <?php
            require("connectdb.php");
            $query = "SELECT DISTINCT objectName, address FROM `field` ORDER BY admArea";
            $result = mysqli_query($connect, $query);
        ?>
        <div class="container">
            <h3> Выберите из списка то место, которое Вы бы хотел оценить. </h3>
            <div class="connection" id = "connection">
                <form action="ratingAnalysis.php" method="post">
                    <select size="1" style="width: 500px; " name = "address" id = "address">
                        <option disabled>Выберети один вариант</option>
                        <?php while($row = mysqli_fetch_assoc($result)){?>
                            <option value="<?php echo $row['address'];?>"><?php echo $row['objectName']; echo ": "; echo $row['address']?></option>
                        <?php }?>
                    </select>
                    <br><br>
                    <div class="radioBut">
                        <input type="radio" id="1" name="grade" value="1">
                        <label for="1">1</label>
                    
                        <input type="radio" id="2" name="grade" value="2">
                        <label for="2">2 </label>
                    
                        <input type="radio" id="3" name="grade" value="3">
                        <label for="4">3</label>

                        <input type="radio" id="4" name="grade" value="4">
                        <label for="4">4</label>

                        <input type="radio" id="5" name="grade" value="5">
                        <label for="5">5</label>
                    </div>
                    
                    <input type="submit" value="Оценить">
                </form>
            </div>
        </div>
    </section>

<?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>
