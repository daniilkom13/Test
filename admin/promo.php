<?php
include("../inc/bd.php");
require("../inc/bd.php");
  $promo = $_POST['promo'];
  $active = $_POST['active'];
  $activelimit = $_POST['activelimit'];
  $summa = $_POST['summa'];
  $data = $_POST['data'];
		$insert_sql = "INSERT INTO svuti_promo (`promo`,`active`,`activelimit`, `summa`, `data`)
		VALUES ('{$promo}','0','{$activelimit}','{$summa}','{$data}')";
		mysql_query($insert_sql);

mysql_query($update_sql1) or die("" . mysql_error());
?>
