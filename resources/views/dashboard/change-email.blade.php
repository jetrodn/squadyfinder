@extends('master')

@section('main_content')
    <section class="profile-page change-email">
        <div class="container">
            <div class="row">


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

            @include('templates/dashboard-menu')

            <a href="#0" style="display: none;" class="cd-popup-trigger">View Pop-up</a>



            <div class="col-md-7 col-md-offset-2">

                <h3>Изменить имейл</h3>
                <div class="separator"></div>

                <div  style="z-index: -1; margin-top: -30px" class="user-profile-settings-image">
                    <img src="<?php echo url('/') ?>/images/default/user-email-edited.png"
                         alt="Change Password Image">
                </div>

                <form method="POST" action="<?php echo url('/'); ?>/user-profile/settings/change-email-action">

                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="email-field">Новый адрес электронной почты</label>

                        <input type="email" name="new_email"
                               class="form-control" id="email-field-new"
                               placeholder="Введите новый адрес электронной почты" data-toggle="tooltip" title="Внимание! При следующем входе в аккаунт учтите, что Вы изменили имейл!" data-placement="left" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="password-field">Подтвердите действие</label>
                        <div class="input-group">
                            <input type="password" name="password"
                                   class="form-control" id="password-field-new"
                                   placeholder="Введите Ваш пароль" required>

                            <div class="input-group-addon" id="showPasswordNew"><i class="ion-eye"></i> Показать</div>
                        </div>
                    </div>


                    <button  type="submit" class="btn btn-success right">Изменить</button>
                </form>
            </div>

        </div>
    </section>
@stop