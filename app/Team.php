<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['team_name', 'team_description', 'team_short_description', 'team_slogan', 'team_url'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public static function search($keyword) {
        return static::where('team', 'LIKE', '%'.$keyword.'%')->paginate(3);
    }
}
