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
    <div class="btn editCoverPicture edit-phto" data-target="#coverPhoto" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit profilePicture">
        <i class="fa fa-camera-retro"></i>
        <label class="fileContainer">
            Edit Cover Photo
        </label>
    </div>
    <!---edit model--->
    <div class="modal" id="coverPhoto">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: lightgray;border-radius: 6px 6px 0px 0px;">
                    <h5 class="modal-title">Choose Cover Photo</h5>
                    <button class="btn close" data-dismiss="modal">&times;</button>
                </div>

                <div class="successSMS"></div>

                <div class="modal-body">
                    <form id="saveCoverfile" name="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" hidden>
                            <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}" data-id="{{Auth::user()->id}}"/>
                        </div>
                        <div class="prevCovefile">
                            <img src="" alt="" id="prevCoverImage" style="max-height:200px;max-width:250px">
                        </div>

                        <div class="form-group">
                            <div class="editCoverPhoto">
                                <input type="file" name="coverPhoto" id="saveCoverPhoto" onchange="prevCoverPhoto('this')">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

                        <!---profile pic modal-->
                        <div class="edit-phto"  class="btn btn-secondary editProfilePicture" data-target="#profilePicture" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit profilePicture">
                            <i class="fa fa-camera-retro"></i>
                            <label class="fileContainer">
                                Edit profile Image
                            </label>
                        </div>
                        <!---edit model--->
                        <div class="modal" id="profilePicture">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: lightgray;border-radius: 6px 6px 0px 0px;">
                                        <h5 class="modal-title">Choose Your Profile Picture</h5>
                                        <button class="btn close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="successSMS"></div>

                                    <div class="modal-body">
                                        <form id="saveProfile" name="form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group" hidden>
                                                <input type="text" name="userId" id="userId" value="{{Auth::user()->id}}" data-id="{{Auth::user()->id}}"/>
                                            </div>
                                            <div class="prevProfile">
                                                <img src="" alt="" id="prevProImage" style="max-height:200px;max-width:250px">
                                            </div>

                                            <div class="form-group">
                                                <div class="editProfileImage">
                                                    <input type="file" name="file" id="saveProfilePicture" onchange="prevProfileImage('this')">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Update Profile Picture</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-10 col-sm-9">
                <div class="timeline-info">
                    <ul>
                        <li class="admin-name">
                          <h5>{{ Auth::user()->name }}</h5>
                          <span>Group Admin</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12">
                <div class="timeline-info text-center" style="border-top: 1px solid lightgray">
                    <ul>
                        <li>
                            <a class="" href="{{url('/profile')}}" title="" data-ripple="">time line</a>
                            <a class="" href="{{url('/user_photos')}}" title="" data-ripple="">Photos</a>
                            <a class="" href="{{url('/user_videos')}}" title="" data-ripple="">Videos</a>
                            <a class="" href="timeline-friends.html" title="" data-ripple="">Friends</a>
                            <a class="" href="groups.html" title="" data-ripple="">Groups</a>
                            <a class="" href="{{url('/user_about')}}" title="" data-ripple="">about</a>
                            <a class="active" href="#" title="" data-ripple="">more</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function prevProfileImage(input){
        var file=$('input[id=saveProfilePicture]').get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
            $('#prevProImage').attr("src", reader.result)
            };
            reader.readAsDataURL(file);

        }
    }
    function prevCoverPhoto(input){
        var file=$('input[id=saveCoverPhoto]').get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
            $('#prevCoverImage').attr("src", reader.result)
            };
            reader.readAsDataURL(file);

        }
    }
</script>
