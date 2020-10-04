<?php
$bd_login =  'ct23930_1';//логин базы данных

$bd_pass = 'Qwerty';//пароль базы данных

$bd_name = 'ct23930_1';//имя базы данных
 
mysql_connect("localhost", $bd_login, $bd_pass)//параметры в скобках ("хост", "имя пользователя", "пароль")
or die("<p>Ошибка подключения к базе данных! " . mysql_error() . "</p>");
mysql_select_db($bd_name)//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");
mysql_query("SET NAMES utf8");
?>
