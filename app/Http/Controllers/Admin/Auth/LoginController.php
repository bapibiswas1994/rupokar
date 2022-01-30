<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin-dashboard';

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
        return view('admin.login');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function username()
    {
        return 'email';
    }



    public function doLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //dd($request->password);
        $email = $request->email;
        $password = $request->password;
        try {
            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->route('admin.admin-dashboard');
            } else {
                dd('gggg');
                Session::flash('error', "Invalid email and password");
                return redirect()->back();
            }

            return redirect()->route('admin.admin-dashboard');

        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with($th->getMessage());
        }
    }

    public function logout()
    {
        $this->guard('admin')->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/admin');
    }

    
}
