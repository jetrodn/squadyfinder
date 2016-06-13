<div class="col-md-3 search-options">
    <div class="search-people">
        <form id="search_people" method="post" class="cd-form" action="<?php echo url('/') ?>/people/search">

            {!! csrf_field() !!}

            <input type="text" name="query" placeholder="Поиск...">


            <div class="additional-settings">
                <div>
                    <h4>Расширенные настройки</h4>

                    <ul class="cd-form-list">
                        <li>
                            <input type="radio" name="advanced-settings" value="search-by-name" id="search-by-name" checked>
                            <label for="search-by-name">По имени</label>
                        </li>

                        <li>
                            <input type="radio" name="advanced-settings" value="search-by-spec" id="search-by-spec">
                            <label for="search-by-spec">По специализации</label>
                        </li>

                        {{--<li>--}}
                            {{--<input type="radio" name="advanced-settings" value="search-by-email"   id="search-by-email">--}}
                            {{--<label for="search-by-email">По почтовому адресу</label>--}}
                        {{--</li>--}}
                    </ul>
                </div>

                <div>
                    <h4>Дополнительные возможности</h4>

                    <ul class="cd-form-list">
                        <li>
                            <input type="checkbox" name="features-advanced-search" id="features-advanced-search">
                            <label for="features-advanced-search">Расширенный поиск</label>
                        </li>

                        <li>
                            <input type="checkbox" name="features-no-team" id="features-no-team">
                            <label for="features-no-team">Не находятся в команде</label>
                        </li>

                    </ul>
                </div>

                {{--<div>--}}
                {{--<h4>Сортировка</h4>--}}

                {{--<ul class="cd-form-list">--}}
                {{--<li>--}}
                {{--<input type="radio" name="advanced-sort" id="asc-sort" checked>--}}
                {{--<label for="asc-sort">А-Я</label>--}}
                {{--</li>--}}

                {{--<li>--}}
                {{--<input type="radio" name="advanced-sort" id="desc-sort">--}}
                {{--<label for="desc-sort">Я-А</label>--}}
                {{--</li>--}}

                {{--<li>--}}
                {{--<input type="radio" name="advanced-sort" id="register-sort">--}}
                {{--<label for="register-sort">Дата регистрации</label>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}

            </div>

            <div class="default-button">
                <a href="javascript:document.getElementById('search_people').submit()"> Поиск</a></li>
            </div>

        </form>
    </div>
</div>
