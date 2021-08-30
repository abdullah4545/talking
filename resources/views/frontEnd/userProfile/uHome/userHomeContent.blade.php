@extends('frontEnd.userProfile.profile')

@section('contentMeta')
<!-- add post new box -->
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
                        <ins><a href="time-line.html" title="">{{Auth::user()->name}}</a></ins>
                        <span>published: {{$userPost->created_at}}</span>
                    </div>
                    @if ($userPost->users->id == Auth::user()->id)
                        <div class="post-owner-icon" style="width: 15%;float: right;margin-top: 13px;">
                            {{-- <a href="" id="editUserOwnPost" data-target="#editpostModal" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="editpost" style="padding: 10px"> <i class=" ti-pencil-alt"></i> </a> --}}
                            <a href="" id="deleteUserOwnPost" onclick="deletePostProfilePage({{$userPost->id}})" > <i class="ti-trash"></i> </a>

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
                            @forelse ($userPost->photos as $postImage)
                                @if (count($postPot[]=$userPost->photos)<2)
                                <a href="{{url('/single_post_'.$userPost->id)}}" style="width: 100%;float: left;"> <img src="{{asset('public/images/posts/images/'.$postImage->file)}}" alt="" style="width: 100%;float: left;padding: 5px;max-height:400px"></a>
                                @else
                                <a href="{{url('/single_post_'.$userPost->id)}}" style="width: 50%;float: left;"> <img id="pImg " src="{{asset('public/images/posts/images/'.$postImage->file)}}" alt="" style="width: 50%;float: left;padding: 5px;max-height:400px  "></a>
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
                                        @if ($usersComments->users->id == Auth::user()->id)
                                            <div class="post-owner-icon" style="width: 3%;float: right;margin-top: 2px;color:red">
                                                <a href="" id="deleteUserOwnComent" onclick="deleteCommentOwn({{$usersComments->id}})" > <i class="ti-trash"></i> </a>
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
    <script>
    function deleteCommentOwn(id){
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
    function deletePostProfilePage(id){
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
    </script>

@endsection
