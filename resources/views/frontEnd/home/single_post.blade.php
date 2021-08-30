@extends('frontEnd.master')

@section('homeContent')
<div class="successEducation ml-4 mr-4 mb-0"></div>

    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                @foreach ($singlePost as $singlePost)
                    <div class="col-lg-8">
                        <div class="post-meta" style="margin: 0">
                            <div class="Pphotos">
                                <div class="slideshow-container">
                                    @forelse ($singlePost->photos as $postImage)
                                        @if (count($postPot[]=$singlePost->photos)<2)
                                            <div class="mySlides">
                                                <a href="{{url('/single_post_'.$singlePost->id)}}" style="width: 100%;float: left;"><img src="{{asset('public/images/posts/images/'.$postImage->file)}}" alt="" style="width: 100%;float: left;padding: 0px;max-height:450px"></a>
                                            </div>
                                        @else
                                            <div class="mySlides">
                                                <a href="{{url('/single_post_'.$singlePost->id)}}" style="width: 100%;float: left;"><img id="pImg " src="{{asset('public/images/posts/images/'.$postImage->file)}}" alt="" style="width: 100%;float: left;padding: 0px;max-height:450px"></a>
                                            </div>
                                        @endif
                                    @empty
                                        {{''}}
                                    @endforelse
                                    <a class="prev" onclick="plusSlides(-1)" style="left: 0;margin-top: 200px;color: black;">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1)" style="margin-top: 200px;color: black;">&#10095;</a>

                                </div>

                            </div>
                            <div class="Pvideos">
                                @forelse ($singlePost->videos as $postVid)
                                    @if (count($singlePost->videos)<2)
                                        <a href="{{url('/single_post_'.$singlePost->id)}}" style="width: 100%;float: left;"><video id="postVideo" src="{{asset('public/images/posts/videos/'.$postVid->postVideo)}}" style="width: 100%;float: left;padding: 5px;" controls></video></a>
                                    @else
                                        <a href="{{url('/single_post_'.$singlePost->id)}}" style="width: 100%;float: left;"><video id="postVideo" src="{{asset('public/images/posts/videos/'.$postVid->postVideo)}}" style="width: 100%;float: left;padding: 5px;" controls></video></a>
                                    @endif
                                @empty
                                    {{''}}
                                @endforelse

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pl-0">
                        <div class="central-meta item" id="post_id_{{$singlePost->id}}">
                            <div class="user-post">
                                <div class="friend-info" id="userPostId" data-id="{{$singlePost->id}}" >
                                    <figure>
                                        @if (empty($singlePost->profilepic->file))
                                            <img src="{{asset('public/images/profile/default.jpg')}}" alt="">
                                        @else
                                            <img src="{{asset($singlePost->profilepic->file)}}" style="height: 34px;width:42px"  alt="">
                                        @endif
                                    </figure>
                                    <div class="friend-name" style="width: 75%;">
                                        <ins><a href="time-line.html" title=""  style="font-size: 16px;">{{$singlePost->users->name}}</a></ins>
                                        <span>published: {{$singlePost->created_at}}</span>
                                    </div>
                                    <hr style="margin-bottom:0">
                                    <div class="description">
                                        <p class="mb-0">
                                            {{$singlePost->postText}}
                                        </p>
                                    </div>

                                    <div class="post-meta">
                                        @php
                                            $countReaction =[
                                                'like'=>0,
                                                'dislike'=>0,
                                                'love'=>0,
                                                'reacted'=>false,
                                                'type'=>'0',
                                            ];
                                            foreach ($singlePost->reactions as $reaction) {
                                                if ($reaction->user_Id==Auth::user()->id) {
                                                    $countReaction['type']=$reaction->type;
                                                    $countReaction['reacted']=true;
                                                }
                                                $countReaction[$reaction->type]++;
                                            }
                                            $my_reaction=($countReaction['reacted']) ?"You and ":"";

                                        @endphp
                                        <hr class="m-0">
                                        <div class="we-video-info" style="padding:5px;padding-left: 7px;padding-bottom: 0;">
                                            <ul class="post_reactions" data-id="{{$singlePost->users->id}}">
                                                <li style="margin-right: 28px;">
                                                    <span data-post_id="{{$singlePost->id}}" data-reaction="like" class="like text-{{($countReaction['type']=='like' ? "primary" : "secondary")}} reactionBtn" data-toggle="tooltip" title="like">
                                                        <i class="fa fa-thumbs-up"></i>
                                                        <ins>{{$countReaction['like']}}</ins>
                                                    </span>
                                                </li>
                                                <li style="margin-right: 28px;">
                                                    <span data-post_id="{{$singlePost->id}}" data-reaction="dislike" class="dislike text-{{($countReaction['type']=='dislike' ? "info" : "secondary")}} reactionBtn" data-toggle="tooltip" title="dislike">
                                                        <i class="fa fa-thumbs-down"></i>
                                                        <ins>{{$countReaction['dislike']}}</ins>
                                                    </span>
                                                </li>
                                                <li style="margin-right: 28px;">
                                                    <span data-post_id="{{$singlePost->id}}" data-reaction="love" class="love text-{{($countReaction['type']=='love' ? "danger" : "secondary")}} reactionBtn" data-toggle="tooltip" title="love">
                                                        <i class="fa fa-heart"></i>
                                                        <ins>{{$countReaction['love']}}</ins>
                                                    </span>
                                                </li>
                                                <li style="margin-right: 28px;">
                                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                                        <i class="fa fa-comments"></i>
                                                        <ins>52</ins>
                                                    </span>
                                                </li>
                                                <li class="social-media"  style="margin-right: 28px;">
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
                                        <hr>
                                        <div class="countReact">
                                            @if (empty($singlePost->reactions))
                                                <span>0 people react hear</span>
                                            @else
                                                <span style="font-size:11px;padding-left: 6px;">{{$my_reaction}}{{$singlePost->reactions->count()}} people react hear.</span>
                                            @endif
                                        </div>

                                    </div>


                                </div>
                                <hr class="m-0">
                                {{-- comment section --}}
                                <div class="coment-area" id="postId" data-id="{{$singlePost->id}}">

                                    <ul class="we-comet" id="comentSection" data-userid="{{$singlePost->users->id}}">
                                        <div class="comentArea" style="height:200px;overflow:auto">

                                        @forelse ($singlePost->comments as $usersComments)
                                                <li>

                                                    <div class="comet-avatar">
                                                        @if (empty($usersComments->profilepic->file))
                                                            <img src="{{asset('public/images/profile/default.jpg')}}" alt="">
                                                        @else
                                                            <img src="{{asset($usersComments->profilepic->file)}}" style="height: 34px;width:42px"  alt="">
                                                        @endif
                                                    </div>
                                                    <div class="we-comment" style="padding-top: 2px;padding-left: 5px;">
                                                        <div class="coment-head">
                                                            <h5><a href="{{url('/user_profile_'.$usersComments->users->id)}}" title="">{{$usersComments->users->name}}</a></h5>
                                                            <span style="padding-left: 6px;">{{$usersComments->created_at}}</span>
                                                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                                            @if ($usersComments->users->id == Auth::user()->id)
                                                                <div class="post-owner-icon" style="margin-right: 5px;width: 3%;float: right;margin-top: 2px;color:red">
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
                                        </div>
                                        <li class="post-comment">
                                            <div class="comet-avatar" style="max-width: 10%;width: 10%;margin-top: 2px;">
                                                @if (empty($userProfile->file))
                                                    <img src="{{asset('public/images/profile/default.jpg')}}" alt="">
                                                @else
                                                    <img src="{{asset($userProfile->file)}}" style="height: 34px;width:42px"  alt="">
                                                @endif
                                            </div>
                                            <div class="post-comt-box" style="width: 88%;padding-left: 2px;">
                                                <form id="userComments" name="form" enctype="multipart/form-data">
                                                    <textarea placeholder="Post your comment" name="Comment" id="userComent"></textarea>
                                                    <div class="form-group" hidden>
                                                        <input type="text" name="postuserId" id="postuserId" value="{{$singlePost->users->id}}"/>
                                                    </div>
                                                    <button class="btn btn-primary" style="color: black;" type="submit">Comment</button>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

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
    //slider part
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex-1].style.display = "block";
    }
</script>

@endsection
