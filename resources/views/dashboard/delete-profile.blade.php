@extends('master')


@section('main_content')
    <section class="profile-page team-settings">
        <div class="container">
            <div class="row">


                <?php
                $message = \Illuminate\Support\Facades\Session::get('message');
                $error_message = \Illuminate\Support\Facades\Session::get('error_message');
                ?>

                @if(isset($message))
                    @include('templates/popup-succes')
                @endif

                @if(isset($error_message))
                    @include('templates/popup-error')
                @endif

                @include('templates/dashboard-menu')

                <a href="#0" style="display: none;" class="cd-popup-trigger">View Pop-up</a>

                <div class="col-md-7 col-md-offset-2 ">


                    <h3>Удаление профайла</h3>
                    <div class="separator"></div>

                    <div style="z-index: -1; margin-top: -50px" class="user-profile-settings-image">
                        <img src="<?php echo url('/') ?>/images/default/sad.png"
                             alt="Change Password Image">
                    </div>

                    <div class="message-for-user">
                        <p>Данное действие приведет к полному и безвозвратному удалению Вашего аккаунта</p>
                    </div>

                    <form method="POST" action="<?php echo url('/'); ?>/user-profile/settings/delete-profile-action">

                        {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="password-field">Подтвердите действие</label>
                                <div class="input-group">
                                    <input type="password" name="password"
                                           class="form-control" id="password-field-old"
                                           placeholder="Ваш пароль" required>

                                    <div class="input-group-addon" id="showPasswordOld"><i class="ion-eye"></i> Показать
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger right"> <i class="ion-trash-b"></i> Удалить аккаунт навсегда</button>
                    </form>


                </div>

            </div>
        </div>
    </section>
@stop