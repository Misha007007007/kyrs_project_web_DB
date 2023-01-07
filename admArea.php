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
                echo $_POST['admArea'];?> <br><?php
                include "connectdb.php";
                
                $admArea = $_POST['admArea'];
                
                $stmt = $connect->prepare("SELECT * FROM `field` WHERE admArea = ?");
                $stmt->bind_param("s", $admArea);
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
