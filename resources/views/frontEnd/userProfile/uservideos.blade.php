@extends('frontEnd.master')

@section('homeContent')

<section>
    @include('frontEnd.userProfile.uincludes.utopbar')
</section><!-- top area -->

<section>
    <div class="gap gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="central-meta" style="border-radius: 12px;">
                        <div class="profilePic" style="padding-left: 15px;color: black;">
                            <h4 style="font-weight: bold;">Vedios</h4>
                        </div>
                        <ul class="vedios" style="text-align: center;padding: 0;">
                         @foreach ($userVideo as $userVideo)
                            
                                @if(empty($userVideo->postVideo))
                                    {{''}}
                                @else
                                <div id="postVid" style="width: 25%;float: left;">
                                    <li id="" style="width: 100%;list-style: none;">
                                        <a style="padding: 6px;" class="strip" href="{{asset('public/images/posts/videos/'.Auth::user()->id.'/'.$userVideo->postVideo)}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                            <video id="postVideo" src="{{asset('public/images/posts/videos/'.$userVideo->postVideo)}}" style="width: 100%;float: left;padding: 5px;" controls></video>
                                        </a>
                                    </li>
                                </div>
                                @endif
                           
                         @endforeach

                        </ul>
                        <div class="lodmore text-center"> <b> Loading ......</b></div>
                    </div><!-- videos -->
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
