<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user())->first();
        return view('chats.user-profile',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth()->user()->id;

        $image = $request->file('image');
        $image_new_name = time().$image->getClientOriginalName();
        $image ->move('uploads/image/',$image_new_name);


        $profile = new UserProfile;
        $profile->facebook=$request->facebook;
        $profile->twitter=$request->twitter;
        $profile->skype=$request->skype;
        $profile->bio=$request->bio;
        $profile->user_id=$user;
        $profile->profile_image='uploads/image/'.$image_new_name;
        $profile->save();

        return redirect()->route('userprofile');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('chats.edit-profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $user = Auth::user('id');
        $file = $request->file('image');
        $file_new_name = time().$file->getClientOriginalName();
        $file -> move('uploads/image/', $file_new_name);

        $profile = UserProfile::where('user_id','=',$user);
        $profile-> image = 'uploads/image/'.$file_new_name;
        $profile -> facebook = $request->facebook;
        $profile -> twitter = $request->twitter;
        $profile -> skype = $request->skype;
        $profile -> bio = $request->bio;
        $profile -> user_id = $request->$user;
        $profile->update();

        return redirect('/userprofile');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
