<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if ($this->guard()->validate($this->credentials($request))) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'privilage' => ['customer', 'admin', 'manager']])) {
                return redirect('/home');
            } else {
                $this->incrementLoginAttempts($request);
                return redirect('/login')->with(
                    'error',
                    'This account is not activated yet.'
                );
            }
        } else {
            // dd('ok');
            $this->incrementLoginAttempts($request);
            return redirect('/login')->with(
                'error',
                'Credentials do not match our database.'
            );
        }
    }
}
