
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //msgUserInfo
    $(document).on('click', '#userMsg', function(e){
        e.preventDefault();
            let userId =$(this).closest('.pepl-info').data('usermsg');
        $.ajax({
            type:'GET',
            url: '/talking/get-user-data/'+userId,
    
            success: function(data){
                $('#snackbar').find('#userImageMsg').attr('src', data[0].profilepic.file);
                $('#snackbar').find('#userMsgName').text(data[0].name);
            },
            error:function(error){
                console.log(error);
            }
    
        });


    });

    //update user basic info
    $(document).on('submit', '#edituUserBasicInfo', function(e){
        e.preventDefault();
            let userBasicDataId = $('#edituUserBasicInfo').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/user-basic-info-update/'+userBasicDataId,
            processData: false,
            contentType: false,
            data:new FormData(this),

            success:function(data){
                let message = ('.successBasic');
                $(message).append(`<div class="alert alert-success">User basic information update successfylly</div>`);


                $('#edituserName').val('');
                $('#edituserEmail').val('');
                $('#edituserPhone').val('');
                $('#editbirthday').val('');
                $('#editgender').val('');
                $('#editcity').val('');
                $('#editcountry').val('');
                $('#edittextAbout').val('');
                setInterval('location.reload()', 500);
            },
            error:function(error){
                alert('error');
            }


        });


    });

    //update profile picture

    $(document).on('submit', '#saveProfile', function(e){
        e.preventDefault();
            let userProfileImg = new FormData(this);
            let userId =$('#userId').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/save-profile-picture/'+userId,
            processData: false,
            contentType: false,
            data:userProfileImg,

            success:function(data){
                let message = ('.successSMS');
                $(message).append(`<div class="alert alert-success">Profile Picture update successfylly</div>`);

                $('#prevProImage').attr('src', '');
                $('#saveProfilePicture').val('');

                setInterval('location.reload()', 1000);


            },
            error:function(error){
                alert('Please Select only image file. other file can save hear');
            }


        });


    });


    //update cover photo

    $(document).on('submit', '#saveCoverfile', function(e){
        e.preventDefault();
            let userCoverPhoto = new FormData(this);
            let userId =$('#userId').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/save-cover-photo/'+userId,
            processData: false,
            contentType: false,
            data:userCoverPhoto,

            success:function(data){
                let message = ('.successSMS');
                $(message).append(`<div class="alert alert-success">Cover Photo update successfylly</div>`);

                $('#prevCoverImage').attr('src', '');
                $('#saveCoverPhoto').val('');

                setInterval('location.reload()', 1000);


            },
            error:function(error){
                alert('Please Select only image file. other file can save hear');

            }


        });


    });

     //save user education info
     $(document).on('submit', '#userEducation', function(e){
        e.preventDefault();
            let userEducationData = new FormData(this);
        $.ajax({
            type:'POST',
            url:'/talking/user-education-save',
            processData: false,
            contentType: false,
            data:userEducationData,

            success:function(data){
                let message = ('.successEducation');
                $(message).append(`<div class="alert alert-success">User education information Save successfylly</div>`);

                $('#qualification').val('');
                $('#studySubject').val('');
                $('#instuteName').val('');
                $('#studyFrom').val('');
                $('#studyTo').val('');
                $('#city').val('');
                $('#country').val('');
            },
            error:function(error){
                alert('error');
            }


        });


    });

    //save user interests
    $(document).on('submit', '#saveInterest', function(e){
        e.preventDefault();
            let userInterests = new FormData(this);
        $.ajax({
            type:'POST',
            url:'/talking/user-interest-save',
            processData: false,
            contentType: false,
            data:userInterests,

            success:function(data){
                let message = ('.successSMS');
                $(message).append(`<div class="alert alert-success">User interests Save successfylly</div>`);

                $('#userfirst').val('');
                $('#userSec').val('');
                $('#userthird').val('');
            },
            error:function(error){
                alert('error');
            }


        });


    });

    //save user works
    $(document).on('submit', '#saveWork', function(e){
        e.preventDefault();
            let userWork = new FormData(this);
        $.ajax({
            type:'POST',
            url:'/talking/user-work-save',
            processData: false,
            contentType: false,
            data:userWork,

            success:function(data){
                let message = ('.successSaveWork');
                $(message).append(`<div class="alert alert-success">Work Save successfylly</div>`);

                $('#Company').val('');
                $('#Position').val('');
                $('#City').val('');
                $('#Description').val('');
            },
            error:function(error){
                alert('error');
            }


        });


    });


    //update user Education

    $(document).on('submit', '#editEducation', function(e){
        e.preventDefault();
            let userEducation = new FormData(this);
            let userEducationId =$('#editEducation').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/update-user-education/'+userEducationId,
            processData: false,
            contentType: false,
            data:userEducation,

            success:function(data){
                let message = ('.successEducation');
                $(message).append(`<div class="alert alert-success">Education Info update successfylly</div>`);

                $('#editqualification').val('');
                $('#editstudySubject').val('');
                $('#editinstuteName').val('');
                $('#editstudyFrom').val('');
                $('#editstudyTo').val('');
                $('#editcityi').val('');
                $('#editcountryi').val('');


            },
            error:function(error){
                alert('error');
            }


        });


    });

    //update user works

    $(document).on('submit', '#updateWork', function(e){
        e.preventDefault();
            let userWork = new FormData(this);
            let userWorkId =$('#updateWork').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/update-user-work/'+userWorkId,
            processData: false,
            contentType: false,
            data:userWork,

            success:function(data){
                let message = ('.successUpdateWork');
                $(message).append(`<div class="alert alert-success">Word details update successfylly</div>`);

                $('#editCompany').val('');
                $('#editPosition').val('');
                $('#editCity').val('');
                $('#editDescription').val('');

                setInterval('location.reload()', 1000);


            },
            error:function(error){
                alert('error');
            }


        });


    });

    //update user Interest

    $(document).on('submit', '#updateInterest', function(e){
        e.preventDefault();
            let userInterest = new FormData(this);
            let userInterestId =$('#updateInterest').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/update-user-interest/'+userInterestId,
            processData: false,
            contentType: false,
            data:userInterest,

            success:function(data){
                let message = ('.successUpdateInterest');
                $(message).append(`<div class="alert alert-success">Word details update successfylly</div>`);

                $('#edituserfirst').val('');
                $('#edituserSec').val('');
                $('#edituserthird').val('');

                setInterval('location.reload()', 1000);


            },
            error:function(error){
                alert('error');
            }


        });


    });


    //save user posts
    $(document).on('submit', '#userPost', function(e){
        e.preventDefault();
            let userPost = new FormData(this);
            let userId =$('#userId').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/user-post-save/'+userId,
            processData: false,
            contentType: false,
            data:userPost,

            success:function(data){
                let message = ('.successPost');
                $(message).append(`<div class="alert alert-success">Post Save successfylly</div>`);

                $('#postText').val('');
                $('#postImage').val('');
                $('#postVideo').val('');
                $('#prevFile').attr('style', 'display:none');
                $('#prevVedio').attr('style', 'display:none');
                location.reload();
            },
            error:function(error){
                alert('Post Does not work properly');
            }


        });


    });

    // //edit user Post
    // $(document).on('click', '#editUserOwnPost', function(){
    //     let userPostId = $(this).closest('#userPostId').data('id');

    //     $.ajax({
    //     type:'GET',
    //     url:'/talking/edit-user-post/'+userPostId,

    //     success:function(data){
    //         $('#editUserPost').find('#editpostCanSee').val(data.postCanSee);
    //         $('#editUserPost').find('#editpostText').val(data.postText);
    //         $('#editUserPost').find('#editpostVideo').attr('src', data.photos.file);
    //         $('#editUserPost').find('#editpostVideo').val(data.talkingDescription);
    //         $('#editUserPost').attr('data-id', data.id);
    //         $('#editUserPost').find('#prevFile').prepend(`
    //                     <div class="postImg" style="width:25%;float:left;position:relative">
    //                         <img src="public/images/posts/images/`+data.photos[0].file+`" alt="" id="previewImage" style="border-radius: 10px;width:100%;padding:5px;">
    //                         <span id="postIspan" onclick="removeSelectedPostImage(postImages.indexOf(i))" style="position: absolute;right: 0;cursor: pointer;font-size: 31px;color: red;margin-top: -8px;margin-right: 8px;">&times</span>
    //                     </div>
    //         `);

    //     },
    //     error:function(error){
    //             console.log(error);
    //     }


    //     });


    // });

    //save user COMMENTS
    $(document).on('submit', '#userComments', function(e){
        e.preventDefault();
            let userComments = new FormData(this);
            let postId =$(this).closest('#postId').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/user-post-comments/'+postId,
            processData: false,
            contentType: false,
            data:userComments,

            success:function(data){
                $('#userComent').val("");
                setInterval('location.reload()', 1000);

            },
            error:function(error){
                alert('Post comments Does not work properly');
            }


        });


    });


    //search
    // $(document).on('submit', '#search', function(e){
    //     e.preventDefault();

    //     $.ajax({
    //         type:'GET',
    //         url:'/talking/search',
    //         processData: false,
    //         contentType: false,


    //         success:function(data){


    //         },
    //         error:function(error){
    //             alert('Post comments Does not work properly');
    //         }


    //     });


    // });


    //sent friend request
    $(document).on('submit', '#friendRequest', function(e){
        e.preventDefault();
            let friendData = new FormData(this);
            let friendId =$(this).closest('#friendLi').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/sent-friend-request/'+friendId,
            processData: false,
            contentType: false,
            data:friendData,

            success:function(data){
                document.getElementById('frReqBtn'+friendId).innerHTML='Request Sent';
                document.getElementById('frReqBtn'+friendId).style.background='gray';

            },
            error:function(error){
                alert('Sent friend request does not work properly');
            }


        });


    });

    //confirm friend request
    $(document).on('submit', '#confirmFriend', function(e){
        e.preventDefault();
            let friendId =$(this).closest('#confirmFriend').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/confirm-friend-request/'+friendId,
            processData: false,
            contentType: false,
            data:new FormData(this),

            success:function(data){
                document.getElementById('frindReqLi'+friendId).style.display='none';
            },
            error:function(error){
                alert('Sent friend request does not work properly');
            }


        });


    });
    //cancle friend request
    $(document).on('submit', '#cancelFriend', function(e){
        e.preventDefault();
            let friendId =$(this).closest('#cancelFriend').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/delete-friend-request/'+friendId,
            processData: false,
            contentType: false,
            data:new FormData(this),

            success:function(data){
                document.getElementById('delfrindReqLi'+friendId).style.display='none';
            },
            error:function(error){
                alert('Sent friend request does not work properly');
            }


        });


    });

    //reactions
    $('#ContentForPost').on('click', '.reactionBtn', function(e){
        e.preventDefault();
        let postUserId=$(this).closest('.post_reactions').data('id');
        $.ajax({
            type:'POST',
            url:'/talking/post-reaction/'+postUserId,

            data:{
                'postId':$(this).data('post_id'),
                "reactionName":$(this).data('reaction'),
            },

            success:function(data){

            },
            error:function(error){
                alert('Sent reaction request does not work properly');
            }


        });

    });
























/*--- socials menu scritp ---*/
    $('.trigger').on("click", function() {
        $(this).parent(".menu").toggleClass("active");
    });









});


























