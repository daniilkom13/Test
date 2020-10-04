<?php
include("../inc/bd.php");
require("../inc/bd.php");

$user = $_POST['user'];
$query = "DELETE FROM `svuti_users` WHERE `rvuti_users`.`id` = '$user'";
mysql_query($query) or die("" . mysql_error());
?>