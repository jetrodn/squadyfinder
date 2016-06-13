@extends ('master')

@section('main_content')
    @if(isset(Auth::user()->id))
        <section class="join-team-approve">
            <div class="container">
                <div class="row">
                    <div class="container-title">
                        <h1>Подтвердите действие</h1>
                    </div>


                    <div class="approve-image">
                        <img src="<?php echo url('/'); ?>/images/working.gif" alt="">
                    </div>

                    <div class="col-md-12">
                        <h4>Вы уверены, что хотите отправить заявку администратору команды {{ $team[0]->team_name }}
                            ?</h4>
                    </div>

                    <div class="default-button center-block">
                        <a href="<?php echo url('/'); ?>/join-team-action/{{ $team[0]->id }}">Подтвердить</a>
                    </div>

                    <div class="default-button-red center-block">
                        <a href="<?php echo url('/'); ?>/teams/all">Отклонить</a>
                    </div>

                </div>
            </div>
        </section>
    @else
        {!!  \Illuminate\Support\Facades\Redirect::to('auth/login') !!}
    @endif
@stop
