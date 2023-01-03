<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Ледовые поля</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Antonio:wght@100&display=swap" rel="stylesheet">
</head>
<body bgcolor="#fff">
    <header id = "header" class="header">
        <div class="container">
            <div class="nav">
                <ul class = "menu">
                    <li>
                        <a href="index.php">
                            Ice fields
                        </a>
                    </li>
                    <?php
                        require("session.php");
                        if($session_user['role'] == 1){
                            echo '<li> <a href="regUser.php"> Зарегистрировать пользователя </a> </li>';
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
                require("connectdb.php");
                
                
                $result = mysqli_query($connect, "SELECT * FROM addedPlaces WHERE examination = 2");
                if(!$session_user){
                    echo "Необходимо авторизоваться.";
                }
                else if(!$result || mysqli_num_rows($result) == 0){
                    echo "В базе данных нет страниц.";
                }
                else{
                    // $entry = mysqli_fetch_assoc($result);
                    
                    while($entry = mysqli_fetch_assoc($result)){
                        // echo $entry['id'];
                        echo '
                        <div class="validation" id = "validation">
                            <form action="adminAdd.php?id='.$entry['id'].'" method="post">
                                <textarea name="user_name" id="text" cols="61" rows="2" >' . $entry['user_name'] . '</textarea>
                                <textarea name="name" id="text" cols="61" rows="2" >' . $entry['name'] . '</textarea>
                                <textarea name="admArea" id="text" cols="61" rows="2" >' . $entry['admArea'] . '</textarea>
                                <textarea name="district" id="text" cols="61" rows="2" >' . $entry['district'] . '</textarea>
                                <textarea name="address" id="text" cols="61" rows="2" >' . $entry['address'] . '</textarea><br>
                                <textarea name="comment" id="text" cols="61" rows="2" >' . $entry['comment'] . '</textarea><br>
                                <input type="submit" value="Добавить">
                                <a href="adminDelete.php?id='.$entry['id'].'">Удалить</a>
                            </form>    
                                   
                        <div>';  
                    }
                }
           ?>
        </div>
    </section>
    

    <footer id = "footer" class="footer">
        <div class="container">
            <li>
                <?php
                    echo date('Сформировано d.m.Y в G:i:s', time()+3600*3);
                ?>
            </li>
        </div>
    </footer>
</body>
</html>