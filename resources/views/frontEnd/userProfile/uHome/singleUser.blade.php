@extends('frontEnd.master')

@section('homeContent')
<div class="feature-photo" style="height: 465px;">
    <figure>
        @if (empty($userCoverPhoto->coverPhoto))
            <img src="{{asset('public/images/coverPhoto/defaultCover.jpg')}}" alt="" style="height: 320px">
        @else
            <img src="{{asset($userCoverPhoto->coverPhoto)}}" alt="" style="height: 320px">
        @endif
    </figure>

    <div class="add-btn">
        <span>1205 followers</span>
        <a href="#" title="" data-ripple="">Add Friend</a>
    </div>
    <div class="container-fluid">
        <div class="row merged">
            <div class="col-lg-2 col-sm-3">
                <div class="user-avatar" style="width: 152px;height: 180px;">
                    <figure>
                        @if (empty($userProfile->file))
                        <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 163px;">
                        @else
                        <img src="{{asset($userProfile->file)}}" alt="" style="height: 163px;">
                        @endif
                    </figure>
                </div>
            </div>
            <div class="col-lg-10 col-sm-9">
                <div class="timeline-info">
                    <ul>
                        <li class="admin-name">
                          <h5>{{ $userById->name }}</h5>
                          <span>Group Admin</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12">
                <div class="timeline-info text-center" style="border-top: 1px solid lightgray">
                    <ul>
                        <li>
                            <a class="" href="" title="" data-ripple="">time line</a>
                            <a class="" href="" title="" data-ripple="">Photos</a>
                            <a class="" href="" title="" data-ripple="">Videos</a>
                            <a class="" href="" title="" data-ripple="">Friends</a>
                            <a class="" href="" title="" data-ripple="">Groups</a>
                            <a class="" href="" title="" data-ripple="">about</a>
                            <a class="active" href="#" title="" data-ripple="">more</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-5" style="padding-left: 60px">
        <div class="about">
            <div class="personal">
                <h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="d-flex flex-row mt-2">
                <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" style="width: 26%;text-align: center;padding: 0px;">
                    <li class="nav-item">
                        <a href="#overView" style="padding: 5px;font-size: 15px;" class="nav-link active" data-toggle="tab" >Over View</a>
                    </li>
                    <li class="nav-item">
                        <a href="#basic" style="padding: 5px;font-size: 15px;" class="nav-link" data-toggle="tab" >Basic info</a>
                    </li>
                    <li class="nav-item">
                        <a href="#location" style="padding: 5px;font-size: 15px;" class="nav-link" data-toggle="tab" >location</a>
                    </li>
                    <li class="nav-item">
                        <a href="#work" style="padding: 5px;font-size: 15px;" class="nav-link" data-toggle="tab" >Education</a>
                    </li>
                    <li class="nav-item">
                        <a href="#lang" style="padding: 5px;font-size: 15px;" class="nav-link" data-toggle="tab" >Work</a>
                    </li>
                    <li class="nav-item">
                        <a href="#interest" style="padding: 5px;font-size: 15px;" class="nav-link" data-toggle="tab"  >Interests</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="overView" >
                        <ul class="basics" style="padding-top: 10px;padding-left:10px">
                            @if(empty($overviewWork))
                                <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;margin-bottom: 10px;"><i class="ti-agenda" style="font-size: 16px;margin-right: 8px;"></i>
                                    {{''}}
                                </li>
                            @else
                                <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;margin-bottom: 10px;"><i class="ti-agenda" style="font-size: 16px;margin-right: 8px;"></i>
                                    Work at
                                    <b style="color: black">
                                        {{$overviewWork->Company}}
                                    </b>
                                        &nbsp;as&nbsp;
                                        {{$overviewWork->Position}}

                                </li>
                            @endif

                            @if(empty($overviewEdu))
                                <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;margin-bottom: 10px;"><i class="ti-paint-bucket " style="font-size: 16px;margin-right: 8px;"></i>
                                    {{''}}
                                </li>
                            @else
                                <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;margin-bottom: 10px;"><i class="ti-paint-bucket " style="font-size: 16px;margin-right: 8px;"></i>
                                    Study at
                                    <b style="color: black">
                                        {{$overviewEdu->instuteName}},
                                    </b>
                                        &nbsp;
                                        {{$overviewEdu->city}}

                                </li>
                            @endif
                            <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;margin-bottom: 10px;"><i class="ti-home" style="font-size: 16px;margin-right: 8px;"></i>Lives in &nbsp;{{$userBasicInfo->city}},&nbsp;{{$userBasicInfo->country}}. </li>
                            <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;margin-bottom: 10px;"><i class="ti-location-pin" style="font-size: 16px;margin-right: 8px;"></i>From &nbsp;{{$userBasicInfo->city}},&nbsp;{{$userBasicInfo->country}}. </li>
                            <li style="color: rgba(66, 48, 57, 0.97);font-weight: bold;list-style: none;margin-bottom: 10px;"><i class="ti-user" style="font-size: 16px;margin-right: 8px;"></i><a href="">{{$userBasicInfo->userPhone}}<br> <span style="padding-left: 25px;color:lightgray;font-weight:normal;" >mobile</span> </a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade show" id="basic" >
                        <ul class="basics" style="padding-top: 10px;padding-left:10px">
                            <li style="list-style: none"><i class="ti-user"></i>{{$userBasicInfo->userName}}</li>
                            <li style="list-style: none"><i class="ti-map-alt" style="margin-right: 24px;"></i>live in &nbsp;{{$userBasicInfo->city}} &nbsp;{{$userBasicInfo->country}}</li>
                            <li style="list-style: none"><i class="ti-mobile"></i>{{$userBasicInfo->userPhone}}</li>
                            <li style="list-style: none"><i class="ti-email"></i><a href="">{{$userBasicInfo->userEmail}}</a></li>
                            <li style="list-style: none"><i class="ti-map-alt"></i><a href="">{{$userBasicInfo->gender}}</a></li>
                            <li style="list-style: none"><i class="ti-user"></i><a href="">{{$userBasicInfo->birthday}}</a></li>
                        </ul>

                    </div>
                    <div class="tab-pane fade" id="location" role="tabpanel">
                        <div class="location-map">
                            <div id="map-canvas"></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="work" role="tabpanel">
                        <div class="educationUser">
                            <ul class="education" style="padding-top: 10px;padding-left:0px">
                                @if(empty($userEducation))
                                    <li><b style="color: black"></b>{{''}}</li>
                                @else
                                    @foreach ($userEducation as $userEducation)

                                        <li class="educations" id="educationLi{{$userEducation->id}}"  data-id="{{$userEducation->id}}" >
                                            <b style="color: black">
                                                {{$userEducation->studySubject}}
                                            </b>
                                            &nbsp;from&nbsp;
                                            {{$userEducation->instuteName}}
                                        </li>

                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lang" role="tabpanel">
                        <ul class="basics" style="padding-top: 10px;padding-left:10px">
                            @if(empty($userWork))
                                <li><b style="color: black"></b>{{''}}</li>
                            @else
                                @foreach ($userWork as $userWork)
                                <div class="workPart p-2">
                                    <li class="works" id="workLi{{$userWork->id}}"  data-id="{{$userWork->id}}" style="list-style: none">
                                        Work at
                                        <b style="color: black">
                                            {{$userWork->Company}}
                                        </b>
                                        &nbsp;as&nbsp;
                                        {{$userWork->Position}}

                                    </li>
                                </div>

                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="interest" role="tabpanel">
                        <ul class="basics" style="padding-top: 10px;padding-left:10px">
                            @if(empty($userInterest))
                                <li><b style="color: black"></b>{{''}}</li>
                            @else
                                @foreach ($userInterest as $userInterest)
                                <div class="educationPart p-2">
                                    <li class="works" id="interestLi{{$userInterest->id}}"  data-id="{{$userInterest->id}}" style="list-style: none">
                                        I am interested in
                                        <b style="color: black">
                                            {{$userInterest->userfirst}},&nbsp;{{$userInterest->userSec}},&nbsp;{{$userInterest->userthird}}
                                        </b>
                                    </li>
                                </div>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        {{-- Photos  --}}
        <div class="central-meta" style="border-radius: 12px;margin-top: 20px;">
            <div class="profilePic" style="color: black;">
                <h4 style="font-weight: bold;">Photos</h4>
            </div>
            <ul class="photos" style="text-align: center;width: 100%;float: left;">

                @foreach ($photos as $photo)
                    @if (empty($photo->file))
                        <img src="" alt="" style="height: 115px">
                    @else

                            <li id="" style="min-width: 31.5%;width: 31.5%;max-height: 115px;">
                                <a style="" class="strip" href="{{asset($photo->file)}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                    <img src="{{asset('public/images/posts/images/'.$photo->file)}}" style="height: 115px" alt=""></a>
                            </li>

                    @endif
                @endforeach


            </ul>
            <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
        </div><!-- photos -->
        {{-- //friend --}}
        <div class="central-meta" style="border-radius: 12px;padding: 0px;">
            <div class="widget friend-list stick-widget">
                <h4 class="widget-title"  style="margin: 0;padding-left:28px;padding-top: 10px;">Friends</h4>
                <div id="searchDir"></div>
                <ul id="people-list" class="friendz-list" style="overflow: auto;text-align: center;padding: 8px;padding-top:0">
                @forelse($friends as $friend)

                        @if ($friend->friend_id !=  $userById->id)
                            <li style="list-style: none;width:50%;float:left">
                                <div class="nearly-pepls">
                                    <div style="min-width: 100%;max-width: 100%;float: left;">
                                        @if (empty($friend->friendinfo->profilepic->file))
                                            <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 130px;max-width:80%;width:80%;border-radius: 29px;padding: 21px;padding-bottom:0px">
                                        @else
                                            <img src="{{asset($friend->friendinfo->profilepic->file)}}" style="height: 130px;max-width:80%;width:80%;border-radius: 29px;padding: 21px;padding-bottom:0px"  alt="">
                                        @endif
                                    </div>

                                    <div class="pepl-info" style="width: 80%;text-align: center;">
                                        <h4 style="width: 100%;"><a href="{{url('/user_profile_'.$friend->friendinfo->id)}}" title="" style="font-size: 12px;">{{$friend->friendinfo->name}}</a></h4>
                                    </div>

                                </div>
                            </li>

                        @elseif ($friend->user_Id !=  $userById->id)
                            <li style="list-style: none;width:50%;float:left">
                                <div class="nearly-pepls">
                                    <div style="min-width: 100%;max-width: 100%;float: left;">
                                        @if (empty($friend->profilepic->file))
                                            <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 130px;max-width:80%;width:80%;border-radius: 29px;padding: 21px;padding-bottom:0px">
                                        @else
                                            <img src="{{asset($friend->profilepic->file)}}" style="height: 130px;max-width:80%;width:80%;border-radius: 29px;padding: 21px;padding-bottom:0px"  alt="">
                                        @endif
                                    </div>

                                    <div class="pepl-info" style="width: 80%;text-align: center;">
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
        </div>



    </div>

    <!-- add post new box -->
    <div class="col-lg-7">
        <div class="loadMore">
            @foreach ($userPost as $userPost)
                <div class="central-meta item">
                    <div class="user-post">
                        <div class="friend-info">

                            <figure>
                                @if (empty($userProfile->file))
                                    <img src="{{asset('public/images/profile/default.jpg')}}" alt="">
                                @else
                                    <img src="{{asset($userProfile->file)}}" style="height: 42px;width:42px"  alt="">
                                @endif
                            </figure>
                            <div class="friend-name"  style="width: 75%;">
                                <ins><a href="time-line.html" title="">{{$userById->name}}</a></ins>
                                <span>published: {{$userPost->created_at}}</span>
                            </div>

                            <div class="post-meta">
                                <div class="Pphotos">
                                    @forelse ($userPost->photos as $postImage)
                                        @if (count($postPot[]=$userPost->photos)<2)
                                        <a href="{{url('/single_post_'.$userPost->id)}}" style="width: 100%;float: left;"> <img src="{{asset('public/images/posts/images/'.$postImage->file)}}" alt="" style="width: 100%;float: left;padding: 5px;max-height:400px"></a>
                                        @else
                                        <a href="{{url('/single_post_'.$userPost->id)}}" style="width: 50%;float: left;"> <img id="pImg " src="{{asset('public/images/posts/images/'.$postImage->file)}}" alt="" style="width: 100%;float: left;padding: 5px;max-height:400px  "></a>
                                        @endif
                                    @empty
                                    {{''}}
                                    @endforelse



                                </div>
                                <div class="Pvideos">
                                    @forelse ($userPost->videos as $postVideo)
                                        @if (count($postVid[]=$userPost->videos)<2)
                                        <a href="{{url('/single_post_'.$userPost->id)}}" style="width: 100%;float: left;">  <video accept="video/mp4,video/x-m4v,video/*" id="postVideo" src="{{asset('public/images/posts/videos/'.$postVideo->postVideo)}}" style="width: 100%;float: left;padding: 5px;" controls></video></a>
                                        @else
                                        <a href="{{url('/single_post_'.$userPost->id)}}" style="width: 50%;float: left;"> <video accept="video/mp4,video/x-m4v,video/*" id="postVideo" src="{{asset('public/images/posts/videos/'.$postVideo->postVideo)}}" style="width: 50%;float: left;padding: 5px;" controls></video></a>
                                        @endif
                                    @empty
                                        {{''}}
                                    @endforelse


                                </div>

                                <div class="we-video-info">
                                    <ul>
                                        <li>
                                            <span class="views" data-toggle="tooltip" title="views">
                                                <i class="fa fa-eye"></i>
                                                <ins>1.2k</ins>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="comment" data-toggle="tooltip" title="Comments">
                                                <i class="fa fa-comments-o"></i>
                                                <ins>52</ins>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="like" data-toggle="tooltip" title="like">
                                                <i class="ti-heart"></i>
                                                <ins>2.2k</ins>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="dislike" data-toggle="tooltip" title="dislike">
                                                <i class="ti-heart-broken"></i>
                                                <ins>200</ins>
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
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
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
                                <div class="description">

                                    <p>
                                    {{$userPost->postText}}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="coment-area" id="postId" data-id="{{$userPost->id}}">
                            <ul class="we-comet">
                                @forelse ($userPost->comments as $usersComments)
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
                                            <textarea placeholder="Post your comment" name="Comment" id="Comment"></textarea>
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
    </div>
</div>


@endsection
