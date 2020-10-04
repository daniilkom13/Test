<?php
require('inc/bd.php');
$hash = $_COOKIE['sid'];
if(!empty($_GET['code'])){
 $id_app     =     '7023354' ;                  
 $secret_app =    '43N5Pyqeb8BCMdCX31gC';       
 $url_script   =    'https://rainemoney.fun/vklogin.php';
 $token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id='.$id_app.'&client_secret='.$secret_app.'&code='.$_GET['code'].'&redirect_uri='.$url_script), true);
 $fields       = 'first_name,last_name,photo_400';
 $uinf = json_decode(file_get_contents('https://api.vk.com/method/users.get?uids='.$token['user_id'].'&fields='.$fields.'&access_token='.$token['access_token'].'&v=5.95'), true); 
 $name1 = $uinf['response'][0]['first_name'];
 $name2 = $uinf['response'][0]['last_name'];
 $avatar = $uinf['response'][0]['photo_400'];
 $user_id = $token['user_id'];
 $_SESSION['access_token'] = $token['access_token'];
 $name = "$name1 $name2";
$chars3="qazxswedcvfrtgnhyujmkiolpp2eW5gp6540Y7890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
$max3=32; 
$size3=StrLen($chars3)-1; 
$passwords3=null; 
while($max3--) 
$hashed.=$chars3[rand(32,$size3)];
$hash = hash('sha256', $hashed);
 $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
 $namechar = strlen($name);
 $ip = $_SERVER["REMOTE_ADDR"];
 $iprox = $_SERVER['HTTP_X_FORWARDED_FOR'];
 $ref = $_COOKIE["ref"];
 $datas = date("d.m.Y");
 $datass = date("H:i:s");
 $data = "$datas $datass";
 if($namechar > 2){
	$sql_select = "SELECT * FROM svuti_users WHERE user_id = '$user_id'";
    $result = mysql_query($sql_select);
    $row = mysql_fetch_array($result);
	if(mysql_num_rows($result) > 0) 
	{
	$sql = "UPDATE svuti_users SET hash='$hash' WHERE user_id='$user_id'";
	$result = mysql_query($sql);
	$sql = "UPDATE svuti_users SET login='$name' WHERE user_id='$user_id'";
	$result = mysql_query($sql);
	setcookie('sid', $hash, time()+360000, '/');
	header('Location: /');
	}
	else{
	$insert_sql1 = "INSERT INTO `svuti_users` (`data_reg`,`ip`, `iprox`, `ip_reg`, `referer`, `login`, `user_id`, `vkuser`, `password`, `email`, `hash`, `balance`, `bonus`, `bonus_url`) 
	VALUES ('{$data}','{$ip}','{$iprox}','{$ip}','{$ref}', '{$name}', '{$user_id}', '1', '{$pass}', '{$email}', '{$hash}', '0', '0', '0');";
    mysql_query($insert_sql1);
    setcookie('sid', $hash, time()+360000, '/');
	header('Location: /');
   }
}
else{
	exit("name empty or less than 2 char");
}
}
else{
	exit("Cannot adopt code");
}
?>