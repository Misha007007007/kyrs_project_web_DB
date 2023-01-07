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
            <h1>Ледовые поля, содержащиеся в нашей базе данных</h1>
            <?php
                require("connectdb.php");
                $interview = "ВсяИнформация";
                $result = mysqli_query($connect, "SELECT * FROM field WHERE 1");

                if(!$result || mysqli_num_rows($result) == 0){
                    echo "Пока здесь нет такой информации.";
                }
                else{                   
                    while($entry = mysqli_fetch_assoc($result)){
                        // echo $entry['id'];
                        echo '<h4>' . $entry['objectName'] . '</h4> 
                        <p>Данное место расположено по адресу: ' . $entry['admArea'] . ', ' . $entry['district'] . ',  ' . $entry['address'] . '.</p>
                        <p>Для связи используйте: </p>
                        <ul>';
                        if ($entry['email'] != null)
                            echo '<li>Email: ' . $entry['email'] . ' </li>';
                        else
                            echo "";

                        if ($entry['webSite'] != null)
                            echo ' <li>Сайт: <a href=https://' . $entry['webSite'] . '>' . $entry['webSite'] . '<a></li>';
                        else
                            echo "";

                        if ($entry['helpPhone'] != null)
                            echo '<li> Справочный телефон: ' . $entry['helpPhone'] . '</li>';
                        else
                            echo "";
                        
                        if ($entry['helpPhoneExtension'] != null)
                            echo '<li>Добавочный номер: ' . $entry['helpPhoneExtension'] . '</li>';
                        else
                            echo "";
                        
                        echo '
                        <li><a href="addInfo.php?id='.$entry['id'].'&page='.$interview.'">Дополнительная информация</a></li>
                        
                        </ul>'; 
                    }
                }
            ?>
            <h1>Ледовые поля, добавленные нашими пользователями</h1>
            
            <?php
                
                $result = mysqli_query($connect, "SELECT * FROM addedPlaces WHERE examination = 1");
                
                if(!$result || mysqli_num_rows($result) == 0){
                    echo "Пока здесь нет такой информации.";
                }
                else{
                    $entry = mysqli_fetch_assoc($result);
                    
                    while($entry = mysqli_fetch_assoc($result)){
                        // echo $entry['id'];
                        echo '<h4>' . $entry['name'] . '</h4> 
                        <p>Данное место расположено по адресу: ' . $entry['admArea'] . ', ' . $entry['district'] . ',  ' . $entry['address'] . '.</p>
                        <p>Так же пользователь оставил комментарий: </p>
                        <p>' . $entry['comment'] . '</p>
                        <p>Благодарим <a href="#">' . $entry['user_name'] . '</a> за вклад в развитие проекта.</p>
                        '; 
                    }
                }
            ?>
            <br><br><br><br><br>
        </div>
    </section>
    <?php require("footer.php") ?>