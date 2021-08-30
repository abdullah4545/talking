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
                                <ul class="followers">
                                    <li>
                                        <figure><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar2.jpg" alt=""></figure>
                                        <div class="friend-meta">
                                            <h4><a href="time-line.html" title="">Kelly Bill</a></h4>
                                            <a href="#" title="" class="underline">Add Friend</a>
                                        </div>
                                    </li>
                                    <li>
                                        <figure><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar4.jpg" alt=""></figure>
                                        <div class="friend-meta">
                                            <h4><a href="time-line.html" title="">Issabel</a></h4>
                                            <a href="#" title="" class="underline">Add Friend</a>
                                        </div>
                                    </li>
                                    <li>
                                        <figure><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar6.jpg" alt=""></figure>
                                        <div class="friend-meta">
                                            <h4><a href="time-line.html" title="">Andrew</a></h4>
                                            <a href="#" title="" class="underline">Add Friend</a>
                                        </div>
                                    </li>
                                    <li>
                                        <figure><img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar8.jpg" alt=""></figure>
                                        <div class="friend-meta">
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
                            <h4><b>People</b></h4>


                               @if (@empty($userSearchResults))
                               <div class="box" style="padding: 20px;border: 2px solid rosybrown;">
                                    <h4 style="color: red">You are not searching any things !</h4>
                               </div>
                               @else
                                    <ul class="nearby-contct">
                                        @foreach ($userSearchResults as $userList)
                                            <li>
                                                <div class="nearly-pepls" id="friendLi" data-id="{{$userList->id}}">
                                                    <figure>
                                                        @if (empty($userList->profilepic->file))
                                                            <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 60px;max-width:60px;width:50px">
                                                        @else
                                                            <img src="{{asset($userList->profilepic->file)}}" style="height: 60px;max-width:60px;width:50px"  alt="">
                                                        @endif
                                                    </figure>

                                                    <div class="pepl-info" style="width: 85%;padding-left: 14px;">
                                                        <h4 style="width: 60%;float: left;"><a href="time-line.html" title="">{{$userList->name}}</a></h4>
                                                        <span>{{$userList->email}}</span>
														@if ($userList->id == Auth::user()->id)
                                                            {{""}}
                                                        @else
                                                            <form id="friendRequest" name="form" enctype="multipart/form-data" style="float: right;width: 34%;margin-top: -27px;">
                                                                @csrf
                                                                @if (in_array($userList->id,$ReuestSent))
                                                                    <button  class="delet-butn" id="cancelRequest" style="background: gray">Request Sent</button> 
                                                                @else
                                                                    <button  class="add-butn" id="frReqBtn{{$userList->id}}">add friend</button>
                                                                @endif
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                               @endif

                        </div><!-- photos -->   

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
                                <h4 class="widget-title">Friends</h4>
                                <div id="searchDir"></div>
                                <ul id="people-list" class="friendz-list">
                                    <li>
                                        <figure>
                                            <img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar.jpg" alt="">
                                            <span class="status f-online"></span>
                                        </figure>
                                        <div class="friendz-meta">
                                            <a href="time-line.html">bucky barnes</a>
                                            <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a0d7c9ced4c5d2d3cfccc4c5d2e0c7cdc1c9cc8ec3cfcd">[email&#160;protected]</a></i>
                                        </div>
                                    </li>
                                    <li>
                                        <figure>
                                            <img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar2.jpg" alt="">
                                            <span class="status f-away"></span>
                                        </figure>
                                        <div class="friendz-meta">
                                            <a href="time-line.html">Sarah Loren</a>
                                            <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b4d6d5c6dad1c7f4d3d9d5ddd89ad7dbd9">[email&#160;protected]</a></i>
                                        </div>
                                    </li>
                                    <li>
                                        <figure>
                                            <img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar3.jpg" alt="">
                                            <span class="status f-off"></span>
                                        </figure>
                                        <div class="friendz-meta">
                                            <a href="time-line.html">jason borne</a>
                                            <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1d777c6e72737f5d7a707c7471337e7270">[email&#160;protected]</a></i>
                                        </div>
                                    </li>
                                    <li>
                                        <figure>
                                            <img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar4.jpg" alt="">
                                            <span class="status f-off"></span>
                                        </figure>
                                        <div class="friendz-meta">
                                            <a href="time-line.html">Cameron diaz</a>
                                            <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bed4dfcdd1d0dcfed9d3dfd7d290ddd1d3">[email&#160;protected]</a></i>
                                        </div>
                                    </li>
                                    <li>

                                        <figure>
                                            <img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar5.jpg" alt="">
                                            <span class="status f-online"></span>
                                        </figure>
                                        <div class="friendz-meta">
                                            <a href="time-line.html">daniel warber</a>
                                            <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="553f34263a3b37153238343c397b363a38">[email&#160;protected]</a></i>
                                        </div>
                                    </li>
                                    <li>

                                        <figure>
                                            <img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar6.jpg" alt="">
                                            <span class="status f-away"></span>
                                        </figure>
                                        <div class="friendz-meta">
                                            <a href="time-line.html">andrew</a>
                                            <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5933382a36373b193e34383035773a3634">[email&#160;protected]</a></i>
                                        </div>
                                    </li>
                                    <li>

                                        <figure>
                                            <img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar7.jpg" alt="">
                                            <span class="status f-off"></span>
                                        </figure>
                                        <div class="friendz-meta">
                                            <a href="time-line.html">amy watson</a>
                                            <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5933382a36373b193e34383035773a3634">[email&#160;protected]</a></i>
                                        </div>
                                    </li>
                                    <li>

                                        <figure>
                                            <img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar5.jpg" alt="">
                                            <span class="status f-online"></span>
                                        </figure>
                                        <div class="friendz-meta">
                                            <a href="time-line.html">daniel warber</a>
                                            <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dbb1baa8b4b5b99bbcb6bab2b7f5b8b4b6">[email&#160;protected]</a></i>
                                        </div>
                                    </li>
                                    <li>

                                        <figure>
                                            <img src="{{asset('public/frontEnd/images/')}}/resources/friend-avatar2.jpg" alt="">
                                            <span class="status f-away"></span>
                                        </figure>
                                        <div class="friendz-meta">
                                            <a href="time-line.html">Sarah Loren</a>
                                            <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2644475448435566414b474f4a0845494b">[email&#160;protected]</a></i>
                                        </div>
                                    </li>
                                </ul>
                                <div class="chat-box">
                                    <div class="chat-head">
                                        <span class="status f-online"></span>
                                        <h6>Bucky Barnes</h6>
                                        <div class="more">
                                            <span><i class="ti-more-alt"></i></span>
                                            <span class="close-mesage"><i class="ti-close"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-list">
                                        <ul>
                                            <li class="me">
                                                <div class="chat-thumb"><img src="{{asset('public/frontEnd/images/')}}/resources/chatlist1.jpg" alt=""></div>
                                                <div class="notification-event">
                                                    <span class="chat-message-item">
                                                        Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                                                    </span>
                                                    <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                                                </div>
                                            </li>
                                            <li class="you">
                                                <div class="chat-thumb"><img src="{{asset('public/frontEnd/images/')}}/resources/chatlist2.jpg" alt=""></div>
                                                <div class="notification-event">
                                                    <span class="chat-message-item">
                                                        Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                                                    </span>
                                                    <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                                                </div>
                                            </li>
                                            <li class="me">
                                                <div class="chat-thumb"><img src="{{asset('public/frontEnd/images/')}}/resources/chatlist1.jpg" alt=""></div>
                                                <div class="notification-event">
                                                    <span class="chat-message-item">
                                                        Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                                                    </span>
                                                    <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                                                </div>
                                            </li>
                                        </ul>
                                        <form class="text-box">
                                            <textarea placeholder="Post enter to post..."></textarea>
                                            <div class="add-smiles">
                                                <span title="add icon" class="em em-expressionless"></span>
                                            </div>
                                            <div class="smiles-bunch">
                                                <i class="em em---1"></i>
                                                <i class="em em-smiley"></i>
                                                <i class="em em-anguished"></i>
                                                <i class="em em-laughing"></i>
                                                <i class="em em-angry"></i>
                                                <i class="em em-astonished"></i>
                                                <i class="em em-blush"></i>
                                                <i class="em em-disappointed"></i>
                                                <i class="em em-worried"></i>
                                                <i class="em em-kissing_heart"></i>
                                                <i class="em em-rage"></i>
                                                <i class="em em-stuck_out_tongue"></i>
                                            </div>
                                            <button type="submit"></button>
                                        </form>
                                    </div>
                                </div>
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
