@extends('master')

<?php

/*==========================================
$active_li - переменная которая передается в
шаблон templates/people-filter

указывает, какой элемент на данный момент активный
============================================*/

$active_li = array("active_2" => "active");
?>

@section('main_content')
    <section class="all-people">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    <h1>Люди</h1>
                    <h4>фильтрация пользователей по именам</h4>
                </div>

                @include("templates.people-filter", $active_li)

                @include("templates.people-filter-content")

            </div>
        </div>
    </section>
@stop