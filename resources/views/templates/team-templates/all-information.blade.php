<?php
if ($team->budget == 1) {
        $budget = "< 5000$";
} else if ($team->budget == 2) {
        $budget = "5000$ - 10000";
} else if ($team->budget == 3) {
        $budget = "> 10000$";
}
?>

<ul class="specs">
        <li class="boldy"> <i class="fa fa-map-marker"></i> {{ $team->country }}</li>
        <li class="boldy"> <i class="fa fa-dollar"></i> {{ $budget }}  </li>
        <li class="boldy"> <i class="ion-person-add"></i> {{ DB::table('result_table_team_spec')->where('team_id', $team->id)->count() }}  </li>

</ul>