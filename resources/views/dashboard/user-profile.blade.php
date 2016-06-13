@extends('master')

@section('main_content')
    <section class="user-profile">
        <div class="container">
            <div class="row">

                <div class="container-title">
                    <h1>{{ $user[0]->name }}</h1>
                </div>


                <div class="col-md-6 col-md-offset-3 user-data">
                    <img src="<?php echo url('/'); ?>/{{ $user[0]->avatar }}" alt="avatar">
                    <div class="description"><p>
                            @if($user[0]->about_short != null)
                                {{ $user[0]->about_short }}
                            @else
                                Пользователь не указал данных.
                            @endif
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-md-12 user-profile-social">
                            <ul>
                                @if($user[0]->social_skype != null)
                                    <li><a href="{{ $user[0]->social_skype }}"><i class="fa fa-skype"></i></a>
                                    </li>
                                @endif

                                @if($user[0]->social_vk != null)
                                    <li><a href="{{ $user[0]->social_vk }}"><i class="fa fa-vk"></i></a></li>
                                @endif

                                @if($user[0]->social_facebook != null)
                                    <li><a href="{{ $user[0]->social_facebook }}"><i class="fa fa-facebook"></i></a>
                                    </li>
                                @endif

                                @if($user[0]->social_twitter != null)
                                    <li><a href="{{ $user[0]->social_twitter }}"><i class="fa fa-twitter"></i></a>
                                    </li>
                                @endif

                                @if($user[0]->social_googleplus != null)
                                    <li><a href="{{ $user[0]->social_googleplus }}"><i
                                                    class="fa fa-google-plus"></i></a>
                                    </li>
                                @endif

                                @if($user[0]->social_website != null)
                                    <li><a href="{{ $user[0]->social_website }}"><i class="fa fa-globe"></i></a>
                                    </li>
                                @endif

                                @if($user[0]->social_github != null)
                                    <li><a href="{{ $user[0]->social_github }}"><i class="fa fa-github"></i></a>
                                    </li>
                                @endif

                                @if($user[0]->social_reddit != null)
                                    <li><a href="{{ $user[0]->social_reddit }}"><i class="fa fa-reddit"></i></a>
                                    </li>
                                @endif

                                @if($user[0]->social_linkedin != null)
                                    <li><a href="{{ $user[0]->social_linkedin }}"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                @endif

                                @if($user[0]->social_bitbucket != null)
                                    <li><a href="{{ $user[0]->social_bitbucket }}"><i
                                                    class="fa fa-bitbucket"></i></a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>

                    <div class="full-description">
                        <p>
                        @if($user[0]->about_long!= null)
                            <hr>
                            {{ $user[0]->about_long }}
                            <hr>
                            @else
                            @endif
                            </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 user-additional-data">
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-md-4 col-md-offset-1">
                        <h4>Общая информация</h4>
                        <hr>
                        <p>Имя: <span>{{ $user[0]->name }}</span></p>
                        <p>Имейл: <span>
                                @if($user[0]->show_email == 1)
                                    {{ $user[0]->email }}
                                @else
                                    скрыт
                                @endif
                            </span></p>
                        <p>Дата регистрации: <span>{{ $user[0]->created_at }}</span>
                        </p>
                        <p>Последняя дата визита:
                            <span>{{ $user[0]->updated_at }}</span></p>
                    </div>


                    <div class="col-md-4 col-md-offset-2">
                        <h4>Команды</h4>
                        <hr>
                        @if(isset($team) && $team != null)
                            <ul>
                                @foreach($team as $t)
                                    <li>{{ $t->team_name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Пользователь не принадлежит ни одной из команд.</p>
                            @endif
                    </div>

                </div>

            </div>


        </div>
        </div>
    </section>
@stop