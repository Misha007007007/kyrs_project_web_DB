<form action="" method="post">
    <input type="text" maxlength="50" size="70" name="user_name" placeholder="Ваше имя" value = ' . $entry['user_name'] . '>
    <input type="text" maxlength="50" size="70" name="name" placeholder="Название ледового поля" value = ' . $entry['name'] . '>
    <input type="text" maxlength="50" size="70" name="admArea" placeholder="Административный округ" value = ' . $entry['admArea'] . '><br>
    <input type="text" maxlength="50" size="70" name="district" placeholder="Район" value = ' .$entry['district'] . '>
    <input type="text" maxlength="50" size="70" name="address" placeholder="Адрес" value = ' . $entry['address'] . '><br>
    <textarea name="comment" id="text" cols="61" rows="10" placeholder="Комментарий">' . $entry['comment'] . '</textarea><br>
    <input type="submit" value="Добавить">
    <a href = "">Удалить</a>
</form>';


