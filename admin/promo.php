<?php
include("../inc/bd.php");
require("../inc/bd.php");





		$insert_sql = "INSERT INTO svuti_promo (`promo`,`active`,`activelimit`, `summa`, `data`)
		VALUES ('{$promo}','0','{$activelimit}','{$summa}','{$data}')";
		mysql_query($insert_sql);

mysql_query($update_sql1) or die("" . mysql_error());
?>