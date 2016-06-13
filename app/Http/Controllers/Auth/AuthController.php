<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * User registration using github
     *
     * @return
     * @url
     * @method
     */
    public function registerMeWithGithub() {
        return \Socialite::with('github')->redirect();
    }

    /**
     * Github Callback
     *
     * @return
     * @url
     * @method
     */
    public function getGithubCallback() {
        $user = \Socialite::with('github')->user();

//
//        $token = $user->token;
//        $refreshToken = $user->refreshToken;
//        $expiresIn = $user->expiresIn;
//
//        dump($user->getId());
//        dump($user->getNickname());
//        dump($user->getName());
//        dump($user->getEmail());
//        dump($user->getAvatar());
//
//        dump($token);
//        dump($refreshToken);
//        dump($expiresIn);

        dd($user);


    }

    /**
     * User registration using Twitter
     *
     * @return
     * @url
     * @method
     */
    public function registerMeWithTwitter() {
        return \Socialite::with('twitter')->redirect();
    }

    /**
     * Twitter callback
     *
     * @return
     * @url
     * @method
     */
    public function getTwitterCallback() {
        $user = \Socialite::with('twitter')->user();
        dd($user);
    }

}
