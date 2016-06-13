@extends('master')

<?php use Illuminate\Support\Facades\Auth; use Illuminate\Support\Facades\DB; ?>

@section('main_content')

    <!-- Video Slider -->
    <section class="homepage-hero-module">
        <div class="video-container slider">
            <div class="filter"></div>
            <div class="overlay"></div>
            <video autoplay loop class="fillWidth">
                <source src="<?php echo url('/') ?>/videos/slider.mp4" type="video/mp4"/>
                <source src="<?php echo url('/') ?>/videos/slider.webm" type="video/webm"/>
            </video>
            <div class="poster hidden">
                <img src="<?php echo url('/') ?>/videos/slider.jpg" alt="Welcome To SquadyFinder">
            </div>

            <div class="title">
                <h1>{{ trans('home_page.slider_title') }}</h1>
            </div>

            <div class="description">
                <p>Проект, который облегчает поиск команд и специалистов в области веб-разработки</p>
            </div>

            <div class="slider-buttons">
                @if(\Illuminate\Support\Facades\Auth::user())
                    <ul>
                        <li><a href="<?php echo url('/'); ?>/home">Личный кабинет</a></li>
                        <li><a href="<?php echo url('/'); ?>/user-profile/settings/team-settings">Настройки
                                команды</a></li>
                    </ul>
                @else
                    <ul>
                        <li><a href="<?php echo url('/'); ?>/auth/register">Создать новую команду</a></li>
                        <li><a href="<?php echo url('/'); ?>/teams/all">Поиск команды</a></li>
                    </ul>
                @endif
            </div>
            <div class="statistics">
                <div class="container">
                    <div class="row">
                        <div class="statistics-item col-md-3">
                            <span class="count">{{ DB::table('users')->count() }}</span>
                            <p>пользователей</p>
                        </div>
                        <div class="statistics-item col-md-3">
                            <span class="count">{{ DB::table('teams')->count() }}</span>
                            <p>команд</p>
                        </div>
                        <div class="statistics-item col-md-3">
                            <span class="count">{{ DB::table('result_subscribing_user_notifications')->count() }}</span>
                            <p>заявок</p>
                        </div>
                        <div class="statistics-item col-md-3">
                            <span class="countt">∞</span>
                            <p>идей</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <section class="call-to-action">
        <div class="container">
            <div class="row">

                @if(\Illuminate\Support\Facades\Auth::user())
                    <h4>Настрой свою команду и находи разработчиков со всего мира</h4>
                    <div class="default-button center-block">
                        <a href="<?php echo url('/'); ?>/user-profile/settings/team-settings">Настройки
                            команды</a></li>
                    </div>
                @else
                    <h4>Пройди бесплатную регистрацию и начни работать во имя прекрасных идей</h4>
                    <div class="default-button center-block">
                        <a href="<?php echo url('/'); ?>/auth/register">Регистрация</a></li>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- For Developers -->
    <section class="try">
        <div class="container">
            <div class="row">
                <div class="col-md-7 video-section">
                    <video id="my-video" class="video-js" controls preload="auto" width="640" height="372"
                           poster='<?php echo url('/') ?>/videos/for-developers-cover.png'
                           data-setup=''> >
                        <source src="<?php echo url('/') ?>/videos/for-developers.mp4" type='video/mp4'>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser
                            that
                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                video</a>
                        </p>
                    </video>
                </div>
                <div class="col-md-5">
                    <div class="container-title">
                        <h1>Для веб-разработчиков</h1>
                        <div class="separator"></div>
                    </div>
                    <div class="container-description">
                        {{--<img src="images/default/home-image-1.png"/>--}}
                        <p>Возможно, ты хороший специалист и желаешь принять участие в новых и интересных проектах?
                            <br><br>
                            Данный проект позволит тебе найти хорошую команду и принять участие в работе над
                            превосходными идеями.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- For Leads -->
    <section class="try backgrey">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="container-title">
                        <h1>Для тим-лидеров</h1>
                        <div class="separator"></div>
                    </div>
                    <div class="container-description">
                        <p>Вполне вероятно, у тебя есть смелая идея, но нет команды для ее реализации, или твоей
                            команде нужны дополнительные ресурсы?
                            <br><br> SquadyFinder поможет тебе найти высококвалифицированных специалистов.
                        </p>
                    </div>
                </div>
                <div class="col-md-7 video-section">
                    <video id="my-video" class="video-js" controls preload="auto" width="637" height="385"
                           poster='<?php echo url('/') ?>/videos/for-leads-cover.png'
                           data-setup=''> >
                        <source src="<?php echo url('/') ?>/videos/for-leads.mp4" type='video/mp4'>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser
                            that
                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                video</a>
                        </p>
                    </video>
                </div>
            </div>
        </div>
    </section>

    <!-- Last Registred Teams -->
    <section class="last-teams">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    <h1>Последние команды</h1>
                    <div class="separator"></div>

                    <div id="team-content-all" class="team-content-all"
                         style="margin-top: 40px; margin-bottom: 50px;">
                        @foreach($teams as $team)
                            <div class="col-md-4 grid-item">
                                <div class="card">
                                    <img class="card-img"
                                         src="<?php echo url('/') ?>/{{ $team->image_href }}"
                                         alt="Card image cap">
                                    <div class="card-block">
                                        <h4 class="card-title">{{ $team->team_name }}</h4>
                                        <p class="card-text">{{ $team->team_short_description }}</p>
                                        <hr>
                                        <div class="team-add-info">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5>Команде нужны:</h5>
                                                    @include('templates/team-templates/all-teams-specs')
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Доп. информация</h5>
                                                    @include('templates/team-templates/all-information')
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="show-team">
                                            <a href="<?php echo url('/') ?>/teams/team/{{ $team->id }}">На страницу команды</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="center-block">
                        <div class="default-button-red">
                            <a href="<?php echo url('/') ?>/teams/all">Посмотреть остальные команды</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Call to action -->
    <section class="call-to-action subscribe ">
        <div class="container">
            <div class="row">
                <h4>Подпишись на имейл рассылку и всегда будь вкурсе последних новостей проекта</h4>
                <div class="default-button center-block">
                    <a href="#" class="cd-popup-trigger-subscribe">Подписаться</a>
                </div>
            </div>
        </div>

        <div class="cd-popup" role="alert">
            <form action="">
                <div class="cd-popup-container">
                    <p><i class="ion-email-unread"></i><br>
                        <label for="subscribe">Введите ваш email адрес:</label><br>
                        <input type="email" id="subscribe" class="full-input focus" name="subscribe" required>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </p>

                    <ul class="cd-buttons">
                        <li>
                            <a href="#" id="subscribeAction" class="subscribe">Подписаться на рассылку</a>
                        </li>
                    </ul>
                    <a href="#" id="subscribeActionSendButton"
                       class="cd-popup-close img-replace subscribeAction"></a>
                </div>
            </form>
        </div>
    </section>

    <!-- Tech used -->
    <section class="partners">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    <h1>Технологии</h1>
                    <div class="separator"></div>
                </div>
                <div class="partners-list">
                    <div class="container">
                        <div class="row">
                            <div class="partner-item col-md-3">
                                <img src="images/tech/laravel.png"/>
                            </div>
                            <div class="partner-item col-md-3">
                                <img src="images/tech/sass.png"/>
                            </div>
                            <div class="partner-item col-md-3">
                                <img src="images/tech/digitalocean.png"/>
                            </div>
                            <div class="partner-item col-md-3">
                                <img src="images/tech/jquery.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(Auth::guest())
        <!-- todo: добавить сюда форму регистрации - вытащить в отдельный шаблон -->
    @endif

@stop
