<div class="filter">
    <ul>
        <li>
            <a class="<?php if (isset($active_li['active_1'])) echo $active_li['active_1'] ?>" href="<?php echo url('/'); ?>/people/all">Все пользователи <i class="ion-android-menu"></i></a>
        </li>
        <li>
            <a class="<?php if (isset($active_li['active_2'])) echo $active_li['active_2'] ?>" href="<?php echo url('/'); ?>/people/sort-by-name">Сортировка по именам <i class="ion-android-funnel"></i></a></li>
        <li><a href="">Сортировка по специализациям <i class="ion-code-working"></i></a>
        </li>
        <li><a href="<?php echo url('/'); ?>/people/search">Поиск пользователей <i class="fa fa-search"></i></a></li>
    </ul>
</div>