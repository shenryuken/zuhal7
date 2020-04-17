<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterEmailByIntroducer;

use App\Models\User;

use Auth;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$users = User::all();
    	return view('users.index', compact('users'));
    }

    public function create()
    {
    	return view('users.create');
    }

    public function store(Request $request)
    {
    	try{

        	$request->validate([
                'name'		=>'required',
                'email'		=>'required|confirmed'
            ]);

            $user = new User;
            $user->name 	= $request->name;
            $user->email 	= $request->email;

            $temporaryPassword = str_random(8);

            $user->password = Hash::make($temporaryPassword);
            $user->referral = Auth::user()->name;
            $user->save();

            //update total_referrals for introducer
            $referral = User::where('name',$user->referral)->first();
            $referral->total_referrals =  $referral->total_referrals + 1;
            $referral->save();  

            $details = ['referral' => $user->referral, 'name' => $user->name, 'email' => $user->email, 'temporaryPassword' => $temporaryPassword];
            //send registration details email

            //dd($details);
            Mail::to($user->email)->send(new RegisterEmailByIntroducer($details));

    	}  catch (\Exception $e) {

		    return $e->getMessage();
		}

        //return view('users.index');  
        return redirect()->action('UserController@index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('users')->with('success', 'User deleted!');;
    }
}
