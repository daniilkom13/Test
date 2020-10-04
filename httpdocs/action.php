<?php
require("inc/config.php");
$pass = $_POST['pass'];
$login = $_POST['login'];
$sitesalt = ".Q8amk$)F939&*#$";
$type = $_POST['type'];
$email = $_POST['email'];
$error = 0;
$fa = "";
if($type == "otmena")
{
session_start(); 
if($_SESSION['timestamp'] + 5 > time()){ 
$error = 3;
$fa = "error";
$mess = "Попробуйте позже";
$success = "no";
} 
if($error == 0){
$_SESSION['timestamp'] = time();	
$paysid = $_POST['sid'];
$payid = $_POST['id'];		
$sql_select = sprintf("SELECT * FROM svuti_payout WHERE id='%s'", mysql_real_escape_string($payid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$sumaohg = $row['suma'];
}
else{
$error = 3;
$fa = "error";
$mess = "Выплата не найдена!";
$success = "no";
}
$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($paysid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balanceotm = $row['balance'];
}
$otmenabalance = $balanceotm + $sumaohg;
$update_sqljf = "Update svuti_users set balance='$otmenabalance' WHERE hash='$paysid'";
      mysql_query($update_sqljf) or die("����ڧҧܧ� �ӧ��ѧӧܧ�" . mysql_error());
$paysgo2 = "DELETE FROM `svuti_payout` WHERE id = '$payid'";
mysql_query($paysgo2) or die("" . mysql_error());
$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($paysid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$outbalance = $row['balance'];
}
$fa = "success";
}
$result = array(
    'balance' => "$balanceotm",
	'success' => "$fa",
	'mess' => "$mess",
	'new_balance' => "$outbalance"
    );
}

if($type == "PersonActive")
{
$toperson1 = $_POST['toperson1'];
	$person = $_POST['person'];
	$sid = $_POST['sid'];
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$loginwtf = $row['login'];
$balance = $row['balance'];
$nopidor = $row['youtube'];
}
if($loginwtf == $toperson1)  
{	
$error = 6;
$fa = "error";
$mess = "Ты ебобо?";
}
if($nopidor == 1)  
{	
$error = 5;
$fa = "error";
$mess = "Перевод средств YouTube не доступен.";
}
if($balance < $person)  
{	
$error = 4;
$fa = "error";
$mess = "Не хватает средств.";
}
$dlperson = strlen($person);
if($dlperson < 1 || $dlperson > 5)
{
	$error = 4;
	$fa = "error";
	$mess = 'Сумма от 1 до 5 символов.';
}
if($person < 1)  
{	
$error = 2;
$fa = "error";
$mess = "Перевод средств от 1 рубля.";
}	
$sql_select = sprintf("SELECT * FROM svuti_users WHERE login='%s'", mysql_real_escape_string($toperson1));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance1 = $row['balance'];
$idofperson = $row['id'];
}
if(empty($idofperson))  
{	
$error = 1;
$fa = "error";
$mess = "Получатель не найден.";
}
if(empty($person))  
{	
$error = 2;
$fa = "error";
$mess = "Введите сумму перевода.";
}	
if(empty($toperson1))  
{	
$error = 1;
$fa = "error";
$mess = "Введите логин получателя.";
}
if($error == 0){
$sql_select = sprintf("SELECT * FROM svuti_users WHERE login='%s'", mysql_real_escape_string($toperson1));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance1 = $row['balance'];
}
$outbalance = $balance - $person;
$update_sql = "Update svuti_users set balance='$outbalance' WHERE hash='$sid'";
      mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());

$outbalance1 = $balance1 + ($person / 100) * 95;
$update_sql1 = "Update svuti_users set balance='$outbalance1' WHERE login='$toperson1'";
      mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
$fa = "success";
} 
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'new_balance' => "$outbalance",
	'suma' => "$summa"
    );
} 
if($type == "betNum1")
{
$sid = $_POST['sid'];
$bet = $_POST['bet'];
$type = "[0-500]";
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
$sliv = $row['sliv'];
}
session_start(); 
if($_SESSION['timestamp'] + 3 > time()){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($bet > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if($bet < 1){
  $error = 3;
  $fa = "error";
  $mess = "bet error.";
}
if(empty($sid)){
  $error = 3;
  $fa = "error";
  $mess = "Сессия не активна!";
}
if($error == 0)
{ 
$update_sql2 = "Update svuti_users set balance = balance - '$bet' WHERE hash='$sid'";
mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
$number = rand(0,10000);
$formula = 0;
$fff = rand(0,100);
if($fff > 55){
	$number = rand(500,10000);
}
if($number <= 500){
	$cef = 20;
	$formula = $bet * $cef;
    $update_sql2 = "Update svuti_users set balance = balance + '$formula' WHERE hash='$sid'";
	  mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
}
else{
	$cef = 0;
}
$insert_sql1 = "INSERT INTO `numbersGame` (`user_id`, `type`, `bet`, `number`, `win`) VALUES ('{$user_id}', '{$type}', '{$bet}', '{$number}', '{$formula}');";
 mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balancenew = $row['balance'];
}
$fa = "success";
	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'number' => "$number",
	'profit' => "$formula",
	'balance' => "$balance",
	'new_balance' => "$balancenew"
    );
}
if($type == "betNum2")
{
$sid = $_POST['sid'];
$bet = $_POST['bet'];
$type = "[3000-3500]";
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
$sliv = $row['sliv'];
}
session_start(); 
if($_SESSION['timestamp'] + 3 > time()){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($bet > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if($bet < 1){
  $error = 3;
  $fa = "error";
  $mess = "bet error.";
}
if(empty($sid)){
  $error = 3;
  $fa = "error";
  $mess = "Сессия не активна!";
}
if($error == 0)
{ 
$update_sql2 = "Update svuti_users set balance = balance - '$bet' WHERE hash='$sid'";
mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
$number = rand(0,10000);
$formula = 0;
$fff = rand(0,100);
if($fff > 55){
	$number = rand(4000,10000);
}
if($number >= 3000 && $number <= 3500){
	$cef = 20;
	$formula = $bet * $cef;
    $update_sql2 = "Update svuti_users set balance = balance + '$formula' WHERE hash='$sid'";
	  mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
}
else{
	$cef = 0;
}
$insert_sql1 = "INSERT INTO `numbersGame` (`user_id`, `type`, `bet`, `number`, `win`) VALUES ('{$user_id}', '{$type}', '{$bet}', '{$number}', '{$formula}');";
 mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balancenew = $row['balance'];
}
$fa = "success";
	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'number' => "$number",
	'profit' => "$formula",
	'balance' => "$balance",
	'new_balance' => "$balancenew"
    );
}
if($type == "betNum3")
{
$sid = $_POST['sid'];
$bet = $_POST['bet'];
$type = "[7000-7500]";
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
$sliv = $row['sliv'];
}
session_start(); 
if($_SESSION['timestamp'] + 3 > time()){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($bet > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if($bet < 1){
  $error = 3;
  $fa = "error";
  $mess = "bet error.";
}
if(empty($sid)){
  $error = 3;
  $fa = "error";
  $mess = "Сессия не активна!";
}
if($error == 0)
{ 
$update_sql2 = "Update svuti_users set balance = balance - '$bet' WHERE hash='$sid'";
mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
$number = rand(0,10000);
$formula = 0;
$fff = rand(0,100);
if($fff > 55){
	$number = rand(0,7000);
}
if($number >= 7000 && $number <= 7500){
	$cef = 20;
	$formula = $bet * $cef;
    $update_sql2 = "Update svuti_users set balance = balance + '$formula' WHERE hash='$sid'";
	  mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
}
else{
	$cef = 0;
}
$insert_sql1 = "INSERT INTO `numbersGame` (`user_id`, `type`, `bet`, `number`, `win`) VALUES ('{$user_id}', '{$type}', '{$bet}', '{$number}', '{$formula}');";
 mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balancenew = $row['balance'];
}
$fa = "success";
	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'number' => "$number",
	'profit' => "$formula",
	'balance' => "$balance",
	'new_balance' => "$balancenew"
    );
}
if($type == "betNum4")
{
$sid = $_POST['sid'];
$bet = $_POST['bet'];
$type = "[9000-9500]";
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
$sliv = $row['sliv'];
}
session_start(); 
if($_SESSION['timestamp'] + 3 > time()){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($bet > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if($bet < 1){
  $error = 3;
  $fa = "error";
  $mess = "bet error.";
}
if(empty($sid)){
  $error = 3;
  $fa = "error";
  $mess = "Сессия не активна!";
}
if($error == 0)
{ 
$update_sql2 = "Update svuti_users set balance = balance - '$bet' WHERE hash='$sid'";
mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
$number = rand(0,10000);
$formula = 0;
$fff = rand(0,100);
if($fff > 55){
	$number = rand(0,9500);
}
if($number >= 9000 && $number <= 9500){
	$cef = 20;
	$formula = $bet * $cef;
    $update_sql2 = "Update svuti_users set balance = balance + '$formula' WHERE hash='$sid'";
	  mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
}
else{
	$cef = 0;
}
$insert_sql1 = "INSERT INTO `numbersGame` (`user_id`, `type`, `bet`, `number`, `win`) VALUES ('{$user_id}', '{$type}', '{$bet}', '{$number}', '{$formula}');";
 mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balancenew = $row['balance'];
}
$fa = "success";
	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'number' => "$number",
	'profit' => "$formula",
	'balance' => "$balance",
	'new_balance' => "$balancenew"
    );
}
if($type == "case1")
{
$caseId = 1;
$price = 5;
$sid = $_POST['sid'];
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
$sliv = $row['sliv'];
}
session_start(); 
if($_SESSION['timestamp'] + 1 > time() && $sliv != 1){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($price > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if(empty($sid)){
  $error = 3;
  $fa = "error";
  $mess = "Сессия не активна!";
}
if($error == 0)
{ 
	  $caseRands = rand(0,10000);	
      if($caseRands <= 7000){
		$win = 1;
	  }	  
	  if($caseRands > 7000){
		$win = 3;
	  }
	  if($caseRands > 8000){
		$win = 7;
	  }
	  if($caseRands >= 9000){
		$win = 10;
	  }
	  if($caseRands >= 9500){
		$win = 15;
	  }
	  if($caseRands >= 9800){
		$win = 22;
	  }
	  if($caseRands >= 9900){
		$win = 30;
	  }
	  $update_sql2 = "Update svuti_users set balance = balance - '$price' WHERE hash='$sid'";
	  mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
	  $update_sql1 = "Update svuti_users set balance = balance + '$win' WHERE hash='$sid'";
	  mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
	  $balancenew = $balance - $price + $win;
	  $profit = $win - $price;
	  if($win > $price){
		  $okyp = "da";
	  }
	  if($win < $price){
		  $okyp = "net";
	  }
	   if($win == $price){
		  $okyp = "v nol";
	  }
	  $insert_sql1 = "INSERT INTO `cases` (`user_id`, `case_id`, `price`, `ticket`, `win`, `profit`, `okyp`) VALUES ('{$user_id}', '{$caseId}', '{$price}', '{$caseRands}', '{$win}', '{$profit}', '{$okyp}');";
      mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
	  $fa = "success";
	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'profit' => "$win",
	'ticket' => "$caseRands",
	'balance' => "$balance",
	'new_balance' => "$balancenew"
    );
}
if($type == "case2")
{
$caseId = 1;
$price = 15;
$sid = $_POST['sid'];
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
$sliv = $row['sliv'];
}
session_start(); 
if($_SESSION['timestamp'] + 1 > time() && $sliv != 1){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($price > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if(empty($sid)){
  $error = 3;
  $fa = "error";
  $mess = "Сессия не активна!";
}
if($error == 0)
{ 
	  $caseRands = rand(0,10000);	
      if($caseRands < 3000){
		$win = 1;
	  }	  
	  if($caseRands > 3000){
		$win = 8;
	  }
	  if($caseRands > 7000){
		$win = 15;
	  }
	  if($caseRands >= 8200){
		$win = 38;
	  }
	  if($caseRands >= 8798){
		$win = 25;
	  }
	  if($caseRands >= 9200){
		$win = 46;
	  }
	  if($caseRands >= 9500){
		$win = 50;
	  }
	  if($caseRands >= 9900){
		$win = 75;
	  }
	  $update_sql2 = "Update svuti_users set balance = balance - '$price' WHERE hash='$sid'";
	  mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
	  $update_sql1 = "Update svuti_users set balance = balance + '$win' WHERE hash='$sid'";
	  mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
	  $balancenew = $balance - $price + $win;
	  $profit = $win - $price;
	  if($win > $price){
		  $okyp = "da";
	  }
	  if($win < $price){
		  $okyp = "net";
	  }
	   if($win == $price){
		  $okyp = "v nol";
	  }
	  $insert_sql1 = "INSERT INTO `cases` (`user_id`, `case_id`, `price`, `ticket`, `win`, `profit`, `okyp`) VALUES ('{$user_id}', '{$caseId}', '{$price}', '{$caseRands}', '{$win}', '{$profit}', '{$okyp}');";
      mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
	  $fa = "success";
	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'profit' => "$win",
	'ticket' => "$caseRands",
	'balance' => "$balance",
	'new_balance' => "$balancenew"
    );
}
if($type == "case3")
{
$caseId = 1;
$price = 30;
$sid = $_POST['sid'];
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
$sliv = $row['sliv'];
}
session_start(); 
if($_SESSION['timestamp'] + 1 > time() && $sliv != 1){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($price > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if(empty($sid)){
  $error = 3;
  $fa = "error";
  $mess = "Сессия не активна!";
}
if($error == 0)
{ 
	  $caseRands = rand(0,10000);	
      if($caseRands < 3000){
		$win = 15;
	  }	  
	  if($caseRands > 3000){
		$win = 22;
	  }
	  if($caseRands > 7000){
		$win = 35;
	  }
	  if($caseRands >= 8200){
		$win = 42;
	  }
	  if($caseRands >= 8798){
		$win = 50;
	  }
	  if($caseRands >= 9200){
		$win = 55;
	  }
	  if($caseRands >= 9500){
		$win = 67;
	  }
	  if($caseRands >= 9900){
		$win = 150;
	  }
	  $update_sql2 = "Update svuti_users set balance = balance - '$price' WHERE hash='$sid'";
	  mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
	  $update_sql1 = "Update svuti_users set balance = balance + '$win' WHERE hash='$sid'";
	  mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
	  $balancenew = $balance - $price + $win;
	  $profit = $win - $price;
	  if($win > $price){
		  $okyp = "da";
	  }
	  if($win < $price){
		  $okyp = "net";
	  }
	   if($win == $price){
		  $okyp = "v nol";
	  }
	  $insert_sql1 = "INSERT INTO `cases` (`user_id`, `case_id`, `price`, `ticket`, `win`, `profit`, `okyp`) VALUES ('{$user_id}', '{$caseId}', '{$price}', '{$caseRands}', '{$win}', '{$profit}', '{$okyp}');";
      mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
	  $fa = "success";
	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'profit' => "$win",
	'ticket' => "$caseRands",
	'balance' => "$balance",
	'new_balance' => "$balancenew"
    );
}
if($type == "case4")
{
$caseId = 1;
$price = 50;
$sid = $_POST['sid'];
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
$sliv = $row['sliv'];
}
session_start(); 
if($_SESSION['timestamp'] + 1 > time() && $sliv != 1){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($price > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if(empty($sid)){
  $error = 3;
  $fa = "error";
  $mess = "Сессия не активна!";
}
if($error == 0)
{ 
	  $caseRands = rand(0,10000);	
      if($caseRands < 3000){
		$win = 20;
	  }	  
	  if($caseRands > 3000){
		$win = 50;
	  }
	  if($caseRands > 7000){
		$win = 56;
	  }
	  if($caseRands >= 8200){
		$win = 70;
	  }
	  if($caseRands >= 8798){
		$win = 77;
	  }
	  if($caseRands >= 9200){
		$win = 86;
	  }
	  if($caseRands >= 9500){
		$win = 111;
	  }
	  if($caseRands >= 9910){
		$win = 500;
	  }
	  $update_sql2 = "Update svuti_users set balance = balance - '$price' WHERE hash='$sid'";
	  mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
	  $update_sql1 = "Update svuti_users set balance = balance + '$win' WHERE hash='$sid'";
	  mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
	  $balancenew = $balance - $price + $win;
	  $profit = $win - $price;
	  if($win > $price){
		  $okyp = "da";
	  }
	  if($win < $price){
		  $okyp = "net";
	  }
	   if($win == $price){
		  $okyp = "v nol";
	  }
	  $insert_sql1 = "INSERT INTO `cases` (`user_id`, `case_id`, `price`, `ticket`, `win`, `profit`, `okyp`) VALUES ('{$user_id}', '{$caseId}', '{$price}', '{$caseRands}', '{$win}', '{$profit}', '{$okyp}');";
      mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
	  $fa = "success";
	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'profit' => "$win",
	'ticket' => "$caseRands",
	'balance' => "$balance",
	'new_balance' => "$balancenew"
    );
}
if($type == "Coinbet_red")
{
$type = "red";
$sid = $_POST['sid'];
$bet = (int) $_POST['bet'];
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
if(!preg_match('/^[0-9]+(\.?[0-9]+)?$/', $bet)){
  $error = 3;
  $fa = "error";
  $mess = "Неверная сумма ставки!";
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$id = $row['id'];
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
$sliv = $row['sliv'];
}
session_start(); 
if($_SESSION['timestamp'] + 1 > time()){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($bet > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if($bet < 0.01){
  $error = 3;
  $fa = "error";
  $mess = "Неверная сумма ставки";
}
if(empty($sid)){
  $error = 3;
  $fa = "error";
  $mess = "Сессия не активна!";
}
if($error == 0)
{
if($_COOKIE['sounds'] == "yes"){
	$soundsB = "ok";
}
$flipResult = rand(1,2);
if($bet >= 5){
	$slivGen = rand(0,100);
	if($slivGen >=80){
    $flipResult = rand(2,2);
	}
}	
if($bet >= 10){
	$slivGen = rand(0,100);
	if($slivGen >=76){
    $flipResult = rand(2,2);
	}
}	
if($bet >= 25){
	$slivGen = rand(0,100);
	if($slivGen >=67){
    $flipResult = rand(2,2);
	}
}
if($bet >= 50){
	$slivGen = rand(0,100);
	if($slivGen >=61){
    $flipResult = rand(2,2);
	}
}
if($bet >= 100){
	$slivGen = rand(0,100);
	if($slivGen >=45){
    $flipResult = rand(2,2);
	}
}
if($bet >= 300){
	$slivGen = rand(0,100);
	if($slivGen >=35){
    $flipResult = rand(2,2);
	}
}
if($bet >= 500){
	$slivGen = rand(0,100);
	if($slivGen >=25){
    $flipResult = rand(2,2);
	}
}
if($bet >= 1000){
	$slivGen = rand(0,100);
	if($slivGen >=15){
    $flipResult = rand(2,2);
	}
}
$cfwin = $bet * 2;
$prof = "yes";
if($flipResult <=1){
$update_sql1 = "Update svuti_users set balance = balance - '$bet' WHERE hash='$sid'";
mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
$resultBet = "Красные";
$update_sql1 = "Update svuti_users set balance = balance + '$cfwin' WHERE hash='$sid'";
mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
$insert_sql1 = "INSERT INTO `cfbets` (`user_id`, `bet`, `pick`, `win`, `profit`) VALUES ('{$user_id}', '{$bet}', '{$type}', '{$cfwin}', '{$prof}');";
mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
$update_sql1 = "Update svuti_users set wager = wager - '$bet' WHERE hash='$sid'";
mysql_query($update_sql1) or die("" . mysql_error());
$balancenew = $balance + $cfwin - $bet;
$fa = "success";  
}
else{
$cfwin = 0;
$prof = "no";	
$resultBet = "Синие";
$update_sql1 = "Update svuti_users set balance = balance - '$bet' WHERE hash='$sid'";
mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
$insert_sql1 = "INSERT INTO `cfbets` (`user_id`, `bet`, `pick`, `win`, `profit`) VALUES ('{$user_id}', '{$bet}', '{$type}', '{$cfwin}', '{$prof}');";
mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
$update_sql1 = "Update svuti_users set wager = wager - '$bet' WHERE hash='$sid'";
mysql_query($update_sql1) or die("" . mysql_error());
$balancenew = $balance - $bet;
$fa = "success";  
}
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'flipResult' => "$flipResult",
	'resultBet' => "$resultBet",
	'soundcookie' => "$soundsB",
	'cfwin' => "$cfwin",
	'balance' => "$balance",
	'new_balance' => "$balancenew"
    );
}
if($type == "Coinbet_gray")
{
$type = "blue";
$sid = $_POST['sid'];
$bet = (int) $_POST['bet'];
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
if(!preg_match('/^[0-9]+(\.?[0-9]+)?$/', $bet)){
  $error = 3;
  $fa = "error";
  $mess = "Неверная сумма ставки!";
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$id = $row['id'];
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
}
session_start(); 
if($_SESSION['timestamp'] + 1 > time()){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($bet > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if($bet < 0.01){
  $error = 3;
  $fa = "error";
  $mess = "Неверная сумма ставки";
}
if(empty($sid)){
  $error = 3;
  $fa = "error";
  $mess = "Сессия не активна!";
}
if($error == 0)
{ 
if($_COOKIE['sounds'] == "yes"){
	$soundsB = "ok";
}
$flipResult = rand(1,2);
if($bet >= 5){
	$slivGen = rand(0,100);
	if($slivGen >=80){
    $flipResult = rand(1,1);
	}
}	
if($bet >= 10){
	$slivGen = rand(0,100);
	if($slivGen >=76){
    $flipResult = rand(1,1);
	}
}	
if($bet >= 25){
	$slivGen = rand(0,100);
	if($slivGen >=67){
    $flipResult = rand(1,1);
	}
}
if($bet >= 50){
	$slivGen = rand(0,100);
	if($slivGen >=61){
    $flipResult = rand(1,1);
	}
}
if($bet >= 100){
	$slivGen = rand(0,100);
	if($slivGen >=45){
    $flipResult = rand(1,1);
	}
}
if($bet >= 300){
	$slivGen = rand(0,100);
	if($slivGen >=35){
    $flipResult = rand(1,1);
	}
}
if($bet >= 500){
	$slivGen = rand(0,100);
	if($slivGen >=25){
    $flipResult = rand(1,1);
	}
}
if($bet >= 1000){
	$slivGen = rand(0,100);
	if($slivGen >=15){
    $flipResult = rand(1,1);
	}
}
$cfwin = $bet * 2;
$prof = "yes";
if($flipResult > 1){
$update_sql1 = "Update svuti_users set balance = balance - '$bet' WHERE hash='$sid'";
mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
$resultBet = "Красные";
$update_sql1 = "Update svuti_users set balance = balance + '$cfwin' WHERE hash='$sid'";
mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
$insert_sql1 = "INSERT INTO `cfbets` (`user_id`, `bet`, `pick`, `win`, `profit`) VALUES ('{$user_id}', '{$bet}', '{$type}', '{$cfwin}', '{$prof}');";
mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
$update_sql1 = "Update svuti_users set wager = wager - '$bet' WHERE hash='$sid'";
mysql_query($update_sql1) or die("" . mysql_error());
$balancenew = $balance + $cfwin - $bet;
$fa = "success";  
}
else{
$cfwin = 0;
$prof = "no";	
$resultBet = "Синие";
$update_sql1 = "Update svuti_users set balance = balance - '$bet' WHERE hash='$sid'";
mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
$insert_sql1 = "INSERT INTO `cfbets` (`user_id`, `bet`, `pick`, `win`, `profit`) VALUES ('{$user_id}', '{$bet}', '{$type}', '{$cfwin}', '{$prof}');";
mysql_query($insert_sql1) or die("Ошибка вставки" . mysql_error());
$update_sql1 = "Update svuti_users set wager = wager - '$bet' WHERE hash='$sid'";
mysql_query($update_sql1) or die("" . mysql_error());
$balancenew = $balance - $bet;
$fa = "success";  
}
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'flipResult' => "$flipResult",
	'resultBet' => "$resultBet",
	'soundcookie' => "$soundsB",
	'cfwin' => "$cfwin",
	'balance' => "$balance",
	'new_balance' => "$balancenew"
    );
}
if($type == "playChest")
{
$sid = $_POST['sid'];
$bet = (int) $_POST['bet'];
if (!preg_match("/^[0-9a-zA-Z]+$/",$sid)){
	exit();
}
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$wager = $row['wager'];
$user_id = $row['id'];
$deposit = $row['deposit'];
}
session_start(); 
if($_SESSION['timestamp'] + 1 > time()){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
if($bet > $balance){
  $error = 3;
  $fa = "error";
  $mess = "Недостаточно средств!";
}
if($bet < 1){
  $error = 3;
  $fa = "error";
  $mess = "Неверная сумма ставки";
}
if($error == 0)
{ 
	$ggy = rand(0,100);
	if($ggy < 80 && $bet < 5){
      $formulti = rand(10,90);
	}
	if($ggy < 80 && $bet >= 5){
      $formulti = rand(10,91);
	}
	if($ggy < 80 && $bet >= 10){
      $formulti = rand(10,90);
	}
	if($ggy < 80 && $bet >= 20){
      $formulti = rand(10,87);
	}
	if($ggy < 80 && $bet >= 50){
      $formulti = rand(10,86);
	}
	if($ggy < 80 && $bet >= 100){
      $formulti = rand(1,80);
	}
	if($ggy < 80 && $bet >= 200){
      $formulti = rand(1,60);
	}
if($formulti > 80){
	$multiplier = 1;
}
if($formulti < 85){
	$multiplier = 0;
}
if($formulti > 85){
	$multiplier = 2;
}
if($formulti > 88){
	$multiplier = 4;
}
if($formulti > 92){
	$multiplier = 8;
}
if($formulti > 94){
	$multiplier = 12;
}
if($formulti == 97){
	$multiplier = 17;
}
if($formulti == 100){
	$multiplier = 1000;
} 
$profit = $bet * $multiplier;
$update_sql2 = "Update svuti_users set balance = balance - '$bet' WHERE hash='$sid'";
mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
$update_sql2 = "Update svuti_users set balance = balance + '$profit' WHERE hash='$sid'";
mysql_query($update_sql2) or die("Ошибка вставки" . mysql_error());
$insert_sql2 = "INSERT INTO `chests` (`user_id`, `bet`, `multiplier`, `win`) VALUES ('{$user_id}', '{$bet}', '{$multiplier}', '{$profit}');";
mysql_query($insert_sql2) or die("Ошибка вставки" . mysql_error());
$update_sql1 = "Update svuti_users set wager = wager - '$bet' WHERE hash='$sid'";
mysql_query($update_sql1) or die("" . mysql_error());
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
$balancenew = $row['balance'];
$fa = "success";	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'multiplier' => "$multiplier",
	'new_balance' => "$balancenew",
	'res' => "$profit"
    );
}
if($type == "PromoActive")
{
	$promo = $_POST['promo'];
	$sid = $_POST['sid'];
	if(empty($promo))  
{	
$error = 1;
$fa = "error";
$mess = "Введите Промокод";
}
$sql_select = sprintf("SELECT * FROM svuti_promo WHERE promo='%s'", mysql_real_escape_string($promo));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$active = $row['active'];
$activelimit = $row['activelimit'];
$idactive = $row['idactive'];
$summa = $row['summa'];
$sql_select1 = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result1 = mysql_query($sql_select1);
$row1 = mysql_fetch_array($result1);
if($row1)
{	
$user_id = $row1['id'];
$balance = $row1['balance'];
}
if($active >= $activelimit)
{
		$error = 3;
$fa = "error";
$mess = "Количество активаций исчерпано";
}
	if (preg_match("/$user_id /",$idactive))  {	
	$error = 3;
$fa = "error";
$mess = "Активаций нет, или активировали ранее!";
}
}
else
{
	$error = 2;
$fa = "error";
$mess = "Промокод не существует";
}
if($error == 0)
{
      $amountWager = $summa * 4;
	  $balancenew = $balance + $summa;
	  $activeupd = $active + "1";
      $idupd = "$user_id $idactive";
	  $update_sql = "Update svuti_promo set idactive='$idupd',active='$activeupd' WHERE promo='$promo'";
      mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
	  $update_sql1 = "Update svuti_users set balance='$balancenew' WHERE hash='$sid'";
      mysql_query($update_sql1) or die("" . mysql_error());
	  	$update_sql1 = "Update svuti_users set wager = wager + '$amountWager' WHERE hash='$sid'";
      mysql_query($update_sql1) or die("" . mysql_error());
$update_sql2 = "UPDATE `svuti_win` SET `win`=`win`+'{$summa}'WHERE `id`='1'";
    mysql_query($update_sql2) or die("" . mysql_error());
	  $fa = "success";
	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'new_balance' => "$balancenew",
	'suma' => "$summa"
    );
}
if($type == "dailyBonus")
{
session_start(); 
if($_SESSION['timestamp'] + 5 > time()){ 
$error = 3;
$fa = "error";
$mess = "Повторите попытку позже!";
} 
else{
$_SESSION['timestamp'] = time();
}
$sid = $_POST['sid'];
$today = time();
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$loginwtf = $row['login'];
$balance = $row['balance'];
$bonus = $row['dailyTime'];
}
$gettoday = date('d-m-Y H:i:s');
if($deposit < 200){
	$randed = rand(100,290) / 100;
}
$random4ik = $randed;
if ((($bonus + 86400) > time()) && (!is_null($bonus)))
{
$error = 3;
$fa = "error";
$mess = "Попробуйте позже!";
}
if($error == 0){
	   $insert_sql3 = "UPDATE `svuti_users` SET `dailyTime` = ".$today." WHERE hash='$sid'";
       mysql_query($insert_sql3);
	   $update_sql1 = "Update svuti_users set balance = balance + '$randed' WHERE hash='$sid'";
	   mysql_query($update_sql1) or die("Ошибка вставки" . mysql_error());
	   $sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
       $result = mysql_query($sql_select);
       $row = mysql_fetch_array($result);
       $balancenew = $balance + $randed;
	   $fa = "success";
	  
}
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'bonus' => "$random4ik",
	'new_balance' => "$balancenew",
	'suma' => "$summa"
    );
}
if($type == "withdraw")
{
	$sid = $_POST['sid'];
$system = $_POST['system'];
$size = $_POST['size'];
$wallet = $_POST['wallet'];

		$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$userid = $row['id'];
$wager = $row['wager'];
$sql_select4232 = sprintf("SELECT SUM(suma) FROM svuti_payments WHERE user_id='%s'", mysql_real_escape_string($userid));
$result4232 = mysql_query($sql_select4232);
$row4232 = mysql_fetch_array($result4232);
	$sumapey2 = $row4232['SUM(suma)'];
	$ban = $row['ban'];
	if($ban == 1)
{
	$error = 22;
	$mess = "Обновите страницу";
	$fa = "error";
	setcookie('sid', "", time()- 10);
}
if($balance < $size)
{
	$error = 1;
	$mess = "Недостаточно средств";
	$fa = "error";
}
if($wager > 0){
	$error = 1;
	$mess = "Отыграйте $wager N!";
    $fa = "error";
}
if($size < $vivod)
{
	$error = 4;
	$mess = "Вывод от ".$vivod." рублей";
	$fa = "error";
}

if (is_numeric($size))
{
}
else
{
	$error = 2;
	$mess = "Сумма должна быть цифрами";
	$fa = "error";
}

if($error == 0)
{
	$datas = date("d.m.Y");
	$datass = date("H:i:s");
	$data = "$datas $datass";
	$ip = $_SERVER["REMOTE_ADDR"];
	$balancenew = $balance - $size;
	$update_sql1 = "Update svuti_users set balance='$balancenew' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
		$insert_sql1 = "INSERT INTO `svuti_payout` (`user_id`, `suma`, `qiwi`, `status`, `data`, `ip`) 
		VALUES ('{$userid}', '{$size}', '{$wallet}', 'Обработка', '{$data}', '{$ip}')
";
mysql_query($insert_sql1);
$sql_select3 = "SELECT * FROM svuti_payout WHERE user_id='".$userid."' ORDER BY `data` DESC";
$result3 = mysql_query($sql_select3);
$row3 = mysql_fetch_array($result3);
	$fa = "success";
	$s = '<i class="fa fa-close close" onclick="otmena()" value="'.$row3['id'].'" id="otmina"></i>';
		$add_bd = '<tr style="cursor:default!important" id="'.$row3['id'].'"><td>'.$s.$data.'</td><td><img src="files/qiwi.png"></img> '.$wallet.'</td><td>'.$size.' N</td>
							<td><div class="tag tag-warning">Ожидание </div></td>

							</tr>';
}

// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'new_balance' => "$balancenew",
	'add_bd' => "$add_bd"
    );
}
else
{
	// массив для ответа
$result = array(
	'success' => "error",
	'error' => "Ощибка Hash!"
    );
}

}
if($type == "resetPassPanel")
{
	$sid = $_POST['sid'];	
	$newPass = $_POST['newPass'];
		$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$update_sql1 = "Update svuti_users set password='$newPass' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	
$sssid = $row['hash'];
// массив для ответа
$result = array(
	'success' => "success",
	'sid' => "$sssid"
    );
}
else
{
	// массив для ответа
	$result = array(
	'success' => "error",
	'error' => "Ошибка Hash! Обновите страницу!"
    );
}
}
if($type == "deposit")
{
$sid = $_POST['sid'];	
$system = $_POST['system'];
$size = $_POST['size'];
if($system == 1)
{
	$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$user_id = $row['id'];
}
$podpis = md5($fkassa.':'.$size.':'.$fksec.':'. $user_id);
    $result = array(
	'success' => "success",
	'locations' => "https://www.free-kassa.ru/merchant/cash.php?m=".$fkassa."&oa={$size}&o={$user_id}&s=".$podpis.""
    );		
}
}
if($type == "updateHash")
{
	$random = rand(0, 999999);
	$hash = hash('sha512', $random);
	$code = strToHex(encode($random, 'p2eW5gp6540Y'));
$hid = implode("-", str_split($code, 4));

// массив для ответа
    $result = array(
	'success' => "success",
	'hash' => "$hash",
	'hid' => "$hid"
    );
	
}
if($type == "betMin")
{
session_start(); 
if($_SESSION['timestamp'] + 1 > time()){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
		$sid = $_POST['sid'];
$betSize = preg_replace("/[^,.0-9]/", '', $_POST['betSize']);
$betPercent = preg_replace("/[^,.0-9]/", '', $_POST['betPercent']);

$hids = $_POST["hid"];
	$code = str_replace('-', '', $hids);
$randss = decode(hexToStr($code), 'p2eW5gp6540Y');
$saltall = decode(hexToStr($code), 'p2eW5gp6540Y');
$sha = hash('sha512', $saltall);
if (preg_match("/[\d]+/", $randss))
{
}
else
{
	$error = 8;
	$mess = "Hash уже сыгран! Обновите страницу!";
	
	$rand = rand(0, 999999);
	$hash = hash('sha512', getUniqId());
	$code = strToHex(encode($rand, 'p2eW5gp6540Y'));
$code1 = implode("-", str_split($code, 4));
setcookie('hid', $code1, time()+360, '/');
}

	$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$user_id = $row['id'];
$ban = $row['ban'];
}
if($ban == 1)
{
	$error = 22;
	$mess = "Обновите страницу";
	setcookie('sid', "", time()- 10);
}
if($bala < $betSize)
{
	$error = 1;
	$mess = "Недостаточно средств";
}
if($betSize <= 0.99)
{
	$error = 2;
	$mess = "Ставки от 1 рубля";
}
if($betPercent <= 0)
{
	$error = 3;
	$mess = "% Шанс от 1 до 95";
}
if($betPercent > 95)
{
	$error = 4;
	$mess = "% Шанс от 1 до 95";
}
if($error == 0)
{
		$hid = $_POST['hid'];
	$code = str_replace('-', '', $hid);
	$min = ($betPercent / 100) * 999999;
    $min = explode( '.', $min )[0];
	$rand = decode(hexToStr($code), 'p2eW5gp6540Y');
	$number = explode( '|', $rand )[1];
$salt12 = explode( '|', $rand )[0];
$salt12 = $salt1."|";
$namsalt12 = $salt1.$number;
$salt22 = str_replace($namsalt1, '', $rand);
$hash12 = hash('sha512', $rand);
$rand2 = explode( '|', $rand )[1];
$rand = preg_replace("/[^0-9]/", '', $rand);

			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$prava_adm = $row['prava'];
}
			$sql_select = "SELECT * FROM svuti_admin WHERE id='1'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$win_youtuber = $row['win_youtuber'];
$lose_youtuber = $row['lose_youtuber'];

$pd = $row['pd'];
}
$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$youtube = $row['youtube'];
$sliv = $row['sliv'];
$fake = $row['fake'];
}

		$code = str_replace('-', '', $hids);
$saltall = decode(hexToStr($code), 'p2eW5gp6540Y');
$sha = hash('sha512', $saltall);
if($youtube == 0){
if($fake == 0){
if($pd == 1)
{
#region
if($prava_adm == 2 || $prava_adm == 1)
{
	$num1 = rand(0, $min);
	$num2 = rand($min, 999999);
	$arr = array("$num1", "$num2"); //массив эл-ов
$per = array("$win_youtuber", "$lose_youtuber");//процент вероятности для каждого эл-а масс. $arr
$intervals = array();
$i = 0;
foreach ($per as $count){
    $intervals[] = array($i, $i+$count);
    $i+= $count;
}
$rand = rand(0, $i-1);
$found = false;
foreach ($intervals as $i => $interval){
    if ($rand >= $interval[0] && $rand < $interval[1]){
        $found = $i;
        break;
   }
}
$rand = $arr[$found];
	$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$saltall = $salt1.$rand.$salt2;
$sha = hash('sha512', $salt1.$number.$salt2);
}
if($betSize >= 10)
{
$gen = rand(0,9);
if($gen == 2 || $gen == 4 || $gen == 6 || $gen == 8)
{
	$rand = rand($min, 999999);

for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$saltall = $salt1.$rand.$salt2;
$sha = hash('sha512', $salt1.$number.$salt2);
}
}
			$sql_select = "SELECT * FROM svuti_win WHERE id='1'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$win  = $row['win'];
$lose = $row['lose'];
}
$loser = $lose - 3;
if($win >= $loser)
{
    $nema = rand(1,3);
    if($nema == 1 || $nema == 3)
    {
   	$rand = rand($min, 999999);

for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$saltall = $salt1.$rand.$salt2;
$sha = hash('sha512', $salt1.$rand.$salt2); 
}
}
}
} 
} 
	
if($betSize > 2){
$nema = rand(1,100);
    if($nema >= 60)
    {
   	$rand = rand($min, 999999);

if($betSize > 10 && $betPercent < 90){
$nema = rand(1,100);
    if($nema >= 55)
    {
   	$rand = rand($min, 999999);	
	
if($betSize > 25){
$nema = rand(1,100);
    if($nema >= 45)
    {
   	$rand = rand($min, 999999);

if($betSize > 50){
$nema = rand(1,35);
    if($nema >= 35)
    {
   	$rand = rand($min, 999999);
	
if($betSize > 100){
$nema = rand(1,35);
    if($nema >= 25)
    {
   	$rand = rand($min, 999999);		

for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$saltall = $salt1.$rand.$salt2;
$sha = hash('sha512', $salt1.$rand.$salt2); 
}
}
}
}
}
}
}
}
}
}
#endregion
	if($rand <= $min)
	{
			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
}	
if($fake == 0){
     $newbalic = $bala - $betSize;
		$update_sql1 = sprintf("Update svuti_users set balance='%s' WHERE hash='%s'", mysql_real_escape_string($newbalic), mysql_real_escape_string($sid));
    mysql_query($update_sql1) or die("" . mysql_error());

		$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$logins = $row['login'];
}
		$suma = round(((100 / $betPercent) * $betSize), 2);
		$newbalic = $bala + $suma;
		$update_sql1 = sprintf("Update svuti_users set balance='$newbalic' WHERE hash='%s'", mysql_real_escape_string($sid));
    mysql_query($update_sql1) or die("" . mysql_error());
$winsumma = $suma - $betSize;
if($youtube == 0){
if($sliv == 0){
	$update_sql1 = "UPDATE `svuti_win` SET `win`=`win`+'{$winsumma}' WHERE `id`='1'";

    mysql_query($update_sql1) or die("" . mysql_error());
}
} 
} 
if($fake == 1){
  $newbalic = $bala + $betSize;

		$update_sql1 = sprintf("Update svuti_users set balance='%s' WHERE hash='%s'", mysql_real_escape_string($newbalic), mysql_real_escape_string($sid));
    mysql_query($update_sql1) or die("" . mysql_error());
$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$logins = $row['login'];
}
$suma = round(((100 / $betPercent) * $betSize), 2);
}
		$what = "win";
		//$error  = "1";
		//$hash = hash('sha512', $rand);
		// массив для ответа
		$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$hash = hash('sha512', $salt1.$number.$salt2);
	$code = strToHex(encode($salt1.$number.$salt2, 'p2eW5gp6540Y'));
$hid = implode("-", str_split($code, 4));
	$dete = time();
$insert_sql1 = "INSERT INTO `svuti_games` (`login`,`user_id`, `chislo`, `cel`, `suma`, `shans`, `win_summa`, `type`, `data`, `saltall`, `hash`) 
VALUES ('{$logins}','{$user_id}', '{$rand}', '0-{$min}', '{$betSize}', '{$betPercent}', '{$suma}', '{$what}', '{$dete}', '{$saltall}', '{$sha}');
";
mysql_query($insert_sql1);
$update_sql1 = "Update svuti_users set wager = wager - '$betSize' WHERE hash='$sid'";
mysql_query($update_sql1) or die("" . mysql_error());
		$sql_select = sprintf("SELECT * FROM svuti_games WHERE hash='%s'", mysql_real_escape_string($sha));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
	$check_bet = $row['id'];
}
    $result = array(
	'success' => "success",
	'type' => "$what",
	'profit' => "$suma",
	'balance' => "$bala",
	'new_balance' => "$newbalic",
	'hash' => "$hash",
	'hid' => "$hid",
	'number' => "$rand",
	'check_bet' => "$check_bet"
    );
	}
	else
	{
			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$logins = $row['login'];
}
if($fake == 0){
		$newbalic = $bala - $betSize;
		$update_sql1 = "Update svuti_users set balance='$newbalic' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	if($youtube == 0){
if($sliv == 0){
	$update_sql1 = "UPDATE `svuti_win` SET `lose`=`lose`+'{$betSize}'WHERE `id`='1'";
    mysql_query($update_sql1) or die("" . mysql_error());
} 
} 
} 
	$what = "lose";
	$suma = "0";
	$code = str_replace('-', '', $hids);
$saltall = decode(hexToStr($code), 'p2eW5gp6540Y');
$sha = hash('sha512', $saltall);
$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$hash = hash('sha512', $salt1.$number.$salt2);
	$code = strToHex(encode($salt1.$number.$salt2, 'p2eW5gp6540Y'));
$hid = implode("-", str_split($code, 4));
	$dete = time();
$insert_sql1 = "INSERT INTO `svuti_games` (`login`,`user_id`, `chislo`, `cel`, `suma`, `shans`, `win_summa`, `type`, `data`, `saltall`, `hash`) 
VALUES ('{$logins}','{$user_id}', '{$rand}', '0-{$min}', '{$betSize}', '{$betPercent}', '{$suma}', '{$what}', '{$dete}', '{$saltall}', '{$sha}');
";
mysql_query($insert_sql1);
$update_sql1 = "Update svuti_users set wager = wager - '$betSize' WHERE hash='$sid'";
mysql_query($update_sql1) or die("" . mysql_error());
		$sql_select = sprintf("SELECT * FROM svuti_games WHERE hash='%s'", mysql_real_escape_string($sha));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
	$check_bet = $row['id'];
}
		$result = array(
	'success' => "success",
	'type' => "$what",
	'balance' => "$bala",
	'new_balance' => "$newbalic",
	'hash' => "$hash",
	'hid' => "$hid",
	'number' => "$rand",
	'check_bet' => "$check_bet"
    );
	}
	///
//$error  = "1";
}
if($error >= 1)
{
	////$mess = "Технический перерыв! 10 Минут!";
	// массив для ответа
    $result = array(
	'success' => "error",
	'error' => "$mess"
    );
}
}
if($type == "betMax")
{
   session_start(); 
if($_SESSION['timestamp'] + 1 > time()){ 
$error = 3;
$fa = "error";
$mess = "Не нужно нажимать так быстро!";
} 
else{
$_SESSION['timestamp'] = time();
}
		$sid = $_POST['sid'];
$betSize = preg_replace("/[^,.0-9]/", '', $_POST['betSize']);
$betPercent = preg_replace("/[^,.0-9]/", '', $_POST['betPercent']);

$hids = $_POST["hid"];
	$code = str_replace('-', '', $hids);
$randss = decode(hexToStr($code), 'p2eW5gp6540Y');
$saltall = decode(hexToStr($code), 'p2eW5gp6540Y');
$sha = hash('sha512', $saltall);
if (preg_match("/[\d]+/", $randss))
{
}
else
{
	$error = 8;
	$mess = "Hash уже сыгран! Обновите страницу!";
	
	$rand = rand(0, 999999);
	$hash = hash('sha512', getUniqId());
	$code = strToHex(encode($rand, 'p2eW5gp6540Y'));
$code1 = implode("-", str_split($code, 4));
setcookie('hid', $code1, time()+360, '/');
}

	$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$user_id = $row['id'];
$ban = $row['ban'];
}
if($ban == 1)
{
	$error = 22;
	$mess = "Обновите страницу";
	setcookie('sid', "", time()- 10);
}
if($bala < $betSize)
{
	$error = 1;
	$mess = "Недостаточно средств";
}
if($betSize <= 0.99)
{
	$error = 2;
	$mess = "Ставки от 1 рубля";
}
if($betPercent <= 0)
{
	$error = 3;
	$mess = "% Шанс от 1 до 95";
}
if($betPercent > 95)
{
	$error = 4;
	$mess = "% Шанс от 1 до 95";
}
//$error  = "1";
if($error == 0)
{
	$hid = $_POST['hid'];
	$code = str_replace('-', '', $hid);
	$max = (999999 - (($betPercent / 100) * 999999));
$max = explode( '.', $max )[0];
$max = round($max, -1);
$rand = decode(hexToStr($code), 'p2eW5gp6540Y');
$rand = preg_replace("/[^0-9]/", '', $rand);
#region
			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$prava_adm = $row['prava'];
}
			$sql_select = "SELECT * FROM svuti_admin WHERE id='1'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$win_youtuber = $row['win_youtuber'];
$lose_youtuber = $row['lose_youtuber'];
$pd = $row['pd'];
}
$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$youtube = $row['youtube'];
$sliv = $row['sliv'];
$fake = $row['fake'];
}
		$code = str_replace('-', '', $hids);
$saltall = decode(hexToStr($code), 'p2eW5gp6540Y');
$sha = hash('sha512', $saltall);
if($youtube == 0)
{
if($fake == 0)
{
if($pd == 1)
{
#region
if($prava_adm == 2 || $prava_adm == 1)

{
	$num1 = rand($max, 999999);
	$num2 = rand(0, $max);
	$arr = array("$num1", "$num2"); //массив эл-ов
$per = array("$win_youtuber", "$lose_youtuber");//процент вероятности для каждого эл-а масс. $arr
$intervals = array();
$i = 0;
foreach ($per as $count){
    $intervals[] = array($i, $i+$count);
    $i+= $count;
}
$rand = rand(0, $i-1);
$found = false;
foreach ($intervals as $i => $interval){
    if ($rand >= $interval[0] && $rand < $interval[1]){
        $found = $i;
        break;
   }
}
$rand = $arr[$found];
	$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$saltall = $salt1.$rand.$salt2;
$sha = hash('sha512', $salt1.$number.$salt2);
}
#endregion
if($betSize >= 10)
{
    $gen = rand(0,9);
if($gen == 2 || $gen == 4 || $gen == 6 || $gen == 8)
{
	$rand = rand(0, $max);

for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$saltall = $salt1.$rand.$salt2;
$sha = hash('sha512', $salt1.$number.$salt2);
}
}

#endregion
			$sql_select = "SELECT * FROM svuti_win WHERE id='1'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$win  = $row['win'];
$lose = $row['lose'];
}
$loser = $lose - 3;
if($win >= $loser)
{
    $nema = rand(1,3);
    if($nema == 1 || $nema == 3)
    {
   $rand = rand(0, $max);
   
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$saltall = $salt1.$rand.$salt2;
$sha = hash('sha512', $salt1.$rand.$salt2); 
}
}
}
}
} 
if($betSize > 5){
$nema = rand(1,100);
    if($nema >= 60)
    {
   	$rand = rand(0, $max);

if($betSize > 10 && $betPercent < 90){
$nema = rand(1,100);
    if($nema >= 55)
    {
   	$rand = rand(0, $max);
	
if($betSize > 25){
$nema = rand(1,100);
    if($nema >= 45)
    {
   	$rand = rand(0, $max);

if($betSize > 50){
$nema = rand(1,35);
    if($nema >= 35)
    {
   	$rand = rand(0, $max);
	
if($betSize > 100){
$nema = rand(1,35);
    if($nema >= 25)
    {
   	$rand = rand(0, $max);	

for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$saltall = $salt1.$rand.$salt2;
$sha = hash('sha512', $salt1.$rand.$salt2); 
}
}
}
}
}
}
}
}
}
}
	if($rand >= $max)
	{
			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$logins = $row['login'];
}	
if($fake == 0)
{
     $newbalic = $bala - $betSize;
		$update_sql1 = "Update svuti_users set balance='$newbalic' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	
		$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
}
		$suma = round(((100 / $betPercent) * $betSize), 2);
		$newbalic = $bala + $suma;
   $winsumma = $suma - $betSize;
if($youtube == 0){
if($sliv == 0){
		$update_sql1 = "UPDATE `svuti_win` SET `win`=`win`+'{$winsumma}'WHERE `id`='1'";
    mysql_query($update_sql1) or die("" . mysql_error());
	} 
} 
} 
if($fake == 1){
  $newbalic = $bala + $betSize;
		$update_sql1 = sprintf("Update svuti_users set balance='%s' WHERE hash='%s'", mysql_real_escape_string($newbalic), mysql_real_escape_string($sid));
    mysql_query($update_sql1) or die("" . mysql_error());
$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$logins = $row['login'];
}
$suma = round(((100 / $betPercent) * $betSize), 2);
}
		$what = "win";
		
		$update_sql1 = "Update svuti_users set balance='$newbalic' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
		//$error = "1";
		$suma = round($suma, 2);
$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$hash = hash('sha512', $salt1.$number.$salt2);
	$code = strToHex(encode($salt1.$number.$salt2, 'p2eW5gp6540Y'));
$hid = implode("-", str_split($code, 4));
$dete = time();
$insert_sql1 = "INSERT INTO `svuti_games` (`login`, `user_id`, `chislo`, `cel`, `suma`, `shans`, `win_summa`, `type`, `data`, `saltall`, `hash`) 
VALUES ('{$logins}','{$user_id}', '{$rand}', '{$max}-999999', '{$betSize}', '{$betPercent}', '{$suma}', '{$what}', '{$dete}', '{$saltall}', '{$sha}');
";
mysql_query($insert_sql1);
$update_sql1 = "Update svuti_users set wager = wager - '$betSize' WHERE hash='$sid'";
mysql_query($update_sql1) or die("" . mysql_error());
		$sql_select = sprintf("SELECT * FROM svuti_games WHERE hash='%s'", mysql_real_escape_string($sha));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
	$check_bet = $row['id'];
}
		// массив для ответа
    $result = array(
	'success' => "success",
	'type' => "$what",
	'profit' => "$suma",
	'balance' => "$bala",
	'new_balance' => "$newbalic",
	'hash' => "$hash",
	'hid' => "$hid",
	'number' => "$rand",
	'check_bet' => "$check_bet"
    );
	}
	else
	{
			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$logins = $row['login'];
}
$suma = "0";
if($fake == 0)
{
		$newbalic = $bala - $betSize;
		$update_sql1 = "Update svuti_users set balance='$newbalic' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	if($youtube == 0){
if($sliv == 0){
	$update_sql1 = "UPDATE `svuti_win` SET `lose`=`lose`+'{$betSize}'WHERE `id`='1'";
    mysql_query($update_sql1) or die("" . mysql_error());
} 
} 
} 
	$what = "lose";
$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$hash = hash('sha512', $salt1.$number.$salt2);
	$code = strToHex(encode($salt1.$number.$salt2, 'p2eW5gp6540Y'));
$hid = implode("-", str_split($code, 4));
$dete = time();
$insert_sql1 = "INSERT INTO `svuti_games` (`login`, `user_id`, `chislo`, `cel`, `suma`, `shans`, `win_summa`, `type`, `data`, `saltall`, `hash`) 
VALUES ('{$logins}','{$user_id}', '{$rand}', '{$max}-999999', '{$betSize}', '{$betPercent}', '{$suma}', '{$what}', '{$dete}', '{$saltall}', '{$sha}');
";
mysql_query($insert_sql1);
$update_sql1 = "Update svuti_users set wager = wager - '$betSize' WHERE hash='$sid'";
mysql_query($update_sql1) or die("" . mysql_error());
		$sql_select = sprintf("SELECT * FROM svuti_games WHERE hash='%s'", mysql_real_escape_string($sha));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
	$check_bet = $row['id'];
}
		$result = array(
	'success' => "success",
	'type' => "$what",
	'balance' => "$bala",
	'new_balance' => "$newbalic",
	'hash' => "$hash",
	'hid' => "$hid",
	'number' => "$rand",
	'check_bet' => "$check_bet"
    );
	}
	////
//$error = "1";
}
if($error >= 1)
{
	//$mess = "Технический перерыв! 10 Минут!";
	// массив для ответа
    $result = array(
	'success' => "error",
	'error' => "$mess"
    );
}
}
if($type == "resetPass")
{
	$log = $_POST['login'];
	$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE email='%s' OR login='%s'", mysql_real_escape_string($log), mysql_real_escape_string($log));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
$re = $row['COUNT(*)'];
if($re == 1)
{
	$sql_select = sprintf("SELECT * FROM svuti_users WHERE email='%s' OR login='%s'", mysql_real_escape_string($log), mysql_real_escape_string($log));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
	$email = $row['email'];
	$ids = $row['id'];
	$delite = "DELETE FROM `svuti_email` WHERE user_id='$ids'";
mysql_query($delite);
$data = time();
$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H");
for ($i=1; $i<=50; $i++) {
$hash .= $chr[rand(1,31)];
}

$urla = "http://ndice.fun/reset/$hash";
$insert = "INSERT INTO `svuti_email`(`user_id`, `hash`, `data`) VALUES ('{$ids}','{$hash}','{$data}')";
mysql_query($insert);
	$email = $row['email'];
	  $to = "{$email}";
  $subject = "Восстановление пароля - SVUTI";
  $login = "Admin";
  $message = <<<HERE
  <table class="nl-container_mailru_css_attribute_postfix" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;background-color: #f5f7fa;width: 100%" cellpadding="0" cellspacing="0">
        <tbody>
            <tr style="vertical-align: top">
                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding: 0">
                    
                    
  
					<div style="background-color:transparent;margin-top:45px;">
                        <div style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;padding-top:34px;border-radius: 11px;" class="block-grid_mailru_css_attribute_postfix">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
                                
                                
                                
                                
                                <div class="col_mailru_css_attribute_postfix num12_mailru_css_attribute_postfix" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="background-color: transparent;width: 100% !important;">
                                        
                                        
                                        <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top:5px;padding-bottom:0px;padding-right: 0px;padding-left: 0px;">
                                            
                                            
                                            <div align="center" class="img-container_mailru_css_attribute_postfix center_mailru_css_attribute_postfix" style="padding-right: 0px;padding-left: 0px;">
                                                
												<span class="center_mailru_css_attribute_postfix" align="center" border="0" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;font-family: 'Open Sans', sans-serif;font-weight:600!important;font-size:37px;color: #404E67;">SVUTI</span>
                                                
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div style="background-color:transparent;margin-bottom:45px;">
                        <div style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;padding-bottom:34px;border-radius: 11px;" class="block-grid_mailru_css_attribute_postfix">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
                                
                                
                                
                                
                                <div class="col_mailru_css_attribute_postfix num12_mailru_css_attribute_postfix" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="background-color: transparent;width: 100% !important;">
                                         
                                        
                                        <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top:0px;padding-bottom:5px;padding-right: 0px;padding-left: 0px;">
                                            
                                            
                                            
                                            <div style="font-family:'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;line-height:150%;color:#555555;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 0px;">
                                                <div style="font-size:12px;line-height:18px;font-family:Montserrat, 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;color:#555555;text-align:left;">
                                                    <p style="margin: 0;font-size: 14px;line-height: 21px;text-align: center"><span style="font-size: 16px;line-height: 24px;">Получен запрос на восстановление пароля</span>
                                                        <br><span style="font-size: 18px;line-height: 27px;"></span></p>
                                                </div>
                                            </div>
                                            
                                            <div align="center" class="button-container_mailru_css_attribute_postfix center_mailru_css_attribute_postfix" style="padding-right: 10px;padding-left: 10px;padding-top:15px;padding-bottom:10px;">
                                                
                                                <a target="_blank" href="$urla" style="text-decoration:none;color: #ffffff;background: #01f0db;background: -webkit-linear-gradient(to right, #0ACB90, #2BDE6D);background: linear-gradient(to right, #0ACB90, #2BDE6D);border-radius: 4px;-webkit-border-radius: 4px;-moz-border-radius: 4px;max-width: 176px;width: 146px;width: auto;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent;padding-top: 7px;padding-right: 24px;padding-bottom: 7px;padding-left: 24px;font-family: 'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;text-align: center;mso-border-alt: none;" rel=" noopener noreferrer"> 
												<span style="font-size:12px;line-height:18px;">
												<span style="font-size: 16px;line-height: 24px;" data-mce-style="font-size: 16px;">
												<span style="font-size: 14px;line-height: 21px;" data-mce-style="font-size: 14px;">
												</span>
												<span style="line-height: 24px;font-size: 16px;" data-mce-style="line-height: 21px;">Восстановить пароль</span></span>
                                                    </span>
                                                </a>
												
                                                
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
      
					
                    
                </td>
            </tr>
        </tbody>
    </table>
HERE;
  $headers = "From: svuti <{$email}>\r\nContent-type: text/html; charset=utf-8\r\n";
  mail ($to, $subject, $message, $headers);
  
  
	$result = array(
	'success' => "success",
	'mesa' => "Письмо выслано на <b>$email</b>"
    );
}
}
else
{	
	// массив для ответа
$result = array(
	'success' => "error",
	'error' => "Email Не зарегистрирован"
    );
}
}

if($type == "hideBonus")
{
	$sid = $_POST['sid'];
	$update_sql1 = "Update svuti_users set bonus='1' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	// массив для ответа
    $result = array(
	'success' => "success"
    );
	$ud = $_POST['id'];
}
if($type == "getBonus")
{
	$vk = $_POST['vk'];
	$sid = $_POST['sid'];

	$sql_select = "SELECT COUNT(*) FROM svuti_users WHERE bonus_url='$vk'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
$vkcount = $row['COUNT(*)'];
}
	$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
$vkcounts = $row['bonus'];
$bala = $row['balance'];
}
	if($vkcount == 1)
	{
		$update_sql1 = "Update svuti_users set bonus='1' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	$fa = "error";
	$error = 5;
	$mess = "Вы уже получали бонус";
	}
	if($vkcount == 0)
	{
		if($vkcounts == 0)
	{
$user = explode( 'vk.com', $vk )[1];
$http = "https://";
$vks = str_replace($user, '', $vk);
$vks = str_replace($http, '', $vks);
if($vks == "vk.com" || $vks == "m.vk.com")
{
	//good
		$domainvk = explode( 'https://vk.com/id', $vk )[1];
if (!is_numeric($domainvk))
{
	$domainvk = explode( 'com/', $vk )[1];
}

		$vk1 = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$domainvk}&access_token=".$grtok."&v=5.74"));
        $vk1 = $vk1->response[0]->id;
	$resp = file_get_contents("https://api.vk.com/method/groups.isMember?group_id=".$grid."&user_id={$vk1}&access_token=".$grtok."&v=5.74");
$data = json_decode($resp, true);
if($data['response']=='1')
{
	$balances = $bala + $bonus;
	$update_sql1 = "Update svuti_users set balance='$balances' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	$update_sql1 = "Update svuti_users set bonus='1' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	$update_sql1 = "Update svuti_users set bonus_url='$domainvk' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	$fa = "success";
	$mess = "Бонус получен";
}
else
{
	$fa = "error";
	$error = 5;
	$mess = "Пользователь не найден";
}
	}
	}
	}
	// массив для ответа
    $result = array(
			'success' => "$fa",
			'error' => "$mess",
			'balance' => "$bala",
			'new_balance' => "$balances",
    );
}
if($type == "login")
{
$ipwnik = $_SERVER["HTTP_CF_CONNECTING_IP"];
$chars3="qazxswedcvfrtgnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
$max3=32; 
$size3=StrLen($chars3)-1; 
$passwords3=null; 
while($max3--) 
$hash.=$chars3[rand(32,$size3)];
$hpass = hash('sha256', $hash);
$sql_select = sprintf("SELECT * FROM svuti_users WHERE login='%s'", mysql_real_escape_string($login));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$userid = $row['id'];
$email = $row['email'];
$passbd = $row['password'];
$userbalance = $row['balance'];
$fa = "success";
$ban = $row['ban'];
$ban_mess = $row['ban_mess'];
}
if($pass != $passbd && !empty($pass)){
if(hash('sha256', $pass.$email.$sitesalt) != $passbd){
	$mess = "Ошибка авторизации";
	$fa = "error";
	$error = 3;
}
}
if (!preg_match("/^[0-9a-zA-Z]+$/",$login)) 
{
	$mess = "Введите корректный логин";
	$fa = "error";
	$error = 3;
}
if (!preg_match("/^[0-9a-zA-Z]+$/",$pass)) 
{
	$mess = "Введите корректный пароль";
	$fa = "error";
	$error = 3;
} 
if($ban == 1 && !empty($ban_mess))
{
	$error = 6;
	$mess = "Аккаунт заблокирован. Пункт ($ban_mess)";
	$fa = "error";
}
if($ban == 1 && empty($ban_mess))
{
	$error = 6;
	$mess = "Аккаунт заблокирован.";
	$fa = "error";
}
if($error == 0){
$update_sql = "UPDATE svuti_users SET hash = '{$hpass}' WHERE login = '$login'";
setcookie('sid', $hpass, time()+360000, '/');
mysql_query($update_sql) or die("" . mysql_error());
$update_sql = "UPDATE svuti_users SET iprox = '{$ipwnik}' WHERE login = '$login'";
mysql_query($update_sql) or die("" . mysql_error());
}

// массив для ответа
    $result = array(
	'sid' => "$hpass",
	'uid' => "$userid",
    'success' => "$fa",
	'error' => "$mess"
    );
}

if($type == "register")
{
	$dllogin = strlen($login);
if (!preg_match("#^[aA-zZ0-9\-_]+$#",$login)) 
{
	$mess = "Введите корректный логин";
	$fa = "error";
	$error = 3;
} 
if (!preg_match("#^[aA-zZ0-9\-_]+$#",$pass)) 
{
	$mess = "Введите корректный пароль";
	$fa = "error";
	$error = 3;
} 
if($dllogin < 4 || $dllogin > 15)
{
	$error = 4;
	$fa = "error";
	$mess = 'Логин от 4 до 15 символов';
}
$ipprox = $_SERVER['HTTP_X_FORWARDED_FOR'];
$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE password='%s'", mysql_real_escape_string($pass));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$passsss = $row['COUNT(*)'];
}
	$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE login='%s'", mysql_real_escape_string($login));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$usersss = $row['COUNT(*)'];
}
$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE email='%s'", mysql_real_escape_string($email));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$emailstu = $row['COUNT(*)'];
}
$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE ip_reg='%s'", mysql_real_escape_string($ip));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$ipshnik = $row['COUNT(*)'];
}
$ip = $_SERVER["REMOTE_ADDR"];
$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE ip='%s'", mysql_real_escape_string($ip));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$ipshnik2 = $row['COUNT(*)'];
}
if($usersss == "1")
{
	$error = 1;
	$mess = "Логин занят";
}
 if($emailstu == "1")
{
	$error = 2;
	$mess = "Email занят";
}
if($passsss >= "1")
{
	$error = 3;
	$mess = "Этот IP уже зарегестрирован";
	$fa = "error";
}
if($ipshnik >= "1")
{
	$error = 3;
	$mess = "Этот IP уже зарегестрирован";
	$fa = "error";
}
if($ipshnik2 >= "1")
{
	$error = 4;
	$mess = "Этот IP уже зарегестрирован";
	$fa = "error";
}
if (preg_match("/\b103\b/i", $ip)){
$error = 4;
	$mess = "Vpn юзаем?";
	$fa = "error";
}

if($error == 0){
$chars3="qazxswedcvfrtgnhyujmkiolpp2eW5gp6540Y7890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
$max3=32; 
$size3=StrLen($chars3)-1; 
$passwords3=null; 
while($max3--) 
$hashed.=$chars3[rand(32,$size3)];
$hash = hash('sha256', $hashed);
$hashedpassword = hash('sha256', $pass.$email.$sitesalt);
$ip = $_SERVER["REMOTE_ADDR"];
$iprox = $_SERVER['HTTP_X_FORWARDED_FOR'];
$ref = $_COOKIE["ref"];
$datas = date("d.m.Y");
	$datass = date("H:i:s");
	$data = "$datas $datass";
	
	$insert_sql1 = "INSERT INTO `svuti_users` (`data_reg`,`ip`, `iprox`, `ip_reg`, `referer`, `login`, `password`, `email`, `hash`, `balance`, `bonus`, `bonus_url`) 
	VALUES ('{$data}','{$ip}','{$iprox}','{$ip}','{$ref}', '{$login}','{$hashedpassword}', '{$email}', '{$hash}', '0', '0', '0');";
mysql_query($insert_sql1);
setcookie('sid', $hash, time()+360000, '/');
$fa = "success";
}
else
{
	$fa = "error";
}
// массив для ответа
    $result = array(
	'sid' => "$hash",
    'success' => "$fa",
	'error' => "$mess"
    );
}
	
    echo json_encode($result);
?>