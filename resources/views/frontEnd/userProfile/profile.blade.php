@extends('frontEnd.master')

@section('homeContent')

<section>
    @include('frontEnd.userProfile.uincludes.utopbar')
</section><!-- top area -->

<section>
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        <div class="col-lg-3">
                            @include('frontEnd.userProfile.uincludes.usidebar')
                        </div><!-- sidebar -->
                        <div class="col-lg-6">
                            @yield('contentMeta')
                        </div><!-- centerl meta -->
                        <div class="col-lg-3">
                            @include('frontEnd.userProfile.uincludes.urightSidebar')
                        </div><!-- sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
