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
        <div class="container">
            <?php
                echo "Вы выбрали ";
                echo $_POST['district'];?> <br><?php
                include "connectdb.php";
                
                $dictrict = $_POST['district'];
                
                $stmt = $connect->prepare("SELECT * FROM `field` WHERE district = ?");
                $stmt->bind_param("s", $dictrict);
                $result = $stmt->execute();
                
                $result = mysqli_stmt_get_result($stmt);
                $stmt->close();

                //$row = mysqli_fetch_row($result);
                while($row = mysqli_fetch_assoc($result)){
                    echo $row['id'];?> <br><?php
                }
            ?>
        </div>
    </section>
    <?php require("footer.php") ?>
