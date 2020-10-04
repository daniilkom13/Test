<?php
require("../inc/bd.php");
$sid = $_COOKIE["sid"];
$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
	$prava = $row['prava'];
	$login = $row['login'];
}
if($prava == 1)
{
?>
<html xml:lang="ru" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Админка</title>
<link href="../files/st.css" rel="stylesheet" type="text/css">
<script src="../files/js.cookie.js" type="text/javascript"></script>
<script src="../files/sweetpro.js" type="text/javascript"></script>
<script src="../files/jspro.js" type="text/javascript"></script>
<script src="../files/nty.js" type="text/javascript"></script>


<style type="text/css">

html, body, #container {height: 100%; background-color:#fbfbfb;}
body > #container { height: auto; min-height: 100%; background-color:#fbfbfb; } 

#footer {
clear: both;
position: relative;
z-index: 10;
height: 3em;
margin-top: -3em;
} 

#content { padding-bottom: 3em; } 

</style>
</head>

<body>
<div id="container">
<div id="content">


<table style="margin-top: 20px;" align="center" width="884" border="0" cellspacing="0" cellpadding="0">


<tbody><tr><td colspan="3" align="right" height="50">
	
	<a href="/admin/index.php?act=payout" class="nav">Выплаты</a>
	<a href="/admin/index.php?act=payment" class="nav">Пополнения</a>
	<a href="/admin/index.php" class="nav">Статистика</a>
	<a href="/admin/index.php?act=users" class="nav">Пользователи</a>
	<a href="/admin/index.php?act=promo" class="nav">Промокоды</a>	
	<span style="padding-left: 100px; padding-right: 10px;"><?php echo $login = ucfirst($row['login']); $login; ?></span>
	<a class="nav" onclick="Cookies.set('sid', '');location.href = '/';" title="Выход">Выход</a>
	</td></tr></tbody></table>

<table style="margin-top:20px;" align="center" width="884" border="0" cellspacing="0" cellpadding="0">



</table>
<?php
if($_GET['act'] == "user")
{
$user = $_GET['user_id'];
$sql_select = "SELECT * FROM svuti_users WHERE id='$user'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
$login = ucfirst($row['login']);
$ref = $row['referer'];
$idref = $ref;
$sql_select221 = "SELECT * FROM svuti_users WHERE referer='$idref' ORDER BY `data_reg` DESC";
$result221 = mysql_query($sql_select221);
$row221 = mysql_fetch_array($result221);

$sql_select4 = "SELECT COUNT(*) FROM svuti_users WHERE referer='$idref'";
$result4 = mysql_query($sql_select4);
$row4 = mysql_fetch_array($result4);	
$count = $row4['COUNT(*)'];
do
{
$sql_select423 = "SELECT SUM(suma) FROM svuti_payments WHERE user_id=".$row221['id'];
$result423 = mysql_query($sql_select423);
$row423 = mysql_fetch_array($result423);
do
{   //$sumapey = $row423['SUM(suma)'];
	$sumapey = $sumapey + $row423['SUM(suma)'];
}
while($row423 = mysql_fetch_array($result423));

$sumapeys = ($sumapey / 100) * 10;
}
while($row221 = mysql_fetch_array($result221));

if($ref == '')
{
	$ref = "Нету реферера!";
	$refurl = "1";
}
?>
<script>
function save()
{
	       $.ajax({
	                method: "POST",
	                url: "post.php", 
	                data: { 
					user: $("#user").val(),
					email: $("#email").val(),
					bonus: $("#bonus").val(),
					balance: $("#balance").val(),
					bonusurl: $("#bonusurl").val(),
					login: $("#login").val(),
					ban: $("#ban").val(),
					youtube: $("#youtube").val(),
					referer: $("#referer").val(),
					prava: $("#prava").val(),
					online: $("#online").val(),
					ban: $("#ban").val(),
					sliv: $("#sliv").val(),
					password: $("#password").val(),
					fake: $("#fake").val()
	           },
                success: function(data){
$.noty.defaults.killer = true;
noty({
   text: 'Пользователь успешно изменён!',
   layout: 'center',
   closeWith: ['click', 'hover'],
   type: 'success'
})
                },
                error: function () {
$.noty.defaults.killer = true;
noty({
   text: 'Ошибка, чтот-то не так с базой.',
   layout: 'center',
   closeWith: ['click', 'hover'],
   type: 'error'
})
                }
            });
}

function deluser()
{
swal({
  title: 'Удалить пользователя?',
  text: "Возвар пользователя не возможен, вы действительно хотите удалить пользователя?",
  type: 'warning',
  cancelButtonText: 'Отмена',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Удалить'
}).then((result) => {
  if (result.value) {
    swal(
      'Удалён!',
      'Пользователь которого ыв выбрали был удалён!',
      'success'
    )
		  $.ajax({
	                method: "POST",
	                url: "deluser.php", 
	                data: { 
					user: $("#user").val()
	           },
			}); 
setTimeout('location.replace("/admin/index.php?act=users")',1400); 
	
  }
})
}
</script>
<table style="margin-top:20px;" align="center" width="884" border="0" cellspacing="0" cellpadding="0">

<tbody><tr><td><div class="zag2">Личная информация пользователя <strong><?php echo $login; ?></strong></div><table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl" style="border: 1px solid #ccc; border-radius: 4px; padding: 10px; background-color: #fff;">
			<tbody id="tb">	
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">ID (Не изменять):</td>
			<td style="border-bottom:1px solid#f2f2f2;"><input id="user" name="user" readonly disabled min="0" type="number" readonly disabled value="<?php echo $row['id']; ?>"readonly disabled></input></td></tr>
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Имя:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><input id="login" name="login" value="<?php echo $login; ?>"></input></td></tr>	
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Пароль:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><input id="password" name="password" value="<?php echo $row['password']; ?>"></input></td></tr>				
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Рефералов:</td>
						<a class="btn  btn-block btnError" style="color:#fff;"></a>
			<td style="border-bottom:1px solid#f2f2f2;"><input id="referer" name="referer" value="<?php echo $row['referer']; ?>"></input></td></tr>	
						<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Бонус за реферала:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><input id="bonusurl" name="bonusurl" value="<?php echo $row['bonus_url']; ?>"></input></td></tr>	
		    <tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Баланс:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><b><input id="balance" name="balance" value="<?php echo $row['balance']; ?>"></input></b> руб</td></tr>	
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">E-mail:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><b><input id="email" name="email" value="<?php echo $row['email']; ?>"></input></b></td></tr>	
			 <tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Администратор:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><b><input id="prava" name="prava" min="0" max="1" type="number" value="<?php echo $row['prava']; ?>"></input></b> - (1 - ДА, 0 - НЕТ)</td></tr>	
		    <tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Получил бонус:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><b><input id="bonus" name="bonus" min="0" max="1" type="number" value="<?php echo $row['bonus']; ?>"></input></b> - (1 - ДА, 0 - НЕТ)</td></tr>	
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Ютубер:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><b><input id="youtube" name="youtube" min="0" max="1" type="number" value="<?php echo $row['youtube']; ?>"></input></b> - (1 - ДА, 0 - НЕТ)</td></tr>	
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Фейк:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><b><input id="fake" name="fake" min="0" max="1" type="number" value="<?php echo $row['fake']; ?>"></input></b> - (1 - ДА, 0 - НЕТ)</td></tr>	
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Сливает:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><b><input id="sliv" name="sliv" min="0" max="1" type="number" value="<?php echo $row['sliv']; ?>"></input></b> - (1 - ДА, 0 - НЕТ)</td></tr>	
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Бан:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><b><input id="ban" name="ban" min="0" max="1" type="number" value="<?php echo $row['ban']; ?>"></input></b> - (1 - ДА, 0 - НЕТ)</td></tr>			
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Онлайн:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><b><input id="online" name="online" min="0" max="1" type="number" value="<?php echo $row['online']; ?>"></input></b> - (1 - ДА, 0 - НЕТ)</td></tr>					
            <a id="dels" style="margin-top: 635px; position: absolute; cursor: pointer" onclick="deluser()" class="nav">Удалить пользователя</a>
            <a id="saves" style="margin-top: 635px; margin-left: 190px; background-color: #5F9EA0; color: white; position: absolute; cursor: pointer" onclick="save()" class="nav">Сохранить</a>		
			
			
			</tbody></table><br></td></tr>




</tbody></table>

<?php
}
?>
<?php
if($_GET['act'] == "users")
{
?>
<table class="tbl" align="center" style="border: 1px solid #cccccc; border-radius: 4px; padding: 10px; margin-top: 5px; font-size: 15px; background-color: #fff;" width="875" cellpadding="5" cellspacing="0">

<tbody><tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">ID</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Логин</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Пароль</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Почта</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc; border-right: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Баланс</td><td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc; border-right: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Дата Регистрации</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc; border-right: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">IP[REG]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc; border-right: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">IP</td>
</tr>
<?php
$sql_select = "SELECT * FROM svuti_users ORDER BY `id` DESC";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
do
{
$login = ucfirst($row['login']);
	echo <<<HERE
<tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="50">$row[id]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300"><a href="/admin/index.php?act=user&amp;user_id=$row[id]">$login</a></td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="200">$row[password]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="200">$row[email]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300">$row[balance]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300">$row[data_reg]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300">$row[ip_reg]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300">$row[ip]</td>
</tr>
HERE;
}
while($row = mysql_fetch_array($result));
?>
</tbody></table>
<?php
}
?>
<?php
if($_GET['act'] == "")
{
	$sql_select = "SELECT MAX(id) FROM svuti_games";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);

$games = $row['MAX(id)'];

	$sql_select = "SELECT SUM(balance) FROM svuti_users";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
$summoney = $row['SUM(balance)'];
$summoney = round($summoney,2);

	$sql_select = "SELECT SUM(suma) FROM svuti_payout";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);

$sumpayout = $row['SUM(suma)'];
$sumpayout = round($sumpayout,2);

	$sql_select = "SELECT SUM(suma) FROM svuti_payments";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);

$sumpayments = $row['SUM(suma)'];
$sumpayments = round($sumpayments,2);
	$sql_select = "SELECT COUNT(*) FROM svuti_users WHERE balance > 10";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);

$cont = $row['COUNT(*)'];

?>
<table class="tbl" align="center" style="border: 1px solid #ccc; border-radius: 4px; padding: 10px; background-color: #fff;" width="875" cellpadding="5" cellspacing="0"><tbody><tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Параметр</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc; border-right: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Значение</td></tr>
<tr>
</tr>
<tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300">Кол-во игр</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300"><?php echo $games; ?></td>
</tr>
<tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300">Денег на счетах</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300"><?php echo $summoney; ?> руб</td>
</tr>
<tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300">Пользователей с балансом &gt;=10 руб</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300"><?php echo $cont; ?></td>
</tr>
<tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300">Выплат на сумму</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300"><?php echo $sumpayout; ?> руб</td>
</tr>
<tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300">Пополнений на сумму</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300"><?php echo $sumpayments; ?> руб</td>
</tr>
</tbody></table>
<?php
}
?>
<?php
if($_GET['act'] == "payment")
{
?>
<table class="tbl" align="center" style="border: 1px solid #cccccc; border-radius: 4px; padding: 10px; margin-top: 5px; font-size: 15px; background-color: #fff;" width="875" cellpadding="5" cellspacing="0">

<tbody><tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">ID</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Сумма</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Пользователь</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Кошелек</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Транзакция</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc; border-right: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Дата</td>
</tr>
<?php
$sql_select = "SELECT * FROM svuti_payments ORDER BY `id` DESC";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
do
{
		$sql_select1 = "SELECT * FROM svuti_users WHERE id='".$row['user_id']."'";
$result1 = mysql_query($sql_select1);
$row1 = mysql_fetch_array($result1);
$login = ucfirst($row1['login']);
	echo <<<HERE
	<tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="50">$row[id]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="200">$row[suma] руб</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300"><a href="/admin/index.php?act=user&amp;user_id=$row[user_id]">$login</a></td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="200">$row[qiwi]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="200">$row[transaction]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300">$row[data]</td>

</tr>
HERE;
}
while($row = mysql_fetch_array($result));
?>

</tbody></table>
<?php
}
?>
<?php
if($_GET['act'] == "promo")
{
?>
<script>
function promo()
{
	$("#list").hide();
	$("#button-creat").hide();
	$("#creat-table").show();
};
</script>
<script>
function creatpromo()
{
	       $.ajax({
	                method: "POST",
	                url: "promo.php", 
	                data: { 
					summa: $("#summa").val(),
					promo: $("#promo").val(),
					activelimit: $("#activelimit").val()
	           },
success: function(data){
$.noty.defaults.killer = true;
noty({
   text: 'Промокод успешно создан!',
   layout: 'center',
   closeWith: ['click', 'hover'],
   type: 'success'
})
},

error: function () {
$.noty.defaults.killer = true;
noty({
   text: 'Ошибка, чтот-то не так с базой.',
   layout: 'center',
   closeWith: ['click', 'hover'],
   type: 'error'
})
                }
});
}
</script>
<table id="creat-table" style="margin-top:20px;  display: none" align="center" width="884" border="0" cellspacing="0" cellpadding="0">

<tbody><tr><td><div class="zag2"><strong>Создание нового промокода</strong></div><table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl" style="border: 1px solid #ccc; border-radius: 4px; padding: 10px; background-color: #fff;">
			<tbody id="tb">	
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Код:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><input id="promo" placeholder="Например: UMBUS2018" name="promo" type="text" value=""></input></td></tr>
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Сумма:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><input min="0" id="summa" placeholder="Введиет сумму" name="summa" value=""></input></td></tr>	
			<tr><td width="80" style="border-bottom:1px solid#f2f2f2;">Лимит:</td>
			<td style="border-bottom:1px solid#f2f2f2;"><input min="0" placeholder="Введите лимит" id="activelimit" name="activelimit" value=""></input></td></tr>	
            <a id="saves" style="margin-top: 160px; margin-left: 0px; background-color: #5F9EA0; color: white; position: absolute; cursor: pointer" onclick="creatpromo()" class="nav">Сохранить</a>		
			<a id="dels" style="margin-top: 160px; margin-left: 116px; position: absolute; cursor: pointer" onclick="location.replace('/admin/index.php?act=promo')" class="nav">Назад</a>
			
			</tbody></table><br></td></tr>

</tbody></table>
<a id="button-creat" style="margin-left: 45%; cursor: pointer;" onclick="promo()">Создать новый промокод</a>
<table id="list" class="tbl" align="center" style="border: 1px solid #cccccc; border-radius: 4px; padding: 10px; margin-top: 5px; font-size: 15px; background-color: #fff;" width="875" cellpadding="5" cellspacing="0">
<tbody><tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">ID</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Сумма</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Код</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Лимит</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Автивировано</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Дата</td>
</tr>
<?php
$sql_select = "SELECT * FROM svuti_promo ORDER BY `id` DESC";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
do
{
		$sql_select1 = "SELECT * FROM svuti_promo WHERE id='".$row['user_id']."'";
$result1 = mysql_query($sql_select1);
$row1 = mysql_fetch_array($result1);
$login = ucfirst($row1['login']);
	echo <<<HERE
	<tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="50">$row[id]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="200">$row[summa] руб</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="200"><a href="/admin/index.php?act=edit&amp;promo_id=$row[id]">$row[promo]</a></td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300">$row[activelimit]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="200">$row[active]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300">$row[data]</td>
</tr>
HERE;
}
while($row = mysql_fetch_array($result));
?>

</tbody></table>

<?php
}
?>
<?php
if($_GET['act'] == "payout")
{
?>
<table align="center" style="border: 1px solid #cccccc; border-radius: 4px; padding: 10px; margin-top: 5px; font-size: 15px; background-color: #fff;" width="875" class="tbl" cellpadding="5" cellspacing="0">

<tbody><tr>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">ID</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Кошелек</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Сумма</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Пользователь</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Статус</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">Дата</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-top: 1px solid #cccccc; border-right: 1px solid #cccccc;" bgcolor="#ffffff" class="sm2" align="center">IP</td>
</tr>
<?php
$sql_select = "SELECT * FROM svuti_payout ORDER BY `id` DESC";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
do
{
		$sql_select1 = "SELECT * FROM svuti_users WHERE id=".$row['user_id'];
$result1 = mysql_query($sql_select1);
$row1 = mysql_fetch_array($result1);
$login = ucfirst($row1['login']);
	echo <<<HERE
	<tr>
	<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="50">$row[id]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="200">$row[qiwi]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300">$row[suma] руб</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300"><b><a href="/admin/index.php?act=user&id=$row[user_id]">$login</a></b></td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300">$row[status]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc;" align="center" width="300">$row[data]</td>
<td style="border-bottom: 1px solid #cccccc; border-left: 1px solid #cccccc; border-right: 1px solid #cccccc;" align="center" width="300">$row[ip]</td>
</tr>
HERE;
}
while($row = mysql_fetch_array($result));
?>
</tbody></table>
<?php
}
?>



</div>
</div>


</body></html>
<?php
}
else
{
include("http://svuti.cf/error404.php");
}
?>

	<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
					<script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
					<script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
					<script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
					<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
					<script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
					<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
					<script src="assets/plugins/jquery-bez/jquery.bez.min.js"></script>
					<script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
					<script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
					<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
					<script type="text/javascript" src="assets/plugins/bootstrap-select2/select2.min.js"></script>
					<script type="text/javascript" src="assets/plugins/classie/classie.js"></script>
					<script src="assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
					<script src="assets/plugins/nvd3/lib/d3.v3.js" type="text/javascript"></script>
					<script src="assets/plugins/nvd3/nv.d3.min.js" type="text/javascript"></script>
					<script src="assets/plugins/nvd3/src/utils.js" type="text/javascript"></script>
					<script src="assets/plugins/nvd3/src/tooltip.js" type="text/javascript"></script>
					<script src="assets/plugins/nvd3/src/interactiveLayer.js" type="text/javascript"></script>
					<script src="assets/plugins/nvd3/src/models/axis.js" type="text/javascript"></script>
					<script src="assets/plugins/nvd3/src/models/line.js" type="text/javascript"></script>
					<script src="assets/plugins/nvd3/src/models/lineWithFocusChart.js" type="text/javascript"></script>
					<script src="assets/plugins/mapplic/js/hammer.js"></script>
					<script src="assets/plugins/mapplic/js/jquery.mousewheel.js"></script>
					<script src="assets/js/datatables.min.js"></script>
					<script src="assets/plugins/mapplic/js/mapplic.js"></script>
					<script src="assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>
					<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
					<script src="assets/js/main.js" type="text/javascript"></script>
					<script src="assets/js/main-modals.js" type="text/javascript"></script>
					<script src="assets/js/notifications.js" type="text/javascript"></script>
					<script src="assets/plugins/skycons/skycons.js" type="text/javascript"></script>
					<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
					<!-- END VENDOR JS -->
					<!-- BEGIN CORE TEMPLATE JS -->
					<script src="pages/js/pages.min.js"></script>
					<!-- END CORE TEMPLATE JS -->
					<!-- BEGIN PAGE LEVEL JS -->
					<script src="assets/js/dashboard.js" type="text/javascript"></script>
					<script src="assets/js/scripts.js" type="text/javascript"></script>
					<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  				<script>tinymce.init({ selector:'.tinymce' });</script>