<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;

class PeopleController extends Controller
{
    /**
     * Get all users view
     *
     * @return people.all
     * @url /people/all
     * @method get
     */
    public function getAllUsers()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(6);
        $parameters = [
            'title' => 'Люди',
            'users' => $users
        ];
        return view('people.all', $parameters);
    }

    /**
     * Show user's profile
     *
     * @return
     * @url
     * @method
     */
    public function showUser($id)
    {
        $user = DB::table('users')
            ->where('id', '=', $id)
            ->get();

        $team = DB::table('teams')
            ->where('owner_user_id', '=', $id)
            ->get();

        $params = [
            'title' => 'Профайл - ' . $user[0]->name,
            'user' => $user,
            'team' => $team
        ];

        return view('people.user-profile', $params);
    }

    /**
     * Search user
     *
     * @return
     * @url
     * @method
     */
    public function searchUsersByQuery(){

        $query = Input::get('query');
        $advanced_settings = Input::get('advanced-settings');
        $features_advanced_search = Input::get('features-advanced-search');
        $features_no_team = Input::get('features-no-team');

        if ($advanced_settings == "search-by-name") {

            /* Фича - расширенный поиск по имени */
            if ($features_advanced_search == "on") {

                $users = DB::select('select * from users where name like "%' . $query . '%" 
                OR email like "%' . $query . '%" 
                OR about_short like "%' . $query . '%" 
                OR about_long like "%' . $query . '%" 
                OR social_skype like "%' . $query . '%" 
                OR social_facebook like "%' . $query . '%" 
                OR social_twitter like "%' . $query . '%" 
                OR social_googleplus like "%' . $query . '%" 
                OR social_website like "%' . $query . '%" 
                OR social_reddit like "%' . $query . '%" 
                OR social_linkedin like "%' . $query . '%" 
                OR social_bitbucket like "%' . $query . '%" 
                ');

            } else {
                $users = DB::select('select * from users where name like "%' . $query . '%"');
            }

            $per_page = 5;
            $page_start = 1;
            $offset = ($page_start * $per_page) - $per_page;
            $users_paginated = new Paginator(array_slice($users, $offset, $per_page, true), $per_page, $page_start,
                [
                    'path' => Paginator::resolveCurrentPath(),
                ]
            );

            $params = [
                'query' => $query,
                'users' => $users_paginated
            ];
            return view('people/search-result', $params);

        } elseif ($advanced_settings == "search-by-email") {

            $users = DB::table('users')
                ->where('email', 'like', '%' . $query . '%')
                ->paginate(6);

            $params = [
                'query' => $query,
                'users' => $users
            ];

            return view('people/search-result', $params);
        } elseif ($advanced_settings == "search-by-spec") {

            $users_merged = [];
            $spec_id = DB::table('specializations')
                ->where('spec_name', 'like', '%' . $query . '%')
                ->value('id');

            $users_with_spec_id = DB::table('result_table_user_spec')
                ->where('spec_id', '=', $spec_id)
                ->get();

            foreach ($users_with_spec_id as $ent) {

                $users = DB::table('users')
                    ->where('id', '=', $ent->user_id)
                    ->get();

                $users_merged = array_merge($users, $users_merged);
            }

            //pagination
            $per_page = 5;
            $page_start = 1;
            $offset = ($page_start * $per_page) - $per_page;
            $users_paginated = new Paginator(array_slice($users_merged, $offset, $per_page, true), $per_page, $page_start,
                [
                    'path' => Paginator::resolveCurrentPath(),
                ]
            );

            $params = [
                'query' => $query,
                'users' => $users_paginated
            ];

            return view('people/search-result', $params);
        }
    }

    /**
     * Paginate an array
     * Making from array => Collection
     *
     * @return
     * @url
     * @method
     */
    public function paginate_array($array, $perPage, $pageStart = 1)
    {

        $offset = ($pageStart * $perPage) - $perPage;

        return new Paginator(array_slice($array, $offset, $perPage, true), $perPage, $pageStart,
            [
                'path' => Paginator::resolveCurrentPath(),
            ]
        );
    }

}
