<?php
require("inc/config.php");
require("inc/main.php");
?>
    <!DOCTYPE html>
<link rel="shortcut icon" href="../files/fav_logo.ico" />
    <html lang="ru" >

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="referrer" content="no-referrer">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="rainemoney МОМЕНТАЛЬНАЯ ЛОТЕРЕЯ">
        <meta name="keywords" content="">
        <meta name="author" content="rainemoney.fun">
        <title>rainemoney
        </title>
        <link rel="stylesheet" type="text/css" href="./files/palette-climacon.css">
        <link rel="stylesheet" type="text/css" href="./files/style.min(1).css">
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN STACK JS-->
        <link rel="stylesheet" type="text/css" href="./files/css.css" >
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="./files/bootstrap.min.css?v=10">
        <link rel="stylesheet" type="text/css" href="./files/style.minn.css">
        <link rel="stylesheet" type="text/css" href="./files/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./files/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="./files/morris.css">
        <link rel="stylesheet" type="text/css" href="./files/emoji.css">
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?154"></script>

        <link rel="stylesheet" type="text/css" href="./files/climacons.min.css">
        <link rel="stylesheet" type="text/css" href="./files/loader-gg.css">
        <!-- END VENDOR CSS-->
        <!-- BEGIN STACK CSS-->
        <link rel="stylesheet" type="text/css" href="./files/bootstrap-extended.min.css?v=13">
        <link rel="stylesheet" type="text/css" href="./files/app.min.css?v=2">
        <link rel="stylesheet" type="text/css" href="./files/colors.min.css?v=2">
        <!-- END STACK CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="./files/horizontal-menu.min.css?v=3">
		<link rel="stylesheet" href="./files/right-nav-style.css">
        <link rel="stylesheet" type="text/css" href="./files/vertical-overlay-menu.min.css">
        <!-- link(rel='stylesheet', type='text/css', href='../../../app-assets/css#{rtl}/pages/users.css')-->
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="./files/style.css">
        <!-- END Custom CSS-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>		
<style> body { background: url(https://images.wallpaperscraft.com/image/gray_white_spots_abstraction_faded_65625_1920x1080.jpg); } </style>
	




	</head>
<script language="javascript" type="text/javascript">
window.onerror = myOnError;
function myOnError(msg, url, lno) {
return true;
}
</script>
<body class="horizontal-layout horizontal-menu 2-columns pace-running menu-collapsed"><div class="pace pace-active"><div class="pace-progress" data-progress-text="99%" data-progress="99" style="transform: translate3d(99.9979%, 0px, 0px);"> <div class="pace-progress-inner"></div></div><div class="pace-activity"></div></div>

 <nav class="header-navbar navbar navbar-with-menu navbar-static-top navbar-light navbar-border navbar-brand-center" style="background:#404040;color:#fff" data-nav="brand-center">
            <div class="navbar-wrapper">
                <div class="navbar-header">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="" class="nav-link nav-menu-main menu-toggle hidden-xs" style="background:#404040;color:#fff">
						<i class="ft-menu font-large-1"></i>
						</a></li>
                        <img src="files/log0.png" style="margin-top:4px">
                        </li>
                       
                    </ul>
                </div>

            </div>
        </nav>

													
        <div id="sticky-wrapper" class="sticky-wrapper h66" >
            <div role="navigation" data-menu="menu-wrapper" class="header-navbar navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border navbar-brand-center" data-nav="brand-center" style="background-color:#696969;color:#fff">
                <!-- Horizontal menu content-->
<?php
echo $panel;
?>                
				</div>
        </div>

        <div class="app-content container center-layout mt-2">
            <div class="content-wrapper">

                <div class="content-body">
												
<?php
echo $go;
?>

                                                    
                                                        <div class="row dsec" id="lastBets" style="display:block">
                                        <div class="col-xs-12">
                                            <div  style="border-radius:20px!important;background:#696969;color:#FFFF00">
                                                <div  class="card-header"   style="border-radius: 24px!important;-webkit-user-select: none;-moz-user-select: none;background:#696969;color:#FF8C00">
                                                         <h4 class="card-title" style=""><b>Последние игры</b></h4> <div  style="margin-top: -13px;margin-left: 177px;display: inline-block;position: absolute;"
                                                   
                                                     
													<div class="heading-elements">
                                                        <ul class="list-inline mb-111">

                                                        </ul>
                                                    </div>
													 
                                                </div>
                                                <div class="card-body collapse in" style="-webkit-user-select: none;-moz-user-select: none">

                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
															
                                                                <tr style="cursor:default!important" class="polew">
                                                                    <th style="width:20%" >Игрок</th>
                                                                    <th>Число</th>
                                                                    <th>Цель</th>
                                                                    <th style="width:14%">Сумма</th>
                                                                    <th>Шанс</th>
                                                                    <th>Выигрыш</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="response">
																<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
<tr><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td><td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;" class="progress progress-sm mb-0" value="0" max="100"></progress></span></td></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <section id="realGame" class="dsec" style="display:none; border-radius:20px!important;" >
                                        <div  class="card-header"   style="">
                                            <h4 class="card-title "><b>Абсолютно честно</b></h4>

                                        </div>
                                        <div class="card-body collapse in" style="color:#fff;background:#606060">
                                            <div class="card-block">
                                                <div class="card-text">
                                                    <p>Перед каждой игрой генерирутеся строка алгоритмом SHA-512 </a> в которой содержится <a href="https://ru.wikipedia.org/wiki/%D0%A1%D0%BE%D0%BB%D1%8C_(%D0%BA%D1%80%D0%B8%D0%BF%D1%82%D0%BE%D0%B3%D1%80%D0%B0%D1%84%D0%B8%D1%8F)" target="_blank">соль</a> и победное число (от 0 до 999999). Можно сказать, что перед Вами зашифрованный исход данной игры. Метод гарантирует <b>100% честность</b>, так как результат игры Вы видите заранее, а при изменении победного числа приведет к изменению Hash.</p>

                                                    Проверяйте самостоятельно:
                                                    <ul>
                                                        <li>Скоприруйте Hash до начала игры</li>
                                                        <li>После окончания нажмите <code class="highlighter-rouge">"Проверить игру"</code></li>
                                                        <li>Откроется окно с результатом</li>
                                                        <li>Скопируйте вручную поля c Победным числом</li>
                                                        <li>Вставьте в любой независимый SHA-512 генератор (Например: <a href="https://emn178.github.io/online-tools/sha512.html" target="_blank">Ссылка 1</a> <a href="https://www.md5calc.com/sha512" target="_blank">Ссылка 2</a> <a href="https://passwordsgenerator.net/sha512-hash-generator/" target="_blank">Ссылка 3</a>)</li>
                                                        <li>Hash должен совпадать c Hash до начала игры</li>

                                                    </ul>
                                                    Например:
                                                    <ul>
                                                        <li>Hash до начала игры: 9008354d492a2678fb81a33464a06f06ab6639998d4be7864d04acf3d72921962ad42fd86a9b5d985abe607de4de1cfcef526eefd1ab0e5de6bba6b69b6813e4 </li>
                                                        <li>Победное число: 366209</li>
														<li>После окончания нажали на "Проверить игру", открылось <a>окно</a></li>
                                                        <li>Копируем значения Победного числа</li>
                                                        <li>Получаем строку <code class="highlighter-rouge">366209</code></li>
                                                        <li>Вставляем строку в <a href="https://emn178.github.io/online-tools/sha512.html" target="_blank">генератор</a> </li>
                                                        <li>Получили hash как и до начала игры</li>

                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section id="rules" class="dsec" style="display:none; border-radius:20px!important;">
                                        <div  class="card-header"   style="">
                                            <h4 class="card-title "><b>Как играть</b></h4>

                                        </div>
                                        <div class="card-body collapse in" style="color:#fff;background:#606060">
                                            <div class="card-block">
                                                <div class="card-text">

                                                    <ul>
                                                        <center><h4><b>DICE</b></h4></center>
                                                        <li>Укажите размер ставки и свой шанс выигрыша. Будет показан возможный (расчетный) выигрыш от вашей ставки.</li>
                                                        <li>Выбираете промежуток больше или меньше.</li>
                                                        <li><a style="color: #00A5A8;" onclick="$('.dsec').hide();$('#realGame').show();$('#main-menu-navigation  li').removeClass('active');$('#gg').addClass('active');">Заранее генерируется число от 0 до 999 999</a>. Если число находится в пределах диапазона больше/меньше , который вы выбрали,вы выигрываете.</li>
 <center><h4><b>Коинфлип</b></h4></center>
  <li>Выберите сторону, если ваша сторона победила, вы получите выигрыш в двухкратном размере!</li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </section> 
									<div class="row dsec" id="lastWithdraw" style="display:none; border-radius:20px!important;"">
                                        <div class="col-xs-12">
                                            <div  style="border-radius:20px!important;">
                                                <div class="card-header" style="">
                                                    <h4 class="card-title"><b>Последние выплаты</b></h4>
                                                   
                                                     
													
													 
                                                </div>
                                                <div class="card-body collapse in" style="color:#fff;background:#606060">

                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
															
                                                                <tr class="polew">
                                                                    <th>ID Игрока</th>
                                                                    <th>Сумма</th>
                                                                    <th>Валюта</th>
                                                                    <th>Кошелек</th>
                                                                </tr>
                                                            </thead>
                                                           
                                                            <tbody>
<?php
$sql_select22 = "SELECT * FROM svuti_payout ORDER BY `data` DESC LIMIT 20";
$result22 = mysql_query($sql_select22);
$row22 = mysql_fetch_array($result22);
do
{
$num = substr_replace($row22['qiwi'],'****',-4);
echo <<<HERE
$payout
<tr style="cursor:default!important"><td>$row22[user_id]</td><td>$row22[suma] N<td><img src="files/qiwi.png"></td><td>$num</td></tr>
HERE;

$num = "";
}
while($row22 = mysql_fetch_array($result22));
?>
															</table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<noindex><section id="contacts" class="dsec" style="display:none;border-radius:20px!important;">
                                        <div  class="card-header"   style="">
                                            <h4 class="card-title "><b>Связь</b></h4>

                                        </div>
                                        <div class="card-body collapse in" style="color:#fff;background:#606060">
                                            <div class="card-block">
                                                <div class="card-text">

                                                  
                                                        <h6>Для связи с администрацией пишите в <a href="https://vk.com/im?media=&sel=-" target="_blank">support</a></h6>

                 

                                                 

                                                </div>
                                            </div>
                                        </div>
                                    </section> 
									<section id="comment" class="dsec" style="display:none;border-radius:20px!important;">
                                        <div  class="card-header"   style="">
                                            <h4 class="card-title "><b>Отзывы</b></h4>

                                        </div>
                                        <div class="card-body collapse in" style="color:#fff;background:#606060">
                                            <div class="card-block">
                                                <div class="card-text">
<script type="text/javascript">
  VK.init({apiId: 6482985, onlyWidgets: true});
</script>

<div id="vk_comments"></div>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"});
</script>
                 

                                                 
</div>
                                                
                                            </div>
                                        </div>
                                    </section>
									<section id="referals" class="dsec"  style="display:none;border-radius:20px!important;">
                                	<div class="row ">
                                        <div class="col-xs-12">
                                            <div  style="border-radius:20px!important;">
                                                <div  class="card-header"   style="">
                                                    <h4 class="card-title "><b>Ваша реферальная ссылка: </b> <span style="text-transform:none!important">https://rainemoney.fun/?i=<?php echo $idref; ?>

                                                </div>
                                                <div class="card-body collapse in" style="color:#fff;background:#606060">
												<div class="card-block card-dashboard">
                    Получайте 10% с каждого пополнения баланса реферала
                </div>
																	
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                       <thead>
                            <tr >
<?php
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
echo <<<HERE
		                                <th></th>
                                <th></th>
                                <th class="text-xs-center">Дата</th>
                                <th class="text-xs-center">Пользователь (Всего: $count)</th>
                                <th class="text-xs-center">Принес (Всего: $sumapeys  N) </th>
                                <th></th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tbody>
HERE;
$sql_select22 = "SELECT * FROM svuti_users WHERE referer='$idref' ORDER BY `data_reg` DESC";
$result22 = mysql_query($sql_select22);
$row22 = mysql_fetch_array($result22);
do
{

$sql_select4232 = "SELECT SUM(suma) FROM svuti_payments WHERE user_id=".$row22['id'];
$result4232 = mysql_query($sql_select4232);
$row4232 = mysql_fetch_array($result4232);

	$sumapey2 = $row4232['SUM(suma)'];

$sumapey2 = ($sumapey2 / 100) * 10;

echo <<<HERE
<tr style="cursor:default!important">
<td></td>
<td></td>
<td>$row22[data_reg]</td>
<td>$row22[login]</td>
<td>$sumapey2 N</td>
<td></td>
<td></td>
</tr>
HERE;

$num = "";
$refbank = "";
}
while($row22 = mysql_fetch_array($result22));
?></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </section>
								

                </noindex>
				
				<div style="display:none">
				<h1>rainemoney - Никаких комиссий и сборов, быстрые выводы, абсолютно честно и моментально. Получите бонус при первой регистрации!</h1>
				</div>
				</div>
            </div>
			<br>
<center>
			<noindex><span style="cursor:default;margin-top:-13px;padding-bottom:14px;color:#fff">
			rainemoney</span>
			
			<span data-toggle="modal" data-target="#large" style="cursor:pointer;margin-top:-15px;padding-bottom:14px;color:#fff;padding-left:10px;">
			Правила сервиса&nbsp;&nbsp;
			<a style="opacity:5" href="//www.free-kassa.ru/"><img src="//www.free-kassa.ru/img/fk_btn/4.png" style="height:25px"></a></span>

</div>
		</noindex>	</center>
        </div>
        

       
 	<noindex>
	
	<div class="modal fade text-xs-left in" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display: none; ">
									  <div class="modal-dialog modal-lg" role="document">
										<div class="modal-content" style="background:#606060;color:#606060">
										  <div class="modal-header" style="background-color:#303030;color:#fff;">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" id="myModalLabel17">Правила</h4>
										  </div>
										  <div class="modal-body">
											<h5>1.Основные правила</h5>
											<h5>1.1.Запрещенно регистрировать более 1-й ученной записи, за регистрацию более одной учётной записи,аккаунт может быть удален, а баланс аннулирован.</h5>
											<h5>1.2 За использование уязвимостей сайта - ваш аккаунт будет заблокирован.</h5> 
											<h5>1.3 Учтите что вы играете на игровую валюту N - но не на реальные деньги.</h5> 
											<h5>1.4 При выводе бонусных средств может быть отказанно, если вы нарушили правило 1.7, 1.8 ,1.1</h5> 
											<h5>1.5 При выводе баланса вы должны отыграть свой баланс, к примеру: если пополнили 50N вы должны сделать более 10 ставок на сумму более 5N.</h5>  
											<h5>1.5 Правила могут изменится в любой момент без предупреждений пользователей.</h5> 
											<h5>1.6 Вывод средств осуществляется от 1 минуты до 32 часов , если вывод не поступил свяжитесь с техподдержкой.</h5>
											<h5>1.7 Максимальная сумма для вывода с промокода,ежедневного бонуса не более 50N!</h5>
											<h5>1.8  У нас запрещено использовать фейк данные, указывайте актуальную почту при регистрации, выводы не будут подтверждаться тем у кого логин или почта, просто набор букв.</h5>  </div>. </p>
										
										  
										</div>
									  </div>
									</div></noindex>
									
<?php
echo $modal;
?>									
									
									<!-- JS -->
										 <script src='https://www.google.com/recaptcha/api.js'></script>
		 <script src="./files/js.cookie.js" type="text/javascript"></script>
        <script src="./files/jquery-latest.min.js"></script>
		<script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>
		<script src="./files/vendors.min.js" type="text/javascript"></script>
        <script src="./files/popover.min.js" type="text/javascript"></script>
        <script src="./files/raphael-min.js" type="text/javascript"></script>
        <script src="./files/morris.min.js" type="text/javascript"></script>
        <script src="./files/app-menu.min.js" type="text/javascript"></script>
        <script src="./files/app.min.js" type="text/javascript"></script>
        <script src="./files/odometer.js"></script>
        <script type="text/javascript" src="/files/script.js?v=27"></script>
		<!-- HelloPreload https://hello-site.ru/preloader/ -->
<style type="text/css">#hellopreloader>p{display:none;}#hellopreloader_preload{display: block;position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 1000px;background: #A2DED0 url(https://hello-site.ru//main/images/preloads/three-dots.svg) center center no-repeat;background-size:56px;}</style>
<div id="hellopreloader"><div id="hellopreloader_preload"></div><p><a href="https://hello-site.ru">Hello-Site.ru. Бесплатный конструктор сайтов.</a></p></div>
<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},1500);};</script>
<!-- HelloPreload https://hello-site.ru/preloader/ -->
        	 </body>
</html>