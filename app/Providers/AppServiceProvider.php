<?php

namespace App\Providers;

use App\Models\TalkingInfo;
use Illuminate\Support\ServiceProvider;
use App\Models\ProfilePicture;
use Illuminate\Support\Facades\Auth;
use App\Models\CoverPhoto;
use App\Models\Education;
use App\Models\Friend;
use App\Models\Interest;
use App\Models\Post;
use App\Models\UserBasicInfo;
use App\Models\Work;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('frontEnd.includes.header', function ($view) {
            $userIdF =Auth::id();
            $friends= Friend::with(['profilepic','users','friendinfo.profilepic'])
                                ->where('approved', '1')
                                ->where('blocked', '0')
                                ->where('friend_id', $userIdF)
                                ->orWhere('user_Id', $userIdF)
                                ->where('approved', '1')
                                ->get();
            $talkingInfos = TalkingInfo::get();
            $UserNotifi = User::find(Auth::user()->id);
            $userProfile=ProfilePicture::where('userId',Auth::user()->id)->latest()->take(1)->first();
            $view->with(['friends'=>$friends,'UserNotifi'=>$UserNotifi,'talkingInfos'=>$talkingInfos,'userProfile'=>$userProfile]);
        });
        View()->composer('frontEnd.home.homePage', function ($view) {
            $userIdF =Auth::id();
            $friendReq= Friend::with('profilepic','users')
                                ->where('friend_id',Auth::id())
                                ->where('approved', '0')
                                ->get();
            $friends= Friend::with(['profilepic','users','friendinfo.profilepic'])
                                ->where('approved', '1')
                                ->where('blocked', '0')
                                ->where('friend_id', $userIdF)
                                ->orWhere('user_Id', $userIdF)
                                ->where('approved', '1')
                                ->get();
            $allUsers = User::with('profilepic')->get();
            $allPosts = Post::with(['users','photos','videos','profilepic','comments.users','reactions'])->latest()->get();
            $userProfile=ProfilePicture::where('userId',Auth::user()->id)->latest()->take(1)->first();
            $view->with(['friends'=>$friends,'userProfile'=>$userProfile,'friendReq'=>$friendReq,'allPosts'=>$allPosts,'allUsers'=>$allUsers]);
        });
        View()->composer('frontEnd.userProfile.profile', function ($view) {
            $userProfile=ProfilePicture::where('userId',Auth::user()->id)->latest()->take(1)->first();
            $userCoverPhoto=CoverPhoto::where('userId',Auth::user()->id)->latest()->take(1)->first();
            $view->with(['userProfile'=>$userProfile,'userCoverPhoto'=>$userCoverPhoto]);
        });
        View()->composer('frontEnd.userProfile.about', function ($view) {
            $userBasicInfo=UserBasicInfo::where('userId',Auth::user()->id)->first();
            $userEducation=Education::where('userId',Auth::user()->id)->get();
            $userWork=Work::where('userId',Auth::user()->id)->get();
            $userInterest=Interest::where('userId',Auth::user()->id)->get();
            $view->with(['userBasicInfo'=>$userBasicInfo,'userEducation'=>$userEducation,'userWork'=>$userWork,'userInterest'=>$userInterest]);
        });
        View()->composer('frontEnd.includes.footer', function ($view) {
            $talkingInfos = TalkingInfo::get();
            $view->with(['talkingInfos'=>$talkingInfos]);
        });
    }
}
