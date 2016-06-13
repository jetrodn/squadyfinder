<div class="people-list">
    @foreach($users->chunk(3) as $row)
        <div class="row">

        @foreach($row as $user)
            <div class="col-md-4 person">
                <a href="<?php echo url('/'); ?>/user-profile/{{$user->id}}">
                    <img src="<?php echo url('/'); ?>/{{ $user->avatar }}" alt="avatar">
                    <h3>{{ $user->name }}</h3>
                    @if($user->show_email)
                        <h6>{{ $user->email }}</h6>
                    @endif
                    <ul>

                        <?php
                        $t_id = $user->id;
                        $i = 0;

                        $specs = (\Illuminate\Support\Facades\DB::select("SELECT specializations.spec_name, specializations.class_name
                                  FROM users, specializations, result_table_user_spec
                                    WHERE users.id = result_table_user_spec.user_id
                                      AND specializations.id = result_table_user_spec.spec_id
                                      AND users.id = $t_id;"));
                        ?>

                        @foreach ($specs as $spec)
                            @if(++$i < 4)
                                <li class="{{ $spec->class_name }}">{{ $spec->spec_name }}</li>
                            @endif
                        @endforeach

                    </ul>
                    {{--<p>{{ $user->created_at }}</p>--}}
                </a>

            </div>
        @endforeach
            </div>
    @endforeach
</div>

{!!  $users->render() !!}
