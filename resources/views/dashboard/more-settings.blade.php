@extends('master')


@section('main_content')
    <section class="profile-page more-settings">
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

                <div class="col-md-7 col-md-offset-2 profile-more-settings">


                    <h3>Дополнительные настройки</h3>
                    <div class="separator"></div>

                    <div class="user-profile-settings-image">
                        <img src="<?php echo url('/') ?>/images/default/user-setup.png"
                             alt="Change Password Image">
                    </div>

                    <div class="col-md-6 col-md-offset-2 more-settings-menu">
                        <ul>
                            <li><i class="ion-android-mail"></i> Показывать имейл</li>
                            <li><i class="ion-map"></i>Геолокацинная выдача результатов</li>
                            <li></li>
                        </ul>
                    </div>

                    <div class="col-md-2">
                        <div class="onoffswitch">
                            @if($showEmailSettings)
                                <input type="checkbox" name="show-email" class="onoffswitch-checkbox" id="show_email"
                                       checked>
                            @else
                                <input type="checkbox" name="show-email" class="onoffswitch-checkbox" id="show_email">
                            @endif
                            <label class="onoffswitch-label" for="show_email"></label>
                        </div>

                        <div class="onoffswitch">
                            @if($geoResults)
                            <input type="checkbox" name="geo-results" class="onoffswitch-checkbox" id="geo_results"
                                   checked>
                            @else
                                <input type="checkbox" name="geo-results" class="onoffswitch-checkbox" id="geo_results">
                            @endif
                            <label class="onoffswitch-label" for="geo_results"></label>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </div>

                </div>

            </div>
        </div>
    </section>
@stop