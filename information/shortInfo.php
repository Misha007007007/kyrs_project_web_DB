<?php

echo '<br><div class="links">';
echo '<h4>' . $entry['objectName'] . '</h4> 
<p>Данное место расположено по адресу: ' . $entry['admArea'] . ', ' . $entry['district'] . ',  ' . $entry['address'] . '.</p><br>
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
echo '</div>'
?>