@extends('master')

@section('main_content')
    <section class="help-section">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    <h1>Помощь</h1>
                    <div class="separator"></div>
                </div>

                <div class="help-content">
                    <img src="<?php echo url('/'); ?>/images/tech/slack.png" alt="Slack">
                    <p>Я буду рад ответить на все твои вопросы и просто пообщаться. <br> Присоединяйся к чату
                        SquadyFinder в Slack.</p>
                </div>

                <div class="text-center">

                    <div class="default-button-red ">
                        <a target="_blank" href="https://squadyfinder.stamplayapp.com/">
                            Присоединиться в Slack</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('templates/call-to-action/no-account')
@stop