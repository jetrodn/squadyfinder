<?php use Illuminate\Support\Facades\Auth; ?>

@extends('master')

@section('main_content')
    <section class="profile-page">
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


                <div class="col-md-9 profile-data" style="">


                    <div class="avatar">
                        <img src="<?php echo url('/'); ?>/{{ Auth::user()->avatar }}" alt="avatar">
                    </div>

                    <form action="upload/profile-avatar" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="file" name="image">
                        <input type="submit" class="btn btn-danger" value="Загрузить">
                    </form>


                    <div class="col-md-5">
                        <h4>Информация об аккаунте</h4>
                        <hr>
                        <p>Ваше имя: <span><?php echo Auth::user()->name ?></span></p>
                        <p>Имейл: <span><?php echo Auth::user()->email ?></span></p>
                        <p>Дата регистрации: <span><?php echo Auth::user()->created_at->format('d/m/Y H:i') ?></span>
                        </p>
                        <p>Последняя дата визита:
                            <span><?php echo Auth::user()->updated_at->format('d/m/Y H:i') ?></span></p>
                        <p>Ваш пароль: <span><a href="<?php echo url('/'); ?>/user-profile/settings/change-password">Изменить пароль</a></span></p>
                        <p>Как выглядит профиль: <span><a href="<?php echo url('/'); ?>/user-profile/{{ Auth::user()->id }}">посмотреть</a></span></p>
                    </div>

                    <div class="col-md-5 col-md-offset-2 ">
                        <h4>Дополнительная информация</h4>
                        <hr>

                        <p>Пол:
                           <span>
                               @if(Auth::user()->gender != null)
                                   @if(Auth::user()->gender == "gender-male")
                                       мужской
                                   @else
                                       женский
                                   @endif
                               @else
                                   <a href="user-profile/settings/setup-user-profile">не указано</a>
                               @endif
                            </span>
                        </p>



                        <p>Страна:
                           <span>
                               @if(Auth::user()->country != null)
                                   {{ Auth::user()->country }}
                               @else
                                   не указано
                               @endif
                            </span>
                        </p>

                        <p>Кратко о себе: <span><a href="<?php echo url('/'); ?>/user-profile/settings/setup-user-profile">открыть</a></span></p>
                        <p>О себе: <span><a href="<?php echo url('/'); ?>/user-profile/settings/setup-user-profile">открыть</a></span></p>
                        <p>Социальная жизнь: <span><a href="<?php echo url('/'); ?>/user-profile/settings/setup-user-profile">открыть</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

