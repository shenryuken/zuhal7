<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Profile;

use Auth;
use DB;

class ProfileController extends Controller
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

    public function edit($id)
    {   
        $getCountries = DB::table('countries')->pluck("name","id");
        $profile = Profile::find($id);

        if($profile){
            $country = DB::table('countries')->where('id', $profile->country_id)->first()->name;
            $state   = DB::table('states')->where('id', $profile->state_id)->first()->name;;
            $city    = DB::table('cities')->where('id', $profile->city_id)->first()->name;
        }

        return view('profiles.edit', compact('profile', 'getCountries', 'country', 'state', 'city'));
    }

    public function create()
    {
        $getCountries = DB::table('countries')->pluck("name","id");
    	return view('profiles.create', compact('getCountries'));
    }

    public function store(Request $request)
    {
    	$request->validate([
                'first_name'	=>'required',
                'last_name'		=>'required',
                'icno'			=>'required',
                'dob'			=>'required',
                'gender'		=>'required',
                'contact_mobile'=>'required',
                'contact_home'	=>'',
                'contact_office'=>'',
                'street'		=>'required',
                'city'			=>'required',
                'postcode'		=>'required',
                'state'			=>'required',
                'country'		=>'required',
            ]);

    	$profile = new Profile;
    	$profile->first_name 	= $request->first_name;
    	$profile->last_name		= $request->last_name;
    	$profile->icno 			= $request->icno;
    	$profile->dob 			= $request->dob;
    	$profile->gender 		= $request->gender;
    	$profile->contact_mobile= $request->contact_mobile;
    	$profile->contact_home	= $request->contact_home;
    	$profile->contact_office= $request->contact_office;
    	$profile->street 		= $request->street;
    	$profile->city_id 		= $request->city;
    	$profile->postcode 		= $request->postcode;
    	$profile->state_id 		= $request->state;
    	$profile->country_id 	= $request->country;
    	//$profile->save();

    	$user = Auth::user();

    	$user->profile()->save($profile);

    	return redirect()->action('UserController@index');
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
                'first_name'    =>'required',
                'last_name'     =>'required',
                'icno'          =>'required',
                'dob'           =>'required',
                'gender'        =>'required',
                'contact_mobile'=>'required',
                'contact_home'  =>'',
                'contact_office'=>'',
                'street'        =>'required',
                'city'          =>'required',
                'postcode'      =>'required',
                'state'         =>'required',
                'country'       =>'required',
            ]);

        $profile = Profile::find($id);
        $profile->first_name = $request->first_name;
        $profile->last_name  = $request->last_name;
        $profile->icno       = $request->icno;
        $profile->dob        = $request->dob;
        $profile->gender     = $request->gender;
        $profile->contact_mobile = $request->contact_mobile;
        $profile->contact_home   = $request->contact_home;
        $profile->contact_office = $request->contact_office;
        $profile->street         = $request->street;
        $profile->city_id        = $request->city == '' ? $profile->city_d : $request->city;
        $profile->postcode       = $request->postcode;
        $profile->state_id       = $request->state == '' ? $profile->state_id : $request->state;
        $profile->country_id     = $request->country == '' ? $profile->country_id : $request->country;
        $profile->save();

        //return view('profiles.show', compact('profile'));
        return redirect('profile/show', $id);
    }

    // public function updateField(Request $request)
    // {
    //     if($request->ajax()){
    //         Profile::find($request->get('pk'))->update([$request->get('name') => $request->get('value')]);
    //         return response()->json(['success'=>true)]);
    //     }
    // }

    public function show($user_id)
    {
    	$getCountries = DB::table('countries')->pluck("name","id");
        $user_id = $user_id;
    	//dd(json_encode($getCountries));
    	$profile = Profile::where('user_id', $user_id)->first();

        if($profile){
            $country = DB::table('countries')->where('id', $profile->country_id)->first()->name;
            $state   = DB::table('states')->where('id', $profile->state_id)->first()->name;;
            $city    = DB::table('cities')->where('id', $profile->city_id)->first()->name;
        }
        


    	return view('profiles.show', compact('profile', 'getCountries', 'user_id', 'country', 'state', 'city'));
    } 

    // public function getStates($code) 
    // {
    //     $states = DB::getByCode($code)->divisions()->get();

    //     return json_encode($states);

    // }

    // public function getCities($sid)
    // {
    //     $cities= DB::table("world_cities")
    //             ->where("division_id",$sid)
    //             ->pluck("name","id");
    //     return response()->json($cities);
    // }
}

