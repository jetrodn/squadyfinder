@extends('master')


@section('main_content')
    <section class="create-new-team">
        <div class="container">
            <div class="row">

                <div class="container-title">
                    <h1>Создание новой команды</h1>
                    <div class="separator"></div>
                </div>


                <div class="col-md-6 col-md-offset-3 search-form">
                    <form method="POST" enctype="multipart/form-data"
                          action="<?php echo url('/'); ?>/teams/create-a-team">

                        {!! csrf_field() !!}

                        <div class="create-team-image">
                            <img src="<?php echo url('/') ?>/images/default/create-new-team.png" alt="">
                        </div>

                        <h4><span>1. </span> Основная информация
                            <hr>
                        </h4>

                        <div class="form-group">

                            <input type="text" maxlength="48" name="new_team_name"
                                   class="form-control" id="new_team_name"
                                   placeholder="Придумай название команды" required>
                            <br>
                            <input type="text" name="team_slogan" maxlength="56"
                                   class="form-control" id="team_slogan"
                                   placeholder="Слоган команды" required>
                            <br>
                            <div class="form-group">
                                <input type="text" name="short_description" maxlength="50"
                                       class="form-control" id="short_description"
                                       placeholder="Основная тематика Вашей команды" required>
                                <hr>


                                <p style="font-weight: bold;">Какая позиция открыта в Вашей команде:</p>

                                @include('templates/checkbox-positions')


                                <br>
                                <br>
                                <br>

                                <hr>

                            </div>

                            <p style="font-weight: bold">Изображение команды</p>
                            <input type="file" name="cover" accept=".jpg,.png,.gif">

                            <hr>

                            <div class="input-group">
                                @include('templates/countries')

                                <select name="budget" id="budget" required>
                                    <option value="">Бюджет проекта</option>
                                    <option value="budget_option_1">< 5000$</option>
                                    <option value="budget_option_2">5000$ - 10000$</option>
                                    <option value="budget_option_3">> 10000$ </option>
                                </select>


                                <select name="duration" id="duration" required>
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
                                      class="form-control" id="team-description" rows="9" placeholder="Описание команды"
                                      required></textarea>
                            <div class="char-restriction">
                                <ul>
                                    <li id="characters">0</li>
                                    <li id="max"></li>
                                </ul>
                            </div>

                            <br>
                            <h4><span>2. </span> Цели
                                <hr></h4>

                            <label for="target_1">Ваша цель №1</label>
                            <textarea maxlength="240" name="target_1" class="form-control" id="target_1" rows="3"
                                      placeholder="Ваша цель 1" required></textarea>
                            <br>

                            <label for="target_1">Ваша цель №2</label>
                            <textarea maxlength="240" name="target_2" class="form-control" id="target_2" rows="3"
                                      placeholder="Ваша цель 2" required></textarea>
                            <br>
                            <label for="target_3">Ваша цель №3</label>
                            <textarea maxlength="240" name="target_3" class="form-control" id="target_3" rows="3"
                                      placeholder="Ваша цель 3" required></textarea>

                        </div>

                        <button type="submit" class="btn btn-success right">Создать команду</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop