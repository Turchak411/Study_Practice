<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/template/css/bootstrap.css">
    <link rel="stylesheet" href="/template/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/template/css/style.css">
</head>
<body>
<div>
    <code><? print_r($_SESSION) ?><br><? if (isset($_POST)) print_r($_POST) ?></code>
</div>
<nav class="navbar navbar-default navbar-static-top header">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Airlines</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Главная <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?
                if (Auth::isGuest()) {
                    ?>
                    <li><a href="/user/login">Войти</a></li>
                    <?
                } else {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Профиль пользователя<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/profile">Профиль</a></li>
                            <li><a href="/profile/edit">Редактировать</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/user/logout">Выйти</a></li>
                        </ul>
                    </li>
                    <?
                }
                ?>


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-2">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header">Меню</li>
                    <li><a href="/airlines">Авиалинии</a></li>
                    <li><a href="/airplanes">Самолеты</a></li>
                    <li><a href="/services">Обслуживающие компании</a></li>
                </ul>
            </div><!--/.well -->
        </div><!--/span-->
        <div class="col-lg-9 col-md-10">
