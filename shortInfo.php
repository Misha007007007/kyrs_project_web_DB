<?php
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


?>