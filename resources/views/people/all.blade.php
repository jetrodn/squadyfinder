@extends('master')

<?php
/*==========================================
$active_li - переменная которая передается в
шаблон templates/people-filter

указывает, какой элемент на данный момент активный
============================================*/
$active_li = array("active_1" => "active");

?>

@section('main_content')
    <section class="all-people">
        <div class="container">
            <div class="container-title">

            </div>


            <div class="col-md-9 search-list">
                @include("templates.people-filter-content")
            </div>

            @include("templates.people-search-sidebar")

        </div>
    </section>

    @include('templates.call-to-action.no-account')

@stop