
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
						    <h2 class="log-title" style="width: 65%;float: left;">Register </h2>
                            @if (Route::has('register'))
                            <button class="btn" style="width: 25%;float: left;"><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">login</a></button>
                            @endif
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

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="pb-2">
                                <x-jet-label for="name" style="width: 100%;margin: 0;" value="{{ __('Name') }}" />
                                <x-jet-input id="name" style="width: 90%;border-radius: 4px;padding: 5px;border: 2px solid skyblue;" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <div class="pb-2">
                                <x-jet-label for="email" style="width: 100%;margin: 0;" value="{{ __('Email') }}" />
                                <x-jet-input id="email" style="width: 90%;border-radius: 4px;padding: 5px;border: 2px solid skyblue;" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>

                            <div class="pb-2">
                                <x-jet-label for="password" style="width: 100%;margin: 0;" value="{{ __('Password') }}" />
                                <x-jet-input id="password" style="width: 90%;border-radius: 4px;padding: 5px;border: 2px solid skyblue;" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div class="pb-2">
                                <x-jet-label for="password_confirmation" style="width: 100%;margin: 0;" value="{{ __('Confirm Password') }}" />
                                <x-jet-input id="password_confirmation" style="width: 90%;border-radius: 4px;padding: 5px;border: 2px solid skyblue;" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-jet-label for="terms">
                                        <div class="flex items-center">
                                            <x-jet-checkbox name="terms" id="terms"/>

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-jet-label>
                                </div>
                            @endif

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>

                                <x-jet-button class="ml-4">
                                    {{ __('Register') }}
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

