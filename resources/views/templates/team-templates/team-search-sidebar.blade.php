
<div class="search-options col-md-12">
    <div class="container">
        <div class="row">
            <div class="search-teams">
                <form id="search_teams" method="post" class="cd-form"
                      action="<?php echo url('/') ?>/teams/search">

                    {!! csrf_field() !!}

                    <div class="col-md-3">
                        <input type="text" name="query" placeholder="Поиск...">
                    </div>

                    <div class="col-md-4">

                        <div class="additional-settings">
                            <div>
                                <h4>Расширенные настройки</h4>

                                <ul class="cd-form-list">
                                    <li>
                                        <input type="radio" name="advanced-settings" value="search-by-name"
                                               id="search-by-name" checked>
                                        <label for="search-by-name">По названию</label>
                                    </li>

                                    <li>
                                        <input type="radio" name="advanced-settings" value="search-by-spec"
                                               id="search-by-spec">
                                        <label for="search-by-spec">По открытым позициям</label>
                                    </li>

                                    <li>
                                        <input type="radio" name="advanced-settings" value="search-by-all"
                                               id="search-by-all">
                                        <label for="search-by-all">По всем полям</label>
                                    </li>

                                </ul>
                            </div>

                        </div>

                        <div>
                            <h4>Дополнительные возможности</h4>

                            <ul class="cd-form-list">
                                <li>
                                    <input type="checkbox" name="features-local-search" id="features-local-search">
                                    <label for="features-local-search">Локальный поиск</label>
                                </li>

                                <li>
                                    <input type="checkbox" name="features-no-team" id="features-no-team">
                                    <label for="features-no-team">Есть открытые позиции</label>
                                </li>


                            </ul>
                        </div>

                        <div>
                            <h4>Бюджет</h4>

                            <ul class="cd-form-list">
                                <li>
                                    <input type="radio" name="budget-search" value="budget-1"
                                           id="budget-1" checked>
                                    <label for="budget-1">$1000 - $5000 </label>
                                </li>

                                <li>
                                    <input type="radio" name="budget-search" value="budget-2"
                                           id="budget-2">
                                    <label for="budget-2">$5000 - $10000</label>
                                </li>

                                <li>
                                    <input type="radio" name="budget-search" value="budget-3"
                                           id="budget-3">
                                    <label for="budget-3">$10000 - #</label>
                                </li>

                            </ul>

                            <!-- <p class="cd-select icon">
                                                            <select class="budget">
                                                                <option value="0">Учитывать бюджет</option>
                                                                <option value="1">&lt; $5000</option>
                                                                <option value="2">$5000 - $10000</option>
                                                                <option value="3">&gt; $10000</option>
                                                            </select>
                                                        </p> -->
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
                        <a href="javascript:document.getElementById('search_teams').submit()"> Поиск</a></li>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>