@extends ('master')

@section('main_content')
    <section class="team-slider" style="background-image: url('<?php echo url('/') ?>/{{ $team[0]->image_href }}');">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h1>{{ $team[0]->team_name }}</h1>
                </div>
                <div class="slogan">
                    {{--<p>{{ $team[0]->team_slogan }}</p>--}}
                    <?php
                    $openings = DB::table('result_table_team_spec')->where('team_id', $team[0]->id)->count();
                    ?>
                            <!--
                    <p class="openings-slider">Открыто позиций: <span class="openings">{{ $openings }}</span></p>
                    -->
                    <?php
                    if ($team[0]->budget == 1) {
                        $budget = "< 5000$";
                    } else if ($team[0]->budget == 2) {
                        $budget = "5000$ - 10000";
                    } else if ($team[0]->budget == 3) {
                        $budget = "> 10000$";
                    }
                    ?>

                    <div class="center-block">

                        <ul class="specs-inline white-specs">

                            <li class="boldy"><i class="fa fa-dollar"></i> {{ $budget }}  </li>
                            <li class="boldy"><i class="fa fa-map-marker"></i> {{ $team[0]->country }}</li>
                            <li class="boldy"><i class="ion-man"></i> {{ $openings }}  </li>
                        </ul>
                    </div>


                </div>
                <div class="slider-buttons">
                    <ul>

                        @if(isset(Auth::user()->id) && Auth::user()->id  === $team[0]->owner_user_id)
                            <li>
                                <a href="<?php echo url('/'); ?>/user-profile/settings/team-settings/{{ $team[0]->id }}">Настроить
                                    эту команду <i
                                            class="ion-gear-b"></i></a></li>
                        @else
                            <li><a href="<?php echo url('/'); ?>/join-team-approve/{{ $team[0]->id }}">Присоединиться
                                    к команде <i
                                            class="ion-android-person-add"></i></a></li>
                        @endif
                        <li><a class="anchor" href="#more">Узнать больше информации <i class="ion-arrow-down-c"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="scope" id="more">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    <h1>Основные цели команды</h1>
                    <div class="separator"></div>
                </div>
            </div>

            <div class="center-block">
                <div style="z-index: -1;" class="content-image">
                    <img src="<?php echo url('/') ?>/images/default/target.png"
                         alt="Change Password Image">
                </div>
            </div>


            <div class="container targets">
                <div class="row">
                    <div class="col-md-4 target">
                        <h1>1</h1>
                        <p>{{ $team[0]->scope_1 }}</p>
                    </div>

                    <div class="col-md-4 target">
                        <h1>2</h1>
                        <p>{{ $team[0]->scope_2 }}</p>
                    </div>

                    <div class="col-md-4 target">
                        <h1>3</h1>
                        <p>{{ $team[0]->scope_3 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="more-info">
        <div class="container">
            <div class="row">

                <div class="openings openings-small">

                    <div class="container-title">
                        <h1>Открытые позиции</h1>
                    </div>


                    <?php

                    $id = $team[0]->id;

                    $specs = DB::select("SELECT * FROM specializations where id in (SELECT spec_id FROM result_table_team_spec WHERE team_id = $id);");

                    ?>
                    @if($specs != null)
                    <ul class="openings-each-team">
                        @foreach($specs as $spec)

                            <a href="<?php echo url('/') ?>/join-team-approve/{{ $team[0]->id }}">
                                <div class="col-md-4 selected-spec-img">
                                    <img src="<?php echo url('/') ?>{{ $spec->img_path }}" alt="">
                                    <h3>{{ $spec->spec_name }}</h3>
                                </div>
                            </a>


                        @endforeach
                    </ul>
                    @else

                        <div class="center-block">
                            <div  style="z-index: -1; margin-top: -30px" class="image-container">
                                <img src="<?php echo url('/') ?>/images/default/sad.png"
                                     alt="Change Password Image">
                            </div>
                            <h3 class="no-openings">Увы, в данной команда нет открытых позиций</h3>
                            <br>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <section class="team-slider team-slider-section"
             style="background-image: url(<?php echo url('/') ?>/{{ $team[0]->image_href }});">
        <h1>Прими участие в этом увлекательном проекте уже сейчас</h1>

        <div class="slider-buttons">
            <ul>
                @if(isset(Auth::user()->id) && Auth::user()->id  === $team[0]->owner_user_id)
                    <li>
                        <a href="<?php echo url('/'); ?>/user-profile/settings/team-settings/{{ $team[0]->team_url }}">Настроить эту команду <i class="ion-gear-b"></i></a></li>
                @else
                    <li><a href="<?php echo url('/'); ?>/join-team-approve/{{ $team[0]->id }}">Присоединиться к команде <i class="ion-android-person-add"></i></a></li>
                @endif
            </ul>
        </div>
    </section>


    @if($team[0]->full_description != '')
        <section class="full-descr">
            <div class="container">
                <div class="row">
                    <div class="container-title">
                        <h1>Полное описание</h1>
                        <div class="separator"></div>
                    </div>

                    <div class="center-block">
                        <div style="z-index: -1;" class="content-image">
                            <!-- todo: подобрать картинку сюда -->
                            <img src="<?php echo url('/') ?>/images/default/full-team-description.png"
                                 alt="Change Password Image">
                        </div>
                    </div>

                    <div class="description">
                        <p>{{ $team[0]->full_description }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="comments">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    <h1>Комментарии</h1>
                    <div class="separator"></div>
                </div>

                <div class="col-md-8 col-md-offset-2">

                    <div id="disqus_thread"></div>
                    <script>

                        /** * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS. * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */

                        var disqus_config = function () {
                            this.page.url = PAGE_URL;
                            // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER;
                            // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        (function () {
                            // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = '//squadyfinder.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })(); </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript"
                                                                      rel="nofollow">comments powered by Disqus.</a>
                    </noscript>
                </div>
            </div>
    </section>
@stop
