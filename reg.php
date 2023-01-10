<?php require("layoutFiles/header.php") ?> 
            </ul>
        </div>
    </div>
</header>
<section id = "about" class="about">
    <div class="container">
        <?php
            require("connectdb.php");
            require("session.php");

            $role = 2;
            if (!empty($_POST)){
                $stmt = $connect->prepare("SELECT * FROM user WHERE login = ?");
                $stmt->bind_param("s", $_POST["login"]);

                $result = $stmt->execute();
                $result = mysqli_stmt_get_result($stmt);
                $stmt->close();
                
                //echo mysqli_num_rows($result);
                if(mysqli_num_rows($result) == 0){
                    $pass = md5($_POST["password"]);
                    $stmt = $connect->prepare("INSERT user (login, password_hash, role) VALUES (?, ?, ?)");
                    $stmt->bind_param("ssi", $_POST["login"], $pass, $role);

                    $result = $stmt->execute();
                    $result = mysqli_stmt_get_result($stmt);
                    $stmt->close();

                    
                    // header("Location: menu.php");
                    echo "<h2>Вы зарегистрировали нового пользователя</h2>";
                    header('Refresh: 3; lk.php');
                }
                else{
                    echo "<h2>Невозможно зарегистировать пользователя с таким логином.</h2>";
                    header('Refresh: 3; lk.php');
                }
                //$id = mysqli_insert_id($connect);
                
            }
        ?> 
    </div>
</section>
<?php require("layoutFiles/footer.php") ?>
