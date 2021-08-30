<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Talking Social Service</title>
    <link rel="icon" href="{{asset('public/frontEnd/')}}/images/fav.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('public/frontEnd/')}}/css/mainStyle.css">
    <link rel="stylesheet" href="{{ asset('public/frontEnd/')}}/css/main.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontEnd/')}}/css/style.css">
    <link rel="stylesheet" href="{{ asset('public/frontEnd/')}}/css/color.css">
    <link rel="stylesheet" href="{{ asset('public/frontEnd/')}}/css/responsive.css">


    <style>
        .btnwork {
            position: absolute;
            right: 60px;
            margin-top: -28px;
        }
        .btnEdu {
            position: absolute;
            right: 60px;
            margin-top: -28px;
        }
        .buttonForBasisInfo {
            float: right;
            margin-right: 20px;
            margin-top: -55px;
        }

        /* Slideshow container */
        .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
        }
        .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        }
        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }

        .prev:hover, .next:hover {
        background-color: gray;
        }
        #snackbar {
        visibility: hidden;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 0px;
        background: white;
        }

        #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s;
        animation: fadein 0.5s;
        }

        @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;} 
        to {bottom: 0px; opacity: 1;}
        }

        @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 0px; opacity: 1;}
        }

        /* .post-meta img:first-child{
            width:10%
        } */
    </style>
</head>
<body>
    
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">

    <!---Header part--->
    @include('frontEnd.includes.header')

	<section id="ContentForPost">
        <!---Home content part--->
        @yield('homeContent')
	</section>

    <!---Footer part--->
    @include('frontEnd.includes.footer')

</div>

    <script data-cfasync="false" src="{{ asset('public/frontEnd/')}}/js/email-decode.min.js"></script>
    <script src="{{ asset('public/frontEnd/')}}/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!---frontEndMain js ajax--->
    <script src="{{ asset('public/frontEnd/')}}/js/frontEndMain.js"></script>
	<script src="{{ asset('public/frontEnd/')}}/js/main.min.js"></script>
	<script src="{{ asset('public/frontEnd/')}}/js/map-init.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>
    <script src="{{ asset('public/frontEnd/')}}/js/jquery.jscroll.min.js"></script>

</body>

</html>
