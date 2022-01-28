<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest; 
use App\Models\User;
use DB;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('auth.admin.dashboard');
    }

    public function index()
    {
        $details = User::latest()->paginate(5);
        return view('auth.admin.index',compact('details'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        //
        return view('auth.admin.create');
    }

    public function userAddSubmit(UserRequest $request)
    {
        $input = $request->all();
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'birthdate' => $request->birthdate,
            'address'=> $request->address
        ]);

        return redirect()->route('user.list')
                        ->with('success','Member created successfully.');
    }

    public function edit(User $user)
    {
        dd($user);
        
        // $decrypted = Crypt::decrypt($user->password);
        //$password = decrypt($user->password);
        //$password = Hash::make('123456');
        // $password =Hash::check(request('password'), $user->password);
        // dd($password);
        return view('auth.admin.edit',compact('user'));
    }

    public function userUpdateSubmit(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'birthdate'=> 'required',
            'address'=> 'required',
        ]);
    
        $user->update($request->all());
    
        return redirect()->route('user.list')
                        ->with('success','Member updated successfully');

    }

    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('user.list')
        ->with('success','Member deleted successfully');
    }
}