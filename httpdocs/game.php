<?php
require("inc/bd.php");
$id = $_GET['id'];
	$sql_select = sprintf("SELECT * FROM svuti_games WHERE id='%s'", mysql_real_escape_string($id));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
	$ida = $row['id'];
	$user_id = $row['user_id'];
	$cel = $row['cel'];
	$suma = $row['suma'];
	$chislo = $row['chislo'];
	$hash = $row['hash'];
	$salt12 = $row['salt1'];
	$salt22 = $row['salt2'];
	$win_summa = $row['win_summa'];
	$slat = $row['saltall'];
	
	$rand = $row['saltall'];
	$rande = preg_replace("/[^0-9]/", '', $rand);
	$rand = str_replace("$rande", "|{$rande}|", $rand);
$number = explode( '|', $rand )[1];
$salt1 = explode( '|', $rand )[0];
$namsalt1 = $salt1."|".$number."|";
$salt2 = str_replace($namsalt1, '', $rand);
}
if($ida >= 1)
{
?>
<!DOCTYPE html>

<html lang="ru" data-textdirection="ltr" class="loaded"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="../files/fav_logo.ico" />
    <title>rainemoney CHECK GAME №<?php echo $ida; ?></title>
	  <meta name="description" content="Что такое MONEY-WIN? Сервис мгновеных игр, где шанс выигрыша указываете сами. Быстрые выплаты без комиссий и прочих сборов.">
        <meta name="keywords" content="">
        <meta name="author" content="MONEY-WIN.pro">
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../files/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../files/style.min.css">
    <link rel="stylesheet" type="text/css" href="../files/font-awesome.min.css">

    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="../files/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../files/app.min.css">
    <link rel="stylesheet" type="text/css" href="../files/colors.min.css">

    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../files/style.css">
    <!-- END Custom CSS--><script src="https://code.jquery.com/jquery-latest.js"></script>
  </head>
  <body data-open="click" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns    menu-expanded " cz-shortcut-listen="true"><style> body { background: url(/files/tools.png); } </style>

 



    <div class="app-content container center-layout" style="padding-right:0px!important;">
      <div class="content-wrapper" style="width:102%">
       
        <div class="content-body"><!--native-font-stack -->





<section id="description-list-alignment">

<div class="row">
    <!-- Description lists horizontal -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><b>rainemoney.fun</b><small class="text-muted " style='font-size:90%;color:#ffa500!important'> #<?php echo $ida; ?></small></h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <div class="card-text">
                        
                        <dl class="row">
						<div class="table-responsive" >
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>ID Игрокa</th>
                                <th>Цель</th>
                                <th>Выпало</th>
                                <th>Сумма</th>
                                <th>Выигрыш</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="font-weight:600"><?php echo $user_id; ?></th>
                                <td style="font-weight:600"><?php echo $cel; ?></td>
                                <td style="font-weight:600"><?php echo $chislo; ?></td>
                                <td style="font-weight:600"><?php echo $suma; ?> N</td>
                                <td style="font-weight:600"><?php echo $win_summa; ?> N</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                            <dt class="col-sm-1 text-xs-right" ><br>Hash</dt>
                            <dd class="col-sm-11" >
						   <br><?php echo $hash; ?> </dd>
                            <dt class="col-sm-1 text-xs-right" >Salt 1</dt>
                            <dd class="col-sm-11" style="word-wrap:break-word;"><?php echo $salt1; ?></dd>
                           <dt class="col-sm-1 text-xs-right" >Number</dt>
						   <dd class="col-sm-11" style="word-wrap:break-word;"><?php echo $chislo; ?></dd>
						   <dt class="col-sm-1 text-xs-right" >Salt 2</dt>
                            <dd class="col-sm-11" style="word-wrap:break-word;"><?php echo $salt2; ?></dd>


                         
						   <dt class="col-sm-4 offset-sm-4" style="margin-top:70px">
						 <button type="button " id="sucText" style="color:#fff;background: #808080!important; border: 0px solid; " onclick="$('#sucText').html('Скопировано!')" class="btn   btn-block  btn-clipboard" data-clipboard-text="<?php echo $slat; ?>">Скопировать</button>
						
						 </dt> 
					
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Description lists horizontal-->
</div>
</section>
        </div>
      </div>
    </div>


    <script src="../files/clipboard.min.js" type="text/javascript"></script>
<script>
new Clipboard('.btn-clipboard');
</script>
  
<span id="sbmarwusasv5"></span></body></html>
<?php
}
else
{
	include("http://rainemoney.fun/error404.php");
}

?>