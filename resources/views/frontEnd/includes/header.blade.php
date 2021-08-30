<nav class="navbar navbar-expand-sm sticky-top" style="padding: 0">
	<div class="topbar fixed" style="padding: 0px 14px">
		<div class="logo">

            @foreach ($talkingInfos as $talkingInfo)
            <a title="" href="{{url('/')}}">
                <img src="{{asset( $talkingInfo->file )}}" alt="">
            </a>
            @endforeach
		</div>

		<div class="top-area">
            <form action="{{url('/search')}}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="input-group" style="width: 25%;float: left;margin-top: 10px;">
                    <input type="text" name="search" class="form-control" placeholder="Search this blog">
                    <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    </div>
                </div>
            </form>
            <div class="mainMenu" style="width: 50%;padding:0">
                <ul id="mainUl">
                    <li id="mainLi">
                        <a href="" id="mainA" style="padding-left: 25px;padding-right:25px;padding-bottom: 2px;"><i class="ti-home"></i></a>
                    </li>
                    <li id="mainLi">
                        <a href="" id="mainA" style="padding-left: 25px;padding-right:25px;padding-bottom: 2px;"><i class="ti-desktop"></i></a>
                    </li>
                    <li id="mainLi">
                        <a href="" id="mainA" style="padding-left: 25px;padding-right:25px;padding-bottom: 2px;"><i class="ti-archive"></i></a>
                    </li>
                    <li id="mainLi">
                        <a href="" id="mainA" style="padding-left: 25px;padding-right:25px;padding-bottom: 2px;"><i class="ti-user"></i></a>
                    </li>
                    <li id="mainLi">
                        <span class="ti-menu main-menu" data-ripple="" style="padding-left: 0px"></span>
                    </li>
                </ul>

            </div>
			<ul class="setting-area" id="subMenu" style="width: 20%;">
			    <li>
					<a href=""  id="dropSmsIcon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Messages"><i class="ti-comment"></i><span>12</span></a>
					<div class="dropdown-menu" aria-labelledby="dropSmsIcon" style="min-width: 22rem;right: 0px;margin-top: 19px;left:auto;max-height:400px;overflow: auto;">
						<a href="{{url('/chatify')}}"><span style="padding: 10px;">Tab To Send Messages</span></a>
						<ul class="drops-menu">
							@forelse($friends as $friend)
                                @if ($friend->friend_id != Auth::id())
                                    <li style="padding: 10px;">
                                        <div class="nearly-pepls">
                                            <figure style="min-width: 32px;max-width: 32px;float: left;">
                                                @if (empty($friend->friendinfo->profilepic->file))
                                                    <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 56px;max-width:52px;width:52px">
                                                @else
                                                    <img src="{{asset($friend->friendinfo->profilepic->file)}}" style="height: 56px;max-width:52px;width:52px"  alt="">
                                                    <span class="dot" style="width: 10px;margin-left: 38px;margin-top: -13px;position: absolute;height: 10px;background: green;border-radius: 50%;"></span>
                                                @endif
                                            </figure>

                                            <div class="pepl-info" data-usermsg="{{$friend->friendinfo->id}}" style="width: 80%;padding-left: 36px;margin-top: 5px;">
                                                <h4 style="width: 90%;float: left;"><a href="" id="userMsg" onclick="myFunction{{$friend->friendinfo->id}}()" title="" style="font-size: .9375rem;font-weight:600">{{$friend->friendinfo->name}}</a></h4>
                                                <span class="dot" style="width: 12px;height: 12px;background: red;margin-top: 4px;border-radius: 50%;"></span>
                                                <script>
                                                    function myFunction{{$friend->friendinfo->id}}() {
                                                      var x = document.getElementById("snackbar");
                                                      x.className = "show";
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </li>

                                @elseif ($friend->user_Id != Auth::id())
                                    <li style="padding: 10px;">
                                        <div class="nearly-pepls">
                                            <figure style="min-width: 32px;max-width: 32px;float: left;">
                                                @if (empty($friend->profilepic->file))
                                                    <img src="{{asset('public/images/profile/default.jpg')}}" alt="" style="height: 56px;max-width:52px;width:52px">
                                                @else
                                                    <img src="{{asset($friend->profilepic->file)}}" style="height: 56px;max-width:52px;width:52px"  alt="">
                                                    <span class="dot" style="width: 10px;margin-left: 38px;margin-top: -13px;position: absolute;height: 10px;background: green;border-radius: 50%;"></span>
                                                @endif
                                            </figure>

                                            <div class="pepl-info" data-usermsg="{{$friend->users->id}}" style="width: 80%;padding-left: 36px;margin-top: 5px;">
                                                <h4 style="width: 90%;float: left;"><a id="userMsg" href="" onclick="myFunctionmsg{{$friend->users->id}}()" title="" style="font-size: .9375rem;font-weight:600">{{$friend->users->name}}</a></h4>
                                                <span class="dot" style="width: 12px;height: 12px;background: red;margin-top: 4px;border-radius: 50%;"></span>
                                                
                                            </div>
                                            <script>
                                                function myFunctionmsg{{$friend->users->id}}() {
                                                  var x = document.getElementById("snackbar");
                                                  x.className = "show";
                                                }
                                                
                                            </script>
                                        </div>
                                    </li>
                                @endif
                            @empty
                            {{''}}
                            @endforelse
						</ul>
                        
						<a href="{{url('/chatify')}}" title="" class="more-mesg"  style="padding: 10px;">view more</a>
                        
					</div>
				</li>
                @php
                    $countNotification =0;
                    foreach ($UserNotifi->notifications as $notification) {
                        if ($notification->notifiable_id==Auth::user()->id) {
                            $countNotification++;
                        }
                    }
                @endphp
                <li>
					<a href="#" class="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-bell"></i><span>{{$countNotification}}</span>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: 22rem;right: 0px;margin-top: 19px;left:auto;max-height:400px;overflow: auto;">

                        <span style="padding: 10px;"><span>{{$countNotification}}</span> New Notifications</span>
						<ul class="drops-menu">

							@forelse ($UserNotifi->notifications as $notification)
                                    <li>
                                        <a href="{{url('/single_post_'.$notification->data['post_id'])}}" title="">
                                            <img src="{{asset($notification->data['profilePicLink'])}}" style="height: 44px;width:12%" alt="">
                                            <div class="mesg-meta" style="margin-top: 8px;">
                                                {{$notification->data['userName']}} {{$notification->data['reactionName']}}'s your post.
                                            </div>
                                        </a>
                                        <span class="tag green">New</span>
                                    </li>


                            @empty

                            @endforelse



						</ul>
						<a href="notifications.html" title="" class="more-mesg" style="padding: 10px;">view more</a>
					</div>
				</li>

				<li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
					<div class="dropdowns languages">
						<a href="#" title=""><i class="ti-check"></i>English</a>
						<a href="#" title="">Arabic</a>
						<a href="#" title="">Dutch</a>
						<a href="#" title="">French</a>
					</div>
				</li>
			</ul>
            
			<div class="dropdown" style="width: 5%;float: left;margin-top: 9px;">

                @if (empty($userProfile->file))
                    <img class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="{{asset('public/images/profile/default.jpg')}}" style="height: 42px;width:42px" alt="">
                @else
				    <img class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="{{asset($userProfile->file)}}" style="height: 42px;width:42px"  alt="">
                @endif

			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="left:-117px;top:123%;padding-top:0;background: #fafafa;">
				<a id="acDrop" href="{{ url('/profile')}}">
                        {{ Auth::user()->name }}
                    </a>

					<a id="acDrop" href="#" title=""><span class=" f-online"></span>online</a>
					<a id="acDrop" href="#" title=""><span class=" f-away"></span>away</a>
					<a id="acDrop" href="#" title=""><span class=" f-off"></span>offline</a>
					<a id="acDrop" href="{{url('/profile')}}" title=""><i class="ti-user"></i> view profile</a>
					<a id="acDrop" href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>
					<a id="acDrop" href="#" title=""><i class="ti-target"></i>activity log</a>
					<a id="acDrop" href="#" title=""><i class="ti-settings"></i>account setting</a>
					<form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a id="acDrop " style="color:red" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            <i class="ti-power-off" style="color: #red"></i> {{ __('Log Out') }}
                        </a>
                    </form>

			  </div>
			</div>


		</div>
	</div><!-- topbar -->
    @include('frontEnd.includes.messagebox')
</nav>

<!---  side panel --->
<div class="side-panel">
    <h4 class="panel-title">General Setting</h4>
    <form method="post">
        <div class="setting-row">
            <span>use night mode</span>
            <input type="checkbox" id="nightmode1"/>
            <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Notifications</span>
            <input type="checkbox" id="switch22" />
            <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Notification sound</span>
            <input type="checkbox" id="switch33" />
            <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>My profile</span>
            <input type="checkbox" id="switch44" />
            <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Show profile</span>
            <input type="checkbox" id="switch55" />
            <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
        </div>
    </form>
    <h4 class="panel-title">Account Setting</h4>
    <form method="post">
        <div class="setting-row">
            <span>Sub users</span>
            <input type="checkbox" id="switch66" />
            <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>personal account</span>
            <input type="checkbox" id="switch77" />
            <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Business account</span>
            <input type="checkbox" id="switch88" />
            <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Show me online</span>
            <input type="checkbox" id="switch99" />
            <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Delete history</span>
            <input type="checkbox" id="switch101" />
            <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Expose author name</span>
            <input type="checkbox" id="switch111" />
            <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
        </div>
    </form>
</div><!-- side panel -->
