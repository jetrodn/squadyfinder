@extends('master')

@section('main_content')
    <section class="info-for-developers">
        <div class="container">
            <div class="row">

                <div class="container-title">
                    <h1>Для разработчиков</h1>
                    <div class="separator"></div>
                </div>

                <div class="short-description">
                    <p>SquadyFinder - это проект который позволит тебе найти команду для совместной разработки
                        веб-проекта и работы над действительно прекрасными идеями. Немного о том, какие возможности
                        предоставляет данный проект продемонстрировано на видео ниже.</p>
                </div>


                <div class="align-center">
                    <div class="video">
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
                </div>

                <div class="short-description">
                    <p>Заполнив анкету и настроив свой профиль у тебя появляется возможность подавать заявки в команды,
                        которые зарегистрированы на данном сайте. Все, что остается делать - ожидать, когда с тобой
                        свяжется владелец той или иной команды.</p>
                </div>

                <!-- todo: дописать тут контент -->
            </div>
        </div>
    </section>

    @include('templates/call-to-action/no-account')
@stop