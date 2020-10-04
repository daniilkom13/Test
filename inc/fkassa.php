<?php
include('config.php');
$merchant_id = $fkassa;
$merchant_secret = $fksec;
 
function getIP() {
    if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
    return $_SERVER['REMOTE_ADDR'];
    }
    if (!in_array(getIP(), array('136.243.38.147', '136.243.38.149', '136.243.38.150', '136.243.38.151', '136.243.38.189', '88.198.88.98', '136.243.38.108'))) {
    die("hacking attempt!");
    }


    $sign = md5($merchant_id.':'.$_GET['AMOUNT'].':'.$merchant_secret.':'.$_GET['MERCHANT_ORDER_ID']);

    if ($sign != $_GET['SIGN']) {
    die('wrong sign');
    }

$label = $_GET['intid'];
$idmoney = $_GET['MERCHANT_ORDER_ID'];
$data = date('d-m-Y H:i:s');
$yandex = '';
$suma = $_GET['AMOUNT'];
		if (is_numeric($idmoney))
		{
		$sql_select = "SELECT * FROM svuti_users WHERE id='$idmoney'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$ref = $row['referer'];
}
	$sumaref = ($suma / 100) * 10;
if($ref >= 1)
{	
			$sql_select = "SELECT * FROM svuti_users WHERE id='$ref'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balanceref = $row['balance'];
$balancerefs = $balanceref + $sumaref;
$update_sql1 = "Update svuti_users set balance='$balancerefs' WHERE id='$ref'";
    mysql_query($update_sql1) or die("" . mysql_error());
}
} 
if($depobon == 0){
$balancenew = $row['balance'] + $suma;
}else{
$bonusuma = ($suma / 100) * 10;
$balancenew = $row['balance'] + $suma + $bonusuma;
} 
$update_sql1 = "Update svuti_users set balance='$balancenew' WHERE id='$idmoney'";
    mysql_query($update_sql1) or die("" . mysql_error());
			$insert_sql1 = "
			INSERT INTO `svuti_payments` (`user_id`, `suma`, `data`, `qiwi`, `transaction`) 
			VALUES ('{$idmoney}', '{$suma}', '{$data}', '{$yandex}', '{$label}')
			";
mysql_query($insert_sql1);
} 

    die('YES');
?>