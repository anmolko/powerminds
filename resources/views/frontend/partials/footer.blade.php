<!--footer start-->
<footer class="footer widget-footer ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
    <div class="first-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 widget-area">
                    <div class="widget newsletter_widget clearfix">
                        <h3>Subscribe To Our Newsletter</h3>
                        <form id="subscribe-form" class="newsletter-form" method="post" action="#" data-mailchimp="true">
                            <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                <p>
                                    <i class="fa fa-paper-plane-o"></i>
                                    <input type="email" name="email" placeholder="Enter Your Email Address..." required="">
                                </p>
                                <p><button class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" type="submit">Subscribe Now!</button></p>
                            </div>
                            <div id="subscribe-msg"></div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 widget-area">
                    <div class="widget offer_widget clearfix">
                        <div class="d-md-flex justify-content-between align-items-end">
                            <div class="padding_right50 position-relative">
                                <h2>Reach</h2>
                                <h3 style="line-height:125px;top:-4px;">out !</h3>
                                <h4>
                                    @if(!empty(@$setting_data->website_name)) {!! ucfirst(@$setting_data->website_name) !!} @else Power Minds Pvt. Ltd. @endif
                                </h4>
                            </div>
                            <div>
                                <a href="#" class="ttm-btn ttm-btn-size-md ttm-btn-style-border ttm-btn-shape-rounded ttm-btn-color-white">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_text clearfix">
                        <h3 class="widget-title">About Us</h3>
                        <div class="textwidget widget-text">
                            <p>
                                @if(!empty(@$setting_data->website_description)) {!! ucfirst(@$setting_data->website_description) !!} @else Welcome to Power Mind PVT LTD @endif
                            </p>
                            <div class="call_detail">
                                <h3>Let's get in touch</h3>
                                <p>
                                    <a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +9771238798 @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +9771238798 @endif</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    @if(@$footer_nav_data1 !== null)
                        <div class="widget widget_nav_menu clearfix">
                            <h3 class="widget-title">@if(@$footer_nav_title1 !== null) {{@$footer_nav_title1}} @else Explore @endif</h3>
                            <ul id="menu-footer-quick-links" class="menu">
                                @if(!empty($footer_nav_data1))
                                    @foreach($footer_nav_data1 as $nav)
                                        @if(empty($nav->children[0]))

                                            @if($nav->type == 'custom')
                                                <li>
                                                    @if(str_contains(@$nav->slug,'http'))
                                                        <a href="{{$nav->slug}}"  @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>  @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                    @else
                                                        <a href="/{{$nav->slug}}"  @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>  @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                    @endif
                                                </li>
                                            @elseif($nav->type == 'service')
                                                    <li>
                                                        <a href="{{url('service')}}/{{$nav->slug}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>
                                                            @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                        </a>
                                                    </li>
                                                @elseif($nav->type == 'post')
                                                    <li>
                                                        <a href="{{url('blog')}}/{{$nav->slug}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>
                                                            @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                        </a>
                                                    </li>
                                            @else
                                                    <li>
                                                        <a href="{{url('/')}}/{{$nav->slug}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>
                                                            @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                        </a>
                                                    </li>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget-recent-post clearfix">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul class="widget-post ttm-recent-post-list">
                            <li>
                                <a href="#"><img class="img-fluid" src="{{asset('assets/frontend/images/blog/b_thumbb-01.jpg')}}" alt="post-img"></a>
                                <div class="post-detail">
                                    <a href="#">5 Effective Ways to Hire More Workers</a>
                                    <span class="post-date">Nov 5, 2020</span>
                                </div>
                            </li>
                            <li>
                                <a href="#"><img class="img-fluid" src="{{asset('assets/frontend/images/blog/b_thumbb-02.jpg')}}" alt="post-img"></a>
                                <div class="post-detail">
                                    <a href="#">Does My Business Need a Director of Training?</a>
                                    <span class="post-date">Nov 5, 2020</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area" style="padding-left: 50px;">
                    @if(@$footer_nav_data2 !== null)
                    <div class="widget widget-latest-tweets clearfix">
                        <h3 class="widget-title">@if(@$footer_nav_title2 !== null) {{@$footer_nav_title2}} @else Userful Links @endif</h3>
                        <div class="latest-tweets">
{{--                            <div class="slick_slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1024,"settings":{"slidesToShow": 1}} , {"breakpoint":900,"settings":{"slidesToShow": 1}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>--}}
{{--                                <div tabindex="-1" aria-hidden="true">--}}
{{--                                    <p class="tweet-text"><a class="twitter-hashtag" href="https://twitter.com/search?q=%23trending&amp;src=hash" target="_blank" rel="noopener" tabindex="-1">#trending</a> theme WooCommerece! Get a huge amount of customers for selling any kind of auto parts, auto equipment acc… <a href="https://twitter.com/i/web/status/1360205340386578441" target="_blank" rel="noopener" tabindex="-1">twitter.com/i/web/status/13602…</a></p>--}}
{{--                                    <p class="tweet-details"><a rel="noopener" href="http://twitter.com/ThemetechmountD/status/1360205340386578441" target="_blank" tabindex="-1"><time datetime="2021-02-12 12:33:19+0000">February 12, 2021 12:33 pm</time></a></p>--}}
{{--                                </div>--}}
{{--                                <div tabindex="-1" aria-hidden="true">--}}
{{--                                    <p class="tweet-text"><a class="twitter-hashtag" href="https://twitter.com/search?q=%23trending&amp;src=hash" target="_blank" rel="noopener" tabindex="0">#trending</a> WooCommerce Theme Build an <a class="twitter-hashtag" href="https://twitter.com/search?q=%23exquisite&amp;src=hash" target="_blank" rel="noopener" tabindex="0">#exquisite</a> website and attract a huge number of customers for an online… <a href="https://twitter.com/i/web/status/1360204984596353030" target="_blank" rel="noopener" tabindex="0">twitter.com/i/web/status/13602…</a></p>--}}
{{--                                    <p class="tweet-details"><a rel="noopener" href="http://twitter.com/ThemetechmountD/status/1360204984596353030" target="_blank" tabindex="-1"><time datetime="2021-02-12 12:31:54+0000">February 12, 2021 12:31 pm</time></a></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <ul id="menu-footer-quick-links" class="menu">
                                @if(!empty($footer_nav_data2))
                                    @foreach($footer_nav_data2 as $nav)
                                        @if(empty($nav->children[0]))

                                            @if($nav->type == 'custom')
                                                <li>
                                                    @if(str_contains(@$nav->slug,'http'))
                                                        <a href="{{$nav->slug}}"  @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>  @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                    @else
                                                    <a href="/{{$nav->slug}}"  @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>  @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                    @endif
                                                </li>
                                                @elseif($nav->type == 'service')
                                                    <li>
                                                        <a href="{{url('service')}}/{{$nav->slug}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>
                                                            @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                        </a>
                                                    </li>
                                                @elseif($nav->type == 'post')
                                                    <li>
                                                        <a href="{{url('blog')}}/{{$nav->slug}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>
                                                            @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="{{url('/')}}/{{$nav->slug}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>
                                                            @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                        </a>
                                                    </li>
                                                @endif
                                            @endif
                                    @endforeach
                               @endif
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer-text copyright ttm-textcolor-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-lg-flex align-items-center justify-content-between text-center">
                        <div class="order-1">
                            <div class="cpy-text">© {{date("Y")}}
                                <a href="/">
                                    @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @endif
                                </a> All rights reserved.</div>
                        </div>
                        <div class="order-2 footer-logo">
                            <img class="img-fluid"
                                 src="<?php if(@$setting_data->logo){?>{{asset('/images/settings/'.@$setting_data->logo)}}<?php }else{?>  {{asset('assets/frontend/images/footer-logo.svg')}}  <?php }?>"9
                                 alt="logo">
                        </div>
                        <div class="order-3">
                            <div class="social-icons">
                                <ul class="social-icons list-inline">
                                    @if(!empty(@$setting_data->facebook))
                                        <li>
                                            <a class="tooltip-top" href="@if(!empty(@$setting_data->facebook)) {{@$setting_data->facebook}} @endif" target="_blank" aria-label="facebook" data-tooltip="Facebook">
                                                <i class="ti ti-facebook"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty(@$setting_data->linkedin))

                                        <li>
                                            <a class="tooltip-top" href="@if(!empty(@$setting_data->linkedin)) {{@$setting_data->linkedin}} @endif" target="_blank" aria-label="linkedin" data-tooltip="Linkedin">
                                                <i class="ti ti-linkedin"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty(@$setting_data->instagram))
                                        <li>
                                            <a class="tooltip-top" href="@if(!empty(@$setting_data->instagram)) {{@$setting_data->instagram}} @endif" target="_blank" aria-label="instagram" data-tooltip="Instagram">
                                                <i class="ti ti-instagram"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty(@$setting_data->youtube))
                                    <li>
                                        <a class="tooltip-top" href="@if(!empty(@$setting_data->youtube)) {{@$setting_data->youtube}} @endif" target="_blank" aria-label="youtube" data-tooltip="Youtube">
                                            <i class="ti ti-youtube"></i>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->

<!--back-to-top start-->
<a id="totop" href="#top">
    <i class="fa fa-angle-up"></i>
</a>
<!--back-to-top end-->

</div><!-- page end -->


<script src="{{asset('assets/frontend/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.easing.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery-waypoints.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery-validate.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('assets/frontend/js/slick.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/numinate.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/imagesloaded.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery-isotope.js')}}"></script>
<script src="{{asset('assets/frontend/js/main.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
@yield('js')
@stack('scripts')
</body>
</html>
