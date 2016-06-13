@extends('master')

@section('main_content')
    <section class="info-for-developers">
        <div class="container">
            <div class="row">

                <div class="container-title">
                    <h1>Для руководителей проектов</h1>
                    <div class="separator"></div>
                </div>

                <div class="short-description">
                    <p>SquadyFinder - это проект который позволит тебе найти в команду специалистов для совместной разработки
                        веб-проекта. Немного о том, какие возможности
                        предоставляет данный проект продемонстрировано на видео ниже.</p>
                </div>


                <div class="align-center">
                    <div class="video">
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

                <div class="short-description">
                    <p>Настроив профиль команды у тебя появляется возможность принимать заявки в команду,
                        от пользователей которые зарегистрированы на данном сайте. Все максимально просто и сделано для конечных пользователей данного проекта.</p>
                </div>

                <!-- todo: дописать тут контент -->
            </div>
        </div>
    </section>

    @include('templates/call-to-action/no-account')

@stop