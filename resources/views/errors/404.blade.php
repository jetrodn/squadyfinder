@extends('master')

{{-- todo: наверстать 404 page --}}
@section('main_content')
    <section class="error-page">
        <div class="container">
            <div class="row">

                <div class="error-number">
                    <h1>404</h1>
                </div>

                <div class="error-description">
                    <p>Не удалось найти запрашиваемой страницы. Хотите вернуться на главную?</p>
                </div>


                <div class="error-buttons">

                    <div class="default-button center-block">
                        <a href="<?php echo url('/'); ?>/contacts">Связаться с поддержкой</a></li>
                    </div>

                    <div class="default-button center-block">
                        <a href="<?php echo url('/'); ?>/">Да, уйти на главную</a></li>
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop