<?php session_start();
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
                $result = mysqli_query($connect, "SELECT * FROM addedPlaces WHERE examination = 2");
                if($_SESSION['role'] == 1 || $_SESSION['role'] == 2){
                    while($entry = mysqli_fetch_assoc($result)){
                    echo '
                        <div class="validation" id = "validation">
                            <form action="http://localhost:3000/admin/adminAdd.php?id='.$entry['id'].'" method="post">
                                <textarea name="user_name" id="text" cols="45" rows="2" >' . $entry['user_name'] . '</textarea><br>
                                <textarea name="name" id="text" cols="45" rows="2" >' . $entry['name'] . '</textarea><br>
                                <textarea name="admArea" id="text" cols="45" rows="2" >' . $entry['admArea'] . '</textarea><br>
                                <textarea name="district" id="text" cols="45" rows="2" >' . $entry['district'] . '</textarea><br>
                                <textarea name="address" id="text" cols="45" rows="2" >' . $entry['address'] . '</textarea><br>
                                <textarea name="comment" id="text" cols="45" rows="2" >' . $entry['comment'] . '</textarea>
                                <input type="submit" value="Добавить"><br>
                                <a href="admin/adminDelete.php?id='.$entry['id'].'">Удалить</a>
                            </form><div>';  
                    }
                }
                else if(!$result || mysqli_num_rows($result) == 0){
                    echo "<h3> Нет записей для валидации. </h3>";
                }
                else{
                    echo "Необходимо авторизоваться."; 
                }
           ?>
           
        </div>
    </section>
    <?php require("C:/localhost/front/kyrs_project_web/layoutFiles/footer.php") ?>