@extends('master')

@section('main_content')
    <section class="all-teams all-people">
        <div class="container">
            <div class="container-title">

                <h1>Команды</h1>
                <div class="separator"></div>
                <div class="search-team-button" id="search-team-button" data-toggle="tooltip" data-placement="right"
                     title="Поиск по командам">
                    <i class="ion-search"></i>
                </div>
            </div>

            <div class="search-options teams-options">
                <div class="search-teams">
                    <form id="search_teams" method="post" class="cd-form team-cd-form"
                          action="<?php echo url('/') ?>/teams/search">

                        {!! csrf_field() !!}

                        <div class="search-team-buttons center-block">

                            <div class="form-group team-search-input">
                                <input type="text" name="query" placeholder="Введите ключевую фразу..." >
                            </div>

                            <div class="default-button">
                                <a href="javascript:document.getElementById('search_teams').submit()">
                                    Начать поиск</a>
                            </div>

                            <div id="search-team-button-close" class="default-button-red center-block" style="margin-left: 20px;">
                                <a href="#">Скрыть поиск</a>
                            </div>
                        </div>
                    </form>

                    <hr>

                </div>
            </div>

            @include('templates.team-templates.team-all-content')

        </div>
    </section>
@stop
