<div class="col-md-3 sidebar-navigation" data-step="1"
     data-intro="Это меню управления Вашим профилем. Выберите подходящее действие и перейдите на страницу настроек.">
    <h3>Персональные настройки</h3>
    <hr>
    <ul>
        <li><a href="<?php echo url('/'); ?>/home"> <i class="ion-home"></i> Домой</a></li>
        <li><a href="<?php echo url('/'); ?>/dash/setup-user-profile"> <i class="ion-clipboard"></i> Анкета</a></li>
        <li><a href="<?php echo url('/'); ?>/dash/profile-settings"> <i class="ion-university"></i>
                Специализация</a></li>
        @if(isset($team[0]))

            <li><a href="<?php echo url('/'); ?>/dash/team-settings"> <i class="ion-settings"></i>Настройки команд <sup><?php
                        if (isset($notifications)) {
                            if ($notifications != null) {
                                echo '+' . count($notifications);
                            } elseif($notifications == 0) {
                                echo " ";
                            }
                        } else {
                        }
                        ?></sup></a></li>
        @else
            <li><a class="success" href="<?php echo url('/'); ?>/teams/create"> <i class="ion-plus-round"></i>Создать
                    команду</a></li>
        @endif

        <li><a href="<?php echo url('/') ?>/teams/all"><i class="ion-search"></i> Поиск команды</a></li>
        <li><a href="<?php echo url('/'); ?>/dash/more-settings"> <i class="ion-toggle-filled"></i>
                Дополнительные настройки</a></li>

        <li><a href="<?php echo url('/') ?>/dash/change-password"> <i class="ion-lock-combination"></i> Изменить пароль</a></li>

              <li><a href="<?php echo url('/'); ?>/dash/change-email"> <i class="ion-email"></i> Изменить имейл</a></li>
        <li><a class="danger" href="<?php echo url('/') ?>/dash/delete-profile"> <i class="ion-trash-b"></i> Удалить учетную запись</a></li>
    </ul>
</div>