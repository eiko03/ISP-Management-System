<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
//    protected function credentials(Request $request)
//    {
//
//        $credentials= $request->only($this->username(), 'password');
//        $credentials['status']=1;
//        return $credentials;
//    }
//
//    protected function sendFailedLoginResponse(Request $request)
//    {
//
//        $errors= [$this->username() => trans('auth.failed')];
//        $user= \App\User::where($this->username(),$request->{$this->username()})->first();
//        if($user && Hash::check($request->password, $user->password) && $user->status != 1){
//            $errors=[$this->username()=>'Your Account is Not Activated By admin Yet'];
//        }
//        if ($request->expectsJson()){
//            return response()->json($errors,422);
//        }
//        return redirect()->back()->withInput($request->only($this->username().'remember'))->withErrors($errors);
//
//
//    }
}
