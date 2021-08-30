<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="widget">
                    @foreach ($talkingInfos as $talkingInfo)
                        <div class="foot-logo">
                            <div class="logo">
                                <a href="{{url('/')}}" title=""><img src="{{asset( $talkingInfo->file )}}" alt=""></a>
                            </div>
                            <p>
                                {{$talkingInfo->talkingDescription}}
                            </p>
                        </div>
                        <ul class="location">
                            <li>
                                <i class="ti-map-alt"></i>
                                <p>{{$talkingInfo->adress}}</p>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>{{$talkingInfo->phoneNumber}}</p>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="widget">
                    <div class="widget-title"><h4>follow</h4></div>
                    <ul class="list-style">
                        <li><i class="fa fa-facebook-square"></i> <a href="https://web.facebook.com/shopcircut/" title="">facebook</a></li>
                        <li><i class="fa fa-twitter-square"></i><a href="https://twitter.com/login?lang=en" title="">twitter</a></li>
                        <li><i class="fa fa-instagram"></i><a href="https://www.instagram.com/?hl=en" title="">instagram</a></li>
                        <li><i class="fa fa-google-plus-square"></i> <a href="https://plus.google.com/discover" title="">Google+</a></li>
                        <li><i class="fa fa-pinterest-square"></i> <a href="https://www.pinterest.com/" title="">Pintrest</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="widget">
                    <div class="widget-title"><h4>Navigate</h4></div>
                    <ul class="list-style">
                        <li><a href="about.html" title="">about us</a></li>
                        <li><a href="contact.html" title="">contact us</a></li>
                        <li><a href="terms.html" title="">terms & Conditions</a></li>
                        <li><a href="#" title="">RSS syndication</a></li>
                        <li><a href="sitemap.html" title="">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="widget">
                    <div class="widget-title"><h4>useful links</h4></div>
                    <ul class="list-style">
                        <li><a href="#" title="">leasing</a></li>
                        <li><a href="#" title="">submit route</a></li>
                        <li><a href="#" title="">how does it work?</a></li>
                        <li><a href="#" title="">agent listings</a></li>
                        <li><a href="#" title="">view All</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="widget">
                    <div class="widget-title"><h4>download apps</h4></div>
                    <ul class="colla-apps">
                        <li><a href="https://play.google.com/store?hl=en" title=""><i class="fa fa-android"></i>android</a></li>
                        <li><a href="https://www.apple.com/lae/ios/app-store/" title=""><i class="ti-apple"></i>iPhone</a></li>
                        <li><a href="https://www.microsoft.com/store/apps" title=""><i class="fa fa-windows"></i>Windows</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer><!-- footer -->
<div class="bottombar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="copyright"><a target="_blank" href="https://www.templateshub.net">Talking Unlimited</a></span>
                <i><img src="{{asset('public/frontEnd/images/')}}/credit-cards.png" alt=""></i>
            </div>
        </div>
    </div>
</div>
