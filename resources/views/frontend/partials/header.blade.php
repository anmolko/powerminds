<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@if(!empty(@$setting_data->meta_description)) {{ucwords(@$setting_data->meta_description)}} @else Power Minds Pvt. Ltd. @endif "/>
    <meta name="keywords" content="@if(!empty(@$setting_data->meta_tags)) {{@$setting_data->meta_tags}} @else Power Minds Pvt. Ltd. @endif ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://powerminds.com.np/" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @if (\Request::is('/'))
        <title>@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Power Minds Pvt. Ltd. @endif </title>
    @else
        <title>@yield('title') | @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Power Minds Pvt. Ltd. @endif </title>
    @endif

    <meta property="og:title" content="@if(!empty(@$setting_data->meta_title)) {{ucwords(@$setting_data->meta_title)}} @else  Power Minds Pvt. Ltd. @endif" />
    <meta property="og:type" content="Consultancy" />
    <meta property="og:url" content="https://powerminds.com.np/" />

    <meta property="og:site_name" content="Power Minds Pvt. Ltd." />
    <meta property="og:description" content="@if(!empty(@$setting_data->meta_description)) {{ucwords(@$setting_data->meta_description)}} @else Power Minds Pvt. Ltd. @endif " />



    <link rel="shortcut icon" type="image/x-icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/settings/'.@$setting_data->favicon)}}<?php }else{?>{{asset('assets/frontend/images/favicon.png')}}<?php }?>">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/animate.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/font-awesome.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/flaticon.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/themify-icons.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/prettyPhoto.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/shortcodes.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/megamenu.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/responsive.css')}}"/>
    <script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{@$setting_data->google_analytics}}');
    </script>
    @stack('styles')

    @yield('css')
</head>


<body>

<!--page start-->
<div class="page">

    <!--header start-->
    <header id="masthead" class="header ttm-header-style-01">
        <!-- topbar -->
        <div class="top_bar ttm-bgcolor-darkgrey clearfix">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-xl-12 d-flex flex-row align-items-center">
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><i class="ti ti-email"></i></div><a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif">@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</a>
                        </div>
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><i class="ti ti-receipt"></i></div>@if(!empty(@$setting_data->registration_number)) {{@$setting_data->registration_number}} @else 1238798 @endif
                        </div>
                        <div class="top_bar_contact_item top_bar_social ml-auto p-0">
                            <ul class="social-icons d-flex">
                                @if(!empty(@$setting_data->facebook))
                                <li><a href="@if(!empty(@$setting_data->facebook)) {{@$setting_data->facebook}} @endif" target="_blank" aria-label="facebook"><i class="fa fa-facebook"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->instagram))
                                <li><a href="@if(!empty(@$setting_data->instagram)) {{@$setting_data->instagram}} @endif" target="_blank" aria-label="instagram"><i class="fa fa-instagram"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->linkedin))
                                <li><a href="@if(!empty(@$setting_data->linkedin)) {{@$setting_data->linkedin}} @endif" target="_blank" aria-label="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->youtube))
                                <li><a href="@if(!empty(@$setting_data->youtube)) {{@$setting_data->youtube}} @endif" target="_blank" aria-label="youtube"><i class="fa fa-youtube"></i></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="top_bar_contact_item d-flex align-items-center" style="padding-left: 0; border-right:none!important;">
{{--                            <div class="header_search">--}}
{{--                                <a href="#" class="btn-default search_btn"><i class="fa fa-search"></i></a>--}}
{{--                                <div class="header_search_content">--}}
{{--                                    <div class="header_search_content_inner">--}}
{{--                                        <a href="#" class="close_btn"><i class="ti ti-close"></i></a>--}}
{{--                                        <form id="searchbox" method="get" action="#">--}}
{{--                                            <input class="search_query" type="text" id="search_query_top" name="s" placeholder="Type Word Then Enter.." value="">--}}
{{--                                            <button type="submit" class="btn close-search"><i class="ti ti-search"></i></button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="ttm-bg ttm-col-bgcolor-yes ttm-right-span ttm-bgcolor-skincolor ttm-textcolor-white mr-auto margin_left50 padding_left15">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content">
                                    <div class="header_btn">
                                        <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-white btn-inline" href="{{route('contact.store')}}">Send a Message</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- topbar end -->
        <!-- site-header-menu -->
        <div id="site-header-menu" class="site-header-menu ttm-bgcolor-white">
            <div class="site-header-menu-inner ttm-stickable-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--site-navigation -->
                            <div class="site-navigation d-flex flex-row align-items-center justify-content-between">
                                <!-- site-branding -->
                                <div class="site-branding ">
                                    <a class="home-link" href="/" title="Axacus" rel="home">
                                        <img id="logo-img" height="45" width="175" class="img-fluid auto_size" src="<?php if(@$setting_data->logo){?>{{asset('/images/settings/'.@$setting_data->logo)}}<?php }else{?>{{asset('assets/frontend/images/logo-img.svg')}}<?php } ?>" alt="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Power Minds Pvt. Ltd. @endif" title="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Power Minds Pvt. Ltd. @endif">
                                    </a>
                                </div><!-- site-branding end -->
                                <div class="d-flex flex-row">
                                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                            <span class="menubar-box">
                                                <span class="menubar-inner"></span>
                                            </span>
                                    </div>
                                    <!-- menu -->
                                    <nav class="main-menu menu-mobile" id="menu">
                                        <ul class="menu">
                                            <li class="mega-menu-item {{request()->is('/') ? 'active' : ''}}">
                                                <a href="/">Home</a>
                                            </li>
                                            @if(!empty($top_nav_data))
                                                @foreach($top_nav_data as $nav)
                                                    @if(!empty($nav->children[0]))
                                                        <li id="{{@$loop->index}}" class="mega-menu-item {{request()->is(@$nav->slug)  ? 'active' : ''}}">
                                                            <a href="#" class="mega-menu-link">@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif</a>
                                                            <ul class="mega-submenu">
                                                                @foreach($nav->children[0] as $childNav)
                                                                    @if($childNav->type == 'custom')
                                                                        <li class="mega-menu-item {{request()->is(@$childNav->slug) ? 'active' : ''}}">
                                                                            <a href="/{{@$childNav->slug}}" class="@if(!empty($childNav->children[0])) mega-menu-link @endif"  @if(@$childNav->target !== NULL) target="_blank" @endif >@if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a>
                                                                            @if(!empty($childNav->children[0]))
                                                                                <ul class="mega-submenu">
                                                                                    @foreach($childNav->children[0] as $key => $lastchild)
                                                                                        @if($lastchild->type == 'custom')
                                                                                            <li><a href="/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif >@if($lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @elseif($lastchild->type == 'post')
                                                                                            <li><a href="{{url('blog')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if(@$lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @elseif($lastchild->type == 'service')
                                                                                            <li><a href="{{url('service')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if(@$lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @else
                                                                                            <li><a href="{{url('/')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if($lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    @elseif($childNav->type == 'post')
                                                                        <li class="mega-menu-item {{request()->is(@$childNav->slug) ? 'active' : ''}}">
                                                                            <a href="{{url('blog')}}/{{@$childNav->slug}}" class="@if(!empty($childNav->children[0])) mega-menu-link @endif" @if(@$childNav->target !== NULL) target="_blank" @endif>@if(@$childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a>
                                                                            @if(!empty($childNav->children[0]))
                                                                                <ul class="mega-submenu">
                                                                                    @foreach($childNav->children[0] as $key => $lastchild)
                                                                                        @if($lastchild->type == 'custom')
                                                                                            <li><a href="/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif >@if($lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @elseif($lastchild->type == 'post')
                                                                                            <li><a href="{{url('blog')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if(@$lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @elseif($lastchild->type == 'service')
                                                                                            <li><a href="{{url('service')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if(@$lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @else
                                                                                            <li><a href="{{url('/')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if($lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    @elseif($childNav->type == 'service')
                                                                        <li class="mega-menu-item {{request()->is(@$childNav->slug) ? 'active' : ''}}">
                                                                            <a href="{{url('service')}}/{{@$childNav->slug}}" class="@if(!empty($childNav->children[0])) mega-menu-link @endif" @if(@$childNav->target !== NULL) target="_blank" @endif>@if(@$childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a>
                                                                            @if(!empty($childNav->children[0]))
                                                                                <ul class="mega-submenu">
                                                                                    @foreach($childNav->children[0] as $key => $lastchild)
                                                                                        @if($lastchild->type == 'custom')
                                                                                            <li><a href="/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif >@if($lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @elseif($lastchild->type == 'post')
                                                                                            <li><a href="{{url('blog')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if(@$lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @elseif($lastchild->type == 'service')
                                                                                            <li><a href="{{url('service')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if(@$lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @else
                                                                                            <li><a href="{{url('/')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if($lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    @else
                                                                        <li class="mega-menu-item {{request()->is(@$childNav->slug) ? 'active' : ''}}">
                                                                            <a href="{{url('/')}}/{{@$childNav->slug}}" class="@if(!empty($childNav->children[0])) mega-menu-link @endif" @if(@$childNav->target !== NULL) target="_blank" @endif>@if(@$childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a>
                                                                            @if(!empty($childNav->children[0]))
                                                                                <ul class="mega-submenu">
                                                                                    @foreach($childNav->children[0] as $key => $lastchild)
                                                                                        @if($lastchild->type == 'custom')
                                                                                            <li><a href="/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif >@if($lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @elseif($lastchild->type == 'post')
                                                                                            <li><a href="{{url('blog')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if(@$lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @elseif($lastchild->type == 'service')
                                                                                            <li><a href="{{url('service')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if(@$lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @else
                                                                                            <li><a href="{{url('/')}}/{{@$lastchild->slug}}" @if(@$lastchild->target !== NULL) target="_blank" @endif>@if($lastchild->name == NULL) {{@$lastchild->title}} @else {{@$lastchild->name}} @endif</a></li>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @else
                                                        @if($nav->type == 'custom')
                                                            <li class="mega-menu-item">
                                                                <a href="/{{$nav->slug}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>
                                                                    @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                                </a>
                                                            </li>

                                                        @elseif($nav->type == 'service')
                                                            <li class="mega-menu-item">
                                                                <a href="{{url('service')}}/{{$nav->slug}}">
                                                                    @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                                </a>
                                                            </li>
                                                        @elseif($nav->type == 'post')
                                                            <li class="mega-menu-item">
                                                                <a href="{{url('blog')}}/{{$nav->slug}}">
                                                                    @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li class="mega-menu-item">
                                                                <a href="{{url('/')}}/{{$nav->slug}}">
                                                                    @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </nav><!-- menu end -->
                                    <div class="widget_info d-flex flex-row align-items-center justify-content-end">
                                        <div class="widget_icon ttm-textcolor-skincolor"><i class="themifyicon ti-comments"></i></div>
                                        <div class="widget_content">
                                            <h3 class="widget_title">Any Questions?</h3>
                                            <p class="widget_desc">
                                                <a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +9771238798 @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +9771238798 @endif</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- site-navigation end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- site-header-menu end-->
    </header><!--header end-->
