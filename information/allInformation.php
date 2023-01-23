<?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/header.php") ?>

                   
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
            <div class="links">
                <h1>Ледовые поля, содержащиеся в нашей базе данных</h1>
                <?php
                    require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/connectdb.php");
                    $interview = "ВсяИнформация";
                    $result = mysqli_query($connect, "SELECT * FROM field WHERE 1");

                    if(!$result || mysqli_num_rows($result) == 0){
                        echo "Пока здесь нет такой информации.";
                    }
                    else{                   
                        while($entry = mysqli_fetch_assoc($result)){
                            require("shortInfo.php");
                            echo ' <li><a href="addInfo.php?id='.$entry['id'].'&page='.$interview.'">Дополнительная информация</a></li></ul>';
                        }
                    }
                ?>
                <h1>Ледовые поля, добавленные нашими пользователями</h1>
                
                <?php
                    
                    $resultAddedPlaces = mysqli_query($connect, "SELECT * FROM addedPlaces WHERE examination = 1");
                    
                    if(mysqli_num_rows($resultAddedPlaces) == 0){
                        echo "Пока здесь нет такой информации.";
                    }
                    else{
                        while($entry = mysqli_fetch_assoc($resultAddedPlaces)){
                            // echo $entry['id'];
                            echo '<h4>' . $entry['name'] . '</h4> 
                            <p>Данное место расположено по адресу: ' . $entry['admArea'] . ', ' . $entry['district'] . ',  ' . $entry['address'] . '.</p>
                            <p>Так же пользователь оставил комментарий: </p>
                            <p>' . $entry['comment'] . '</p>
                            <p>Благодарим <a href="#">' . $entry['user_name'] . '</a> за вклад в развитие проекта.</p>'; 
                        }
                    }
                ?>
            </div>
            
        </div>
    </section>
    <?php require("/var/www/u1840628/data/www/andreitsev.ru/layoutFiles/footer.php") ?>