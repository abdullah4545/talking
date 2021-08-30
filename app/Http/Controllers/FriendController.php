<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sentFrRequest($id)
    {
        if(!Friend::where('user_Id', Auth::user()->id)
            ->where('friend_id', $id)
            ->count() && !Friend::where('friend_id', Auth::user()->id)
            ->where('user_Id', $id)
            ->count()){
                $newFriend = New Friend();
                $newFriend->user_Id=Auth::user()->id;
                $newFriend->friend_id=$id;
                $newFriend->save();
        }
    }

    public function confirmFrRequest($id)
    {
        $friendConfirm =Friend::where('user_Id', $id)
                        ->where('friend_id', Auth::user()->id)
                        ->where('approved', '0')
                        ->where('blocked', '0')
                        ->update(['approved'=> '1']);
       
    }

    public function deleteFrRequest($id)
    {
        $friendDelete =Friend::find($id);
        $friendDelete->delete();
        return response()->json("deleted request", 200);
       
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
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
