<?php
use Illuminate\Support\Facades\Auth;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- todo: подумать как передавать сюда параметр, который будет переводиться на языки -->
    @if(isset($title))
        <title>SquadyFinder - {{ $title }}</title>
    @else
        <title>SquadyFinder - {{ trans('common.app_title') }}</title>
    @endif

    <!-- Stylesheets -->
    <link rel="shortcut icon" href="<?php echo url('/'); ?>/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/libs/font-awesome.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/libs/video-js.css">

    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/animate.css">

</head>
<body>
<header class="header-section">
    <div class="container">
        <div class="row">
            <div class="logo-container col-md-3">
                <a href="<?php echo url('/'); ?>">SQUADY<font color="black">FINDER</font></a>
            </div>
            <div class="navigation-menu col-md-6">
                <ul>
                    <li><a href="<?php echo url('/'); ?>">{{ trans('home_menu.home') }}</a></li>
                    <li><a href="<?php echo url('/'); ?>/people/all">{{ trans('home_menu.people') }}</a></li>
                    <li><a href="<?php echo url('/'); ?>/teams/all ">{{ trans('home_menu.teams') }}</a></li>
                    <li><a href="<?php echo url('/'); ?>/help">{{ trans('home_menu.help') }}</a></li>
                    <li><a href="<?php echo url('/'); ?>/contacts">{{ trans('home_menu.contact') }}</a></li>
                </ul>
            </div>

            <!-- todo: Добавить смену языка -->
            @if(Auth::guest())
                <div class="second-navigation-menu col-md-3">
                    <ul>
                        <li><a href="<?php echo url('/'); ?>/auth/login">{{ trans('common.login') }}</a></li>
                        <li class="active"><a
                                    href="<?php echo url('/'); ?>/auth/register">{{ trans('common.register') }}</a></li>
                    </ul>
                </div>
            @else
                <div class="second-navigation-menu col-md-3">
                    <ul>
                        <li><a href="/home">{{ trans('common.hello') }}, <strong>{{ Auth::user()->name }}</strong></a>
                            <sup>
                                <?php
                                if (isset($notifications)) {
                                    if ($notifications != null) {
                                        echo '+' . count($notifications);
                                    }
                                }
                                ?>
                            </sup></li>
                        <li class="active"><a href="<?php echo url('/'); ?>/auth/logout">{{ trans('common.logout') }}</a></li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</header>

@yield('main_content')

<footer id="footer">

    <div class="footer-main-container">
        <div class="container">
            <div class="row">

                <div class="col-md-3 footer-main-item">
                    <h3>Основное меню</h3>
                    <ul>
                        <li><a href="<?php echo url('/'); ?>">{{ trans('home_menu.home') }}</a></li>
                        <li><a href="<?php echo url('/'); ?>/people/all">{{ trans('home_menu.people') }}</a></li>
                        <li><a href="<?php echo url('/'); ?>/teams/all ">{{ trans('home_menu.teams') }}</a></li>
                        <li><a href="<?php echo url('/'); ?>/help">{{ trans('home_menu.help') }}</a></li>
                        <li><a href="<?php echo url('/'); ?>/contacts">{{ trans('home_menu.contact') }}</a></li>
                    </ul>
                </div>

                <div class="col-md-3 footer-main-item">
                    <h3>Возможности</h3>
                    <ul>
                        <li><a href="<?php echo url('/'); ?>/people/all">Поиск специалистов</a></li>
                        <li><a href="<?php echo url('/'); ?>/teams/all?triggerTeamSearch=true">Поиск команды</a></li>
                        <hr>
                        <li><a href="<?php echo url('/'); ?>/information/for-developers">Для разработчиков</a></li>
                        <li><a href="<?php echo url('/'); ?>/information/for-leads">Для руководителей проектов</a></li>
                    </ul>
                </div>

                <div class="col-md-3 footer-main-item">
                    <h3>Для тебя</h3>
                    <ul>
                        <li><a href="<?php echo url('/'); ?>/auth/register">Регистрация</a></li>
                        <li><a href="<?php echo url('/'); ?>/auth/login">Вход в учетную запись</a></li>
                        <hr>
                        <li><a href="<?php echo url('/'); ?>/information/project-assist">Поддержка проекта</a></li>
                        <li><a href="<?php echo url('/'); ?>/information/vps-server">VPS-сервер</a></li>
                    </ul>
                </div>

                <div class="col-md-3 footer-main-item">
                    <h3>Социальные сети</h3>
                    <ul>
                    <!--
                        <li><a href="<?php echo url('/'); ?>/">ВКонтакте</a></li>
                        <li><a href="<?php echo url('/'); ?>/">Twitter</a></li>
                        <li><a href="<?php echo url('/'); ?>/">Facebook</a></li>
                        <li><a href="<?php echo url('/'); ?>/">Google Plus</a></li>
                        -->
                        <li><a href="https://squadyfinder.stamplayapp.com/">Slack Чат</a></li>

                    </ul>
                </div>

            </div>
        </div>


    </div>


    <div class="container footer-cred">
        <div class="row">
            <div class="footer-about col-md-12 align-center">
                <a id="footer-logo" href="javascript:void(0);">SQUADY<font color="black">FINDER</font></a><br>
                <p>Проект разработан и поддерживается <a target="_blank" href="http://vladimir-rodin.com">Владимиром
                        Родиным</a></p>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?php echo url('/'); ?>/js/jquery-2.1.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.0.0/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo url('/'); ?>/js/main.js"></script>
<script src="http://vjs.zencdn.net/5.9.2/video.js"></script>

<!-- todo: добавить аналитику из шаблонов -->

</body>

</html>
