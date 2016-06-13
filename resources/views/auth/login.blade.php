@extends('master')

@section('main_content')
    <section class="login-form profile-page">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    <h1>Вход в аккаунт</h1>
                    <div class="separator"></div>
                </div>

                <?php
                $success_message = \Illuminate\Support\Facades\Session::get('success_message');
                $error_message = \Illuminate\Support\Facades\Session::get('error_message');
                ?>

                @if(isset($success_message))
                    @include('templates/popup-succes')
                @endif

                @if(isset($error_message))
                    @include('templates/popup-error')
                @endif

                <a href="#0" style="display: none;" class="cd-popup-trigger">View Pop-up</a>


                <div class="col-md-6 login-image ">
                    <img src="<?php echo url('/'); ?>/images/wizard_clap.gif" alt="login team">
                </div>

                <div class="col-md-4 form">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/auth/login">

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="email-field">Адрес электронной почты</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="form-control" id="email-field"
                                   placeholder="Ваш адрес электренной почты" required>
                        </div>

                        <div class="form-group">
                            <label for="password-field">Ваш пароль</label>
                            <input type="password" name="password"
                                   class="form-control" id="password-field"
                                   placeholder="Ваш пароль" required>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Запомнить меня
                            </label>
                        </div>

                        <button type="submit" class="btn btn-success">Войти</button>

                        <p class="login-href right">У Вас нет аккаунта?
                            <a class="login-href" href="<?php echo url('/'); ?>/auth/register">Регистрация</a>
                        </p>
                    </form>
                    <!--
                    <div class="login-with-social">
                            <h4>или</h4>

                            <div class="row">
                                <div class="col-md-4 social-option">

                                </div>
                                <div class="col-md-4 social-option">
                                </div>
                            </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </section>
@stop
