@extends('master')

@section('main_content')
    <section class="profile-page change-password">
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


                    <div class="title-over">
                        <h3>Изменить пароль</h3>
                        <div class="separator"></div>
                    </div>
                    <div style="z-index: -1; margin-top: -50px" class="user-profile-settings-image">
                        <img src="<?php echo url('/') ?>/images/default/change-password.gif"
                             alt="Change Password Image">
                    </div>


                    <form method="POST" action="<?php echo url('/'); ?>/user-profile/settings/change-password-action">

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="password-field">Ваш старый пароль</label>
                            <div class="input-group">
                                <input type="password" name="old_password"
                                       class="form-control" id="password-field-old"
                                       placeholder="Введите Ваш старый пароль" required>

                                <div class="input-group-addon" id="showPasswordOld"><i class="ion-eye"></i> Показать
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="password-field">Новый пароль</label>
                            <div class="input-group">
                                <input type="password" name="new_password"
                                       class="form-control" id="password-field-new"
                                       placeholder="Придумайте новый пароль" required>

                                <div class="input-group-addon" id="showPasswordNew"><i class="ion-eye"></i> Показать
                                </div>
                            </div>
                        </div>

                        <div class="from-group">
                            <label for="password-field">Повторите новый пароль</label>
                            <div class="input-group">
                                <input type="password" name="new_password_check"
                                       class="form-control" id="password-field-check"
                                       placeholder="Повторите новый пароль" required>
                                <div class="input-group-addon" id="showPassword"><i class="ion-eye"></i> Показать</div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success right">Изменить</button>
                    </form>
                </div>

            </div>
    </section>
@stop