@extends('master')

@section('main_content')
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    <h1>Контакты</h1>
                    <div class="separator"></div>
                </div>

                <div class="contact-content">
                    <img src="<?php echo url('/'); ?>/images/default/contacts.png" alt="Slack">
                    <p>Я буду рад ответить на все твои вопросы и просто пообщаться. <br> Присоединяйся к чату
                        SquadyFinder в Slack.</p>
                </div>

                <div class="text-center">

                    <div class="default-button-red ">
                        <a target="_blank" href="https://squadyfinder.stamplayapp.com/">
                            Присоединиться в Slack</a>
                    </div>
                    <br><br><br>
                </div>

                <div class="contact-content">
                    <p>Либо можно связаться со мной, <a href="mailto:rodinvladimir94@gmail.com">отправив имейл сообщение</a>.</p>
                </div>
            </div>
        </div>
    </section>


    @include('templates/call-to-action/no-account')
@stop