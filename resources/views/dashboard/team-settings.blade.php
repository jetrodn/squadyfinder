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

                <div class="col-md-7 col-md-offset-2 team-settings-container">


                    <div class="new-entries">
                        <h3>Последние оповещения</h3>
                        <div class="separator"></div>


                        @if(isset($notifications) && isset($user_subscribed))
                            <ul>
                                @foreach($user_subscribed as $sub)
                                    <li>Новая заявка на добавление в команду <b>{{ $sub->team_name }}</b>
                                        от пользователя <a href="<?php echo url('/') ?>/user-profile/{{ $sub->id }}">{{ $sub->name }}</a>
                                        <i class="ion-android-notifications close-notification"
                                                id="delete-notification"></i></li>
                                @endforeach
                                @foreach($notifications as $notif)
                                    @if($notif->notification_id == 1)

                                    @endif
                                    @if($notif->notification_id == 2)
                                        <li>Пользователь вышел <i
                                                    class="ion-android-notifications close-notification"></i></li>
                                    @endif
                                    @if($notif->notification_id == 3)
                                        <li>Данные успешно обновлены <i
                                                    class="ion-android-notifications close-notification"></i></li>
                                    @endif
                                @endforeach
                            </ul>

                            <div class="clear-notifications">

                                <div class="default-button-red center-block">
                                    <a href="<?php echo url('/'); ?>/dash/team-settings/clear-notifications">Очистить все оповещения</a></li>
                                </div>
                            </div>

                        @else
                            <p>У Вас нет никаких оповещений</p>
                        @endif
                    </div>


                    <div class="your-teams">
                        <h3>Ваши команды</h3>
                        <div class="separator"></div>


                        @foreach(array_chunk($team, 2) as $row)
                            <div class="row team-row">
                                @foreach($row as $team_entity)
                                    <div class="col-md-6">
                                        <div class="card">
                                            <img class="card-img"
                                                 src="<?php echo url('/') ?>/{{ $team_entity->image_href }}"
                                                 alt="Card image cap">
                                            <div class="card-block">
                                                <h4 class="card-title">{{ $team_entity->team_name }}</h4>
                                                <p class="card-text">{{ $team_entity->team_short_description }}</p>

                                                <hr>


                                                <div class="center-block">
                                                    <a href="<?php echo url('/') ?>/teams/team/{{ $team_entity->id }}"
                                                       class="btn btn-primary"><i class="ion-eye"></i>
                                                        Посмотреть</a>

                                                    <a href="<?php echo url('/') ?>/dash/team-settings/{{ $team_entity->id }}"
                                                       class="btn btn-success"><i class="ion-gear-b"></i>
                                                        Настроить </a></div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach
                        <hr>
                        <div class="row">
                            <div class="align-center">
                                <div class="col-md-12">
                                    <div class="card empty-add-team-card">
                                        <a href="<?php echo url('/') ?>/teams/create">

                                            <div class="card-block">
                                                <i class="ion-plus-circled"></i>
                                                <h4 class="card-title">Добавить новую команду</h4>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </section>
@stop