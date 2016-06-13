@extends('master')
@section('main_content')
    <section class="search-people">
        <div class="container">
            <div class="row">

                <div class="container-title">
                    <h1>Поиск людей</h1>
                    <h4>поиск среди множества специалистов</h4>
                </div>

                <div class="search-filter">
                    <ul>
                        <li><a href="">Поиск по имени</a></li>
                        <li><a href="">Поиск по имейлу</a></li>
                        <li><a href="">Поиск по специализациям</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-md-offset-4 search-form">
                    <form method="POST" action="<?php echo url('/'); ?>/people/find-user">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <input type="text" name="user_name"
                                   class="form-control" id="user_name"
                                   placeholder="Введите фразу для поиска по имени" required>
                        </div>

                        <button type="submit" class="btn btn-success right">Найти пользователя</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop