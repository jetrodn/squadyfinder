@extends('master')

@section('main_content')
    <section class="info-for-developers">
        <div class="container">
            <div class="row">

                <div class="container-title">
                    <h1>VPS Сервер</h1>
                    <div class="separator"></div>
                </div>

                <div class="short-description">
                    <p>Ты можешь поддержать проект, зарегистрировавшись на сайте DigitalOcean по реферальной ссылке.
                        <br><br> На DigitalOcean можно арендовать свой виртуальный сервер и настроить его под свои нужны. Быстрая скорость работы, легкая настройка, быстрый деплоймент приложений и самое главное приемлемая цена.
                        <br><br></p>
                </div>


                <div class="text-center">

                    <div class="default-button-red ">
                        <a target="_blank" href="https://m.do.co/c/08583fe6008a">
                            Перейти по реферальной ссылке</a>
                    </div>
                </div>

                <!-- todo: дописать тут контент -->


            </div>
        </div>
    </section>

    @include('templates/call-to-action/no-account')
@stop