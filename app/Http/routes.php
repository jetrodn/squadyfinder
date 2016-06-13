<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([
    'prefix' => Localization::setLocale(),
    'middleware' => [
        'localization-session-redirect',
        'localization-redirect',
    ],
], function () {

    /**
     * Localized routes
     *
     */
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::get('auth/register', 'Auth\AuthController@getRegister');


    Route::get('/', 'HomeController@getHomePage');
    Route::get('help', 'HomeController@getHelpPage');
    Route::get('contacts', 'HomeController@getContactsPage');

    Route::get('people/all', 'PeopleController@getAllUsers');
    Route::get('user-profile/{id}', 'PeopleController@showUser');

    Route::get('teams/all', "TeamController@getAllTeams");
    Route::get('teams/team/{id}', 'TeamController@getTeamView');


    Route::get('information/for-developers', 'HomeController@getInfoForDevelopers');
    Route::get('information/for-leads', 'HomeController@getInfoForLeads');
    Route::get('information/project-assist', 'HomeController@getInfoAboutAssist');
    Route::get('information/vps-server', 'HomeController@getInfoAboutVPS');
    Route::get('dash/team-settings/clear-notifications', 'Dash\DashController@deleteTeamNotifications');
    /**
     * Guests dont have access to this routes
     *
     */
    Route::group(['middleware' => 'auth'], function () {
        Route::get('join-team-approve/{teamid}', 'TeamController@joinTeamApprove');
        Route::get('join-team-action/{teamid}', 'TeamController@joinTeamAction');

        /**
         * Dashboard routes
         *
         */
        Route::get('home', 'Dash\DashController@getHomeDash');
        Route::post('upload/profile-avatar', 'Dash\DashController@uploadProfileAvatar');
        Route::get('dash/setup-user-profile', 'Dash\DashController@setupUserProfile');
        Route::get('dash/profile-settings', 'Dash\DashController@generalUserSpecSettings');
        Route::post('dash/update-specialization', 'Dash\DashController@updateProfileSpecialization');
        Route::get('dash/team-settings', 'Dash\DashController@setupTeamSettings');

        Route::get('dash/team-settings/{id}',
            [
                'middleware' => 'team_access',
                'uses' => 'Dash\DashController@setupEachTeam'
            ]);

        Route::get('teams/create', 'Dash\DashController@getCreateNewTeamView');


        Route::get('dash/more-settings', 'Dash\DashController@moreSettings');

        Route::post('dash/show-email', 'Dash\DashController@setupShowEmail');
        Route::post('dash/geo-results', 'Dash\DashController@setupGeoResults');

        Route::get('dash/change-password', 'Dash\DashController@changePasswordView');
        Route::post('dash/change-password-action', 'Dash\DashController@changePasswordAction');

        Route::get('dash/change-email', 'Dash\DashController@changeEmail');
        Route::post('dash/change-email-action', 'Dash\DashController@changeEmailAction');

        Route::get('dash/delete-profile', 'Dash\DashController@deleteProfile');
        Route::post('dash/delete-profile-action', 'Dash\DashController@deleteProfileAction');

    });
});

Route::post('teams/search', 'TeamController@searchTeam');
Route::post('people/search', 'PeopleController@searchUsersByQuery');
Route::post('email-subscribe', 'HomeController@emailSubscribe');
Route::post('teams/create-a-team', 'Dash\DashController@postTeam');

Route::post('dash/team-settings/update-a-team',
    [
        'middleware' => 'auth',
        'uses' => 'Dash\DashController@updateTeam'
    ]);

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::post('dash/questionnaire-change-action', 'Dash\DashController@questionnaireUpdateAction');
Route::get('reset-specs', 'Dash\DashController@resetSpecs');
Route::get('teams/create-process-team/{teamname}', 'TeamController@createNewTeam');



/*==========================================
Social Registration - Github
============================================*/
Route::get('auth/register/with-github', 'Auth\AuthController@registerMeWithGithub');
Route::get('auth/register/github-callback', 'Auth\AuthController@getGithubCallback');

/*==========================================
Social Regisration - Twitter
============================================*/
Route::get('auth/register/with-twitter', 'Auth\AuthController@registerMeWithTwitter');
Route::get('auth/register/twitter-callback', 'Auth\AuthController@getTwitterCallback');


/*==========================================
Logs
============================================*/
//Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


//Route::get('people/sort-by-name', 'PeopleController@getUsersSortedByName');
//Route::get('people/search', 'PeopleController@searchUserByName');
//Route::get('search/{name}', 'PeopleController@getSearchResultView');
//Route::post('people/find-user', 'PeopleController@postFindUser');

//Route::get('teams/team/', 'TeamsController@getMainView');

