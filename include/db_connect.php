<?php
defined('myeshop') or die('Нет контакта!');
$db_host		= 'localhost';
$db_user		= 'voldemar';
$db_pass		= 'vova2102';
$db_database	= 'db_shop'; 

$link = mysql_connect($db_host,$db_user,$db_pass);

mysql_select_db($db_database,$link) or die("Нет контакта".mysql_error());
?>