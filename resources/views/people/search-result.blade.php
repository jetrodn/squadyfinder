@extends('master')

@section('main_content')
    <section class="all-people">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    {{--<h1>Поиск</h1>--}}
                    {{--<h4>поиск поможет быстро найти нужного пользователя</h4>--}}
                </div>

                <!--
                <div class="filter">
                    <ul>
                        <li><a class="active" href="<?php echo url('/'); ?>/people/all">Все пользователи</a></li>
                        <li><a href="<?php echo url('/'); ?>/people/sort-by-name">Фильтр по именам</a></li>
                        <li><a href="">Фильтр по специализациям</a></li>
                        <li><a href="<?php echo url('/'); ?>/people/search">Поиск пользователей <i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
-->


                @if($users[0] != null)
                    <div class="people-list col-md-9 search-list">
                        <div class="search-result-message">
                            <h4>Результаты поиска по вашему запросу: <strong>{{ $query }}</strong></h4>
                        </div>
                        @include("templates.people-filter-content")
                    </div>
                @elseif($users[0] == null)
                    <div class="people-list col-md-9 search-list">
                        <div class="search-result-message">
                            <h4>Результаты поиска по вашему запросу: <strong>{{ $query }}</strong></h4>
                        </div>

                        <div class="no-search-results">
                            <img src="<?php echo url('/') ?>/images/default/no-search-result.png" alt="">
                            <h4>К сожалению, мы ничего не нашли :( </h4>
                        </div>

                    </div>
                @endif

                @include("templates.people-search-sidebar")

            </div>
        </div>
    </section>
@stop