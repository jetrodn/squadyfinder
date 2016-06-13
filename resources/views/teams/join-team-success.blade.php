@extends ('master')

@section('main_content')
    <section class="join-team-approve">
        <div class="container">
            <div class="row">
                <div class="container-title">
                    <h1>Заявка успешно отправлена!</h1>
                </div>


                <div class="approve-image">
                    <img src="<?php echo url('/'); ?>/images/successful_subscribing.gif" alt="">
                </div>

                <div class="col-md-12">
                    <h4>Ваша заявка успешно отправлена! <br><br> Ожидайте обратной связи от администратора команды {{ $team[0]->team_name }}</h4>
                </div>

                <div class="default-button-red center-block">
                    <a href="<?php echo url('/'); ?>/get-me-home">Вернуться на главную</a>
                </div>


            </div>
        </div>
    </section>
@stop
