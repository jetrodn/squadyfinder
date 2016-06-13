<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TeamController extends Controller
{
    /**
     * Get all team view
     *
     * @return
     * @url
     * @method
     */
    public function getAllTeams()
    {
        $teams = Team::orderBy('created_at', 'DESC')->paginate(10);
        $parameters = [
            'title' => 'Команды',
            'teams' => $teams
        ];

        return view('teams.all', $parameters);
    }

    /**
     * Get an certain team view
     *
     * @return teams.team
     * @url /teams/team/{id}
     * @method get
     */
    public function getTeamView($id)
    {
        $teams = DB::table('teams')
            ->where('id', $id)
            ->get();
        $parameters = [
            'title' => 'Команда ' . $teams[0]->team_name,
            'team' => $teams,
        ];

        return view("teams.team", $parameters);
    }

    /**
     * Search a team
     *
     * @return teams.all
     * @url teams/search
     * @method post
     */
    public function searchTeam() {

        $query = Input::get('query');
        $advanced_settings = Input::get('advanced-settings');
        $features_local_search = Input::get('features-local-search');
        $features_free_team = Input::get('features-free-team');
        $budget_search = Input::get('budget-search');

        $teams = DB::table('teams')
            ->where('team_name', 'like', '%' . $query . '%')
            ->orWhere('country', 'like', '%' . $query . '%')
            ->orWhere('team_short_description', 'like', '%' . $query . '%')
            ->orWhere('full_description', 'like', '%' . $query . '%')
            ->orWhere('team_slogan', 'like', '%' . $query . '%')
            ->paginate(10);

        $parameters = [
            'title' => 'Команды',
            'teams' => $teams
        ];

        return view('teams.all', $parameters);
    }

    /**
     * Team joining approve
     *
     * @return teams.join-team-approve
     * @url /join-team-approve/{id}
     * @method get
     */
    public function joinTeamApprove($id) {

        //todo: проверка, что пользователь не является админом этой тимы

        $teams = DB::table('teams')
            ->where('id', '=', $id)
            ->get();

        $params = [
            'title' => 'Присоединиться к команде',
            'team' => $teams
        ];

        return view('teams.join-team-approve', $params);
    }

    /**
     * Team joining action
     *
     * @return teams.join-team-success
     * @url
     * @method post
     */
    public function joinTeamAction($id) {

        $teams = DB::table('teams')
            ->where('id', '=', $id)
            ->get();

        $user_id = Auth::user()->id;

        DB::table('result_subscribing_user_notifications')->insert([
            'notification_id' => 1,
            'user_id' => $user_id,
            'team_id' => $teams[0]->id
        ]);

        $params = [
            'title' => 'Заявка успешно отправлена',
            'team' => $teams
        ];

        return view('teams.join-team-success', $params);
    }

}
