@extends('master')


@section('main_content')
    <section class="profile-page team-settings">
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

                <div class="back-button" style="display: none">
                    <div class="default-button-red center-block">
                        <a href="<?php echo url('/'); ?>/dash/team-settings/clear/{{ $team[0]->id }}">Назад</a></li>
                    </div>
                </div>

                <div class="col-md-7 col-md-offset-2 team-settings-container">


                    <div class="general-info">
                        <h4>Общие данные о команде</h4>
                        <div class="separator"></div>

                        <div class="col-md-6">
                            <ul>
                                <li>ID: {{ $team[0]->id }} </li>
                                <li>Название: {{ $team[0]->team_name }} </li>
                                <li>Владелец: {{ Auth::user()->name }} </li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <ul>
                                <li>Создана: {{ $team[0]->created_at }} </li>
                                <li>Последнее обновление: {{ $team[0]->updated_at }} </li>
                                <li>Страна: {{ $team[0]->country }} </li>
                            </ul>
                        </div>

                    </div>


                    <div class="setup-team">
                        <h4>Настройки команды</h4>
                        <div class="separator"></div>
                    </div>

                    <div class="search-form">
                        <form method="POST" enctype="multipart/form-data"
                              action="<?php echo url('/'); ?>/dash/team-settings/update-a-team">

                            {!! csrf_field() !!}

                            <div class="align-center">
                                <div class="content-image-large">
                                    <img src="<?php echo url('/') ?>/images/default/team-update-2.png" alt="">
                                </div>
                            </div>


                            <div class="form-group">

                                <input type="text" maxlength="48" name="new_team_name"
                                       class="form-control" id="new_team_name"
                                       placeholder="{{ $team[0]->team_name }}">
                                <br>
                                <input type="text" name="team_slogan" maxlength="56"
                                       class="form-control" id="team_slogan"
                                       placeholder="{{ $team[0]->team_slogan }}">
                                <br>
                                <div class="form-group">
                                    <input type="text" name="short_description" maxlength="50"
                                           class="form-control" id="short_description"
                                           placeholder="{{ $team[0]->team_short_description }}">
                                    <hr>


                                    <p style="font-weight: bold;">Обновление открытых позиций:</p>

                                    @include('templates/checkbox-positions')
                                    <br>

                                    <div class="row align-center" style="margin-top: 100px;">
                                        <div class="default-button-red center-block" style="margin-left: 20px;">
                                            <a href="#">Сбросить все позиции</a>
                                        </div>
                                    </div>


                                    <hr>

                                </div>

                                <img src="<?php echo url('/') ?>/{{ $team[0]->image_href }}" width="660" alt="">

                                <div class="align-center" style="margin-top: 20px; text-align: center">
                                    <p style="font-weight: bold">Новое изображение команды</p>
                                    <input align="middle" type="file" name="cover" accept=".jpg,.png,.gif">
                                </div>
                                <hr>

                                <div class="input-group">
                                    @include('templates/countries')

                                    <select name="budget" id="budget">
                                        <option value="">Бюджет проекта</option>
                                        <option value="budget_option_1">< 5000$</option>
                                        <option value="budget_option_2">5000$ - 10000$</option>
                                        <option value="budget_option_3">> 10000$</option>
                                    </select>


                                    <select name="duration" id="duration">
                                        <option value="">Продолжительность</option>
                                        <option value="duration_1">1-5 месяцев</option>
                                        <option value="duration_2">6-12 месяцев</option>
                                        <option value="duration_3">1-2 года</option>
                                        <option value="duration_4">3-5 лет</option>
                                    </select>
                                </div>

                                <div class="input-group">

                                </div>

                                <br>

                            <textarea maxlength="1540" onkeyup="countChar(this, 1540)" name="team_description"
                                      class="form-control" id="team-description" rows="9"
                                      placeholder="{{ $team[0]->full_description }}"
                            ></textarea>
                                <div class="char-restriction">
                                    <ul>
                                        <li id="characters">0</li>
                                        <li id="max"></li>
                                    </ul>
                                </div>

                                <br>
                                <h4><span>2. </span> Цели
                                    <hr>
                                </h4>

                                <label for="target_1">Ваша цель №1</label>
                            <textarea maxlength="240" name="target_1" class="form-control" id="target_1" rows="3"
                                      placeholder="{{ $team[0]->scope_1 }}"></textarea>
                                <br>

                                <label for="target_1">Ваша цель №2</label>
                            <textarea maxlength="240" name="target_2" class="form-control" id="target_2" rows="3"
                                      placeholder="{{ $team[0]->scope_2 }}"></textarea>
                                <br>
                                <label for="target_3">Ваша цель №3</label>
                            <textarea maxlength="240" name="target_3" class="form-control" id="target_3" rows="3"
                                      placeholder="{{ $team[0]->scope_3 }}"></textarea>

                            </div>

                            <br>


                            <input type="hidden" name="team_id" value="{{ $team[0]->id }}">

                            <div class="align-center">
                                <button type="submit" class="btn btn-success"><i class="ion-loop"></i> Обновить команду
                                </button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
    </section>
@stop