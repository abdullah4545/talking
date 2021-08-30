<?php

namespace App\Http\Controllers;

use App\Models\CoverPhoto;
use App\Models\Education;
use App\Models\Friend;
use App\Models\Interest;
use App\Models\ProfilePicture;
use App\Models\UserBasicInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\photo;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use App\Models\Work;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class UserController extends Controller
{
    public function index(){
        $userIdF =Auth::id();
        $friends= Friend::with(['profilepic','users','friendinfo.profilepic'])
                                ->where('approved', '1')
                                ->where('blocked', '0')
                                ->where('friend_id', $userIdF)
                                ->orWhere('user_Id', $userIdF)
                                ->where('approved', '1')
                                ->get();
        $userPost = Post::with(['photos','videos','comments.users'])->where('user_Id',Auth::user()->id)->get()->reverse();
        $userProfile=ProfilePicture::where('userId',Auth::user()->id)->latest()->take(1)->first();
        $userCoverPhoto=CoverPhoto::where('userId',Auth::user()->id)->latest()->take(1)->first();
        return view('frontEnd.userProfile.uHome.userHomeContent',['friends'=>$friends,'userProfile'=>$userProfile,'userCoverPhoto'=>$userCoverPhoto,'userPost'=>$userPost]);
    }
    public function basicInfo(){
        return view('frontEnd.userProfile.ucontent.basicInfo');
    }
    public function afterRegister(){
        $userData=session()->get('user');
        return view('auth.afterRegister',['userdata'=>$userData]);
    }
    public function singleUser($id){
        $userById=User::find($id);
        $friends= Friend::with(['profilepic','users','friendinfo.profilepic'])
                                ->where('approved', '1')
                                ->where('blocked', '0')
                                ->where('friend_id', $id)
                                ->orWhere('user_Id', $id)
                                ->where('approved', '1')
                                ->get();
        $photos=Photo::where('photoByUserId',$id)->get()->reverse();
        $userBasicInfo=UserBasicInfo::where('userId',$id)->first();
        $userEducation=Education::where('userId',$id)->get();
        $userWork=Work::where('userId',$id)->get();
        $userInterest=Interest::where('userId',$id)->get();
        $userPost = Post::with(['photos','videos','comments.users'])->where('user_Id',$id)->get()->reverse();
        $userProfile=ProfilePicture::where('userId',$id)->latest()->take(1)->first();
        $userCoverPhoto=CoverPhoto::where('userId',$id)->latest()->take(1)->first();
        return view('frontEnd.userProfile.uHome.singleUser',['photos'=>$photos,'friends'=>$friends,'userBasicInfo'=>$userBasicInfo,'userEducation'=>$userEducation,'userWork'=>$userWork,'userInterest'=>$userInterest,'userById'=>$userById,'userProfile'=>$userProfile,'userCoverPhoto'=>$userCoverPhoto,'userPost'=>$userPost]);
    }
    public function user_photos(){
        $profilePic=ProfilePicture::where('userId',Auth::user()->id)->get()->reverse();
        $coverPhoto=CoverPhoto::where('userId',Auth::user()->id)->get()->reverse();
        $userPostPic=Post::where('user_Id',Auth::user()->id)->get()->reverse();
        $photos=Photo::where('photoByUserId',Auth::user()->id)->get()->reverse();
        $userProfile=ProfilePicture::where('userId',Auth::user()->id)->latest()->take(1)->first();
        $userCoverPhoto=CoverPhoto::where('userId',Auth::user()->id)->latest()->take(1)->first();
        return view('frontEnd.userProfile.userphotos',['profilePic'=>$profilePic,'coverPhoto'=>$coverPhoto,
                                                    'userPostPic'=>$userPostPic,'photos'=>$photos,'userProfile'=>$userProfile,'userCoverPhoto'=>$userCoverPhoto]);
    }
    public function user_videos(){
        $userVideo=Video::where('userId',Auth::user()->id)->get()->reverse();
        $userProfile=ProfilePicture::where('userId',Auth::user()->id)->latest()->take(1)->first();
        $userCoverPhoto=CoverPhoto::where('userId',Auth::user()->id)->latest()->take(1)->first();
        return view('frontEnd.userProfile.uservideos',['userVideo'=>$userVideo,'userProfile'=>$userProfile,'userCoverPhoto'=>$userCoverPhoto]);
    }
    public function user_about(){
        $userIdF =Auth::id();
        $friends= Friend::with(['profilepic','users','friendinfo.profilepic'])
                                ->where('approved', '1')
                                ->where('blocked', '0')
                                ->where('friend_id', $userIdF)
                                ->orWhere('user_Id', $userIdF)
                                ->where('approved', '1')
                                ->get();
        $overviewEdu=Education::where('userId',Auth::user()->id)->latest()->take(1)->first();
        $overviewWork=Work::where('userId',Auth::user()->id)->latest()->take(1)->first();
        $overviewInt=Interest::where('userId',Auth::user()->id)->latest()->take(1)->first();
        $profilePic=ProfilePicture::where('userId',Auth::user()->id)->get()->reverse();
        $coverPhoto=CoverPhoto::where('userId',Auth::user()->id)->get()->reverse();
        $photos=Photo::where('photoByUserId',Auth::user()->id)->get()->reverse();
        $userProfile=ProfilePicture::where('userId',Auth::user()->id)->latest()->take(1)->first();
        $userCoverPhoto=CoverPhoto::where('userId',Auth::user()->id)->latest()->take(1)->first();
        $userVideo=Video::where('userId',Auth::user()->id)->get()->reverse();
        $userPostPic=Post::where('user_Id',Auth::user()->id)->get()->reverse();
        return view('frontEnd.userProfile.about',['friends'=>$friends,'profilePic'=>$profilePic,'coverPhoto'=>$coverPhoto,
        'userPostPic'=>$userPostPic,'overviewEdu'=>$overviewEdu,'userVideo'=>$userVideo,'overviewWork'=>$overviewWork,'overviewInt'=>$overviewInt,'photos'=>$photos,'userProfile'=>$userProfile,'userCoverPhoto'=>$userCoverPhoto]);
    }
    public function getUserData($id){
        $userInfoMsg = User::with('profilepic')->where('id',$id)->get();
        if($userInfoMsg){
            return response()->json($userInfoMsg, 200);
        }else{
            return response()->json('User Info Does Not Found');
        }
    }
    public function saveBasicInfo(Request $request){
        $userBasicInfos = New UserBasicInfo();
        $userBasicInfos->userName=$request->userName;
        $userBasicInfos->userId=$request->userId;
        $userBasicInfos->userEmail=$request->userEmail;
        $userBasicInfos->userPhone=$request->userPhone;
        $userBasicInfos->birthday=$request->birthday;
        $userBasicInfos->gender=$request->gender;
        $userBasicInfos->city=$request->city;
        $userBasicInfos->country=$request->country;
        $userBasicInfos->textAbout=$request->textAbout;
        $userBasicInfos->save();
        session()->forget('user');
        return redirect('/login');
    }

    public function updateBasicInfo(Request $request, $id){
        $userBasicInfoById = UserBasicInfo::find($id);
        $userBasicInfoById->userName=$request->userName;
        $userBasicInfoById->userId=$request->userId;
        $userBasicInfoById->userEmail=$request->userEmail;
        $userBasicInfoById->userPhone=$request->userPhone;
        $userBasicInfoById->birthday=$request->birthday;
        $userBasicInfoById->gender=$request->gender;
        $userBasicInfoById->city=$request->city;
        $userBasicInfoById->country=$request->country;
        $userBasicInfoById->textAbout=$request->textAbout;
        $userBasicInfoById->save();
        return response()->json($userBasicInfoById, 200);
    }

    public function saveEducation(Request $request){
        $userEducations = New Education();
        $userEducations->userId=$request->userId;
        $userEducations->qualification=$request->qualification;
        $userEducations->studySubject=$request->studySubject;
        $userEducations->instuteName=$request->instuteName;
        $userEducations->studyFrom=$request->studyFrom;
        $userEducations->studyTo=$request->studyTo;
        $userEducations->city=$request->city;
        $userEducations->country=$request->country;
        $userEducations->save();
        return response()->json($userEducations, 200);
    }

    public function editEducation($id){
        $userEducations = Education::find($id);
        if($userEducations){
            return response()->json($userEducations, 200);
        }else{
            return response()->json('Education Info Does Not Found');
        }
    }

    public function updateEducation(Request $request,$id){
        $userEducation = Education::find($id);
        $userEducation->userId=$request->userId;
        $userEducation->qualification=$request->qualification;
        $userEducation->studySubject=$request->studySubject;
        $userEducation->instuteName=$request->instuteName;
        $userEducation->studyFrom=$request->studyFrom;
        $userEducation->studyTo=$request->studyTo;
        $userEducation->city=$request->city;
        $userEducation->country=$request->country;
        $userEducation->save();
        return response()->json($userEducation, 200);
    }

    public function deleteEducation($id)
    {
        $userEducation = Education::find($id);
        $userEducation->delete();
        return response()->json("deleted", 200);
    }

    public function saveInterest(Request $request){
        $userInterests = New Interest();
        $userInterests->userId=$request->userId;
        $userInterests->userfirst=$request->userfirst;
        $userInterests->userSec=$request->userSec;
        $userInterests->userthird=$request->userthird;
        $userInterests->save();
        return response()->json($userInterests, 200);
    }

    public function editInterest($id){
        $userInterests = Interest::find($id);
        if($userInterests){
            return response()->json($userInterests, 200);
        }else{
            return response()->json('Interest Info Does Not Found');
        }
    }

    public function updateInterest(Request $request,$id){
        $userInterest = Interest::find($id);
        $userInterest->userId=$request->userId;
        $userInterest->userfirst=$request->userfirst;
        $userInterest->userSec=$request->userSec;
        $userInterest->userthird=$request->userthird;
        $userInterest->save();
        return response()->json($userInterest, 200);
    }

    public function deleteInterest($id)
    {
        $userInterest = Interest::find($id);
        $userInterest->delete();
        return response()->json("deleted", 200);
    }

    public function saveWork(Request $request){
        $userWorks = New Work();
        $userWorks->userId=$request->userId;
        $userWorks->Company=$request->Company;
        $userWorks->Position=$request->Position;
        $userWorks->City=$request->City;
        $userWorks->Description=$request->Description;
        $userWorks->save();
        return response()->json($userWorks, 200);
    }
    public function editWork($id){
        $userWorks = Work::find($id);
        if($userWorks){
            return response()->json($userWorks, 200);
        }else{
            return response()->json('Work Info Does Not Found');
        }
    }
    public function updateWork(Request $request,$id){
        $userWork = Work::find($id);
        $userWork->userId=$request->userId;
        $userWork->Company=$request->Company;
        $userWork->Position=$request->Position;
        $userWork->City=$request->City;
        $userWork->Description=$request->Description;
        $userWork->save();
        return response()->json($userWork, 200);
    }

    public function deleteWork($id)
    {
        $userWork = Work::find($id);
        $userWork->delete();
        return response()->json("deleted", 200);
    }




}
