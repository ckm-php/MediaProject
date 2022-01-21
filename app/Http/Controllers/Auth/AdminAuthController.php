<?php

namespace App\Http\Controllers\Auth;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserRoll;
use App\Models\UserRollInfo;
use App\Http\Requests\AdminRequest;
use Auth;


class AdminAuthController extends Controller
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
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('auth.admin.login');
    }

    public function index()
    {
        $details = User::latest()->paginate(5);
        return view('auth.admin.index',compact('details'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(AdminRequest $request)
    {
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        //dd($request->all());
        //$name = Auth::guard();


        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();
            //dd($user);
            //return view('auth.admin.dashboard');
            // \Session::put('success','You are Login successfully!!');
           // return redirect()->route('dashboard');
           $details = User::latest()->paginate(5);
        return view('auth.admin.index',compact('details'))
        ->with('i',(request()->input('page',1)-1)*5);
            
        } else {
            return back()->with('error','your username and password are wrong.');
        }

    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        \Session::flush();
        return redirect(route('adminLogin'));
    }
}