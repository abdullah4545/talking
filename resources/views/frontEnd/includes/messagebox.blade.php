<div id="snackbar" class="message_box" style="height: 400px;box-shadow: 0px 1px 5px gainsboro;width: 330px;">
    <div class="msgHeader" style="height: 50px;float: left;width: 100%;padding-top: 8px;box-shadow: -1px 3px 5px gray;border-radius: 6px 6px 0px 0px;background:red">
        <div class="userProfile" style="width: 70%;float: left;">
            <figure style="min-width: 32px;max-width: 32px;float: left;">
                @if (empty($friend->friendinfo->profilepic->file))
                    <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 35px;max-width:35px;width:32px;margin-left: 10px;border-radius: 50%;">
                @else
                    <img src="" id="userImageMsg" style="height: 35px;max-width:35px;width:32px;border-radius: 50%;margin-left: 10px;"  alt="">
                    <span class="dot" style="width: 7px;margin-left: 35px;margin-top: -10px;position: absolute;height: 8px;background: green;border-radius: 50%;"></span>
                @endif
            </figure>
            <h4 style="width: 85%;float: left;padding-left: 20px;color: white;margin-top: -6px;"><a href="#" title="" style="font-size: .9375rem;font-weight:600" id="userMsgName"></a></h4>
        </div>
        <div class="userMessageIcon" style="width: 30%;float: left;">
            <i class="fa fa-video-camera" style="color: white;font-size: 22px;padding: 7px;"></i>
            <i class="fa fa-phone" style="color: white;font-size: 22px;padding: 7px;"></i>
            <span class="close" style="color: white;font-size: 22px;padding: 7px;padding-top: 2px;" onclick="closeMsgModel()">x</span>
            <script>
                function closeMsgModel(){
                    document.getElementById('snackbar').style.display="none";
                }
            </script>
        </div>
        <div></div>

    </div>
    <div class="msgBody" style="height: 300px;width:100%;float: left;">

    </div>
    <div class="msgFooter" style="height: 50px;width:100%;float: left;box-shadow: 0px -3px 8px gainsboro;">
        <div class="footerMsgIcon" style="width:40%;float: left;padding: 10px;">
            <i class="fa fa-plus-circle" style="font-size: 25px;padding-top: 5px; padding-right: 10px;"></i>
            <i class="fa fa-gift" style="font-size: 25px;padding-top: 5px;"></i>
        </div>
        <div class="msgFrom" style="width:60%;float: left;padding: 10px;">
            <form action="">
                <input type="text" name="" id="" placeholder="Aa" style="width: 80%;padding: 5px;border-radius: 20px;border: none;background: ghostwhite;">
                <button type="submit" name="submitBtn" style="padding: 0;background: none;font-size: 18px;padding-left: 6px;color: blue;"><i class="fa fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
</div>