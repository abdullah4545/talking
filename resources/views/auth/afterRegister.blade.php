<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Talking Adda Social Network</title>
    <link rel="icon" href="{{asset('public/frontEnd/')}}/images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('public/frontEnd/')}}/css/main.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontEnd/')}}/css/style.css">
    <link rel="stylesheet" href="{{ asset('public/frontEnd/')}}/css/color.css">
    <link rel="stylesheet" href="{{ asset('public/frontEnd/')}}/css/responsive.css">

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea" style="height: 120vh;">
					<div class="land-meta">
						<h1>Talking Adda</h1>
						<p>
							Talking Adda is free to use for as long as you want with two active projects.
						</p>
						<div class="friend-logo">
							<span><img src="{{ asset('public/frontEnd/')}}/images/wink.png" alt=""></span>
						</div>
						<a href="#" title="" class="folow-me">Follow Us on</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="REGaFTER p-4">
                    <div class="" style="width:100%;float:left ">
                        <h2 class="log-title" style="width: 65%;float: left;">User Details Info </h2>
                    </div>

                    <form method="POST" action="{{ route('saveBasicInfo') }}">
                        @csrf
                        <div class="form-group mb-0">
                            <label for="name" style="color: #088dcd;" >Your Name</label>
                            <input type="text" name="userName" id="userName" value="{{ $userdata->name}}"  required="required" style="color: #2a2a2a;" readonly/>
                        </div>
                        
                        <div class="form-group" hidden>
                            <input type="text" name="userId" id="userId" value="{{ $userdata->id}}" />
                        </div>
                        <div class="form-group">
                            <label for="name" style="color: #088dcd;" >Your Email</label>
                            <input type="text" name="userEmail" id="userEmail" value="{{ $userdata->email}}" required="required" style="color: #2a2a2a;" readonly/>
                        </div>
                        <div class="form-group">
                        <input type="text" name="userPhone" id="userPhone"  required="required"/>
                        <label class="control-label" for="input">Phone No.</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">
                            <span style="padding-left: 2px;font-size: 14px;">Birth Date</span>
                            <input type="date" id="birthday" style="color: #2a2a2a;" name="birthday" required="required">
            
                        </div>
            
                        <div class="form-group">
                            <div class="radio">
                                <select name="gender" id="gender" required="required">
                                    <option>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                        <input name="city" id="city" type="text" required="required"/>
                        <label class="control-label" for="input">City</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">
                        <select name="country" id="country" required="required">
                            <option value="country">Country</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Ƭand Islands">Ƭand Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <textarea rows="2" name="textAbout" id="textAbout" required="required"></textarea>
                        <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                        
                            <button type="submit" name="btn" class="btn  btn-block" style="background: #088dcd">Save Info</button>

                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>

	<script data-cfasync="false" src="{{ asset('public/frontEnd/')}}/js/email-decode.min.js"></script>
	<script src="{{ asset('public/frontEnd/')}}/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<!---frontEndMain js ajax--->
    <script src="{{ asset('public/frontEnd/')}}/js/frontEndMain.js"></script>
</body>

</html>
