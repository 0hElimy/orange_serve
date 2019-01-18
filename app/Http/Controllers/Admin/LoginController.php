<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\LoginAdmin;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

//    public function login(Request $request)
//    {
////        $login_ip = $request->ip();
////        $login_time = date('Y-m-d H:i:s', time());
////
////        LoginAdmin::
//        $this->validateLogin($request);
//
//        // If the class is using the ThrottlesLogins trait, we can automatically throttle
//        // the login attempts for this application. We'll key this by the username and
//        // the IP address of the client making these requests into this application.
//        $throttles = $this->isUsingThrottlesLoginsTrait();
//        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
//            $this->fireLockoutEvent($request);
//
//            //日志记录
//            $this->login_logs(['name'=>$request->input('name'), 'login_ip'=>$request->ip(), 'login_result'=>0, 'comments'=>'限制登录10分钟']);
//
//            return $this->sendLockoutResponse($request);
//        }
//
//        $credentials = $this->getCredentials($request);
//
//        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
//            //日志记录
//            $this->login_logs(['name'=>$request->input('name'), 'login_ip'=>$request->ip(), 'login_result'=>1, 'comments'=>'登录成功']);
//
//            return $this->handleUserWasAuthenticated($request, $throttles);
//        }
//
//        // If the login attempt was unsuccessful we will increment the number of attempts
//        // to login and redirect the user back to the login form. Of course, when this
//        // user surpasses their maximum number of attempts they will get locked out.
//        if ($throttles && ! $lockedOut) {
//            //日志记录
//            $this->login_logs(['name'=>$request->input('name'), 'login_ip'=>$request->ip(), 'login_result'=>0, 'comments'=>'登录失败']);
//
//            $this->incrementLoginAttempts($request);
//        }
//
//        return $this->sendFailedLoginResponse($request);
//    }
//
//    /**
//     * 登录记录
//     * @param $data
//     */
//    private function login_logs ($data)
//    {
//        LoginLog::create($data);
//    }

    /**
     * 改成用户名登录
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'name';
    }

    /***
     * 多字段登录
     * @param Request $request
     * @return bool
     */
    public function attemptLogin(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');

        // 验证用户名登录方式
        $usernameLogin = $this->guard()->attempt(
            ['name' => $name, 'password' => $password], $request->has('remember')
        );
        if ($usernameLogin) {
            return true;
        }

        // 验证手机号登录方式
        $mobileLogin = $this->guard()->attempt(
            ['mobile' => $name, 'password' => $password], $request->has('remember')
        );
        if ($mobileLogin) {
            return true;
        }

        // 验证邮箱登录方式
        $emailLogin = $this->guard()->attempt(
            ['email' => $name, 'password' => $password], $request->has('remember')
        );
        if ($emailLogin) {
            return true;
        }

        return false;
    }

    /**
     * 加入验证码验证
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'captcha' => 'required|captcha',
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    protected function guard()
    {
        return auth()->guard('admin');
    }

    /**
     * 后台管理员退出跳转到后台登录页面
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/admin/login');
    }
}