<!-- All pages heфder -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="<?=$main_host?>assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title><?= $site_tittle ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <!-- Bootstrap core CSS     -->
    <link href="<?=$main_host?>assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Animation library for notifications   -->
    <link href="<?=$main_host?>assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?=$main_host?>assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?=$main_host?>assets/css/demo.css" rel="stylesheet"/>
    <script src="<?=$main_host?>assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?=$main_host?>assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-image="<?=$main_host?>assets/img/sidebar-4.jpg">
        <div class="sidebar-wrapper">
            <div class="logo" style="padding:5px 10px 5px 35px;">
                <a href="/<?=$htdocs_host?>" class="simple-text">
                    <img src="<?=$main_host?>assets/img/logo.png" style="width:160px;">
                </a>
            </div>
            <ul class="nav">
                <li class="<?php if ($menu_active == 1) {
                    echo active;
                } ?>">
                    <a href="/virtual/">
                        <i class="pe-7s-monitor"></i>
                        <p>Управление</p>
                    </a>
                </li>
                <li class="<?php if ($menu_active == 2) {
                    echo active;
                } ?>">
                    <a href="/virtual/user/">
                        <i class="pe-7s-user"></i>
                        <p>Пользователь</p>
                    </a>
                </li>
                <?php if ($isadmin): ?>
                    <li class="<?php if ($menu_active == 3) {
                        echo active;
                    } ?>">
                        <a href="/virtual/administration/">
                            <i class="pe-7s-plugin"></i>
                            <p>Виртуальные среды</p>
                        </a>
                    </li>
                    <li class="<?php if ($menu_active == 4) {
                        echo active;
                    } ?>">
                        <a href="/virtual/virtualmachines/">
                            <i class="pe-7s-monitor"></i>
                            <p>Шаблоны ВМ</p>
                        </a>
                    </li>
                <?php endif; ?>
                <!--<li class="<?php if ($menu_active == 5) {
                    echo active;
                } ?>">
                    <a href="/virtual/settings/">
                        <i class="pe-7s-config"></i>
                        <p>Настройки</p>
                    </a>
                </li>-->

                <li class="active-pro <?php if ($menu_active == 1) {
                    echo active;
                } ?>">
                    <a href="/virtual/about/">
                        <i class="pe-7s-notebook"></i>
                        <p>О приложении</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a><?php if ($isadmin) {
                                    echo 'Вы вошли как администратор';
                                }
                                else {
                                    echo 'Вы вошли как студент';
                                }?></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li style="position:relative; right:-25px;">
                            <a href="#">
                                <?= $USER->firstname ?>
                                <?= $USER->lastname ?>
                            </a>
                        </li>
                        <li><a><i style="font-size: 40px; line-height: 20px;" class="pe-7s-user-female"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>