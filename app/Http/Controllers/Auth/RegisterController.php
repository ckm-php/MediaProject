<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserRoll;
use App\Models\UserRollInfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'g-recaptcha-response' => 'recaptcha',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     // $name = $data->file('image')->getClientOriginalName();
 
    //     // $path = $data->file('image')->store('public/images');
    //     //dd($data);
    //     $imageName = time().'.'.$request->image->extension();  
    //     dd($imageName);
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function register(Request $request)
    {
        
        $userid = DB::table('users')->count();
        $imgid= $userid+1 .'.'.$request->image->extension();
        /* Store $imageName name in DATABASE from HERE */
    //dd('a');

    
    //$created = Unit::insert($units);

     User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image'=>$imgid
            ]);
       
        $userid = DB::table('users')
                    ->where('email', '=',$request->email) ->get();
    // dd($userid[0]->id);

        $useroll = UserRoll::all();
        foreach($useroll as $rollid) {
            UserRollInfo::create([
                "user_id" =>$userid[0]->id, 
                'roll_id' => $rollid['roll_id'],
                'created_at' => now(), // this could be in model events / observers
                'remark' => 'testing123'
            ]);
        }
       

    $request->image->move(public_path('user_profiles'),$imgid);

    $name = $userid[0]->name;
    $image = $userid[0]->image;
        return view('layouts.reg_index',compact('name','image'));
            
            
    }
}
