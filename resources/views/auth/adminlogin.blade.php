<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Talking Admin Login</title>
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
				<div class="land-featurearea">
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
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
                        <div class="" style="width:100%;float:left ">
						    <h2 class="log-title" style="width: 65%;float: left;">Admin Login</h2>
                        </div>
                        <br>
							<p>
								Don’t use Talking Adda Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
							</p>
                            <x-jet-validation-errors class="mb-4" style="color: red" />
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.login') }}">
                                @csrf

                            <div class="pb-2">
                                <x-jet-label class="mb-0" stule="width: 100%;margin: 0;" for="email" value="{{ __('Email') }}" />
                                <x-jet-input style="width: 90%;border-radius: 4px;padding: 5px;border: 2px solid skyblue;" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                            <div class="pb-2">
                                <x-jet-label class="mb-0" stule="width: 100%;margin: 0;" for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" style="width: 90%;border-radius: 4px;padding: 5px;border: 2px solid skyblue;" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            </div>

                            <div class="">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <x-jet-button class="btn AlogInBtn" id="AlogInBtn" style="margin-left: 87px">
                                    {{ __('Log in') }}
                                </x-jet-button>
                            </div>
                        </form>
					</div>

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
