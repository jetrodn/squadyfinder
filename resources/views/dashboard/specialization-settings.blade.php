@extends('master')


@section('main_content')
    <section class="profile-page profile-settings">
        <div class="container">
            <div class="row">

                <?php
                $success_message = \Illuminate\Support\Facades\Session::get('message');
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

                <div class="col-md-6 col-md-offset-2 profile-spec">
                    <div class="container-title">

                        <h3>Специализации</h3>
                        <div class="separator"></div>


                        <div style="z-index: -1;" class="user-profile-settings-image">
                            <img src="<?php echo url('/') ?>/images/default/user-specs.png"
                                 alt="Change Password Image">
                        </div>

                        <form action="update-specialization" id="checkSpecialization" method="POST">

                            <h4>Выберите до 4ех позиций, которые Вы знаете лучше всего</h4>
                            <br>

                            @include('templates/checkbox-positions')


                            {!! csrf_field() !!}

                            <div class="buttons align-center">

                            </div>

                            <br><br>


                            @if($selected_specs)

                                <div class="selected">
                                    <h3>Уже выбранные специализации</h3>
                                    <div class="separator"></div>
                                    @foreach($selected_specs as $selected)
                                        <div class="col-md-6 selected-spec-img">
                                            <img src="<?php echo url('/') ?>{{ $selected->img_path }}" alt="">
                                            <h3>{{ $selected->spec_name }}</h3>
                                        </div>
                                    @endforeach

                                </div>
                            @endif

                        </form>


                        <div class="container">

                            @foreach($selected_specs as $spec)
                                <div class="col-md-4 selected-specs">{{ $spec->class_name }}</div>
                            @endforeach
                        </div>


                        @if($selected_specs)
                            <div class="default-settings center-block">
                                <div class="default-button red-button">
                                    <a href="<?php echo url('/') ?>/reset-specs">Сбросить все специализации</a>
                                </div>
                            </div>
                        @endif
                    </div>


                </div>

            </div>
        </div>
    </section>
@stop