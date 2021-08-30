<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\ProfilePicture;
use App\Models\Reaction;
use App\Models\Video;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReactionNotification;
use App\Notifications\CommentNotification;

class PostController extends Controller
{
    public function savePost(Request $request, $id){

        $posts= new Post();
        $posts->user_Id=$request->userId;
        $posts->postCanSee=$request->postCanSee;
        $posts->postText=$request->postText;
        $posts->save();



        if($request->hasfile('postImages')){
            if($posts->id){
                if($request->hasfile('postImages'))
                {
                    foreach($request->file('postImages') as $file)
                        {
                            $name =time()."_".Auth::user()->id."_".$file->getClientOriginalName();
                            $file->move(public_path().'/images/posts/images/', $name);
                            $data[] = $name;
                        }
                }else{
                    $data[] = null;
                }
            }
            foreach($data as $postPhoto){
                $postPic =New Photo();
                $postPic->photoByUserId=$request->userId;
                $postPic->file =$postPhoto;
                $posts->photos()->save($postPic);
            }

        }else{

        }
        if($request->hasfile('postVideos')){
            if($posts->id){
                if($request->hasfile('postVideos'))
                {
                    foreach($request->file('postVideos') as $file)
                        {
                            $name =time()."_".Auth::user()->id."_".$file->getClientOriginalName();
                            $file->move(public_path().'/images/posts/videos/', $name);
                            $vedio[] = $name;
                        }
                }else{
                    $vedio[] = null;
                }
            }
            foreach($vedio as $postVid){
                $postVideos = New Video();
                $postVideos->userId=$request->userId;
                $postVideos->postvideo =$postVid;
                $posts->videos()->save($postVideos);
            }

        }else{

        }



        return response()->json($posts, 200);
    }


    public function deletePost($id)
    {
        $userPostD = Post::with('photos','videos','comments')->find($id);
        $userPostD->delete();
        return response()->json("deleted", 200);
    }


    // public function editPost($id){
    //     $postByPostId = Post::with(['users','photos','videos','profilepic'])->find($id);

    //     if($postByPostId){
    //         return response()->json($postByPostId, 200);
    //     }else{
    //         return response()->json('Post Info Does Not Found');
    //     }

    // }


    public function singlePost($id){
        $singlePost = Post::with(['users','photos','videos','profilepic','comments.users','reactions'])->where('id', $id)->get();
        $userProfile=ProfilePicture::where('userId',Auth::user()->id)->latest()->take(1)->first();
        return view('frontEnd.home.single_post',['singlePost'=>$singlePost,'userProfile'=>$userProfile]);
    }

    public function saveComments(Request $request, $id){
        $userComment = New Comment();
        $userComment->comments = $request->Comment;
        $userComment->user_id = Auth::user()->id;
        Post::find($id)->comments()->save($userComment);
        $user=User::find($request->postuserId);
        $reactionName='comment';
        $CurrentUser=User::find(Auth::user()->id);
        $profile=ProfilePicture::find(Auth::user()->id);
        Notification::send($user, new CommentNotification($reactionName,$id,$CurrentUser,$profile));
        return response()->json($userComment, 200);
    }

    public function deleteComment($id)
    {
        $userCommentD = Comment::find($id);
        $userCommentD->delete();
        return response()->json("deleted", 200);
    }

    public function postReactions(Request $request,$id){

        $this->validate($request, [
            'postId'=>'required',
            'reactionName'=>'required'
        ]);
        $reaction =Reaction::firstOrNew([
            'post_id'=>$request->postId,
            'user_Id'=>Auth::user()->id,
        ]);
        $user=User::find($id);
        $reaction->user_Id=Auth::user()->id;
        $CurrentUser=User::find(Auth::user()->id);
        $profile=ProfilePicture::find(Auth::user()->id);
        $reaction->type=$request->reactionName;
        $post =Post::find($request->postId);
        $post->reactions()->save($reaction);
        Notification::send($user, new ReactionNotification($request->reactionName,$request->postId,$CurrentUser,$profile));
        return response()->json($post, 200);


    }








}
