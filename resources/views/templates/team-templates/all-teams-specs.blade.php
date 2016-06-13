
<?php
    $specs = DB::select("SELECT * FROM specializations where id in (SELECT spec_id FROM result_table_team_spec WHERE team_id = $team->id);");
?>

<ul class="specs">
    @foreach($specs as $spec)
       <li class="{{ $spec->class_name }} boldy">{{ $spec->spec_name }}</li>
    @endforeach
</ul>