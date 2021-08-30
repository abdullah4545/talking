@extends('frontEnd.master')

@section('homeContent')
<div class="successEducation ml-4 mr-4 mb-0"></div>

<div class="gap gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="page-contents">
                    <div class="col-lg-3">
                        <aside class="sidebar static">
                            <div class="widget">
                                <h4 class="widget-title">Shortcuts</h4>
                                <ul class="naves">
                                    <li>
                                        <i class="ti-clipboard"></i>
                                        <a href="newsfeed.html" title="">News feed</a>
                                    </li>
                                    <li>
                                        <i class="ti-mouse-alt"></i>
                                        <a href="inbox.html" title="">Inbox</a>
                                    </li>
                                    <li>
                                        <i class="ti-files"></i>
                                        <a href="fav-page.html" title="">My pages</a>
                                    </li>
                                    <li>
                                        <i class="ti-user"></i>
                                        <a href="timeline-friends.html" title="">friends</a>
                                    </li>
                                    <li>
                                        <i class="ti-image"></i>
                                        <a href="timeline-photos.html" title="">images</a>
                                    </li>
                                    <li>
                                        <i class="ti-video-camera"></i>
                                        <a href="timeline-videos.html" title="">videos</a>
                                    </li>
                                    <li>
                                        <i class="ti-comments-smiley"></i>
                                        <a href="messages.html" title="">Messages</a>
                                    </li>
                                    <li>
                                        <i class="ti-bell"></i>
                                        <a href="notifications.html" title="">Notifications</a>
                                    </li>
                                    <li>
                                        <i class="ti-share"></i>
                                        <a href="people-nearby.html" title="">People Nearby</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-bar-chart-o"></i>
                                        <a href="insights.html" title="">insights</a>
                                    </li>
                                </ul>
                            </div><!-- Shortcuts -->
                            <div class="widget friend-list stick-widget">
                                <h6 class="widget-title">Friend Request</h6>
                                <div id="searchDir"></div>
                                <ul id="people-list" class="friendz-list" style="overflow: auto;padding:10px;margin:0;">
                                    @foreach ($friendReq as $friendReq)
                                        <li id="frindReqLi{{$friendReq->user_Id}}">
                                            <div class="friendReq" id="delfrindReqLi{{$friendReq->id}}">
                                                <div class="nearly-pepls" id="delfrindReqLi{{$friendReq->id}}">
                                                    <figure style="min-width: 32px;max-width: 32px;">
                                                        @if (empty($friendReq->profilepic->file))
                                                            <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 35px;max-width:30px;width:30px">
                                                        @else
                                                            <img src="{{asset($friendReq->profilepic->file)}}" style="height: 35px;max-width:30px;width:30px"  alt="">
                                                        @endif
                                                    </figure>
                                                    <div class="pepl-info" style="width: 78%;padding-left: 0px;">
                                                        <h4 style="width: 100%;"><a href="time-line.html" title="">{{$friendReq->users->name}}</a></h4>
                                                    </div>

                                                </div>
                                                <div class="requestBtn" style="width:100%;float: left;padding-left: 34px">
                                                    <form id="confirmFriend" name="form" enctype="multipart/form-data" data-id="{{$friendReq->user_Id}}" style="width:50%;float: left;">
                                                        @csrf
                                                            <button  class="confirm-butn" id="frReqBtn" style="background: gray">Confirm</button>
                                                    </form>
                                                    <form id="cancelFriend" name="form" enctype="multipart/form-data" data-id="{{$friendReq->id}}" style="width:50%;float: left;">
                                                        @csrf
                                                            <button  class="delet-butn" id="cancelRequest">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                            </div><!-- friends list sidebar -->
                            <div class="widget">
                                <h4 class="widget-title">Recent Activity</h4>
                                <ul class="activitiez">
                                    <li>
                                        <div class="activity-meta">
                                            <i>10 hours Ago</i>
                                            <span><a href="#" title="">Commented on Video posted </a></span>
                                            <h6>by <a href="time-line.html">black demon.</a></h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="activity-meta">
                                            <i>30 Days Ago</i>
                                            <span><a href="#" title="">Posted your status. “Hello guys, how are you?”</a></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="activity-meta">
                                            <i>2 Years Ago</i>
                                            <span><a href="#" title="">Share a video on her timeline.</a></span>
                                            <h6>"<a href="#">you are so funny mr.been.</a>"</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- recent activites -->
                            <div class="widget stick-widget">
                                <h4 class="widget-title">Who's follownig</h4>
                                <ul class="followers" style="overflow: auto;">
                                    <li>
                                        <figure><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar2.jpg" alt=""></figure>
                                        <div class="friend-meta" style="width: 70%;font-size: 12px;">
                                            <h4><a href="time-line.html" title="">Kelly Bill</a></h4>
                                            <a href="#" title="" class="underline">Add Friend</a>
                                        </div>
                                    </li>
                                    <li>
                                        <figure><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar4.jpg" alt=""></figure>
                                        <div class="friend-meta" style="width: 70%;font-size: 12px;">
                                            <h4><a href="time-line.html" title="">Issabel</a></h4>
                                            <a href="#" title="" class="underline">Add Friend</a>
                                        </div>
                                    </li>
                                    <li>
                                        <figure><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar6.jpg" alt=""></figure>
                                        <div class="friend-meta" style="width: 70%;font-size: 12px;">
                                            <h4><a href="time-line.html" title="">Andrew</a></h4>
                                            <a href="#" title="" class="underline">Add Friend</a>
                                        </div>
                                    </li>
                                    <li>
                                        <figure><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar8.jpg" alt=""></figure>
                                        <div class="friend-meta" style="width: 70%;font-size: 12px;">
                                            <h4><a href="time-line.html" title="">Sophia</a></h4>
                                            <a href="#" title="" class="underline">Add Friend</a>
                                        </div>
                                    </li>
                                    <li>
                                        <figure><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar8.jpg" alt=""></figure>
                                        <div class="friend-meta" style="width: 70%;font-size: 12px;">
                                            <h4><a href="time-line.html" title="">Sophia</a></h4>
                                            <a href="#" title="" class="underline">Add Friend</a>
                                        </div>
                                    </li>
                                    <li>
                                        <figure><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar8.jpg" alt=""></figure>
                                        <div class="friend-meta" style="width: 70%;font-size: 12px;">
                                            <h4><a href="time-line.html" title="">Sophia</a></h4>
                                            <a href="#" title="" class="underline">Add Friend</a>
                                        </div>
                                    </li>

                                </ul>
                            </div><!-- who's following -->
                        </aside>
                    </div><!-- sidebar -->
                    <div class="col-lg-6">
                        <div class="central-meta">
                            <div class="new-postbox">
                                <figure>
                                    @if (empty($userProfile->file))
                                        <img src="{{asset('public/images/profile/default.jpg')}}" alt="">
                                    @else
                                        <img src="{{asset($userProfile->file)}}" style="height: 46px;width:42px"  alt="">
                                    @endif
                                </figure>
                                <div class="newpst-input">
                                    <div>
                                        <textarea data-target="#postModal" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="post text" rows="2" placeholder="write something"></textarea>
                                        <div class="attachments">
                                            <ul>
                                                <li data-target="#postModal" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="post music" style="font-size: 23px;padding-right: 22px;cursor: pointer;">
                                                    <i class="fa fa-music"></i>
                                                </li>
                                                <li data-target="#postModal" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="post image" style="font-size: 23px;padding-right: 22px;cursor: pointer;">
                                                    <i class="fa fa-image"></i>
                                                </li>
                                                <li data-target="#postModal" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="post video" style="font-size: 23px;padding-right: 22px;cursor: pointer;">
                                                    <i class="fa fa-video-camera"></i>
                                                </li>

                                                <li>
                                                    <button class="btn btn-primary" style="margin-top: -12px;" data-target="#postModal" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="post" >Post</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <!--- Post--->
                                    <div class="modal" id="postModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="border-radius: 10px;">
                                                <div class="modal-header" style="background: white;border-radius: 6px 6px 0px 0px;">
                                                    <h5 class="modal-title text-center">Create Post</h5>
                                                    <button class="btn close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="successPost ml-4 mr-4 mb-0"></div>
                                                <div class="modal-body">
                                                    <form id="userPost" name="form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="new-postbox">
                                                            <figure>
                                                                @if (empty($userProfile->file))
                                                                    <img src="{{asset('public/images/profile/default.jpg')}}" alt="">
                                                                @else
                                                                    <img src="{{asset($userProfile->file)}}" style="height: 46px;width:42px"  alt="">
                                                                @endif
                                                                <div class="userName"style="max-width: 300px;float: left;position: absolute;top: 9px;left: 70px;color: black;font-weight: bold;">
                                                                    {{Auth::user()->name}}
                                                                </div>
                                                                <div class="postSee">
                                                                    <select name="postCanSee" id="postCanSee" style="width: 72px;float: left;font-size: 12px;position: absolute;top: 35px;left: 72px;">
                                                                        <option value="1">Friends</option>
                                                                        <option value="2">Public</option>
                                                                        <option value="0">Only Me</option>
                                                                    </select>
                                                                </div>
                                                            </figure>
                                                        </div>
                                                        <div class="form-group" hidden>
                                                            <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}" data-id="{{Auth::user()->id}}"/>
                                                        </div>

                                                        <div class="form-group" style="padding: 10px;padding-top: 0px;margin-bottom:0">
                                                            <textarea name="postText" id="postText" rows="2" placeholder="What's on your mind ?" style="height: 84px;font-size: 24px"></textarea>
                                                        </div>
                                                        <div class="file">
                                                            <div id="prevFile" style="width: 100%">

                                                            </div>
                                                            <div id="prevVedio" style="width: 100%">

                                                            </div>

                                                        </div>
                                                        <div class="form-group" style="padding: 10px;padding-top: 3px;margin:0;padding-bottom:3px;width:96%;margin-left: 8px;border: 1px solid;border-radius: 8px;">
                                                            <ul style="margin: 0;padding:0;">
                                                                <div class="input-group" >

                                                                  </div>



                                                                <li style="list-style: none;width:50%;float: left;text-align: center;font-size:25px">
                                                                    <i class="fa fa-image" style="color: green"></i>
                                                                    <label class="fileContainer">
                                                                        <span style="color: black;font-size: 20px;">Photo</span>
                                                                        <input type="file" onchange="prevPost_Img()" name="postImages[]" id="postImage" accept="image/*" multiple/>
                                                                    </label>
                                                                </li>
                                                                <li style="list-style: none;width:50%;float: left;text-align: center;font-size:25px">
                                                                    <i class="fa fa-video-camera" style="color: green"></i>
                                                                    <label class="fileContainer">
                                                                        <span style="color: black;font-size: 20px;">Vedio</span>
                                                                        <input type="file" onchange="prevPostVideo()" name="postVideos[]" id="postVideo" accept="video/mp4,video/x-m4v,video/*" multiple>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="from-control" style="padding: 10px;">
                                                            <button type="submit" class="btn btn-primary" style="width: 100%;">Save Post</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div><!-- add post new box -->
                        <div class="loadMore ">
                            @foreach ($allPosts as $allPost)
                                <div class="central-meta item" id="post_id_{{$allPost->id}}">
                                    <div class="user-post">
                                        <div class="friend-info" id="userPostId" data-id="{{$allPost->id}}" >
                                            <figure>
                                                @if (empty($allPost->profilepic->file))
                                                    <img src="{{asset('public/images/profile/default.jpg')}}" alt="">
                                                @else
                                                    <img src="{{asset($allPost->profilepic->file)}}" style="height: 42px;width:42px"  alt="">
                                                @endif
                                            </figure>
                                            <div class="friend-name" style="width: 75%;">
                                                <ins><a href="{{url('/user_profile_'.$allPost->users->id)}}" title="">{{$allPost->users->name}}</a></ins>
                                                <span>published: {{$allPost->created_at}}</span>
                                            </div>

                                            @if ($allPost->users->id == Auth::user()->id)
                                                <div class="post-owner-icon" style="width: 15%;float: right;margin-top: 13px;">
                                                    {{-- <a href="" id="editUserOwnPost" data-target="#editpostModal" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="editpost" style="padding: 10px"> <i class=" ti-pencil-alt"></i> </a> --}}
                                                    <a href="" id="deleteUserOwnPost" onclick="deletePost({{$allPost->id}})" > <i class="ti-trash"></i> </a>

                                                </div>
                                                    <!--- Post--->
                                                    {{-- <div class="modal" id="editpostModal">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content" style="border-radius: 10px;">
                                                                <div class="modal-header" style="background: white;border-radius: 6px 6px 0px 0px;">
                                                                    <h5 class="modal-title text-center">Edit Post</h5>
                                                                    <button class="btn close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="successPost ml-4 mr-4 mb-0"></div>
                                                                <div class="modal-body">
                                                                    <form id="editUserPost" name="form" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="new-postbox">
                                                                            <figure>
                                                                                @if (empty($userProfile->file))
                                                                                    <img src="{{asset('public/images/profile/default.jpg')}}" alt="">
                                                                                @else
                                                                                    <img src="{{asset($userProfile->file)}}" style="height: 46px;width:42px"  alt="">
                                                                                @endif
                                                                                <div class="userName"style="max-width: 300px;float: left;position: absolute;top: 9px;left: 70px;color: black;font-weight: bold;">
                                                                                    {{Auth::user()->name}}
                                                                                </div>
                                                                                <div class="postSee">
                                                                                    <select name="postCanSee" id="editpostCanSee" style="width: 72px;float: left;font-size: 12px;position: absolute;top: 35px;left: 72px;">
                                                                                        <option value="1">Friends</option>
                                                                                        <option value="2">Public</option>
                                                                                        <option value="0">Only Me</option>
                                                                                    </select>
                                                                                </div>
                                                                            </figure>
                                                                        </div>
                                                                        <div class="form-group" hidden>
                                                                            <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}" data-id="{{Auth::user()->id}}"/>
                                                                        </div>

                                                                        <div class="form-group" style="padding: 10px;padding-top: 0px;margin-bottom:0">
                                                                            <textarea name="postText" id="editpostText" rows="2" placeholder="What's on your mind ?" style="height: 84px;font-size: 24px"></textarea>
                                                                        </div>
                                                                        <div class="file">
                                                                            <div id="prevFile" style="width: 100%">

                                                                            </div>
                                                                            <div id="prevVedio" style="width: 100%">

                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group" style="padding: 10px;padding-top: 3px;margin:0;padding-bottom:3px;width:96%;margin-left: 8px;border: 1px solid;border-radius: 8px;">
                                                                            <ul style="margin: 0;padding:0;">
                                                                                <div class="input-group" >

                                                                                </div>



                                                                                <li style="list-style: none;width:50%;float: left;text-align: center;font-size:25px">
                                                                                    <i class="fa fa-image" style="color: green"></i>
                                                                                    <label class="fileContainer">
                                                                                        <span style="color: black;font-size: 20px;">Photo</span>
                                                                                        <input type="file" onchange="prevPost_Img()" name="postImages[]" id="postImage" accept="image/*" multiple/>
                                                                                    </label>
                                                                                </li>
                                                                                <li style="list-style: none;width:50%;float: left;text-align: center;font-size:25px">
                                                                                    <i class="fa fa-video-camera" style="color: green"></i>
                                                                                    <label class="fileContainer">
                                                                                        <span style="color: black;font-size: 20px;">Vedio</span>
                                                                                        <input type="file" onchange="prevPostVideo()" name="postVideos[]" id="postVideo" accept="video/mp4,video/x-m4v,video/*" multiple>
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>

                                                                        <div class="from-control" style="padding: 10px;">
                                                                            <button type="submit" class="btn btn-primary" style="width: 100%;">Update Post</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                            @else

                                            @endif

                                            <div class="post-meta">
                                                <div class="Pphotos">


                                                    @forelse ($allPost->photos as $postImage)
                                                        @if (count($postPot[]=$allPost->photos)<2)
                                                           <a href="{{url('/single_post_'.$allPost->id)}}" style="width: 100%;float: left;"><img src="{{asset('public/images/posts/images/'.$postImage->file)}}" alt="" style="width: 100%;float: left;padding: 5px;max-height: 400px;"></a>
                                                        @else
                                                            <a href="{{url('/single_post_'.$allPost->id)}}" style="width: 50%;float: left;"><img id="pImg " src="{{asset('public/images/posts/images/'.$postImage->file)}}" alt="" style="width: 100%;float: left;padding: 5px;max-height: 400px;"></a>
                                                        @endif
                                                    @empty
                                                        {{''}}
                                                    @endforelse

                                                </div>
                                                <div class="Pvideos">
                                                    @forelse ($allPost->videos as $postVid)
                                                        @if (count($allPost->videos)<2)
                                                            <a href="{{url('/single_post_'.$allPost->id)}}" style="width: 100%;float: left;"><video id="postVideo" src="{{asset('public/images/posts/videos/'.$postVid->postVideo)}}" style="width: 100%;float: left;padding: 5px;max-height: 400px;" controls></video></a>
                                                        @else
                                                            <a href="{{url('/single_post_'.$allPost->id)}}" style="width: 50%;float: left;"><video id="postVideo" src="{{asset('public/images/posts/videos/'.$postVid->postVideo)}}" style="width: 100%;float: left;padding: 5px;max-height: 400px;" controls></video></a>
                                                        @endif
                                                    @empty
                                                        {{''}}
                                                    @endforelse

                                                </div>

                                                @php
                                                    $countReaction =[
                                                        'like'=>0,
                                                        'dislike'=>0,
                                                        'love'=>0,
                                                        'reacted'=>false,
                                                        'type'=>'0',
                                                    ];
                                                    foreach ($allPost->reactions as $reaction) {
                                                        if ($reaction->user_Id==Auth::user()->id) {
                                                            $countReaction['type']=$reaction->type;
                                                            $countReaction['reacted']=true;
                                                        }
                                                        $countReaction[$reaction->type]++;
                                                    }
                                                    $my_reaction=($countReaction['reacted']) ?"You and ":"";

                                                @endphp

                                                <div class="we-video-info" style="padding-left: 7px;padding-bottom: 0;">
                                                    <ul class="post_reactions" data-id="{{$allPost->users->id}}">
                                                        <li>
                                                            <span data-post_id="{{$allPost->id}}" data-reaction="like" class="like text-{{($countReaction['type']=='like' ? "primary" : "secondary")}} reactionBtn" data-toggle="tooltip" title="like">
                                                                <i class="fa fa-thumbs-up"></i>
                                                                <ins>{{$countReaction['like']}}</ins>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span data-post_id="{{$allPost->id}}" data-reaction="dislike" class="dislike text-{{($countReaction['type']=='dislike' ? "info" : "secondary")}} reactionBtn" data-toggle="tooltip" title="dislike">
                                                                <i class="fa fa-thumbs-down"></i>
                                                                <ins>{{$countReaction['dislike']}}</ins>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span data-post_id="{{$allPost->id}}" data-reaction="love" class="love text-{{($countReaction['type']=='love' ? "danger" : "secondary")}} reactionBtn" data-toggle="tooltip" title="love">
                                                                <i class="fa fa-heart"></i>
                                                                <ins>{{$countReaction['love']}}</ins>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="comment" data-toggle="tooltip" title="Comments">
                                                                <i class="fa fa-comments"></i>
                                                                <ins>52</ins>
                                                            </span>
                                                        </li>
                                                        <li class="social-media">
                                                            <div class="menu">
                                                            <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                                            <div class="rotater">
                                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                                            </div>
                                                            <div class="rotater">
                                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                                            </div>
                                                            <div class="rotater">
                                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus-square"></i></a></div>
                                                            </div>
                                                            <div class="rotater">
                                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                                            </div>
                                                            <div class="rotater">
                                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                                            </div>
                                                            <div class="rotater">
                                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                                                </div>
                                                            </div>
                                                                <div class="rotater">
                                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="rotater">
                                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                                                </div>
                                                            </div>

                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="countReact">
                                                    @if (empty($allPost->reactions))
                                                        <span>0 people react hear</span>
                                                    @else
                                                        <span style="font-size:11px;padding-left: 6px;">{{$my_reaction}}{{$allPost->reactions->count()}} people react hear.</span>
                                                    @endif
                                                </div>
                                                <hr>
                                                <div class="description">

                                                    <p>
                                                       {{$allPost->postText}}
                                                    </p>
                                                </div>

                                            </div>


                                        </div>

                                        {{-- comment section --}}
                                        <div class="coment-area" id="postId" data-id="{{$allPost->id}}">
                                            <hr>
											<ul class="we-comet" id="comentSection" data-userid="{{$allPost->users->id}}">
												@forelse ($allPost->comments as $usersComments)
                                                    <li>

                                                        <div class="comet-avatar">
                                                            @if (empty($usersComments->profilepic->file))
                                                                <img src="{{asset('public/images/profile/default.jpg')}}" alt="">
                                                            @else
                                                                <img src="{{asset($usersComments->profilepic->file)}}" style="height: 42px;width:42px"  alt="">
                                                            @endif
                                                        </div>
                                                        <div class="we-comment">
                                                            <div class="coment-head">
                                                                <h5><a href="{{url('/user_profile_'.$usersComments->users->id)}}" title="">{{$usersComments->users->name}}</a></h5>
                                                                <span>{{$usersComments->created_at}}</span>
                                                                <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                                                @if ($usersComments->users->id == Auth::user()->id)
                                                                    <div class="post-owner-icon" style="width: 3%;float: right;margin-top: 2px;color:red">
                                                                        <a href="" id="deleteUserOwnComent" onclick="deleteComment({{$usersComments->id}})" > <i class="ti-trash"></i> </a>
                                                                    </div>
                                                                @else
                                                                @endif
                                                             </div>
                                                            <p>{{$usersComments->comments}}</p>
                                                        </div>

                                                    </li>
                                                @empty
                                                    {{''}}
                                                @endforelse



												<li>
													<a href="#" title="" class="showmore underline">more comments</a>
												</li>
												<li class="post-comment">
													<div class="comet-avatar" style="max-width: 9%;width: 9%;">
                                                        @if (empty($userProfile->file))
                                                        <img src="{{asset('public/images/profile/default.jpg')}}" alt="">
                                                    @else
                                                        <img src="{{asset($userProfile->file)}}" style="height: 42px;width:42px"  alt="">
                                                    @endif
													</div>
													<div class="post-comt-box" style="width: 90%;">
														<form id="userComments" name="form" enctype="multipart/form-data">
															<textarea placeholder="Post your comment" name="Comment" id="userComent"></textarea>
															<div class="form-group" hidden>
                                                                <input type="text" name="postuserId" id="postuserId" value="{{$allPost->users->id}}"/>
                                                            </div>
                                                            <button class="btn btn-primary" style="color: black;" type="submit">Comment</button>
														</form>
													</div>
												</li>
											</ul>
										</div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div><!-- centerl meta -->
                    <div class="col-lg-3">
                        <aside class="sidebar static">
                            <div class="widget">
                                <h4 class="widget-title">Your page</h4>
                                <div class="your-page">
                                    <figure>
                                        <a href="#" title=""><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar9.jpg" alt=""></a>
                                    </figure>
                                    <div class="page-meta">
                                        <a href="#" title="" class="underline">My page</a>
                                        <span><i class="ti-comment"></i><a href="insight.html" title="">Messages <em>9</em></a></span>
                                        <span><i class="ti-bell"></i><a href="insight.html" title="">Notifications <em>2</em></a></span>
                                    </div>
                                    <div class="page-likes">
                                        <ul class="nav nav-tabs likes-btn">
                                            <li class="nav-item"><a class="active" href="#link1" data-toggle="tab">likes</a></li>
                                             <li class="nav-item"><a class="" href="#link2" data-toggle="tab">views</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                          <div class="tab-pane active fade show " id="link1" >
                                            <span><i class="ti-heart"></i>884</span>
                                              <a href="#" title="weekly-likes">35 new likes this week</a>
                                              <div class="users-thumb-list">
                                                <a href="#" title="Anderw" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-1.jpg" alt="">
                                                </a>
                                                <a href="#" title="frank" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-2.jpg" alt="">
                                                </a>
                                                <a href="#" title="Sara" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-3.jpg" alt="">
                                                </a>
                                                <a href="#" title="Amy" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-4.jpg" alt="">
                                                </a>
                                                <a href="#" title="Ema" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-5.jpg" alt="">
                                                </a>
                                                <a href="#" title="Sophie" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-6.jpg" alt="">
                                                </a>
                                                <a href="#" title="Maria" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-7.jpg" alt="">
                                                </a>
                                              </div>
                                          </div>
                                          <div class="tab-pane fade" id="link2" >
                                              <span><i class="ti-eye"></i>440</span>
                                              <a href="#" title="weekly-likes">440 new views this week</a>
                                              <div class="users-thumb-list">
                                                <a href="#" title="Anderw" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-1.jpg" alt="">
                                                </a>
                                                <a href="#" title="frank" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-2.jpg" alt="">
                                                </a>
                                                <a href="#" title="Sara" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-3.jpg" alt="">
                                                </a>
                                                <a href="#" title="Amy" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-4.jpg" alt="">
                                                </a>
                                                <a href="#" title="Ema" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-5.jpg" alt="">
                                                </a>
                                                <a href="#" title="Sophie" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-6.jpg" alt="">
                                                </a>
                                                <a href="#" title="Maria" data-toggle="tooltip">
                                                    <img src="{{asset('public/frontEnd/images/')}}/resources/userlist-7.jpg" alt="">
                                                </a>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- page like widget -->
                            <div class="widget">
                                <div class="banner medium-opacity bluesh">
                                    <div class="bg-image" style="background-image: url(public/frontEnd/images/resources/baner-widgetbg.jpg)"></div>
                                    <div class="baner-top">
                                        <span><img alt="" src="{{asset('public/frontEnd/images/')}}/book-icon.png"></span>
                                        <i class="fa fa-ellipsis-h"></i>
                                    </div>
                                    <div class="banermeta">
                                        <p>
                                            create your own favourit page.
                                        </p>
                                        <span>like them all</span>
                                        <a data-ripple="" title="" href="#">start now!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget friend-list stick-widget">
                                <h4 class="widget-title"  style="margin: 0">Friends</h4>
                                <div id="searchDir"></div>
                                <ul id="people-list" class="friendz-list" style="overflow: auto;">
                                   @forelse($friends as $friend)

                                        @if ($friend->friend_id != Auth::id())
                                            <li>
                                                <div class="nearly-pepls">
                                                    <figure style="min-width: 32px;max-width: 32px;float: left;">
                                                        @if (empty($friend->friendinfo->profilepic->file))
                                                            <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 35px;max-width:30px;width:30px">
                                                        @else
                                                            <img src="{{asset($friend->friendinfo->profilepic->file)}}" style="height: 35px;max-width:30px;width:30px"  alt="">
                                                        @endif
                                                    </figure>

                                                    <div class="pepl-info" style="width: 80%;padding-left: 6px;">
                                                        <h4 style="width: 100%;"><a href="{{url('/user_profile_'.$friend->friendinfo->id)}}" title="" style="font-size: 12px;">{{$friend->friendinfo->name}}</a></h4>
                                                    </div>

                                                </div>
                                            </li>

                                        @elseif ($friend->user_Id != Auth::id())
                                            <li>
                                                <div class="nearly-pepls">
                                                    <figure style="min-width: 32px;max-width: 32px;float: left;">
                                                        @if (empty($friend->profilepic->file))
                                                            <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 35px;max-width:30px;width:30px">
                                                        @else
                                                            <img src="{{asset($friend->profilepic->file)}}" style="height: 35px;max-width:30px;width:30px"  alt="">
                                                        @endif
                                                    </figure>

                                                    <div class="pepl-info" style="width: 80%;padding-left: 6px;">
                                                        <h4 style="width: 100%;"><a href="{{url('/user_profile_'.$friend->users->id)}}" title="" style="font-size: 12px;">{{$friend->users->name}}</a></h4>
                                                    </div>

                                                </div>
                                            </li>
                                        @endif
                                    @empty
                                    {{''}}
                                    @endforelse

                                </ul>

                            </div>
                        <!-- friends list sidebar -->

                            <div class="widget friend-list stick-widget">
                                <h6 class="widget-title">People you may know</h6>
                                <div id="searchDir"></div>
                                <ul id="people-list" class="friendz-list" style="overflow: auto;padding:10px;margin:0;">
                                    @foreach ($allUsers as $userList)
                                        @if ($userList->id == Auth::user()->id)
                                            {{''}}
                                        @else
                                        <li>
                                            <div class="nearly-pepls">
                                                <figure style="min-width: 32px;max-width: 32px;">
                                                    @if (empty($userList->profilepic->file))
                                                        <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 35px;max-width:30px;width:30px">
                                                    @else
                                                        <img src="{{asset($userList->profilepic->file)}}" style="height: 35px;max-width:30px;width:30px"  alt="">
                                                    @endif
                                                </figure>

                                                <div class="pepl-info" style="width: 80%;padding-left: 0px;">
                                                    <h4 style="width: 60%;"><a href="" title="">{{$userList->name}}</a></h4>

                                                    <a href="#" title="" class="add-butn" data-ripple="" style="font-size: 9px;top:4px;">add friend</a>
                                                </div>
                                            </div>
                                        </li>
                                        @endif

                                    @endforeach
                                </ul>

                            </div><!-- friends list sidebar -->



                        </aside>
                    </div><!-- sidebar -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javaScript">
    function deletePost(id){
        if(confirm('Do you really want to delete this post')){
            $.ajax({
                type:'DELETE',
                url: '/talking/delete-user-post/'+id,

                success: function(data){
                },
                error:function(error){
                    console.log(error);
                }

            });
        }

    }
    function deleteComment(id){
        if(confirm('Do you really want to delete this comment')){
            $.ajax({
                type:'DELETE',
                url: '/talking/delete-comment/'+id,

                success: function(data){
                },
                error:function(error){
                    console.log(error);
                }

            });
        }

    }
    var postImages = [];
    function prevPost_Img(){
        var postImage = document.getElementById('postImage').files;

            for( i=0; i< postImage.length; i++){
                if(check_duplicate(postImage[i].name)){
                    postImages.push({
                        "name" : postImage[i].name,
                        "url" : URL.createObjectURL(postImage[i]),
                        "file" : postImage[i],
                    });
                }else{
                    alert(postImage[i].name+'is already added to your list');
                }
            }

        //document.getElementById("userPost").reset();
        document.getElementById("prevFile").innerHTML = postImage_show();

    }
    function check_duplicate(name){
        var postImage = true;
        if(postImages.length>0){
            for(e=0;e<postImages.length; e++){
                if(postImages[e].name == name){
                    postImage = false;
                    break;
                }
            }
        }
        return postImage;
    }
    function postImage_show() {
        var postImage = "";
        postImages.forEach((i) => {
            postImage +=`<div class="postImg" style="width:25%;float:left;position:relative">
                            <img src="`+i.url+`" alt="" id="previewImage" style="border-radius: 10px;width:100%;padding:5px;">
                            <span id="postIspan" onclick="removeSelectedPostImage(`+postImages.indexOf(i)+`)" style="position: absolute;right: 0;cursor: pointer;font-size: 31px;color: red;margin-top: -8px;margin-right: 8px;">&times</span>
                        </div>`;
        })
        return postImage;
    }
    function removeSelectedPostImage(e){
        postImages.splice(e,1);
        document.getElementById("prevFile").innerHTML = postImage_show();
    }
    //vedio post js
    var postVedios = [];
    function prevPostVideo(){
        var postVedio = document.getElementById('postVideo').files;
            for( i=0; i< postVedio.length; i++){
                if(check_vedioduplicate(postVedio[i].name)){
                    postVedios.push({
                        "name" : postVedio[i].name,
                        "url" : URL.createObjectURL(postVedio[i]),
                        "file" : postVedio[i],
                    });
                }else{
                    alert(postVedio[i].name+'is already added to your list');
                }
            }

        //document.getElementById("userPost").reset();
        document.getElementById("prevVedio").innerHTML = postVedio_show();


    }
    function check_vedioduplicate(name){
        var postVedio = true;
        if(postVedios.length>0){
            for(e=0;e<postVedios.length; e++){
                if(postVedios[e].name == name){
                    postVedio = false;
                    break;
                }
            }
        }
        return postVedio;
    }
    function postVedio_show() {
        var postVedio = "";
        postVedios.forEach((i) => {
            postVedio +=`<div class="postVedio" style="width:50%;float:left;position:relative">
                            <video controls src="`+i.url+`" style="border-radius: 10px;width:100%;padding:5px;"  id="previewVedio" ></video>
                            <span id="postIspan" onclick="removeSelectedPostVedio(`+postVedios.indexOf(i)+`)" style="position: absolute;right: 0;cursor: pointer;font-size: 31px;color: red;margin-top: -8px;margin-right: 8px;">&times</span>
                        </div>`;
        })
        return postVedio;
    }
    function removeSelectedPostVedio(e){
        postVedios.splice(e,1);
        document.getElementById("prevVedio").innerHTML = postVedio_show();
    }



</script>

@endsection
