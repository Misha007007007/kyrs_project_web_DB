<?php
require("C:/localhost/front/kyrs_project_web/layoutFiles/header.php");
                        if($_SESSION['role'] == 1){
                            echo '<li> <a href="http://localhost:3000/user/regUser.php"> Зарегистрировать пользователя </a> </li>';
                        }else{
                            echo "";
                        }  
                        
                    ?>
                </ul>
            </div>
        </div>
    </header>

    <section id = "about" class="about">
        <div class="container">
           <?php
                require("C:/localhost/front/kyrs_project_web/layoutFiles/connectdb.php");
                
                if($_SESSION['role'] == 1 || $_SESSION['role'] == 2){
                    $result = mysqli_query($connect, "SELECT * FROM addedPlaces WHERE examination = 2");
                    if(!$result || mysqli_num_rows($result) == 0){
                        echo "<h3> Нет записей для валидации. </h3>";
                    }else{
                        while($entry = mysqli_fetch_assoc($result)){
                        echo '<div class="validation" id = "validation">
                                <form action="http://localhost:3000/admin/adminAdd.php?id='.$entry['id'].'" method="post">
                                    <p>Имя пользователя</p><br>
                                    <textarea name="user_name" id="text" cols="45" rows="2" >' . $entry['user_name'] . '</textarea><br>
                                    <p>Название ледового поля</p><br>
                                    <textarea name="name" id="text" cols="45" rows="2" >' . $entry['name'] . '</textarea><br>
                                    <p>Административный округ</p><br>
                                    <textarea name="admArea" id="text" cols="45" rows="2" >' . $entry['admArea'] . '</textarea><br>
                                    <p>Район</p><br>
                                    <textarea name="district" id="text" cols="45" rows="2" >' . $entry['district'] . '</textarea><br>
                                    <p>Адрес</p><br>
                                    <textarea name="address" id="text" cols="45" rows="2" >' . $entry['address'] . '</textarea><br>
                                    <p>Комментарий</p><br>
                                    <textarea name="comment" id="text" cols="45" rows="2" >' . $entry['comment'] . '</textarea>
                                    <input type="submit" value="Добавить"><br>
                                    <a href="admin/adminDelete.php?id='.$entry['id'].'">Удалить</a>
                                </form><div><br><br>';  
                        }
                    }
                }
                else if ($_SESSION['role'] == 3){
                    $stmt = $connect->prepare("SELECT * FROM `favorites` WHERE `id_user`= ?");
                    $stmt->bind_param("i", $_SESSION['id_user']);
                    $result = $stmt->execute();
                    $result = mysqli_stmt_get_result($stmt);
                    $stmt->close(); 
                    
                    if(!$result || mysqli_num_rows($result) == 0){
                        echo "<h3> Нет Избранных ледовых полей. </h3>";
                    }else{
                        echo "<h2> Избранные ледоввые поля. </h2>";
                        while($usersF = mysqli_fetch_assoc($result)){
                            $stmt = $connect->prepare("SELECT * FROM field WHERE id = ?");
                            $stmt->bind_param("s", $usersF['id_field']);
        
                            $resultt = $stmt->execute();
                            $resultt = mysqli_stmt_get_result($stmt);
                            $stmt->close();
        
                            while($entry = mysqli_fetch_assoc($resultt)){
                                echo '<br><div class="links">';
                                echo '<h4>' . $entry['objectName'] . '</h4> 
                                <p>Адрес: ' . $entry['admArea'] . ', ' . $entry['district'] . ',  ' . $entry['address'] . '.</p><br>
                                <p>Для связи используйте: </p>
                                <ul>';
                                if ($entry['email'] != null)
                                    
                                    echo '<li>Email: <a href="mailto:'.$entry['email'].'"> ' . $entry['email'] . '<a></li>';
                                else
                                    echo "";

                                if ($entry['webSite'] != null)
                                    
                                    echo ' <li>Сайт: <a href=https://' . $entry['webSite'] . '>' . $entry['webSite'] . '<a></li>';
                                else
                                    echo "";

                                if ($entry['helpPhone'] != null)
                                    
                                    echo '<li> Справочный телефон: <a href="tel:' . $entry['helpPhone'] . '"> ' . $entry['helpPhone'] . '</a></li>';
                                else
                                    echo "";

                                if ($entry['helpPhoneExtension'] != null)
                                    echo '<li>Добавочный номер: ' . $entry['helpPhoneExtension'] . '</li></ul>';
                                else
                                    echo "";
                                echo '</div>';
                            }
                        }
                    }
                }
                else{
                    echo "Необходимо авторизоваться."; 
                }
           ?>
           
        </div>
    </section>
    <?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>