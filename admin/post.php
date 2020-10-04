<?php
include("../inc/bd.php");
require("../inc/bd.php");

$balance = $_POST['balance'];
$user = $_POST['user'];
$login = $_POST['login'];
$fake = $_POST['fake'];
$youtube = $_POST['youtube'];
$sliv = $_POST['sliv'];
$prava = $_POST['prava'];
$bonusurl = $_POST['bonusurl'];
$referer = $_POST['referer'];
$bonus = $_POST['bonus'];
$online = $_POST['online'];
$ban = $_POST['ban'];
$email = $_POST['email'];
$password = $_POST['password'];
$update_sql1 = "Update svuti_users SET `password`= '$password', `email`= '$email', `referer`= '$referer', `balance`= '$balance', `ban`= '$ban', `login` = '$login', `fake` = '$fake', `youtube` = '$youtube', `sliv` = '$sliv', `prava` = '$prava', `bonus_url` = '$bonusurl', `bonus` = '$bonus', `online` = '$online' WHERE `id` = '$user'"; 
mysql_query($update_sql1) or die("" . mysql_error());
?>