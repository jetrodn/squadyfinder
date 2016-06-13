<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;

class DashController extends Controller
{
    /**
     * Get home dashboard view
     *
     * @return dashboard.home
     * @url
     * @method
     */
    public function getHomeDash()
    {
        $teams = DB::table('teams')
            ->where('owner_user_id', '=', Auth::user()->id)
            ->get();

        $notifications = $this->getNotificationsForView($teams);

        $params = [
            'title' => Auth::user()->name,
            'team' => $teams,
            'notifications' => $notifications
        ];
        return view('dashboard.home', $params);
    }

    /**
     * Uploading profile avatar
     *
     * @return
     * @url
     * @method
     */
    public function uploadProfileAvatar()
    {
        if (Input::hasFile('image')) {

            $extension = Input::file('image')->getClientOriginalExtension();

            $init_path = url('/');
            $path_to_dir = url('/') . '/images/uploads/avatars/';

            if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {

                $file = Input::file('image');

                $file_name = $file->getClientOriginalName();

                $file->move('images/uploads/avatars', $file_name);

                $url = 'images/uploads/avatars/' . $file_name;

                $img = Image::make($url);
                $img->fit(300, 300);
                $img->save($url);

                DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update(['avatar' => $url]);

                return Redirect::to($init_path . '/home')->with('success_message', 'Изображение профиля успешно изменено!');

            } else {
                return Redirect::to($init_path . '/home')->with('error_message', 'Упс. Ошибочка. Данный файл не поддерживается!');
            }
        }

    }

    /**
     * Setup user profile information
     *
     * @return dashboard.setup-user-profile
     * @url dash/setup-user-profile
     * @method get
     */
    public function setupUserProfile()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;

        $teams = DB::table('teams')
            ->where('owner_user_id', '=', Auth::user()->id)
            ->get();

        $notifications = $this->getNotificationsForView($teams);

        $params = [
            'title' => 'Изменения имейла',
            'team' => $teams,
            'user' => $user,
            'notifications' => $notifications,
        ];

        return view('dashboard.setup-user-profile', $params);
    }

    /**
     * Update user profile
     *
     * @return dash.setup-user-profile
     * @url
     * @method post
     */
    public function questionnaireUpdateAction()
    {

        $user_id = Auth::user()->id;

        $full_name = Input::get('full_name');
        $gender = Input::get('gender');
        $about_short = Input::get('about_short');
        $about_long = Input::get('about_long');
        $country = Input::get('country');

        $social_skype = Input::get('social_skype');
        $social_vk = Input::get('social_vk');
        $social_facebook = Input::get('social_facebook');
        $social_twitter = Input::get('social_twitter');
        $social_googleplus = Input::get('social_googleplus');

        $social_website = Input::get('social_website');
        $social_github = Input::get('social_github');
        $social_reddit = Input::get('social_reddit');
        $social_linkedin = Input::get('social_linkedin');
        $social_bitbucket = Input::get('social_bitbucket');

        if ($full_name != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['name' => $full_name]);
        }

        if ($gender != null) {

            if ($gender == "gender-male") {
                DB::table('users')
                    ->where('id', $user_id)
                    ->update(['gender' => $gender]);

                DB::table('users')
                    ->where('id', $user_id)
                    ->update(['avatar' => "images/default/avatar-default-male.png"]);
            }

            if ($gender == "gender-female") {
                DB::table('users')
                    ->where('id', $user_id)
                    ->update(['gender' => $gender]);

                DB::table('users')
                    ->where('id', $user_id)
                    ->update(['avatar' => "images/default/avatar-default-female.png"]);
            }
        }

        if ($about_short != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['about_short' => $about_short]);
        }

        if ($country != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['country' => $country]);
        }

        if ($about_long != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['about_long' => $about_long]);
        }


        if ($social_skype != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['social_skype' => $social_skype]);
        }

        if ($social_vk != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['social_vk' => $social_vk]);
        }

        if ($social_facebook != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['social_facebook' => $social_facebook]);
        }

        if ($social_twitter != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['social_twitter' => $social_twitter]);
        }

        if ($social_googleplus != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['social_googleplus' => $social_googleplus]);
        }

        if ($social_website != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['social_website' => $social_website]);
        }

        if ($social_github != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['social_github' => $social_github]);
        }

        if ($social_reddit != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['social_reddit' => $social_reddit]);
        }

        if ($social_linkedin != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['social_linkedin' => $social_linkedin]);
        }

        if ($social_bitbucket != null) {
            DB::table('users')
                ->where('id', $user_id)
                ->update(['social_bitbucket' => $social_bitbucket]);
        }

        return Redirect::to('dash/setup-user-profile')->with('success_message', 'Данные успешно были обновлены!');
    }

    /**
     * User specializations
     *
     * @return dashboard.specialization-settings
     * @url
     * @method get
     */
    public function generalUserSpecSettings()
    {

        $user_id = Auth::user()->id;
        $specs = DB::table('specializations')->get();

        $selected_specs = DB::table('specializations')
            ->whereIn('id', function ($query) {
                $query
                    ->select('spec_id')
                    ->from('result_table_user_spec')
                    ->where('user_id', '=', Auth::user()->id);
            })->get();

        $teams = DB::table('teams')
            ->where('owner_user_id', '=', Auth::user()->id)
            ->get();

        $notifications = $this->getNotificationsForView($teams);

        $params = [
            'title' => 'Настройки профиля',
            'specs' => $specs,
            'selected_specs' => $selected_specs,
            'team' => $teams,
            'notifications' => $notifications
        ];

        return view('dashboard.specialization-settings', $params);
    }

    /**
     * Update profile specs
     * todo: посмотреть тут запрос некрасивый
     * @return
     * @url
     * @method post
     */
    public function updateProfileSpecialization()
    {
        $checked[] = Input::get('specs');

        if (Input::get('specs')) {
            foreach ($checked as $check) {
                $user_id = Auth::user()->id;
                foreach ($check as $entity) {
                    DB::insert("INSERT INTO result_table_user_spec (user_id, spec_id) VALUES (" . $user_id . ", " . $entity . ")");
                }
            }
            return Redirect::to('dash/profile-settings')->with('message', 'Ура! Ваши навыки были успешно обновлены!');

        } else {
            return Redirect::to('dash/profile-settings')->with('error_message', 'Сорян, ошибочка произошла!');
        }
    }

    /**
     * Reset all users specializations
     * todo: посмотреть почему не работает тот запрос
     * Call to undefined method Illuminate\Database\Query\Builder::detele()
     * @return
     * @url
     * @method get
     */
    public function resetSpecs()
    {
//        DB::table('result_table_user_spec')
//            ->where('user_id', '=', Auth::user()->id)
//            ->detele();

        $user_id = Auth::user()->id;
        DB::delete("DELETE FROM result_table_user_spec where user_id = " . $user_id . ";");


        return Redirect::to('dash/profile-settings')->with('message', 'Ваши данные были успешно сброшены');
    }

    /**
     * Team settings - All teams
     *
     * @return dashboard.team-settings
     * @url
     * @method get
     */
    public function setupTeamSettings()
    {
        $user_subscribed = [];
        $user_id = Auth::user()->id;

        $teams = DB::table('teams')
            ->where('owner_user_id', '=', Auth::user()->id)
            ->get();

        $notifications = $this->getNotificationsForView($teams);
        $user_subscribed = $this->getSubscribedUsersInfo($teams);
        $params = [
            'title' => 'Настройки команды ' . $teams[0]->team_name,
            'team' => $teams,
            'notifications' => $notifications,
            'user_subscribed' => $user_subscribed
        ];

        return view('dashboard.team-settings', $params);
    }

    /**
     * Delete all notifications at team settings panel
     *
     * @return
     * @url
     * @method
     */
    public function deleteTeamNotifications()
    {

        $teams = DB::table('teams')
            ->where('owner_user_id', '=', Auth::user()->id)
            ->get();

        $user_subscribed = $this->getSubscribedUsersInfo($teams);

        foreach ($user_subscribed as $entity) {
            DB::table('result_subscribing_user_notifications')
                ->where('user_id', '=', $entity->id)
                ->delete();
        }

        return redirect('dash/team-settings')->with('success_message', 'Оповещения были успешно очищены');
    }

    /**
     * Setup each team
     *
     * @return dashboard.setup-each-team
     * @url
     * @method get
     */
    public function setupEachTeam($id)
    {
        $teams = DB::table('teams')
            ->where('id', '=', $id)
            ->get();

        $specs = DB::table('specializations')->get();

        $teams_user = DB::table('teams')
            ->where('owner_user_id', '=', Auth::user()->id)
            ->get();
        $notifications = $this->getNotificationsForView($teams_user);

        $params = [
            'title' => 'Изменения имейла',
            'team' => $teams,
            'notifications' => $notifications,
            'specs' => $specs
        ];

        return view('dashboard.setup-each-team', $params);
    }

    /**
     * Create a new team view
     *
     * @return
     * @url
     * @method get
     */
    public function getCreateNewTeamView()
    {
        $specs = DB::table('specializations')->get();
        $parameters = [
            'title' => 'Новая команда',
            'specs' => $specs
        ];
        return view('teams.create-new-team', $parameters);
    }

    /**
     * Creating a new team
     * todo: уникальное название для изображения
     * @return
     * @url
     * @method post
     */
    public function postTeam()
    {

        $teamname = Input::get('new_team_name');
        $team_slogan = Input::get('team_slogan');
        $short_description = Input::get('short_description');
        $team_description = Input::get('team_description');
        $country = Input::get('country');

        $budget = Input::get('budget');
        $duration = Input::get('duration');
        $bb = 0;

        if ($budget == "budget_option_1") {
            $bb = 1;
        } else if ($budget == "budget_option_2") {
            $bb = 2;
        } else if ($budget == "budget_option_3") {
            $bb = 3;
        }

        $target_1 = Input::get('target_1');
        $target_2 = Input::get('target_2');
        $target_3 = Input::get('target_3');

        $checked[] = Input::get('specs');


        $team_url = $teamname;
        $date = new \DateTime();

        DB::table('teams')->insert([
            [
                'team_name' => $teamname,
                'team_slogan' => $team_slogan,
                'team_description' => $team_description,
                'team_short_description' => $short_description,
                'owner_user_id' => Auth::user()->id,
                'team_url' => $team_url,
                'country' => $country,
                'created_at' => $date->format('Y-m-d H:i:s'),
                'updated_at' => $date->format('Y-m-d H:i:s'),
                'scope_1' => $target_1,
                'scope_2' => $target_2,
                'scope_3' => $target_3,
                'budget' => $bb
            ]
        ]);

        $team_id = DB::table('teams')->select('id')->orderBy('id', 'desc')->first();

        /*==========================================
        Get team image
        ============================================*/
        if (Input::hasFile('cover')) {
            $extension = Input::file('cover')->getClientOriginalExtension();

            if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {

                $file = Input::file('cover');
                $file_name = $file->getClientOriginalName();

                $file->move('images/uploads/teams', $file_name);

                $url_to_image = 'images/uploads/teams/' . $file_name;

                $img = Image::make($url_to_image);
                $img->fit(1920, 1080);
                $img->save($url_to_image);


                DB::table('teams')->where('id', $team_id->id)->update(['image_href' => $url_to_image]);

            } else {
                echo "ext error";
            }
        } else {
            echo "no file";
        }

        if (Input::get('specs')) {
            foreach ($checked as $check) {
                $user_id = Auth::user()->id;
                foreach ($check as $ch) {
                    DB::table('result_table_team_spec')->insert([
                        [
                            'team_id' => $team_id->id,
                            'spec_id' => $ch
                        ]
                    ]);
                }
            }
        }

        return Redirect::to('teams/team/' . $team_id->id);
    }

    /**
     * Update a certain team
     * todo: проверить изменение всех полей (цели вроде не работают)
     * @return
     * @url
     * @method
     */
    public function updateTeam()
    {
        $team_id = Input::get('team_id');

        $team = DB::table('teams')
            ->where('id', $team_id)
            ->get();

        $teamname = Input::get('new_team_name');
        $team_slogan = Input::get('team_slogan');
        $short_description = Input::get('short_description');
        $team_description = Input::get('team_description');
        $country = Input::get('country');

        $budget = Input::get('budget');
        $duration = Input::get('duration');
        $bb = 0;


        if ($budget != null) {
            if ($budget == "budget_option_1") {
                $bb = 1;
            } else if ($budget == "budget_option_2") {
                $bb = 2;
            } else if ($budget == "budget_option_3") {
                $bb = 3;
            }

            DB::table('teams')
                ->where('id', $team_id)
                ->update(['budget' => $bb]);
        }

        $target_1 = Input::get('target_1');
        $target_2 = Input::get('target_2');
        $target_3 = Input::get('target_3');

        $checked[] = Input::get('specs');

        $team_url = $teamname;
        $date = new \DateTime();

        if ($teamname != null) {
            DB::table('teams')
                ->where('id', $team_id)
                ->update([
                    'team_name' => $teamname,
                    'team_url' => $team_url
                ]);
        }

        if ($team_slogan != null) {
            DB::table('teams')
                ->where('id', $team_id)
                ->update(['team_slogan' => $team_slogan]);
        }

        if ($short_description != null) {
            DB::table('teams')
                ->where('id', $team_id)
                ->update(['team_short_description' => $short_description]);
        }

        if ($team_description != null) {
            DB::table('teams')
                ->where('id', $team_id)
                ->update(['full_description' => $team_description]);
        }

        if ($country != null) {
            DB::table('teams')
                ->where('id', $team_id)
                ->update(['country' => $country]);
        }

        if (Input::get('specs')) {

            /* Clear database */
            DB::table('result_table_team_spec')
                ->where('team_id', $team_id)
                ->delete();

            foreach ($checked as $check) {
                foreach ($check as $ch) {

                    DB::table('result_table_team_spec')->insert([
                        [
                            'team_id' => $team_id,
                            'spec_id' => $ch
                        ]
                    ]);
                }
            }
        }

        if (Input::hasFile('cover')) {
            $extension = Input::file('cover')->getClientOriginalExtension();

            if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {

                $file = Input::file('cover');
                $file_name = $file->getClientOriginalName();

                $file->move('images/uploads/teams', $file_name);

                $url_to_image = 'images/uploads/teams/' . $file_name;

                $img = Image::make($url_to_image);
                $img->fit(1920, 1080);
                $img->save($url_to_image);


                DB::table('teams')->where('id', $team_id)->update(['image_href' => $url_to_image]);

            } else {
                //todo: дописать эту часть
            }
        } else {
            //todo: дописать тут тоже
        }

        DB::table('teams')
            ->where('id', $team_id)
            ->update([
                'updated_at' => $date->format('Y-m-d H:i:s'),
            ]);

        return Redirect::to('dash/team-settings/' . $team[0]->id)->with('success_message', 'Команда обновлена!');
    }

    /**
     * Additional user settings
     *
     * @return dashboard.more-settings
     * @url dash/more-settings
     * @method get
     */
    public function moreSettings()
    {

        $teams = DB::table('teams')
            ->where('owner_user_id', '=', Auth::user()->id)
            ->get();

        $notifications = $this->getNotificationsForView($teams);

        $params = [
            'title' => 'Дополнительные настройки',
            'showEmailSettings' => Auth::user()->show_email,
            'geoResults' => Auth::user()->geo_results,
            'team' => $teams,
            'notifications' => $notifications,
        ];

        return view('dashboard.more-settings', $params);
    }

    /**
     * Additional Settings - Email switcher
     * todo: переписать запросы
     * @return
     * @url
     * @method post
     */
    public function setupShowEmail()
    {
        $user_id = Auth::user()->id;
        $show_email = $_POST['show-value'];
        if ($show_email == 'true') {
            DB::update("UPDATE users SET show_email = 1 where id = " . Auth::user()->id);
            print_r($show_email);
        } else {
            DB::update("UPDATE users SET show_email = 0 where id = " . Auth::user()->id . ";");
            print_r($show_email);
        }
    }

    /**
     * Additional Settings - Geo Results switcher
     * todo: переписать запросы
     * @return
     * @url
     * @method
     */
    public function setupGeoResults()
    {
        $user_id = Auth::user()->id;
        $geo = $_POST['show-value'];
        if ($geo == 'true') {
            DB::update("UPDATE users SET geo_results = 1 where id = " . Auth::user()->id);
        } else {
            DB::update("UPDATE users SET geo_results = 0 where id = " . Auth::user()->id . ";");
        }
    }

    /**
     * Change password page
     *
     * @return dashboard.change-password
     * @url dash/change-password
     * @method get
     */
    public function changePasswordView()
    {
        $teams = DB::table('teams')
            ->where('owner_user_id', '=', Auth::user()->id)
            ->get();

        $notifications = $this->getNotificationsForView($teams);

        $params = [
            'title' => 'Изменения пароля',
            'team' => $teams,
            'notifications' => $notifications
        ];

        return view('dashboard.change-password', $params);
    }

    /**
     * Change password action
     *
     * @return
     * @url
     * @method post
     */
    public function changePasswordAction()
    {
        $user_id = Auth::user()->id;
        $old_password = Input::get('old_password');
        $new_password = Input::get('new_password');
        $new_password_check = Input::get('new_password_check');

        if (!(Hash::check($old_password, Auth::user()->password))) {
            return Redirect::to('dash/change-password')->with('error_message', 'Неправильный старый пароль!');
        } else if ($new_password != $new_password_check) {
            return Redirect::to('dash/change-password')->with('error_message', 'Новые пароли не совпадают! Проверьте ввод данных');
        } else {
            $password = Hash::make($new_password);

            DB::table('users')
                ->where('id', $user_id)
                ->update(['password' => $password]);

            return Redirect::to('dash/change-password')->with('success_message', 'Ваш пароль был успешно изменен!');
        }
    }

    /**
     * Change email view
     *
     * @return
     * @url
     * @method get
     */
    public function changeEmail()
    {

        $teams = DB::table('teams')
            ->where('owner_user_id', '=', Auth::user()->id)
            ->get();

        $notifications = $this->getNotificationsForView($teams);

        $params = [
            'title' => 'Изменения имейла',
            'team' => $teams,
            'notifications' => $notifications,
        ];

        return view('dashboard.change-email', $params);
    }

    /**
     * Change email action
     *
     * @return
     * @url
     * @method post
     */
    public function changeEmailAction()
    {
        $new_email = Input::get('new_email');
        $password = Input::get('password');
        $user_id = Auth::user()->id;

        if (!(Hash::check($password, Auth::user()->password))) {
            return Redirect::to('dash/change-email')->with('error_message', 'Неправильный пароль!');
        } else {
            DB::table('users')->where('id', $user_id)->update(['email' => $new_email]);
            return Redirect::to('dash/change-email')->with('success_message', 'Ваш имейл был успешно изменен!');
        }
    }

    /**
     * Delete profile view
     *
     * @return
     * @url
     * @method
     */
    public function deleteProfile()
    {
        $teams = DB::table('teams')
            ->where('owner_user_id', '=', Auth::user()->id)
            ->get();

        $notifications = $this->getNotificationsForView($teams);

        $params = [
            'title' => 'Изменения пароля',
            'team' => $teams,
            'notifications' => $notifications,
        ];

        return view('dashboard.delete-profile', $params);
    }

    /**
     * Delete profile action
     *
     * @return
     * @url
     * @method
     */
    public function deleteProfileAction()
    {
        $user_id = Auth::user()->id;
        $user_password = Auth::user()->password;
        $password = Input::get('password');

        if ($password != $user_password) {
            return Redirect::to('dash/delete-profile')->with('error_message', 'Пароль введет неправильно!');
        } elseif ($password == $user_password) {
            DB::table('users')->where('id', '=', $user_id)->delete();
            return Redirect::to('/')->with('error_message', 'Надеемся, Вы еще вернетесь!');
        }
    }

    /**
     * Get notifications
     *
     * @return $notifications
     * @url
     * @method
     */
    public function getNotificationsForView($teams)
    {

        $notifications = [];

        foreach ($teams as $team) {
            $temp = DB::table('result_subscribing_user_notifications')
                ->select('notification_id', 'team_id')
                ->where('team_id', '=', $team->id)
                ->get();
            $notifications = array_merge($notifications, $temp);
        }

        if ($notifications === null) $notifications = null;

        return $notifications;
    }

    /**
     * Get subscribed users
     * todo: посмотреть запрос внутри
     * @return $user_subscribed
     * @url
     * @method
     */
    public function getSubscribedUsersInfo($teams)
    {

        $user_subscribed = [];

        foreach ($teams as $team) {

            $temp = DB::select("SELECT u.id, u.name, t.team_name, t.team_url from users u, teams t where u.id in (SELECT user_id FROM result_subscribing_user_notifications where team_id = " . $team->id . ") AND t.id = " . $team->id);

            //todo: low -> посмотреть этот запрос

//            $temp = DB::table(DB::raw('users u, teams t'))
//                ->select(DB::raw(u.id, u.name, t.team_name, t.team_url))
//                ->whereIn('users.id', function($query) {
//                    $query
//                        ->select('user_id')
//                        ->from('result_subscribing_user_notifications')
//                        ->where('team_id', '=', $team->id);
//                })
//                ->where('teams.id', '=', $team->id)
//                ->get();

            $user_subscribed = array_merge($user_subscribed, $temp);
        }
        if ($user_subscribed == null) $user_subscribed = null;

        return $user_subscribed;
    }
}
