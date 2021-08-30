<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function user_search(Request $request){
        if($request->search){
            $ReuestSent =Friend::where('user_Id',Auth::user()->id)->pluck('friend_id')->toArray();
            $userSearchResults = User::with('profilepic')->where('name', 'LIKE', '%'.$request->search.'%')->get();
            return view('frontEnd.home.search',['userSearchResults'=>$userSearchResults,'ReuestSent'=>$ReuestSent]);
        }else{
            return view('frontEnd.home.search');
        }

    }
}
