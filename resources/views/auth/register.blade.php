@extends('master')

@section('main_content')
    <section class="login-form profile-page">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    <h1>Регистрация</h1>
                    <h4>создай аккаунт и начни поиск своей команды</h4>
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

                <div class="col-md-6 register-image">
                    <img src="<?php echo url('/'); ?>/images/lumberjack.gif" alt="login team">
                </div>
                <div class="col-md-4 form">
                    <form method="POST" action="/auth/register">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="name-field">Ваше имя</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="form-control" id="name-field"
                                   placeholder="Ваше имя"  data-toggle="tooltip" data-placement="left" title="Введите полное имя и фамилию"  onkeyup="checkFullName()" required>
                            <i id="name-check-len" class=""></i>

                        </div>

                        <div class="form-group">
                            <label for="email-field">Адрес электронной почты</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="form-control" id="email-field"
                                   placeholder="Ваш адрес электренной почты" onkeyup="checkEmailRegister(this.value)" required>
                            <i id="email-check-len" class=""></i>
                        </div>
                        <span id="txtHint"></span>

                        <div class="form-group">
                            <label for="password-field">Новый пароль</label>
                            <input type="password" name="password"
                                   class="form-control" onkeyup="checkRegisterPassLen()" id="password-field"
                                   placeholder="Ваш новый пароль"  data-toggle="tooltip" data-placement="left" title="Пароль должен содержать минимум 6 символов"  required>
                            <i id="password-check-len" class=""></i>

                        </div>

                        <div class="form-group">
                            <label for="password-confirmation-field">Подтвердите пароль</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control" id="password-confirmation-field"
                                   placeholder="Подтвердите пароль" onkeyup="checkRegisterPass()" required>
                            <i id="password-check-conf" class=""></i>

                        </div>

                        <button type="submit" class="btn btn-success">Регистрация</button>

                        <p class="login-href right">Уже есть аккаунта? <a class="login-href" href="<?php echo url('/'); ?>/auth/login">Войти</a></p>
                    </form>
                    <!--
                    <div class="login-with-social">

                        <h4>или пройдите регистрацию с помощью</h4>

                        <div class="row">
                            <div class="col-md-4 social-option"><a href="<?php echo url('/'); ?>/auth/register/with-github"><i class="fa fa-github"></i></a></div>
                            <div class="col-md-4 social-option"><a href="<?php echo url('/'); ?>/auth/register/with-twitter"><i class="fa fa-twitter"></i></a></div>
                            <div class="col-md-4 social-option"><a href=""><i class="fa fa-vk"></i></a></div>
                        </div>

                    </div>
                    -->
                </div>
            </div>
        </div>
    </section>
@stop
