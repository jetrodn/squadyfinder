@if(Auth::guest())
<section class="call-to-register dark-grey-section">
    <div class="container">
        <div class="row">

            <h4>У тебя еще нет аккаунта? Зарегистрируйся сейчас и получи возможность найти команду мечты!</h4>

            <div class="default-button center-block">
                <a href="<?php echo url('/'); ?>/auth/register">Регистрация</a>
            </div>

        </div>
    </div>
</section>
    @endif