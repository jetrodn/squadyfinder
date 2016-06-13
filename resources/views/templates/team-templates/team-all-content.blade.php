<div id="team-content-all" class="team-content-all team-list">
    @foreach($teams as $team)
        <div class="col-md-4 grid-item">
            <div class="card">
                <img class="card-img"
                     src="<?php echo url('/') ?>/{{ $team->image_href }}"
                     alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">{{ $team->team_name }}</h4>
                    <p class="card-text">{{ $team->team_short_description }}</p>

                    <hr>

                    <div class="team-add-info">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Команде нужны:</h5>
                                @include('templates/team-templates/all-teams-specs')
                            </div>
                            <div class="col-md-6">
                                <h5>Доп. информация</h5>
                                @include('templates/team-templates/all-information')
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="show-team">
                        <a href="<?php echo url('/') ?>/teams/team/{{ $team->id }}">На страницу команды</a>
                    </div>


                </div>


            </div>
        </div>
    @endforeach
</div>

<div class="center-block">

    {!! $teams->render() !!}
</div>
