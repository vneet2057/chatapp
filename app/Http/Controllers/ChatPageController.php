<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatPageController extends Controller
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
        $chat_one = DB::table('chats')
        ->join('users','chats.friend_one_id','=','users.id')
        ->Where('friend_two_id', '=',Auth()->user()->id)->select('chats.*','users.*')
        ->get();
        $chat_two = DB::table('chats')
        ->join('users','chats.friend_two_id','=','users.id')
        ->where('friend_one_id','=',Auth()->user()->id)
        ->select('chats.*','users.*')
        ->get();
      
        return view('chats.chat-page',compact('chat_one','chat_two'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChatPage  $chatPage
     * @return \Illuminate\Http\Response
     */
    public function show(ChatPage $chatPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChatPage  $chatPage
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatPage $chatPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChatPage  $chatPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatPage $chatPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChatPage  $chatPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatPage $chatPage)
    {
        //
    }

    function getProfile($id) {
        $user_profile = DB::table('users')
        ->where('id','=',$id)
        ->join('user_profiles','users.id','=','user_profile.user_id')
        ->get();
        return response()->json([
            'status'=>200,
            'data'=>$user_profile
        ]);
    }
}
