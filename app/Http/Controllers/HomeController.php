<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Team;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Application home page
     *
     * @return home.index
     * @url /
     * @method get
     */
    public function getHomePage() {

        $teams = Team::all()->take(6)->sortByDesc('created_at');
        $params = [
            'appname' => 'GetTeam',
            'title' => 'Поиск команды',
            'teams' => $teams
        ];
        return view('home.index', $params);
    }

    /**
     * Application help page
     *
     * @return home.help
     * @url /help
     * @method get
     */
    public function getHelpPage() {
        $params = [
            'title' => 'Помощь'
        ];
        return view('home.help', $params);
    }

    /**
     * Application contacts page
     *
     * @return home.contact
     * @url /contact
     * @method get
     */
    public function getContactsPage() {
        $params = [
            'title' => 'Контакты'
        ];
        return view('home.contact', $params);
    }

    /**
     * Information for developers page
     *
     * @return home.info.for-developers
     * @url
     * @method get
     */
    public function getInfoForDevelopers() {
        $params = [
            'title' => 'Для разработчиков'
        ];
        return view('home.info.for-developers', $params);
    }

    /**
     * Information for leads page
     *
     * @return home.info.for-leads
     * @url
     * @method get
     */
    public function getInfoForLeads() {
        $params = [
            'title' => 'Для руководителей проектов'
        ];
        return view('home.info.for-leads', $params);
    }

    /**
     * Information about VPS page
     *
     * @return home.info.info-vps
     * @url
     * @method get
     */
    public function getInfoAboutVPS() {
        $params = [
            'title' => 'VPS Сервер'
        ];
        return view('home.info.info-vps', $params);
    }

    /**
     * Assist project page
     *
     * @return home.info.project-assist
     * @url
     * @method get
     */
    public function getInfoAboutAssist() {
        $params = [
            'title' => 'Поддержка проекта'
        ];
        return view('home.info.project-assist', $params);
    }

    /**
     * Email Subscribing
     *
     * @return
     * @url /email-subscribe
     * @method post
     */
    public function emailSubscribe() {
        $email = $_POST['email'];
        if(isset($email)) {
            DB::table('email_subscribers')
                ->insert([
                    'email' => $email
                ]);
        }
    }
}
