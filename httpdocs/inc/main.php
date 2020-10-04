<?php
$depobon = 0;
$ID = "7023354"; // настройки вк
$URL = "https://rainemoney.fun/vklogin.php";

///online///
$sql_select = "SELECT COUNT(*) FROM svuti_users WHERE online='1'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);

$online = $row['COUNT(*)'];
///online///
///

if($_GET['i'])
{
setcookie('ref', $_GET['i'], time()+360000, '/');
}
///
if($_COOKIE["sid"] == "")
{

$go = <<<HERE
	
					                         <div class="row">
                            <div class="col-xs-12">
                                <div class="card" style="border-radius:20px!important;">
                                    <div class="card-body" style="background:#606060;color:#fff;border-radius: 20px!important;">
                                        <div class="row">
                                            <div class="col-lg-6  col-md-12 col-sm-12 ">
                                                <div id="what-is">
                                                    <div  class="card-header">
                                                        <h4 class="card-title"><b>rainemoney</b></h4>

                                                    </div>
                                                    <div class="card-body collapse in">
                                                        <div class="card-block">
                                                            <div class="card-text">
                                                                <p style="font-size:15.5px"></p>
                                                                <ul>
                                                                    <li>5 уникальных режимов!</li>
                                                                    <li>Очень простая игра! Авторизируйтесь через Вконтакте и начинайте игру!</li>
                                                                    <li>Надоела комиссия? Пополнение и вывод средств, комиссия 0%!</li>
                                                                    <li>Получайте бонус до 100N на сайте каждый день!</li>
                                                                      <li>Вы так-же можете получить бонус за подписку в нашей группе ВК!</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6  col-md-12 col-sm-12 ">
                                                <div id="login">
                                                    
                                                    <div class="col-lg-10 offset-lg-1">
													<div class="card-header no-border pb-0">
                                                        <h6 class="text-xs-center font-small-3 pt-2"><span style="font-size:17px;color:#fff"> Авторизация </span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                                <form class="form-horizontal">
																																																		<div style="margin-top: -22px;" class="card-body pt-0 text-center">
																																				<center><a style="color:#fff" href="https://oauth.vk.com/authorize?client_id=$ID&display=page&redirect_uri=$URL&response_type=code&v=5.74" class="btn btn-social mb-1 mr-1 btn-outline-facebook"><span class="fa fa-vk"></span> <span class="px-1">Войти через ВК</span> </a><p>или</p></center>
																																		</div>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="userLogin" value="" placeholder="Логин"  >
                                                                        <div class="form-control-position">
                                                                        
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="password" class="form-control form-control-md input-md" id="userPass" placeholder="Пароль">
                                                                        <div class="form-control-position">
                                                                            
                                                                        </div>
                                                                    </fieldset>
																
                                                                    <a id="error_enter" class="btn  btn-block btnError" style="color:#fff;display:none;border-radius:0px;"></a>

                                                                    <a id="enter_but" onclick="login()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px">
                                                                    <center><span id="text_enter"></i>  Войти</span>

                                                                            <div id="loader" style="position:absolute">
                                                                                <div id='dot-container' style='display:none'>
                                                                                    <div id="left-dot" class='white-dot'></div>
                                                                                    <div id='middle-dot' class='white-dot'></div>
                                                                                    <div id='right-dot' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer no-border" style="margin-top:-12x;background:#606060">
                                                            <p class="float-sm-left text-xs-center"><a onclick="register_show()" class="card-link">Регистрация</a></p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="register" style="display:none">
                                                   
                                                    <div class="col-lg-10 offset-lg-1">
													 <div class="card-header no-border pb-0" >
                                                        <h6  class="text-xs-center font-small-3 pt-2"><span style="font-size:17px;color:#fff">Регистрация </span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                                <form class="form-horizontal" >
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="userLoginRegister" placeholder="Логин">
                                                                        <div class="form-control-position">
                                                                            
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="email" class="form-control form-control-md input-md" id="userEmailRegister" placeholder="E-mail">
                                                                        <div class="form-control-position">
                                                                           
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="password" class="form-control form-control-md input-md" id="userPassRegister" placeholder="Пароль">
                                                                        <div class="form-control-position">
                                                                           
                                                                        </div>
                                                                    </fieldset>
																	<fieldset style="padding-bottom: 7px;">
																		<label class="check1">
																		  <input id="rulesagree" type="checkbox"/>
																		  <div class="box1"></div>
																		 
																		 
																		</label>
																		 <div style="display:inline-block;padding-left:10px;position:absolute">Согласен c <u data-toggle="modal" data-target="#large" style="cursor:pointer">правилами</u></div>
																	
																	 
                                                                    <a id="error_register" class="btn  btn-block btnError" style="color:#fff;display:none;border-radius:0px;"></a>
                                                                    <a onclick="register1()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px">

                                                                        <center><span id="text_register"></i> Зарегистрироваться</span>


                                                                            <div id="loader_register" style="position:absolute">
                                                                                <div id='dot-container_register' style='display:none'>
                                                                                    <div id="left-dot_register" class='white-dot'></div>
                                                                                    <div id='middle-dot_register' class='white-dot'></div>
                                                                                    <div id='right-dot_register' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer no-border" style="margin-top:-12px;background:#606060">
                                                            <p class="float-sm-left text-xs-center"><a onclick="login_show()" class="card-link">Есть аккаунт</a></p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="reset" style="display:none">
                                                    
                                                    <div class="col-lg-10 offset-lg-1">
													<div class="card-header no-border pb-0">
                                                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size:17px">Вспомнить пароль</span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                             
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="loginemail" placeholder="Логин или E-mail">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-search"></i>
                                                                        </div>
                                                                    </fieldset>
																	<div style="display: none; padding-bottom:11px" class="g-recaptcha" data-sitekey="6LeYb0oUAAAAAM6G7jpHFGk130MAXna9DL8D8RSA"></div> 
                                                                    <a id="error_reset" class="btn  btn-block btnError" style="color:#fff;display:none;border-radius:0px;"></a>
                                                                    <a id="reset_success" class="btn  btn-block btnSuccess" style="color:#fff;display:none;border-radius:0px"></a>
                                                                    <a  id="reset_but" onclick="reset_password()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px;border-radius:0px;">

                                                                        <center><span id="text_reset"><i class="ft-check"></i> Вспомнить</span>

                                                                            <div id="loader_reset" style="position:absolute">
                                                                                <div id='dot-container_reset' style='display:none'>
                                                                                    <div id="left-dot_reset" class='white-dot'></div>
                                                                                    <div id='middle-dot_reset' class='white-dot'></div>
                                                                                    <div id='right-dot_reset' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>                                                               
                                                            </div>
                                                        </div>
 
                                                        <div class="card-footer no-border" style="margin-top:-12px">
                                                            <p class="float-sm-left text-xs-center"><a onclick="login_show()" class="card-link">Есть аккаунт</a></p>
                                                            <p class="float-sm-right text-xs-center"><a onclick="register_show()" class="card-link">Регистрация </a></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
HERE;
$panel = <<<HERE

<div data-menu="menu-container" class="navbar-container main-menu-content container center-layout" style="background-color:#696969;color:#fff">
                    <!-- include ../../../includes/mixins-->
                    <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                        <li class="dropdown nav-item active" onclick="$('.dsec').hide();$('#lastBets').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastBets').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Главная</span></a>

                        </li>
                        <li class="dropdown nav-item " id="gg" onclick="$('.dsec').hide();$('#realGame').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#realGame').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Честная игра</span></a>

                        </li>
                       
                           
                        </li>

												<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#contacts').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#contacts').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Связь</span></a>
                        </li>
						<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#lastWithdraw').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastWithdraw').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Выплаты</span></a>
                        </li>
						<button style="margin-top:12px;margin-left:15px;float:right;" class="flat_button logo_button  color3_bg" onclick="window.open('https://vk.com/public183361920');">Вконтакте</button>
                    </ul>

                </div>

HERE;

}
else
{
	$hashh = $_COOKIE["sid"];
	$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($hashh));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$userhash = $row['hash'];
$userid = $row['id'];
$idref = $row['id'];
$balance = $row['balance'];
$wager = $row['wager'];
$login = $row['login'];
$bon = $row['bonus'];

	$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$hash = hash('sha512', $salt1.$number.$salt2);

	$code = strToHex(encode($salt1.$number.$salt2, 'p2eW5gp6540Y'));
$hid = implode("-", str_split($code, 4));
setcookie('hid', $hid, time()+31536000, '/');
if($depobon == 1)
{
	$bonus10 = <<<HERE
<div class="card" style="border-radius:20px!important;">
										<div class="card-body" style="box-shadow: rgb(210, 215, 222) 7px 10px 23px -11px;border-radius: 6px!important;">
                                                <div class="row">
													<div class="p-2 text-xs-center ">
													
													<h5>СЕГОДНЯ У НАС АКЦИЯ!</h5> 
													<center>
													<a id="enter_but" class="btn   btn-block btnEnter" style="color:#fff;width:240px;margin-top:6px;border-radius:0px;">
                                                                        +10% к пополнению</a></center>
													
													
													</div>
												</div>
												</div>
											</div>
HERE;
}
if($bon == 0)
{
	$bonusrow = <<<HERE
<div class="col-xs-12" id="bonusRow">
										
                                        <div class="card" style="background:#606060;color:#fff">
										<div class="card-header" style="border-radius: 20px!important;">
                                                    
                                                   
                                                     
													<div class="heading-elements">
                                                        <ul class="list-inline mb-2 font-medium-4">
                                                            <li onclick="hideBonus()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Больше не показывать"><a><i class="ft-x"></i></a></li>
                                                           <script>
														   function hideBonus(){
										$.ajax({
											type: 'POST',
											url: 'action.php',
											data: {
												type: "hideBonus",
												sid: Cookies.get('sid'),
											},
											success: function(data) {
												var obj = jQuery.parseJSON(data);
												if (obj.success == "success") {
													 $('#bonusRow').hide();
												}
											}
										});
														   }
														   </script>
                                                        </ul>
                                                    </div>
													 
                                                </div>
                                            <div class="card-body" style="margin-top:-35px;">
                                                <div class="row">
													<div class="p-2 text-xs-center ">
													
														<h5>Для получения денежного бонуса</h5>
													1. Подписаться на наш паблик, <a target="_blank" href="https://vk.com/public183361920">ссылка</a><br>
													2. Введите ссылку на Вашу страницу для проверки
													<center><input class="form-control text-xs-center" id="vkPage" style="width:240px;margin-top:6px" placeholder="https://vk.com/durov">
													<a id="error_bonus" class="btn  btn-block btnError" style="color: rgb(255, 255, 255); display: none;width:240px;margin-top:6px"></a>
													<a id="success_bonus" class="btn  btn-block btnSuccess" style="color: rgb(255, 255, 255); display: none;width:240px;margin-top:6px"></a>
													<a id="enter_but" onclick="getBonus()" class="btn   btn-block btnEnter" style="color:#fff;width:240px;margin-top:6px">
                                                                        Получить бонус</a></center>
													
													
													</div>
												</div>
												
											</div>
											<script>
											function getBonus() {
													if ($('#vkPage').val() == ''){
														$('#error_bonus').show();
														return $('#error_bonus').html('Введите страницу');
													}
													
													
												$.ajax({
                                                                            type: 'POST',
                                                                            url: 'action.php',
                                                                            data: {
                                                                                type: 'getBonus',
                                                                                sid: Cookies.get('sid'),
                                                                                vk: $('#vkPage').val(),
																				a:  Cookies.get('ab')
                                                                            },
                                                                            success: function(data) {
                                                                             var obj = jQuery.parseJSON(data);
                                                                                if (obj.success == "success") 
																				{
																						Cookies.set('ab', '1');
																						return location.href = "";
																				
																				}
																				if (obj.success == "error") {
																					$('#error_bonus').show();
																					return $('#error_bonus').html(obj.error);
																				}
                                                                            }
                                                                        });
											}
										</script>
										</div>
									</div>
HERE;
}
$sql_select = "SELECT COUNT(*) FROM svuti_payments WHERE user_id='".$userid."'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row['COUNT(*)'] == 0)
{
	$paymentss = '<tr><td colspan="6" class="text-xs-center">История пополнений пуста</td>                 
                        </tr>';
}
else
{
$sql_select33 = "SELECT * FROM svuti_payments WHERE user_id='".$userid."' ORDER BY `data` DESC";
$result33 = mysql_query($sql_select33);
$row33 = mysql_fetch_array($result33);
do
{

	$paymentss = $paymentss.'<tr style="cursor:default!important;""><td></td><td></td><td>'.$row33['data'].'<td>'.$row33['suma'].' N</td></td><td></td><td></td>

							</tr>';
}
while($row33 = mysql_fetch_array($result33));
}

$sql_select = "SELECT COUNT(*) FROM svuti_payout WHERE user_id='".$userid."' ORDER BY `data`";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row['COUNT(*)'] == 0)
{
	$payouts = '<tr><td id="emptyHistory" colspan="4" class="text-xs-center">История пуста</td>
															</tr>';
}
else
{	
$sql_select3 = "SELECT * FROM svuti_payout WHERE user_id='".$userid."' ORDER BY `data` DESC";
$result3 = mysql_query($sql_select3);
$row3 = mysql_fetch_array($result3);
do
{
	if($row3['status'] == "Обработка")
	{
		$tag = "warning";
		$s = '<i class="fa fa-close close" onclick="otmena()" value="'.$row3['id'].'" id="otmina"></i>';
	}
	if($row3['status'] == "Выполнено")
	{
		$tag = "success";
		$s = "";
	}
	if($row3['status'] == "Отменен")
	{
		$tag = "danger";
		$s = "";
	}
	$payouts = $payouts.'<tr style="cursor:default!important;" id="'.$row3['id'].'"><td>'.$s.$row3['data'].'</td><td><img src="files/qiwi.png"> '.$row3['qiwi'].'</td><td>'.$row3['suma'].' N</td>
							<td><div class="tag tag-'.$tag.'">'.$row3['status'].' </div>'.$s.'</td>

							</tr>';
							$tag = "";
}
while($row3 = mysql_fetch_array($result3));

}
//go
$modal = <<<HERE
<div class="modal fade text-xs-left" id="numbersGame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600;color:#fff">Угадай билет</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
										  <center><h5><b>Коэффициент, при выигрыше - 20x</b></h5>
                                <div class="col-lg-8 offset-lg-2" style="margin-top:8px;display:inline-block">
											<br>
											<center><h5 style="font-size:48px;font-weight:600" id="numberNumber" class="odometer"><b>0</b></h5>
                                            <br>
							<input id="BetSizeNumbers" onkeyup="validateBetSize(this); updateProfit();" class="form-control text-xs-center" value="1">
							<br>
							<a style="" class="mr-1 mb-1 btn btn-info" onclick="betNum1()">
								<span>[0-500]</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="" class="mr-1 mb-1 btn btn-info" onclick="betNum2()">
								<span>[3000-3500]</span></a></center>	
							<a style="" class="mr-1 mb-1 btn btn-info" onclick="betNum3()">
								<span>[7000-7500]</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="" class="mr-1 mb-1 btn btn-info" onclick="betNum4()">
								<span>[9000-9500]</span></a></center>
								<br>
							<br>
							<br>
							<br>
							<br>
								
							
										 
										  
								 <div class="col-lg-8 offset-lg-2">
                                <a id="error_numbersGame" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;"></a>
								<a id="succes_numbersGame" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;"></a>
								</div>	
										  
										 
										</div>
									  </div>
									</div>									
</div>		
								
								
										  </div>
										 
										</div>
									  </div>
									</div>		
</div>
		
<div class="modal fade text-xs-left in" id="agreeAge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color: #303030;">
											<h4 class="modal-title" style="font-weight:600; color:#fff;">Соглашение на использование</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
											<div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                                            <h5 class="text-xs-center">Уважаемые пользователи, продолжая использовать наш сайт (rainemoney), вы соглашаетесь с пользовательским соглашением и подтверждаете, что вам 18 лет и более.</h5>
								           <br>
										   <br>
										    <h5 class="text-xs-center">Если вам не исполнилось 18 лет - не продолжайте игру, и прочитайте правила сервиса, особенно 1.7 1.8</h5>
										     <h5 class="text-xs-center">Максимальная сумма вывода с ежедневного бонуса или промо-кодов - 50N</h5>
										    <h5 class="text-xs-center"> Мы не выводим средства с промо-кодов,ежедневного бонуса, фейк аккаунтам и мульти-аккаунтам! Подробнее о фейк аккаунтах, Правило 1.8</h5>
										    
										  </div>
										  <div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                                <center><a class="btn  btn-block  " style="color:#fff;background: #13cc8b!important;" data-dismiss="modal" aria-label="Close">
                                   <span>  ПОДТВЕРЖДАЮ</span></a><a href="https://google.com" class="btn  btn-block  " style="color:#fff;background: #f35744!important;"><span>  ВЫЙТИ</span></a>
								   </center>
                            </div>
										  </div>
										  
										  </div>
										 
										</div>
									  </div>
									</div>
<div class="modal fade text-xs-left" id="deposit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #303030;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ft-x"></i></span>
                        </button>
                        <h4 class="modal-title" style="font-weight:600; color:#fff;">Пополнение счета</h4>
                    </div>
                    <div class="modal-body">
                    <div class="row" style="padding-bottom:15px">
					<div class="col-lg-8 offset-lg-2" style="padding-bottom:5px">
					<h5 class="text-xs-center">Нажмите на Free-Kassa</h5>
					<br>
                                <h6>Введите сумму и нажмите пополнить </h6><h6> 
								</h6></div>
								<input id="systemPay" style="display:none">
		<div id="fkPay" onclick="$('#systemPay').val('1'); $('#fkPayActive').css('display','');
$('#QiwiPayActive').hide();$('#QiwiPay').css('opacity','0.25');
$('#ydPayActive').hide();$('#ydPay').css('opacity','0.25'); $('#fkPay').css('opacity','1');" style="cursor: pointer; opacity: 1;" class="offset-lg-2 col-lg-5 text-xs-center">
							 <img src="files/free-kassa.png" width="270px"> <img id="fkPayActive" src="files/checked.png" width="16px" style="position: absolute;display:none">
						</div>
						
					</div>
                    <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <h6>Cумма: </h6><h6> 
								<input onkeyup="validateWithdrawSize(this)" id="depositSize" class="form-control " value="1">
								<a id="error_deposit" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;border-radius:0px;"></a>
								</h6></div>
								
								</div> 
								
								 <div class="row">
							 <div class="col-lg-4 offset-lg-4" style="margin-top:8px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;background: #6c7a89!important;" onclick="deposit()">
                                    <span> Пополнить</span>
                                    
                                </a>
                            </div>
							<div class="col-lg-4 offset-lg-4">
							<div class="text-xs-center">
                                <svg id="depositLoad" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 100 100" style="background: none;display:none">
                                    <g transform="translate(50,50)">
                                        <circle cx="0" cy="0" r="7.142857142857143" fill="none" stroke="#31444f" stroke-width="2" stroke-dasharray="22.43994752564138 22.43994752564138" transform="rotate(337.283)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="0" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="14.285714285714286" fill="none" stroke="#465e6b" stroke-width="2" stroke-dasharray="44.87989505128276 44.87989505128276" transform="rotate(359.621)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.16666666666666666" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="21.428571428571427" fill="none" stroke="#4c6470" stroke-width="2" stroke-dasharray="67.31984257692413 67.31984257692413" transform="rotate(15.8588)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.3333333333333333" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="28.571428571428573" fill="none" stroke="#546E7A" stroke-width="2" stroke-dasharray="89.75979010256552 89.75979010256552" transform="rotate(50.6171)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.5" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="35.714285714285715" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="112.1997376282069 112.1997376282069" transform="rotate(92.2943)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.6666666666666666" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="42.857142857142854" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="134.63968515384826 134.63968515384826" transform="rotate(137.453)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.8333333333333334" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                    </g>
                                </svg>
                            </div>
                            </div>
                            </div>
							<div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr style="cursor:default">
                                <th></th>
                                <th></th>
                                <th class="text-xs-center">Дата</th>
                                <th class="text-xs-center">Сумма</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
						$paymentss
						</tbody>
                    </table>
                </div>
                    </div>
                </div>
            </div>
        </div>
                                           
        <div class="modal fade text-xs-left" id="promomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color: #303030;">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600; color:#fff;">Промокоды</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
											<div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                                <h6>Промокод:</h6>
                                <input type="text" id="promo" class="form-control">

                            </div>
							
                            <div class="col-lg-8 offset-lg-2">
                                <a id="error_promo" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;border-radius:0px;"></a>
								<a id="succes_promo" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;border-radius:0px;"></a>
								</div>
								
							<div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;background: #6c7a89!important;" onclick="active()">
                                   <span>  Активировать</span>
                                </a>
                            </div>
										  </div>
										  
										  </div>
										 
										</div>
									  </div>
									</div>
<div class="modal fade text-xs-left" id="toperson" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color: #303030;">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
										
										  </div>
										  <div class="modal-body">
										  <div class="row">
											<div class="col-lg-8 offset-lg-2" style="margin-top:8px">
<h6>Логин получателя:</h6>
                                <input type="text" id="toperson1" class="form-control"><br>
                                <h6>Сумма:</h6>
                                <input type="text" id="person" class="form-control" onkeyup="var yratext=/['А-я','A-z']/; if(yratext.test(this.value)) this.value=''">

                            </div>
							
                            <div class="col-lg-8 offset-lg-2">
                                <a id="error_person" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;border-radius:0px"></a>
								<a id="succes_person" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;border-radius:0px"></a>
								</div>
								
							<div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;background: #6c7a89!important;border-radius:0px;" onclick="person()">
                                  
                                </a>
                            </div>
										  </div>
										  
										  </div>
										 
										</div>
									  </div>									  
									</div>
		<div class="modal fade text-xs-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color: #303030;">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600; color:#fff;">Смена пароля</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
											<div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                                <h6>Новый пароль:</h6>
                                <input type="password" id="resetPass" class="form-control">

                            </div><div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                                <h6>Повторите пароль:</h6>
                                <input type="password" id="resetPassRepeat" class="form-control">

                            </div>
							
                            <div class="col-lg-8 offset-lg-2">
                                <a id="error_resetPass" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none"></a>
								<a id="succes_resetPass" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;">Пароль изменен</a>
								</div>
								
							<div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;background: #6c7a89!important;" onclick="resetPass()">
                                   <span>  Изменить</span>
                                </a>
                            </div>
										  </div>
										  
										  </div>
										 
										</div>
									  </div>
									</div>
<script> 
$( document ).ready(function() { 
$('#agreeAge').modal('show');
});
</script>
<div class="modal fade text-xs-left" id="case_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color: #303030;">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600;color:#fff">Кейс 1</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
                                <div class="col-lg-8 offset-lg-2" style="margin-top:8px;display:inline-block">
											<br>
											<center><h5><b>Кейс 1</b></h5>
                                            <h5><img src="https://cs-drive.ru/case/images/18.png" style="width: 221px; height: 221px;" /></h5>
											<h5>Выигрыш до <b>30.00 N</b></h5>
											<h5>Стоимость: <b>5.00 N</b></h5>
											<br>
                               	<div class="pizdos" style="display:inline-block">
								<span style="font-size:20px;display:none" id="winText_case1">Ваш выигрыш:</b></span><br>
								<span id="win_case1" class="odometer" style="font-size:36px;display:none">0</span> <span id="winn_case1" style="font-size:36px;display:none;margin-top:8px;">&nbsp;N</span>
								</div>
                               <h5><a id="prebutton_case1" style="border:none;border-radius:15px;" class="mr-1 mb-1 btn btn-info" id="case4op" onclick="case1()">
								<span id="prebutton2_case1">Открыть</span></a></h5></center>

										  </div>
										 
										  
								 <div class="col-lg-8 offset-lg-2">
                                <a id="error_cases1" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;"></a>
								<a id="succes_cases1" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;"></a>
								</div>	
										  
										 
										</div>
									  </div>
									</div>									
</div>		
								
								
										  </div>
										 
										</div>
									  </div>
									</div>		
</div>
<div class="modal fade text-xs-left" id="case_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color: #303030;">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600;color:#fff">Кейс 2</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
                                <div class="col-lg-8 offset-lg-2" style="margin-top:8px;display:inline-block">
											<br>
											<center><h5><b>Кейс 2</b></h5>
                                            <h5><img src="https://cs-drive.ru/case/images/18.png" style="width: 221px; height: 221px;" /></h5>
											<h5>Выигрыш до <b>75.00 N</b></h5>
											<h5>Стоимость: <b>15.00 N</b></h5>
											<br>
                               	<div class="pizdos" style="display:inline-block">
								<span style="font-size:20px;display:none" id="winText_case2">Ваш выигрыш:</b></span><br>
								<span id="win_case2" class="odometer" style="font-size:36px;display:none">0</span> <span id="winn_case2" style="font-size:36px;display:none;margin-top:8px;">&nbsp;N</span>
								</div>
                               <h5><a id="prebutton_case2" style="border:none;border-radius:15px;" class="mr-1 mb-1 btn btn-info" id="case4op" onclick="case2()">
								<span id="prebutton2_case2">Открыть</span></a></h5></center>

										  </div>
										 
										  
								 <div class="col-lg-8 offset-lg-2">
                                <a id="error_cases2" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;"></a>
								<a id="succes_cases2" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;"></a>
								</div>	
										  
										 
										</div>
									  </div>
									</div>									
</div>		
								
								
										  </div>
										 
										</div>
									  </div>
									</div>		
</div>	
<div class="modal fade text-xs-left" id="case_3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color: #303030;">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600;color:#fff">Кейс 3</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
                                <div class="col-lg-8 offset-lg-2" style="margin-top:8px;display:inline-block">
											<br>
											<center><h5><b>Кейс 3</b></h5>
                                            <h5><img src="https://cs-drive.ru/case/images/18.png" style="width: 221px; height: 221px;" /></h5>
											<h5>Выигрыш до <b>150.00 N</b></h5>
											<h5>Стоимость: <b>30.00 N</b></h5>
											<br>
                               	<div class="pizdos" style="display:inline-block">
								<span style="font-size:20px;display:none" id="winText_case3">Ваш выигрыш:</b></span><br>
								<span id="win_case3" class="odometer" style="font-size:36px;display:none">0</span> <span id="winn_case3" style="font-size:36px;display:none;margin-top:8px;">&nbsp;N</span>
								</div>
                               <h5><a id="prebutton_case3" style="border:none;border-radius:15px;" class="mr-1 mb-1 btn btn-info" id="case4op" onclick="case3()">
								<span id="prebutton2_case3">Открыть</span></a></h5></center>

										  </div>
										 
										  
								 <div class="col-lg-8 offset-lg-2">
                                <a id="error_cases3" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;"></a>
								<a id="succes_cases3" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;"></a>
								</div>	
										  
										 
										</div>
									  </div>
									</div>									
</div>		
								
								
										  </div>
										 
										</div>
									  </div>
									</div>		
</div>	
<div class="modal fade text-xs-left" id="case_4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color: #303030;">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600;color:#fff">Кейс 4</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
                                <div class="col-lg-8 offset-lg-2" style="margin-top:8px;display:inline-block">
											<br>
											<center><h5><b>Кейс 4</b></h5>
                                            <h5><img src="https://cs-drive.ru/case/images/18.png" style="width: 221px; height: 221px;" /></h5>
											<h5>Выигрыш до <b>500.00 N</b></h5>
											<h5>Стоимость: <b>50.00 N</b></h5>
											<br>
                               	<div class="pizdos" style="display:inline-block">
								<span style="font-size:20px;display:none" id="winText_case4">Ваш выигрыш:</b></span><br>
								<span id="win_case4" class="odometer" style="font-size:36px;display:none">0</span> <span id="winn_case4" style="font-size:36px;display:none;margin-top:8px;">&nbsp;N</span>
								</div>
                               <h5><a id="prebutton_case4" style="border:none;border-radius:15px;" class="mr-1 mb-1 btn btn-info" id="case4op" onclick="case4()">
								<span id="prebutton2_case4">Открыть</span></a></h5></center>

										  </div>
										 
										  
								 <div class="col-lg-8 offset-lg-2">
                                <a id="error_cases4" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;"></a>
								<a id="succes_cases4" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;"></a>
								</div>	
										  
										 
										</div>
									  </div>
									</div>									
</div>		
								
								
										  </div>
										 
										</div>
									  </div>
									</div>		
</div>									
<div class="modal fade text-xs-left" id="cases" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color: #303030;">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600;color:#fff">Кейсы</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
                                <div class="col-lg-8 offset-lg-2" style="margin-top:8px;display:inline-block">
											<br>
											<center><h5><b>Выберите кейс</b></h5>
                                            <br>
											
							<center>
							<a data-toggle="modal" data-target="#case_1" type="button" data-dismiss="modal" aria-label="Close" style="border:none;border-radius:15px;" class="mr-1 mb-1 btn btn-info" id="case1op">
								<span><i class="fas fa-cube"></i>&nbsp;Кейс 1</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="modal" data-target="#case_2" type="button" data-dismiss="modal" aria-label="Close" style="border:none;border-radius:15px;" class="mr-1 mb-1 btn btn-info" type="button" id="case1op">
								<span><i class="fas fa-cube"></i>&nbsp;Кейс 2</span></a></center>
								<br>
								<a data-toggle="modal" data-target="#case_3" type="button" data-dismiss="modal" aria-label="Close" style="border:none;border-radius:15px;" class="mr-1 mb-1 btn btn-info" id="case1op">
								<span><i class="fas fa-cube"></i>&nbsp;Кейс 3</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="modal" data-target="#case_4" type="button" data-dismiss="modal" aria-label="Close" style="border:none;border-radius:15px;" class="mr-1 mb-1 btn btn-info" type="button" id="case1op">
								<span><i class="fas fa-cube"></i>&nbsp;Кейс 4</span></a></center>
										  
										 
										</div>
									  </div>
									</div>									
</div>		
								
								
										  </div>
										 
										</div>
									  </div>
									</div>		
</div>	
<div class="modal fade text-xs-left" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #303030;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ft-x"></i></span>
                        </button>
                        <h4 class="modal-title" style="font-weight:600; color:#fff;">Вывод средств</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
							<h5 class="text-xs-center">Если у вас перед отыгровкой стоит знак - (минус) то это значит, что вы отыграли больше чем нужно, и вывод доступен!</h5>
							<h5 class="text-xs-center"> Для вывода осталось отыграть: <b>$wager</b> N</h5>
							<h5 class="text-xs-center"> Выплаты от 5 Минут до 32 Часов</h5>
							<h5 class="text-xs-center">Комиссия 0%</h5>
							<br>
                                <h6>Cумма: </h6><h6> 
								<input onkeyup="validateWithdrawSize(this)" id="WithdrawSize" class="form-control " value="">
								</h6></div>
								</div>
								<div class="row">

<div class="col-lg-8 offset-lg-2">
											<h6>Платежная система:</h6>
                                <select class="hide-search form-control select2-hidden-accessible" id="hide_search" onchange="withdrawSelect()" tabindex="-1" aria-hidden="true">
                                    <optgroup label="Платежные системы">
                                        <option value="1">Qiwi</option>
                                       <option value="2">ЯндексДеньги</option>
                                       <option value="3">Visa/Mastercard</option>

</optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                                <h6 id="nameWithdraw">Номер телефона:</h6>
                                <input id="walletNumber" class="form-control" placeholder="Введите реквизиты">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <a id="error_withdraw" class="btn  btn-block btnError" style="color:#fff;display:none;margin-top:15px;border-radius:0px"></a>
                                <a id="succes_withdraw" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;border-radius:0px;">Выплата успешно создана</a>
                            </div>
                            <div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;background: #6c7a89!important;" onclick="withdraw()">
                                    <center><span id="withdrawB">  Выплата</span>

                                        <div id="loader" style="display:none">
                                            <div id="dot-container">
                                                <div id="left-dot" class="white-dot"></div>
                                                <div id="middle-dot" class="white-dot"></div>
                                                <div id="right-dot" class="white-dot"></div>
                                            </div>
                                        </div>

                                    </center>
                                </a>
                            </div>
                        </div>
						
						<br>
						<h5 class="text-xs-center"> Если хотите вернуть N на баланс - нажмите на крестик </h5>

<br>
<div class="table-responsive">
                        <table class="table mb-0" id="withdrawTable">
                            <thead>
<th style="width:1%">Дата</th>
                                    <th style="width:62%">Описание </th>
                                    <th style="width:100%">Сумма</th>
                                    <th>Статус</th>

                                </tr>
                            </thead>
                            <tbody id="withdrawT">
                               
                           
$payouts
                         </tbody>
                        </table>						</div>
						<div id="sh"></div>
                          
                            <div class="text-xs-center">
                                <svg id="withdrawHistoryLoad" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 100 100" style="background: none;display:none">
                                    <g transform="translate(50,50)">
                                        <circle cx="0" cy="0" r="7.142857142857143" fill="none" stroke="#31444f" stroke-width="2" stroke-dasharray="22.43994752564138 22.43994752564138" transform="rotate(15.8588)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="0" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="14.285714285714286" fill="none" stroke="#465e6b" stroke-width="2" stroke-dasharray="44.87989505128276 44.87989505128276" transform="rotate(50.6171)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.16666666666666666" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="21.428571428571427" fill="none" stroke="#4c6470" stroke-width="2" stroke-dasharray="67.31984257692413 67.31984257692413" transform="rotate(92.2943)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.3333333333333333" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="28.571428571428573" fill="none" stroke="#546E7A" stroke-width="2" stroke-dasharray="89.75979010256552 89.75979010256552" transform="rotate(137.453)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.5" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="35.714285714285715" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="112.1997376282069 112.1997376282069" transform="rotate(184.948)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.6666666666666666" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="42.857142857142854" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="134.63968515384826 134.63968515384826" transform="rotate(230.652)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.8333333333333334" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                    </g>
                                </svg>
                            </div>

                    </div>

                </div>
            </div>
			
        </div>

HERE;
$hashh = $_COOKIE["sid"];
	$sql_select = "SELECT * FROM svuti_users WHERE hash='$hashh'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
$prava = $row['prava'];
if($prava == 1)
{
	$adm = <<<HERE
	<li class="dropdown nav-item " style="float:right!impotant" onclick="window.open('/admin');">
                            <a class="dropdown-toggle nav-link"><span>Админка</span></a>
                        </li>
HERE;
}
$panel = <<<HERE
<script>
updateBalance(0,$balance);
</script>
<div data-menu="menu-container" class="navbar-container main-menu-content container center-layout" style="background-color:#696969;color:#fff">
                    <!-- include ../../../includes/mixins-->
                    <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav" style="color:#fff">
                        <li class="dropdown nav-item active" onclick="$('.dsec').hide();$('#lastBets').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastBets').offset().top);document.getElementById('coinflip').style.display='block';
document.getElementById('crash').style.display='none';">
                            <a class="dropdown-toggle nav-link"><span>Главная</span></a>

                        </li>
<li class="dropdown nav-item " onclick="document.getElementById('crash').style.display='block';
document.getElementById('coinflip').style.display='none';">

                        </li>
                        <li class="dropdown nav-item " id="gg" onclick="$('.dsec').hide();$('#realGame').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#realGame').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Честная игра</span></a>

                        </li>
                        <li class="dropdown nav-item " onclick="$('.dsec').hide();$('#rules').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#rules').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Как играть</span></a>
                        </li>
                        
                    
                           

						                        <li id="setPop" data-toggle="modal" data-target="#default" class="dropdown nav-item " style="float:right!impotant">
                       
                        </li> <li class="dropdown nav-item " style="float:right!impotant" onclick="$('.dsec').hide();$('#referals').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#referals').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Рефералка</span></a>
                        </li> 
						
												<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#contacts').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#contacts').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Связь</span></a>
                        </li>
						<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#lastWithdraw').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastWithdraw').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Выплаты</span></a>
                        </li>
<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#comment').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#comment').offset().top);">

                        </li>
						$adm
												<li id="exit" class="dropdown nav-item " style="float:right!impotant" onclick="Cookies.set('sid', '');location.href = '/';">
                            <a class="dropdown-toggle nav-link"><span>Выйти</span></a>
                        </li>
						                        <script>
                            $(function() {
                                $("#main-menu-navigation  li").click(function() {
                                    
									if ($(this).attr('id') !== 'setPop' && $(this).attr('id') !== 'exit'){
										$("#main-menu-navigation  li").removeClass("active");
										$(this).toggleClass("active");
									}
                                    
                                })
                            });
                        </script>
						<button style="margin-top:12px;margin-left:11px;float:right;" class="flat_button logo_button  color3_bg" onclick="window.open('https://vk.com/public183361920');">Вконтакте</button>
                   
                    </ul>
                </div>

HERE;
$hashh = $_COOKIE["sid"];
	$sql_select = "SELECT * FROM svuti_users WHERE hash='$hashh'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
$yout = $row['youtube'];
if($yout == 1)
{
	$yts = '<i class="fab fa-youtube danger"></i>';
} 
$go = <<<HERE
<div class="row" id="coinflip">
																$bonusrow
									                                   <div class="col-xs-12">
$bonus10
<center style="margin-top: 5px; ">
					<button style="width: 120px;border-color: #999;background-color: #404040;color: #fff;border-radius:15px" type="button" class="mr-1 mb-1 btn btn-outline-primary class="mr-1 mb-1 btn btn-outline-primary" data-toggle="modal" data-target="#coinflipGame"><i class="fas fa-adjust"></i> Коинфлип</button>
					<button style="width: 155px;border-color: #999;background-color: #404040;color: #fff;border-radius:15px" type="button" class="mr-1 mb-1 btn btn-outline-primary" data-toggle="modal" data-target="#chestGame"><i class="fas fa-coins"></i> Сундуки</button>
					<button style="width: 155px;border-color: #999;background-color: #404040;color: #fff;border-radius:15px" type="button" class="mr-1 mb-1 btn btn-outline-primary" data-toggle="modal" data-target="#cases"><i class="fas fa-box"></i> Кейсы</button>
					<button style="width: 155px;border-color: #999;background-color: #404040;color: #fff;border-radius:15px" type="button" class="mr-1 mb-1 btn btn-outline-primary" data-toggle="modal" data-target="#numbersGame"><i class="fas fa-question"></i> Угадай Билет</button>
</center>
                                        <div class="card" style="border-radius:20px!important;">
                                            <div class="card-body" style="border-radius: 20px!important;background:#696969;color:#fff">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12 col-sm-12 ">
													
                                                        <div class="p-1 text-xs-center mt52">
                                                            <h2 class="display-6 blue-grey darken-1" style="text-transform: capitalize!important;">$yts $login </h2>
                                                            <h3 class="display-4 blue-grey darken-1"><span class="odometer odometer-auto-theme"  id="userBalance" mybalance="$balance"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span> N</h3>

                                                            <div class="card-body">
                                                                <center>
															
                                                                    <ul class="list-inline list-inline-pipe" style="font-size:14px">
                                                                        <li data-toggle="modal" data-target="#deposit" style="cursor:pointer;">Пополнить</li>
                                                                        <li data-toggle="modal" data-target="#promomodal" style="cursor:pointer;">Промо</li>
                                                                        <li data-toggle="modal" data-target="#withdraw" style="cursor:pointer;">Вывести</li>
																		<br>
																		<li data-toggle="modal" data-target="#dailyBonus" style="cursor:pointer;">Ежедневный бонус </li>

 
                                                                    </ul>

                                                                </center>
																	
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12 border-right-blue-grey border-right-lighten-5 border-left-blue-grey border-left-lighten-5">
                                                        <div class="p-1">

                                                            <div class="card-body" style="margin-top:2px;">

                                                                <div id="controlBet" class="row">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <span class="blue-grey darken-1 text-xs-center">Размер игры </span>
                                                                            <input id="BetSize" onkeyup="validateBetSize(this); updateProfit();" class="form-control text-xs-center" value="1">
                                                                            <div style="margin-top:10px;-webkit-user-select: none;" class="text-xs-center">

                                                                                <div onclick="var x = ($('#BetSize').val()*2);$('#BetSize').val(parseFloat(x.toFixed(2)));updateProfit()" class="tag tag-default">

                                                                                    <span>Удвоить</span>
                                                                                </div>
                                                                                <div onclick="$('#BetSize').val(Math.max(($('#BetSize').val()/2).toFixed(2), 1));updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Половина</span></div>
                                                                                <div onclick="var max = $('#userBalance').attr('myBalance');$('#BetSize').val(Math.max(max,1));updateProfit()" class="tag tag-default" style="margin-left:-13px;margin-top:3px;">

                                                                                    <span>Макс</span>
                                                                                </div>
                                                                                <div onclick="$('#BetSize').val(1);updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Мин</span>
                                                                                </div>
                                                                            </div>
                                                                            <script>
                                                                                function validateBetSize(inp) {
																					
                                                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                                                        .replace(/[^\d,.]*/g, '')
                                                                                        .replace(/([,.])[,.]+/g, '$1')
                                                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">

                                                                        <div class="form-group">
                                                                            <span class="blue-grey darken-1 text-xs-center">% Шанс выигрыша</span>
                                                                            <input id="BetPercent" onkeyup="validateBetPercent(this);updateProfit()"class="form-control text-xs-center" value="50">
                                                                            <div style="margin-top:10px;-webkit-user-select: none;" class="text-xs-center">
																			
                                                                                <div onclick="$('#BetPercent').val(Math.min(($('#BetPercent').val()*2).toFixed(2), 95));updateProfit()" class="tag tag-default">

                                                                                    <span>Удвоить</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(Math.max(($('#BetPercent').val()/2).toFixed(2).replace(/.00/g, ''), 1));updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Половина</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(95);updateProfit()" class="tag tag-default" style="margin-left:-14px;margin-top:3px;">

                                                                                    <span>Макс</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(1);updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Мин</span>
                                                                                </div>
                                                                            </div><script>
                                                                                function validateBetPercent(inp) {
                                                                                    if (inp.value > 95) {
                                                                                        inp.value = 95;
                                                                                    }
																					

                                                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                                                        .replace(/[^\d,.]*/g, '')
                                                                                        .replace(/([,.])[,.]+/g, '$1')
                                                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>

                                                                </div>
																<div class="hidden-xs-down">
                                                                <div class="1" line-on-side text-muted text-xs-center font-small-3 mx-1 my-1 ">
                                                                    <center>Hash игры </center>
                                                                </div>

                                                                <center style="word-wrap:break-word;padding-bottom:5px"><b id="hashBet" hid="$hid">
																$hash																	</b>
                                                                    <div id="loader_hash" style="position:relative;display:none">
                                                                        <div id="dot-container_hash">
                                                                            <div id="left-dot_hash" class="black-dot"></div>
                                                                            <div id="middle-dot_hash" class="black-dot"></div>
                                                                            <div id="right-dot_hash" class="black-dot"></div>
                                                                        </div>
                                                                    </div>
                                                                </center>
                                                                <center>
                                                                    <cite style="cursor:pointer" onclick="$('.dsec').hide();$('#realGame').show();$('#main-menu-navigation  li').removeClass('active');$('#gg').addClass('active');">Что это?</cite>
                                                                </center>
																</div>
                                                       
                                                            </div>

                                                        </div>

                                                    </div>
													
                                                    <div id="betStart" class="col-lg-4 col-md-6 col-sm-12 ">
                                                        <div class="p-1 text-xs-center" style="margin-top:16px;">
                                                            <div>
                                                                <h3 class="display-4" style="word-wrap:break-word;"><span id="BetProfit" class="display-4 success1 " >2.00</span> N 
                                                               
                                                            </div>
<span class="blue-grey darken-1 " style="font-size:17px">Возможный выигрыш</span>
<div style="padding-top:10px;">

                                                            <div class="card-body">
                                                                <div class="row text-xs-center" style="padding-top:10px">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <span style="-webkit-user-select: none;-moz-user-select: none;" class="blue-grey darken-1 ">0 - <span id="MinRange">499999</span></span>
                                                                            <button onclick="bet('betMin')" id="buttonMin" style="margin-top:5px;color:#fff;    background: linear-gradient(to right, rgb(122, 134, 148), rgb(99, 107, 116))!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px; " type="button" class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1">Меньше</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">

                                                                        <div class="form-group">
                                                                            <span style="-webkit-user-select: none;-moz-user-select: none;" class="blue-grey darken-1  "><span id="MaxRange">500000</span> - 999999</span>
                                                                            <button onclick="bet('betMax')" type="button" id="buttonMax" style="margin-top:5px;color:#fff; box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;   background: linear-gradient(to right, rgb(122, 134, 148), rgb(99, 107, 116))!important; border: 0px solid " class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1">Больше</button>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                             
																
																				<center><div id="betLoad" style="background: none;display:none;"><img src="files/file.gif" style="width:40x;height:40px;    -moz-user-select: none;
    -o-user-select:none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
     user-select: none;"></img></div></center>


                                                            </div>
                                                                <a id="error_bet" class="btn  btn-block btnError" style="color:#fff;display:none;border-radius:0px"></a>
                                                                <a id="succes_bet" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;   margin-top: 0rem; display:none;border-radius:0px"></a>

                                                            </div>
                                                            <center style="padding: 0.4rem!important;">

                                                                <a id="checkBet" style="display:none;-webkit-user-select: none;-moz-user-select: none;" class="blue-grey darken-1 " href="" target="_blank">Проверить игру</a>
                                                            </center>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
	
<script>
function hideClass(){
$('#coin').removeClass();
}
</script>		
<div class="modal fade text-xs-left" id="dailyBonus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color: #303030;">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600;color:#fff">Ежедневный бонус</h4>
										  </div>
										  <div class="modal-body" style="color:#fff">
										  <div class="row">
                                <div class="col-lg-8 offset-lg-2" style="margin-top:8px;display:inline-block">		
											<h5 class="text-xs-center">Бонус можно получать каждые <b>24 ч</b></h5>
											<h5 class="text-xs-center">Максимальная сумма бонуса - <b>100 N</b></h5>
											<br>											
											<br>
											<h5 class="text-xs-center" style="font-size:14px;">Чтобы получить бонус, нажмите на кнопку ниже</h5>
											
										 <button style="margin-top:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background: linear-gradient(to right, rgb(122, 134, 148), rgb(99, 107, 116))!important; " type="button" class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1" onclick="dailyBonus()">Получить</button>
										  
							 <div class="col-lg-8 offset-lg-2">
                                <a id="error_daily" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;"></a>
								<a id="succes_daily" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;"></a>
								</div>
								
						</div>
					</div>
				</div>
			</div>
		</div>							
		</div>
<div class="modal fade text-xs-left in" id="coinflipGame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel30" onclick="hideClass();">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color: #303030;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="ft-x" onclick="hideClass();"></i></span>
						</button>
						<h4 class="modal-title" style="font-weight: 600;color:#fff">Коинфлип</h4>
					</div>
					<div class="modal-body" style="color:#fff;background:606060">
						<div class="row">
							<div class="col-lg-12">
								<center>
									<h5 class="text-xs-center">Что выпадет? <b style="color: red;">Красное</b> или <b style="color: blue;">Синее</b><span style="color: #000;">?</span></h5>
									<h5 class="text-xs-center">Все зависит от тебя!</h5>
									<h5 class="text-xs-center">В случае победы вы получаете 2Х от ставки</h5>
									<br>
									<div id="coin">
										<div class="side-a"></div>
										<div class="side-b"></div>
                                    </div>
									<br>
									<h5 class="text-xs-center">Сумма ставки:</h5>
									<input id="BetSizeCoin" value="10" onkeyup="validateBetSize(this);" class="form-control text-xs-center" style="max-width: 300px;">
									<br>
									<div id="cflipButton">
										<h5 class="text-xs-center">Ваш выбор:</h5>
										<button style="width: 120px;" type="button" class="mr-1 mb-1 btn btn-danger" onclick="bet_red();">Красное</button>
										<button style="width: 120px;" type="button" class="mr-1 mb-1 btn btn-info" onclick="bet_gray();">Синее</button>
									</div>
								</center>
							</div>
							<div class="col-lg-8 offset-lg-2">
								<a id="error_coin" class="btn btn-block btnError" style="color: #fff; margin-top: 15px; display: none;"></a>
								<a id="succes_coin" class="btn btn-block btnSuccess" style="color: #fff; cursor: default; margin-top: 15px; display: none;"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
<div class="modal fade text-xs-left" id="chestGame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600;color:#fff">Сундуки Удачи</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
                                <div class="col-lg-8 offset-lg-2" style="margin-top:8px;display:inline-block">		
											<h5 class="text-xs-center">Макс. коэффициент - <b>x1000</b></h5>
											<br>
											<br>
											</b>
											<br>
											<h5 class="text-xs-center" id="chhs"><b>Выберите кейс</b></h5>
											<br>
											<center><img id="openchest" class="opench" style="display:none;width:256px;height:256px;" src="https://thumbs.gfycat.com/DisguisedInsidiousAustraliansilkyterrier-small.gif"></img></center>
											<center><h1 id="multichest" class="chestx" style="display:none;font-size:26px;"></h1></center>
                                             <div id="brs"><img src="https://upload.wikimedia.org/wikipedia/commons/5/59/Empty.png" style="display:none;width:256px;height:256px"></img></div>
										  <div id="playChest">
											<center>
                                             <img src="files/chest.png" style="width:82px;height:82px;cursor:pointer" onclick="playChest();"></img><img src="files/chest.png" style="width:82px;height:82px;cursor:pointer" onclick="playChest();"></img><img src="files/chest.png" style="width:82px;height:82px;cursor:pointer" onclick="playChest();"></img>
											 <br>
											 <img src="files/chest.png" style="width:82px;height:82px;cursor:pointer" onclick="playChest();"></img><img src="files/chest.png" style="width:82px;height:82px;cursor:pointer" onclick="playChest();"></img><img src="files/chest.png" style="width:82px;height:82px;cursor:pointer" onclick="playChest();"></img>
											 <br>
											 <img src="files/chest.png" style="width:82px;height:82px;cursor:pointer" onclick="playChest();"></img><img src="files/chest.png" style="width:82px;height:82px;cursor:pointer" onclick="playChest();"></img><img src="files/chest.png" style="width:82px;height:82px;cursor:pointer" onclick="playChest();"></img>
                                             </center>
										  </div>
								            <br>
											<div id="betchest">
											<h5 class="text-xs-center">Сумма ставки:</h5><i class="fas fa-coins" style="margin-top: 12px;position: absolute;margin-left: 210px;"></i>
											<center><input id="BetSizeChest" onkeyup="validateBetSize(this);" value="10" class="form-control text-xs-center"></center>
											</div>
										  
							 <div class="col-lg-8 offset-lg-2">
                                <a id="error_chest" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;"></a>
								<a id="succes_chest" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;"></a>
								</div>
								
						</div>
					</div>
				</div>
			</div>
		</div>	
<div class="row" id="crash" style="display:none;">
																$bonusrow
									                                   <div class="col-xs-12">
$bonus10

                                        <div class="card" style="border-radius:20px!important;">
                                            <div class="card-body" style="box-shadow: rgb(210, 215, 222) 7px 10px 23px -11px;border-radius: 20px!important;">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12 col-sm-12 ">
													
                                                        <div class="p-1 text-xs-center mt52">
                                                            <h2 class="display-6 blue-grey darken-1" style="text-transform: capitalize!important;">$login </h2>
                                                            <h3 class="display-4 blue-grey darken-1"><span class="odometer odometer-auto-theme"  id="userBalance" mybalance="$balance"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span> N</h3>

                                                            <div class="card-body">
                                                                <center>
															
                                                                    <ul class="list-inline list-inline-pipe" style="font-size:15px">
                                                                        <li data-toggle="modal" data-target="#deposit" style="cursor:pointer;">Пополнить</li>
                                                                        <li data-toggle="modal" data-target="#promomodal" style="cursor:pointer;">Промокоды </li>
                                                                        <li data-toggle="modal" data-target="#withdraw" style="cursor:pointer;">Вывод </li>
																		<br>
																		<li data-toggle="modal" data-target="#dailyBonus" style="cursor:pointer;">Бонус </li>
 
                                                                    </ul>

                                                                </center>
																	
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12 border-right-blue-grey border-right-lighten-5 border-left-blue-grey border-left-lighten-5">
                                                        <div class="p-1">

                                                            <div class="card-body" style="margin-top:2px;">

                                                                <div id="controlBet" class="row">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <span class="blue-grey darken-1 text-xs-center">Размер игры </span>
                                                                            <input id="BetSize" onkeyup="validateBetSize(this); updateProfit();" class="form-control text-xs-center" value="1">
                                                                            <div style="margin-top:10px;-webkit-user-select: none;" class="text-xs-center">

                                                                                <div onclick="var x = ($('#BetSize').val()*2);$('#BetSize').val(parseFloat(x.toFixed(2)));updateProfit()" class="tag tag-default">

                                                                                    <span>Удвоить</span>
                                                                                </div>
                                                                                <div onclick="$('#BetSize').val(Math.max(($('#BetSize').val()/2).toFixed(2), 1));updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Половина</span>
                                                                                </div>
                                                                                <div onclick="var max = $('#userBalance').attr('myBalance');$('#BetSize').val(Math.max(max,1));updateProfit()" class="tag tag-default" style="margin-left:-13px;margin-top:3px;">

                                                                                    <span>Макс</span>
                                                                                </div>
                                                                                <div onclick="$('#BetSize').val(1);updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Мин</span>
                                                                                </div>
                                                                            </div>
                                                                            <script>
                                                                                function validateBetSize(inp) {
																					
                                                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                                                        .replace(/[^\d,.]*/g, '')
                                                                                        .replace(/([,.])[,.]+/g, '$1')
                                                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">

                                                                        <div class="form-group">
                                                                            <span class="blue-grey darken-1 text-xs-center">Забирать на</span>
                                                                            <input id="BetPercent" onkeyup="validateBetPercent(this);updateProfit()"class="form-control text-xs-center" value="50">
                                                                            <div style="margin-top:10px;-webkit-user-select: none;" class="text-xs-center">
																			
                                                                                <div onclick="$('#BetPercent').val(Math.min(($('#BetPercent').val()*2).toFixed(2), 95));updateProfit()" class="tag tag-default">

                                                                                    <span>Удвоить</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(Math.max(($('#BetPercent').val()/2).toFixed(2).replace(/.00/g, ''), 1));updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Половина</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(95);updateProfit()" class="tag tag-default" style="margin-left:-14px;margin-top:3px;">

                                                                                    <span>Макс</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(1);updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Мин</span>
                                                                                </div>
                                                                            </div>

                                                                            <script>
                                                                                function validateBetPercent(inp) {
                                                                                    if (inp.value > 95) {
                                                                                        inp.value = 95;
                                                                                    }
																					

                                                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                                                        .replace(/[^\d,.]*/g, '')
                                                                                        .replace(/([,.])[,.]+/g, '$1')
                                                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>

                                                                </div>
																<div class="hidden-xs-down">
                                                                <div class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-1 my-1 ">
                                                                    <span>Hash игры </span>
                                                                </div>

                                                                <center style="word-wrap:break-word;padding-bottom:5px"><b id="hashBet" hid="$hid">
																$hash																	</b>
                                                                    <div id="loader_hash" style="position:relative;display:none">
                                                                        <div id="dot-container_hash">
                                                                            <div id="left-dot_hash" class="black-dot"></div>
                                                                            <div id="middle-dot_hash" class="black-dot"></div>
                                                                            <div id="right-dot_hash" class="black-dot"></div>
                                                                        </div>
                                                                    </div>
                                                                </center>
                                                                <center>
                                                                    <cite style="cursor:pointer" onclick="$('.dsec').hide();$('#realGame').show();$('#main-menu-navigation  li').removeClass('active');$('#gg').addClass('active');">Что это?</cite>
                                                                </center>
																</div>
                                                       
                                                            </div>

                                                        </div>

                                                    </div>
													
                                                    <div id="betStart" class="col-lg-4 col-md-6 col-sm-12 ">
                                                        <div class="p-1 text-xs-center" style="margin-top:1px;">
                                                            <div class="p-1 text-xs-center" style="margin-top:1px;">
<h1 class="display-4" style="word-wrap:break-word;"><span id="BetProfit" class="display-2 success1" >50</span> <i class="fas fa-chart-line"></i></h1>
                                                              <h3 class="display-4" style="word-wrap:break-word;"><span id="BetProfit" class="display-4 success1 " >50</span> N</h3>
                                                                
                                                               
                                                            </div>
<span class="blue-grey darken-1 " style="font-size:17px">Возможный выигрыш</span>
                                                            <div class="card-body">
                                                                <div class="row text-xs-center" style="padding-top:10px">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            
                                                                            <button onclick="betCrash('betCrash')" id="buttonMinCrash" style="margin-top:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background: linear-gradient(to right, rgb(122, 134, 148), rgb(99, 107, 116))!important; " type="button" class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1">Поставить</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">

                                                                        <div class="form-group">
                                                                            

                                                                            <button onclick="betCrashOut('betCrashOut')" type="button" id="buttonMaxCrashOut" style="margin-top:5px;color:#fff; box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px; background: linear-gradient(to right, rgb(122, 134, 148), rgb(99, 107, 116))!important;border-radius:150px!important;border: 0px solid " class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1">Забрать</button>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                             
																
												<center><div id="betLoad" style="background: none;display:none;"><img src="files/file.gif" style="width:40px;height:40px;    -moz-user-select: none;
    -o-user-select:none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
     user-select: none;"></img></div></center>
                                                                <a id="error_bet" class="btn  btn-block btnError" style="color:#fff;display:none;border-radius:150px"></a>
                                                                <a id="succes_bet" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;   margin-top: 0rem; display:none;border-radius:150px"></a>

                                                            </div>
                                                            <center style="padding: 0.4rem!important;">

                                                                <a id="checkBet" style="display:none;-webkit-user-select: none;-moz-user-select: none;" class="blue-grey darken-1 " href="" target="_blank">Проверить игру</a>
                                                            </center>
                                                        </div>
                                                    </div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div></div>          
HERE;
}
else
{
	setcookie('sid', "", time()- 10000);
	//setcookie('login', "", time()- 10000);
	$panel = <<<HERE

<div data-menu="menu-container" class="navbar-container main-menu-content container center-layout">
                    <!-- include ../../../includes/mixins-->
                    <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                        <li class="dropdown nav-item active" onclick="$('.dsec').hide();$('#lastBets').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastBets').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Главная</span></a>

                        </li>
                        <li class="dropdown nav-item " id="gg" onclick="$('.dsec').hide();$('#realGame').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#realGame').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Абсолютно честно</span></a>

                        </li>
                        <li class="dropdown nav-item " onclick="$('.dsec').hide();$('#rules').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#rules').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Простая игра</span></a>
                        </li>

												<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#contacts').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#contacts').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Связь</span></a>
                        </li>
						<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#lastWithdraw').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastWithdraw').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Выплаты</span></a>
                        </li>
						<button style="margin-top:12px;float:right;" class="flat_button logo_button  color3_bg" onclick="window.open('https://vk.com/public183361920');">Вконтакте</button>
                    </ul>
                </div>

HERE;

$go = <<<HERE
	
					                         <div class="row">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="card-body" style="box-shadow: rgba(210, 215, 222, 0.5) 7px 10px 23px -11px;border-radius: 6px!important;">
                                        <div class="row">
                                            <div class="col-lg-6  col-md-12 col-sm-12 ">
                                                <div id="what-is" class="card">
                                                    <div  class="card-header"   style="border-radius: 4px!important;">
                                                        <h4 class="card-title"><b>rainemoney</b></h4>

                                                    </div>
                                                    <div class="card-body collapse in">
                                                        <div class="card-block">
                                                            <div class="card-text">
                                                                <p style="font-size:15.5px">Сервис мгновенных игр, где шанс выигрыша указываете сами. </p>
                                                                <ul>
                                                                    <li>Отличная рефералка</li>
                                                                    <li>Различные способы выплат</li>
                                                                    <li>Можно проверить игру на честность</li>
                                                                    <li>Пополнения от 1N</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6  col-md-12 col-sm-12 ">
                                                <div id="login">
                                                    
                                                    <div class="col-lg-10 offset-lg-1">
													<div class="card-header no-border pb-0">
                                                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size:17px"> Авторизация </span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                                <form class="form-horizontal">
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="userLogin" value="" placeholder="Логин"  >
                                                                        <div class="form-control-position">
                                                                            <i class="ft-user"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="password" class="form-control form-control-md input-md" id="userPass" placeholder="Пароль">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-lock"></i>
                                                                        </div>
                                                                    </fieldset>
																	<div style="padding-bottom:11px" class="g-recaptcha" data-sitekey=""></div>
																
                                                                    <a id="error_enter" class="btn  btn-block btnError" style="color:#fff;display:none"></a>

                                                                    <a id="enter_but" onclick="login()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px">
                                                                        <center><span id="text_enter"> <i class="ft-unlock"></i>  Войти</span>

                                                                            <div id="loader" style="position:absolute">
                                                                                <div id='dot-container' style='display:none'>
                                                                                    <div id="left-dot" class='white-dot'></div>
                                                                                    <div id='middle-dot' class='white-dot'></div>
                                                                                    <div id='right-dot' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer no-border" style="margin-top:-12x">
                                                            <p class="float-sm-left text-xs-center"><a onclick="register_show()" class="card-link">Регистрация</a></p>
                                                            <p class="float-sm-right text-xs-center"><a onclick="reset_show()" class="card-link">Забыли пароль? </a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="register" style="display:none">
                                                   
                                                    <div class="col-lg-10 offset-lg-1">
													 <div class="card-header no-border pb-0" >
                                                        <h6  class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size:17px">Регистрация </span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                                <form class="form-horizontal" >
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="userLoginRegister" placeholder="Логин">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-user"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="email" class="form-control form-control-md input-md" id="userEmailRegister" placeholder="E-mail">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-mail"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="password" class="form-control form-control-md input-md" id="userPassRegister" placeholder="Пароль">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-lock"></i>
                                                                        </div>
                                                                    </fieldset>
																	<fieldset style="padding-bottom: 7px;">
																		<label class="check1">
																		  <input id="rulesagree" type="checkbox"/>
																		  <div class="box1"></div>
																		 
																		 
																		</label>
																		 <div style="display:inline-block;padding-left:10px;position:absolute">Согласен c <u data-toggle="modal" data-target="#large" style="cursor:pointer">правилами</u></div>

																	
																	
																	<div style="padding-bottom:11px" class="g-recaptcha" data-sitekey=" "></div> 
                                                                    <a id="error_register" class="btn  btn-block btnError" style="color:#fff;display:none"></a>
                                                                    <a onclick="register1()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px">

                                                                        <center><span id="text_register"><i class="ft-check"></i> Зарегистрироваться</span>

                                                                            <div id="loader_register" style="position:absolute">
                                                                                <div id='dot-container_register' style='display:none'>
                                                                                    <div id="left-dot_register" class='white-dot'></div>
                                                                                    <div id='middle-dot_register' class='white-dot'></div>
                                                                                    <div id='right-dot_register' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer no-border" style="margin-top:-12px">
                                                            <p class="float-sm-left text-xs-center"><a onclick="login_show()" class="card-link">Есть аккаунт</a></p>
                                                            <p class="float-sm-right text-xs-center"><a onclick="reset_show()" class="card-link">Забыли пароль? </a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="reset" style="display:none">
                                                    
                                                    <div class="col-lg-10 offset-lg-1">
													<div class="card-header no-border pb-0">
                                                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size:17px">Вспомнить пароль</span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                             
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="loginemail" placeholder="Логин или E-mail">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-search"></i>
                                                                        </div>
                                                                    </fieldset>
																	<div style="padding-bottom:11px" class="g-recaptcha" data-sitekey=" "></div> 
                                                                    <a id="error_reset" class="btn  btn-block btnError" style="color:#fff;display:none"></a>
                                                                    <a id="reset_success" class="btn  btn-block btnSuccess" style="color:#fff;display:none"></a>
                                                                    <a  id="reset_but" onclick="reset_password()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px">

                                                                        <center><span id="text_reset"><i class="ft-check"></i> Вспомнить</span>

                                                                            <div id="loader_reset" style="position:absolute">
                                                                                <div id='dot-container_reset' style='display:none'>
                                                                                    <div id="left-dot_reset" class='white-dot'></div>
                                                                                    <div id='middle-dot_reset' class='white-dot'></div>
                                                                                    <div id='right-dot_reset' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>                                                               
                                                            </div>
                                                        </div>
 
                                                        <div class="card-footer no-border" style="margin-top:-12px">
                                                            <p class="float-sm-left text-xs-center"><a onclick="login_show()" class="card-link">Есть аккаунт</a></p>
                                                            <p class="float-sm-right text-xs-center"><a onclick="register_show()" class="card-link">Регистрация </a></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
HERE;
	
}
}

?>