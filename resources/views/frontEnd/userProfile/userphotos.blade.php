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
                            <h4 style="font-weight: bold;">Profile Pictures</h4>
                        </div>
                        <ul class="photos" style="text-align: center;">
                            @foreach ($profilePic as $profilePic)
                                @if (empty($profilePic->file))
                                    <img src="" alt="" style="height: 180px">
                                @else

                                        <li style="min-width: 18.9%;width: 18.9%;max-height: 200px">
                                            <a style="padding: 6px;" class="strip" href="{{asset($profilePic->file)}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                <img src="{{asset($profilePic->file)}}" style="height: 180px" alt=""></a>
                                        </li>

                                @endif
                            @endforeach

                        </ul>
                    </div><!-- photos -->
                </div>
                <div class="col-lg-12">
                    <div class="central-meta" style="border-radius: 12px;">
                        <div class="profilePic" style="padding-left: 15px;color: black;">
                            <h4 style="font-weight: bold;">Cover Photos</h4>
                        </div>
                        <ul class="photos" style="text-align: center;">
                        @foreach ($coverPhoto as $coverPhoto)
                            @if (empty($coverPhoto->coverPhoto))
                                <img src="" alt="" style="height: 110px">
                            @else
                                <li style="min-width: 18.9%;width: 18.9%;max-height: 120px">
                                    <a style="padding: 6px;height:110px" class="strip" href="{{asset($coverPhoto->coverPhoto)}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                        <img src="{{asset($coverPhoto->coverPhoto)}}" alt="" style="height: 105px;"></a>
                                </li>

                            @endif
                        @endforeach

                        </ul>
                    </div><!-- photos -->
                </div>
                <div class="col-lg-12">
                    <div class="central-meta" style="border-radius: 12px;">
                        <div class="profilePic" style="padding-left: 15px;color: black;">
                            <h4 style="font-weight: bold;">Photos</h4>
                        </div>
                        <ul class="photos" style="text-align: center;">
                            @foreach ($photos as $photo)
                                @if (empty($photo->file))
                                    <img src="" alt="" style="height: 180px">
                                @else

                                        <li style="min-width: 18.9%;width: 18.9%;max-height: 200px">
                                            <a style="padding: 6px;" class="strip" href="{{asset($photo->file)}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                <img src="{{asset('public/images/posts/images/'.$photo->file)}}" style="height: 180px" alt=""></a>
                                        </li>

                                @endif
                            @endforeach



                        </ul>

                        <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                    </div><!-- photos -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
