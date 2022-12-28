@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')

<style>
    .spacing-5 {
        padding: 250px 15px 80px;
    }

    #totop.top-visible{
        background-color: #0a2339;
    }
    .pt-20{
        padding-top: 80px!important;
    }
    .ttm-icon.ttm-icon_element-onlytxt i{
        top: -5px;
    }

    .ttm-icon.ttm-icon_element-size-lg i {
        font-size: 75px;
    }
    .slide .justify-content-end .slide__content--headings h2.s2{
        font-size: 60px;
    }

    .welcome-section ul, .welcome-section ol{
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 15px;
    }
    .welcome-section ul li, .welcome-section ol li{
        position: relative;
        padding-bottom: 8px;
    }
    .welcome-section ul li:before, .welcome-section ol li:before{
        content: "\f0a9";
        padding-right: 5px;
        color: #27aae1;
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
    }

    .section-title.title-style-center_text .title-desc p{
        width: 90%;
    }
    .ttm-alt-btn{
        background-color: #223645 !important;
        margin-right: 15px;
    }

    .section-title h2.call-action {
        font-weight: 700;
        text-transform: capitalize;
        font-size: 40px;
        line-height: 50px;
        margin-bottom: 0;
    }
    .ttm-left-span > .ttm-col-wrapper-bg-layer{
        width: auto;
        margin-left: -1000px;
        right: -1000px;
    }
    .col-bg-img-five.ttm-col-bgimage-yes > .ttm-col-wrapper-bg-layer {
        background-size: auto;
    }
</style>

@endsection
@section('content')
    <!--homepage banner-->

    @if(count($sliders) > 0)
        <div class="banner_slider_wrapper">
            <div class="banner_slider">
                @foreach(@$sliders as $slider)
                <div class="slide" style="background-image:  linear-gradient(rgba(12, 27, 51, 0) 0%, rgba(12, 27, 51, 0) 6%, rgba(12, 27, 51, 0.7) 70%, rgba(12, 27, 51, 0.88) 100%), url({{ asset('/images/sliders/'.$slider->image) }});" >

                    <div class="slide__content justify-content-end ttm-textcolor-white">
                        <div class="container">
                            <div class="row">
                                @if($loop->odd)
                                    <div class="col-lg-12">
                                    <div class="slide__content--headings d-md-flex padding_bottom40">
                                        <h2  data-animation="fadeInLeft"><?php $split = explode(" ", ucwords(@$slider->heading));?> {{preg_replace('/\W\w+\s*(\W*)$/', '$1', ucwords(@$slider->heading))."\n"}}  <span class="ttm-textcolor-skincolor">{{$split[count($split)-1]}}</span></h2>
                                        <div data-animation="fadeInDown" class="padding_left3 margin_left40 margin_right40 ttm-bgcolor-skincolor"></div>
                                        <div class="padding_bottom10 res-991-padding_bottom5">
                                            <p  data-animation="fadeInRight" data-delay="0.3">{{ucfirst(@$slider->subheading)}}</p>
                                            <div class="d-flex margin_top25 align-items-center res-991-margin_top15" data-animation="fadeInUp" data-delay="1.4">
                                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" href="{{@$slider->link}}">
                                                    {{ (@$slider->button !== null) ? $slider->button :"read more"}}
                                                </a>
                                                @if(@$slider->slider_link !== null)
                                                    <a href="{{$slider->slider_link}}" target="_self" class="ttm_prettyphoto ttm-btn btn-inline ttm-btn-size-md margin_left30">
                                                        <span class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-skincolor ttm-icon_element-size-xs ttm-icon_element-style-rounded margin_right15 margin_bottom0">
                                                            <i class="fa fa-play margin_left0 padding_left0"></i>
                                                        </span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @else
                                    <div class="col-lg-12">
                                        <div class="slide__content--headings d-md-flex padding_bottom40 justify-content-between align-items-center">
                                            <div class="w-75">
                                                <h2  data-animation="fadeInDown" class="s2"><?php $split = explode(" ", ucwords(@$slider->heading));?> {{preg_replace('/\W\w+\s*(\W*)$/', '$1', ucwords(@$slider->heading))."\n"}}  <span class="ttm-textcolor-skincolor">{{$split[count($split)-1]}}.</h2>
                                                <p data-animation="fadeInDown" data-delay="0.3" class="w-75">{{ucfirst(@$slider->subheading)}}</p>
                                            </div>
                                            <div data-animation="fadeInUp" data-delay="1.4">
                                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" href="{{@$slider->link}}"> {{ (@$slider->button !== null) ? $slider->button :"Explore"}}</a>
                                                @if(@$slider->slider_link !== null)
                                                    <a href="{{$slider->slider_link}}" target="_self" class="ttm_prettyphoto ttm-btn btn-inline ttm-btn-size-md margin_left30">
                                                        <span class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-skincolor ttm-icon_element-size-xs ttm-icon_element-style-rounded margin_right15 margin_bottom0">
                                                            <i class="fa fa-play margin_left0 padding_left0"></i>
                                                        </span>
                                                    </a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif

    <!--end of homepage banner-->


    <!--site-main start-->
    <div class="site-main">

        <!--Top Feature-->

        @if(!empty($homepage_info->tf_heading1))
            <section class="ttm-row broken-section ttm-bgcolor-skincolor clearfix">
            <div class="container-fluid">
                <div class="row row-equal-height">
                    <div class="col-xl-12 col-md-12">
                        <div class="ttm-bg ttm-col-bgcolor-yes ttm-left-span ttm-bgcolor-skincolor w-100 padding_left40 res-991-padding_left0 text-left">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content featuredbox-number">
                                <div class="row ttm-vertical_sep">
                                    <div class="col-lg-4 col-sm-6 col-xs-12">
                                        <!-- featured-icon-box -->
                                        <div class="featured-icon-box icon-align-before-content style4">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-lg">
                                                    <i class="flaticon-briefcase-1"></i>
                                                    <i class="ttm-num ti-info"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h3>{{@$homepage_info->tf_heading1}}</h3>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>{{@$homepage_info->tf_description1}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- featured-icon-box end -->
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-xs-12">
                                        <!-- featured-icon-box -->
                                        <div class="featured-icon-box icon-align-before-content style4">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-lg">
                                                    <i class="flaticon-corporate-1"></i>
                                                    <i class="ttm-num ti-info"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h3>{{@$homepage_info->tf_heading2}}</h3>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>{{@$homepage_info->tf_description2}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- featured-icon-box end -->
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-xs-12">
                                        <!-- featured-icon-box -->
                                        <div class="featured-icon-box icon-align-before-content style4">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-lg">
                                                    <i class="flaticon-corporate"></i>
                                                    <i class="ttm-num ti-info"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h3>{{@$homepage_info->tf_heading3}}</h3>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>{{@$homepage_info->tf_description3}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- featured-icon-box end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        @endif

        <!--End of top feature-->



        <!--welcome section-->

        @if(!empty($homepage_info->welcome_description))
            <section class="ttm-row pt-20 padding_zero-section  clearfix">
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-xl-7 col-lg-7 col-md-12 col-xs-12">
                                <!-- section title -->
                                <div class="section-title">
                                    <div class="title-header">
                                        @if(@$homepage_info->welcome_subheading)
                                            <h3>{{ucfirst(@$homepage_info->welcome_subheading)}}</h3>
                                        @endif
                                        @if(@$homepage_info->welcome_heading)
                                            <h2 class="title">{{ucwords(@$homepage_info->welcome_heading)}}</h2>
                                        @endif
                                    </div>
{{--                                    <div class="title-desc"><p>Today’s business environment is highly competitive and fast-moving, which necessitates more flexible action and quicker response processes.</p></div>--}}
                                </div><!-- section title end -->
                                <div class="ttm-col-bgcolor-yes ttm-bgcolor-white ttm-col-bgimage-yes ttm-bg spacing-4 box-shadow d-inline-block border-rad_6 overflow-hidden">
                                    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                        <div class="ttm-col-wrapper-bg-layer-inner"></div>
                                    </div>
                                    <div class="layer-content justified welcome-section">
                                        {!! ucfirst(@$homepage_info->welcome_description) !!}
                                        <div class="padding_top20 padding_bottom30 res-991-padding_right0">
                                            <div class="d-sm-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="overflow-hidden">
                                                        <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                            <i class="flaticon flaticon-website"></i>
                                                        </div>
                                                    </div>
                                                    <div class="padding_left15">
                                                        <h3 class="margin_bottom0 fs-20">{{ucfirst(@$homepage_info->welcome_button)}}</h3>
                                                        <label class="margin_bottom0">{{ ucfirst(@$homepage_info->welcome_link)}}</label>
                                                    </div>
                                                </div>
                                                <div class="margin_left30 padding_left30 border-left">
                                                    <div class="d-flex align-items-center">
                                                        <div class="overflow-hidden">
                                                            <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                                <i class="flaticon flaticon-idea"></i>
                                                            </div>
                                                        </div>
                                                        <div class="padding_left15">
                                                            <h3 class="margin_bottom0 fs-20">{{ ucfirst(@$homepage_info->welcome_button2)}}</h3>
                                                            <label class="margin_bottom0">{{ucfirst(@$homepage_info->welcome_link2)}}</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-8 mx-md-auto col-sm-10">
                                <!-- ttm_single_image-wrapper -->
                                <div class="ttm_single_image-wrapper d-inline-block p-10 ttm-bgcolor-white border-rad_6 position-relative z-index-1 box-shadow">
                                    <img class="img-fluid" src="<?php if(!empty(@$homepage_info->welcome_image)){ echo '/images/home/welcome/'.@$homepage_info->welcome_image; } ?>" alt="single_02" height="100%" width="100%">
                                </div>
                            </div>
                        </div><!-- row end -->
                    </div>
                </section>
        @endif

        <!--end of welcome section-->

        <!--statistics broken-section-->
        <section class="ttm-row broken-section clearfix">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ttm-col-bgcolor-yes col-bg-img-four ttm-col-bgimage-yes ttm-bgcolor-darkgrey ttm-col-bgimage-yes ttm-bg spacing-5 border-rad_10 z-index_1 overflow-hidden">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                <div class="ttm-col-wrapper-bg-layer-inner"></div>
                            </div>
                            <div class="layer-content">
                                <div class="container">
                                    <div class="row ttm-vertical_sep">
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <!-- ttm-fid -->
                                            <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style2">
                                                <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                    <i class="flaticon flaticon-maintenance"></i>
                                                </div>
                                                <div class="ttm-fid-contents">
                                                    <h4 class="ttm-fid-inner">
                                                            <span   data-appear-animation="animateDigits"
                                                                    data-from="0"
                                                                    data-to="{{ (@$homepage_info->project_completed) ? @$homepage_info->project_completed : '180'}}"
                                                                    data-interval="15"
                                                                    data-before=""
                                                                    data-before-style="sup"
                                                                    data-after=""
                                                                    data-after-style="sub"
                                                                    class="numinate">{{ (@$homepage_info->project_completed) ? @$homepage_info->project_completed : '180'}}
                                                            </span>
                                                     </h4>
                                                    <h3 class="ttm-fid-title">Industries Served</h3>
                                                </div>
                                            </div><!-- ttm-fid end -->
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <!-- ttm-fid -->
                                            <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style2">
                                                <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                    <i class="flaticon flaticon-salary"></i>
                                                </div>
                                                <div class="ttm-fid-contents">
                                                    <h4 class="ttm-fid-inner">
                                                            <span   data-appear-animation="animateDigits"
                                                                    data-from="0"
                                                                    data-to="{{ (@$homepage_info->success_stories) ? @$homepage_info->success_stories : '360'}}"
                                                                    data-interval="15"
                                                                    data-before=""
                                                                    data-before-style="sup"
                                                                    data-after=""
                                                                    data-after-style="sub"
                                                                    class="numinate">{{ (@$homepage_info->success_stories) ? @$homepage_info->success_stories : '360'}}
                                                            </span>
                                                    </h4>
                                                    <h3 class="ttm-fid-title">Jobs Created </h3>
                                                </div>
                                            </div><!-- ttm-fid end -->
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <!-- ttm-fid -->
                                            <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style2">
                                                <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                    <i class="flaticon flaticon-business-man"></i>
                                                </div>
                                                <div class="ttm-fid-contents">
                                                    <h4 class="ttm-fid-inner">
                                                            <span   data-appear-animation="animateDigits"
                                                                    data-from="0"
                                                                    data-to="{{ (@$homepage_info->happy_clients) ? @$homepage_info->happy_clients : '495'}}"
                                                                    data-interval="15"
                                                                    data-before=""
                                                                    data-before-style="sup"
                                                                    data-after="K"
                                                                    data-after-style="sub"
                                                                    class="numinate">{{ (@$homepage_info->happy_clients) ? @$homepage_info->happy_clients : '495'}}
                                                            </span>
                                                    </h4>
                                                    <h3 class="ttm-fid-title">Clients Served</h3>
                                                </div>
                                            </div><!-- ttm-fid end -->
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <!-- ttm-fid -->
                                            <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style2">
                                                <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="ttm-fid-contents">
                                                    <h4 class="ttm-fid-inner">
                                                            <span   data-appear-animation="animateDigits"
                                                                    data-from="0"
                                                                    data-to="{{ (@$homepage_info->visa_approved) ? @$homepage_info->visa_approved : '5'}}"
                                                                    data-interval="5"
                                                                    data-before=""
                                                                    data-before-style="sup"
                                                                    data-after=""
                                                                    data-after-style="sub"
                                                                    class="numinate">{{ (@$homepage_info->visa_approved) ? @$homepage_info->visa_approved : '5'}}
                                                            </span>
                                                        <span style="padding-left: 5px"> star</span>
                                                    </h4>
                                                    <h3 class="ttm-fid-title">Rated Training Provider</h3>
                                                </div>
                                            </div><!-- ttm-fid end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end of statistics broken-section end-->

        @if(!empty($homepage_info->ww_main_heading))
        <!--What we do best-->
        <section class="ttm-row services-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title without-seperator title-style-center_text">
                            <div class="title-header">
                                <h3>{{@$homepage_info->ww_main_subheading}}</h3>
                                <h2 class="title">{{@$homepage_info->ww_main_heading}}</h2>
                            </div>
                            <div class="title-desc">
                                <p>{{@$homepage_info->ww_main_description}}</p>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div><!-- row end -->
                <!-- row -->
                <div class="row row-equal-height">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-top-content style1">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-rounded ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                    <i class="flaticon flaticon-document"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>{{@$homepage_info->ww_heading1}}</h3>
                                </div>
                                <div class="featured-desc justified">
                                    <p>{{@$homepage_info->ww_description1}}</p>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-top-content style1">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-rounded ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                    <i class="flaticon flaticon-chat"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>{{@$homepage_info->ww_heading2}}</h3>
                                </div>
                                <div class="featured-desc justified">
                                    <p>{{@$homepage_info->ww_description2}}</p>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-top-content style1">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-rounded ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                    <i class="flaticon flaticon-marketing"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>{{@$homepage_info->ww_heading3}}</h3>
                                </div>
                                <div class="featured-desc justified">
                                    <p>{{@$homepage_info->ww_description3}}</p>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-top-content style1">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-rounded ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                    <i class="flaticon flaticon-website"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>{{@$homepage_info->ww_heading4}}</h3>
                                </div>
                                <div class="featured-desc justified">
                                    <p>{{@$homepage_info->ww_description4}}</p>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </div>
                </div><!-- row end -->
            </div>
        </section>
        <!--What we do best-->
        @endif


        @if(count($latestServices)>0)
        <!--Services-section-->
        <section class="ttm-row double-section bg-img4 clearfix">
            <div class="container">
                <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title without-seperator title-style-center_text">
                            <div class="title-header">
                                <h3>what we offer</h3>
                                <h2 class="title">Discover Our Popular Services</h2>
                            </div>
                            <div class="title-desc">
                                <p>Every Business is unique, at Powermind we understand this fact and instead of asking you to change. We deliver solutions that work with minimal disruption.</p>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div><!-- row end -->
                <!-- row -->
                <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "autoplay":false, "dots":false, "infinite":true, "responsive":[{"breakpoint":992,"settings":{"slidesToShow": 2}},{"breakpoint":840,"settings":{"slidesToShow": 2}},{"breakpoint":650,"settings":{"slidesToShow": 1}}]}'>
                   @foreach(@$latestServices as $service)
                    <div class="col-md-4 col-sm-6">
                        <!--featured-imagebox-->
                        <div class="featured-imagebox featured-imagebox-services style2">
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3><a href="{{route('service.single',$service->slug)}}">{{ucwords(@$service->title)}}</a></h3>
                                </div>
                            </div>
                            <div class="ttm-box-view-overlay border-rad_6">
                                <!-- featured-thumbnail -->
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="<?php if(@$service->banner_image){?>{{asset('/images/service/'.@$service->banner_image)}}<?php }?>" alt="{{ucwords(@$service->slug)}}">
                                </div><!-- featured-thumbnail end-->
                                <div class="featured-hover-content">
                                    <div class="featured-desc">
                                        <p>{{ucwords(@$service->sub_description)}}</p>
                                    </div>
                                    <div class="bottom-footer">
                                        <a class="ttm-btn btn-inline ttm-btn-size-sm ttm-btn-color-skincolor" href="{{route('service.single',$service->slug)}}">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
                    @endforeach
                </div>
                <!-- row end -->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="margin_top35 text-center">
                            <div class="end_txt_line">Challenges are just opportunities in disguise. <a class="ttm-textcolor-skincolor" href="{{route('service.frontend')}}"> View all Services!</a></div>
                        </div>
                    </div>
                </div><!-- row end -->

                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="ttm-bg ttm-col-bgcolor-yes ttm-bgcolor-white spacing-3 box-shadow">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">
                                <!-- slick_slider -->
                                <div class="row slick_slider" data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "arrows":false, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":1200,"settings":{"slidesToShow": 5}}, {"breakpoint":1024,"settings":{"slidesToShow": 4}}, {"breakpoint":777,"settings":{"slidesToShow": 3}},{"breakpoint":575,"settings":{"slidesToShow": 2}}]}'>
                                    <div class="col-lg-12">
                                        <div class="client-box">
                                            <div class="ttm-client-logo-tooltip" data-tooltip="client-01">
                                                <div class="client-thumbnail">
                                                    <img class="img-fluid" src="{{asset('assets/frontend/images/client/client-01.png')}}" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="client-box">
                                            <div class="ttm-client-logo-tooltip" data-tooltip="client-02">
                                                <div class="client-thumbnail">
                                                    <img class="img-fluid" src="{{asset('assets/frontend/images/client/client-02.png')}}" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="client-box">
                                            <div class="ttm-client-logo-tooltip" data-tooltip="client-03">
                                                <div class="client-thumbnail">
                                                    <img class="img-fluid" src="{{asset('assets/frontend/images/client/client-03.png')}}" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="client-box">
                                            <div class="ttm-client-logo-tooltip" data-tooltip="client-04">
                                                <div class="client-thumbnail">
                                                    <img class="img-fluid" src="{{asset('assets/frontend/images/client/client-04.png')}}" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="client-box">
                                            <div class="ttm-client-logo-tooltip" data-tooltip="client-05">
                                                <div class="client-thumbnail">
                                                    <img class="img-fluid" src="{{asset('assets/frontend/images/client/client-05.png')}}" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="client-box">
                                            <div class="ttm-client-logo-tooltip" data-tooltip="client-02">
                                                <div class="client-thumbnail">
                                                    <img class="img-fluid" src="{{asset('assets/frontend/images/client/client-02.png')}}" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="client-box">
                                            <div class="ttm-client-logo-tooltip" data-tooltip="client-04">
                                                <div class="client-thumbnail">
                                                    <img class="img-fluid" src="{{asset('assets/frontend/')}}images/client/client-04.png" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- slick_slider end -->
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </section>
        <!--services-section end-->
        @endif



        @if(count($awards)>0)

            <section class="ttm-row  mt_30 clearfix">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <div class="ttm-bg ttm-bg ttm-col-bgimage-yes col-bg-img-five ttm-left-span spacing-11">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                    <div class="ttm-col-wrapper-bg-layer-inner"></div>
                                </div>
                                <div class="layer-content">
                                    <!-- section title -->
                                    <div class="section-title title-style-center_text">
                                        <div class="title-header">
                                            <h3>Achievements</h3>
                                            <h2 class="title">Awards And Achievements</h2>
                                        </div>
                                        <div class="title-desc"><p>What we are getting by achieving our goals is not as important as what you become by achieving our goals, Client’s satisfaction is at the top!</p></div>
                                    </div><!-- section title end -->
                                    <div class="row slick_slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 4, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1024,"settings":{"slidesToShow": 3}} , {"breakpoint":900,"settings":{"slidesToShow": 2}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                                       @foreach($awards as $award)
                                        <div class="col-lg-4">
                                            <div class="padding_top10 padding_bottom10 padding_right60 res-767-padding_right15 text-center">
                                                <img class="img-fluid" src="{{asset('/images/awards/'.@$award->image)}}" alt="{{$award->name}}">
                                                <div class="padding_top15">
                                                    @if(@$award->subtitle !== null)
                                                        <h3 class="fs-18">{{@$award->name}}</h3>
                                                    @endif
                                                    @if(@$award->subtitle !== null)
                                                        <label>{{ucfirst(@$award->subtitle)}}</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
    {{--                                <div class="padding_top20 padding_bottom90 res-991-padding_bottom0">--}}
    {{--                                    <p>We have won 27 more awards in our career. <a href="#"><u>View All Awards</u></a></p>--}}
    {{--                                </div>--}}
                                </div>
                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </section>

        @endif

        @if(count($director) > 0)
        <!--Managing-director-->

            <section class="ttm-row broken-section padding_top15 bg-img4 clearfix">
            <div class="container">
                <!-- section-title -->
                <div class="section-title title-style-center_text">
                    <div class="title-header">
                        <h3>Up Close</h3>
                        <h2 class="title">Message From Director</h2>
                    </div>
                </div><!-- section-title end -->
                <div class="row slick_slider" style="margin-top: -70px;" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows":false, "autoplay":false, "dots":false, "infinite":true, "responsive":[{"breakpoint":992,"settings":{"slidesToShow": 2}},{"breakpoint":840,"settings":{"slidesToShow": 1}}]}'>
                    @foreach($director as $managing)

                        <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-7 mx-auto">
                                <div class="ttm-bg ttm-col-bgcolor-yes ttm-left-span spacing-7 res-767-mr_15">
                                    <div class="layer-content">
                                        <!-- ttm_single_image-wrapper -->
                                        <div class="ttm_single_image-wrapper">
                                            <div class="d-inline-block p-10 ttm-bgcolor-white border-rad_6 position-relative z-index-1 box-shadow mr_300 res-767-margin_right0">
                                                <img class="img-fluid" src="{{asset('/images/director/'.$managing->image)}}" alt="single_04">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="padding_top100 margin_top15 res-991-margin_top0 res-991-padding_top40 res-991-padding_bottom60 ml_25 res-1199-margin_left0 justified">
                                    {!!  @$managing->description !!}
                                    <div class="row ttm-vertical_sep padding_right30 res-991-padding_right0">
                                        <div class="padding_top20 padding_bottom10 res-991-padding_right0">
                                            <div class="d-sm-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="padding_left15">
                                                        <h3 class="margin_bottom0 fs-20">{{ucfirst($managing->heading)}}</h3>
                                                        <label class="margin_bottom0">{{ucfirst($managing->designation)}}</label>
                                                    </div>
                                                </div>
                                                @if(@$managing->sign !== null)
                                                    <div class="margin_left30 padding_left30 border-left">
                                                        <img class="img-fluid auto_size" src="{{asset('/images/director/'.$managing->sign)}}" style="height: 50px;" alt="sign-01">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if( @$managing->link !== null)
                                            <div class="padding_top20 res-991-padding_right0">
                                                <a class="ttm-btn ttm-btn-size-md ml-3 ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" href="{{@$managing->link}}" tabindex="0">
                                                    {{((@$managing->button !== null) ? @$managing->button:"Read More")}}
                                                </a>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
            <!--managing-director-end-->
        @endif

        @if(count($testimonials)>0)

        <!--testimonial-section-->
        <section class="ttm-row testimonial-section bg-img1 ttm-bgcolor-grey ttm-bg ttm-bgimage-yes clearfix">
            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section-title -->
                        <div class="section-title title-style-center_text">
                            <div class="title-header">
                                <h3>TESTIMONIALS</h3>
                                <h2 class="title">What Our Clients Say?</h2>
                            </div>
                            <div class="title-desc">
                                <p>We apply client centric approach in creating the perfect solution for each client’s needs, thus, their feedback is valuable to us.</p>
                            </div>
                        </div><!-- section-title end -->
                    </div>
                </div><!-- row end -->
                <div class="row slick_slider" data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "arrows":false, "autoplay":true, "dots":false, "infinite":true, "responsive":[{"breakpoint":992,"settings":{"slidesToShow": 2}},{"breakpoint":840,"settings":{"slidesToShow": 1}}]}'>
                    @foreach($testimonials as $testimonial)
                        <div class="col-lg-6">
                        <!-- testimonials -->
                        <div class="testimonials ttm-testimonial-box-view-style1">
                            <div class="testimonial-content">
                                <div class="testimonial-content-inner">
                                    <div class="d-flex align-items-center">
                                        <div class="testimonial-avatar">
                                            <!-- testimonials-img -->
                                            <div class="testimonial-img">
                                                <img class="img-center" src="<?php if(!empty(@$testimonial->image)){ echo '/images/testimonial/'.@$testimonial->image; } ?>" alt="testimonial-img">
                                            </div><!-- testimonials-img end-->
                                        </div>
                                        <!-- testimonials-caption -->
                                        <div class="testimonial-caption">
                                            <h3>{{ucwords($testimonial->name)}}</h3>
                                            <div class="star-ratings">
                                                <label>{{ucwords($testimonial->position)}}</label>
                                            </div>
                                        </div>
                                    </div><!-- testimonials-caption end -->
                                </div>
                                <blockquote>{!! @$testimonial->description !!}</blockquote>
                            </div>
                        </div>
                        <!-- testimonials END -->
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--testimonial-section end-->
        @endif

        @if(!empty($homepage_info->action_heading))
        <!--cta-section-->
        <section class="ttm-row cta-section ttm-textcolor-white bg-img2 clearfix">
            <div class="container">
                <!-- row -->
                <div class="row align-items-md-center justify-content-between">
                    <div class="col-lg-10 col-md-12 mr-auto">
                        <!-- section-title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h3 class="font-weight-normal">{{@$homepage_info->action_heading2}}</h3>
                                <h2 class="title call-action">{!! wordwrap(@$homepage_info->action_heading,45,"<br>\n",TRUE) !!}</h2>
                            </div>
                        </div><!-- section-title end -->
                        <div class="d-inline-block">
                            @if(@$homepage_info->action_link)
                                <a class="ttm-btn ttm-btn-size-md ttm-btn-style-border ttm-btn-shape-rounded ttm-btn-color-white" href="{{@$homepage_info->action_link}}" tabindex="0">
                                    {{@$homepage_info->action_button}}
                                </a>
                            @endif
                                @if(@$homepage_info->action_link2)

                                    <a href="{{@$homepage_info->action_link2}}" target="_self" class="ttm_prettyphoto ttm-btn-color-white pl-3 ttm-btn btn-inline ttm-btn-size-md">
                                        <span class="ttm-icon ttm-icon_element-border ttm-icon_element-color-white ttm-textcolor-white ttm-icon_element-size-xs ttm-icon_element-style-rounded margin_right10 margin_bottom0">
                                            <i class="ti ti-control-play margin_left0 padding_left1"></i>
                                        </span>
                                    </a><span class="font-weight-bold"> WATCH VIDEO </span>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--cta-section end-->
        @endif

        @if(count($latestPosts) > 2)
        <!--blog-section-->
        <section class="ttm-row blog-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title style2">
                            <div class="title-header">
                                <h3>Latest Blogs</h3>
                                <h2 class="title">Our News And Insights</h2>
                            </div>
                            <div class="title-desc">
                                <p>Our results solution combines implementation support, capability building and state-of-the-art diagnostic and analytic tools sally change.</p>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div>

                <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1024,"settings":{"slidesToShow": 3}} , {"breakpoint":900,"settings":{"slidesToShow": 2}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                    @foreach(@$latestPosts as $post)
                    <div class="col-lg-4">
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post style1" style="height: 475px;">
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="<?php if(@$post->image){?>{{asset('/images/blog/'.@$post->image)}}<?php }else{?>{{asset('assets/frontend/images/blog/blog-01-1200x800.jpg')}} <?php }?>" alt="">
                            </div>
                            <div class="featured-content">
                                <div class="post-header">
                                    <!-- ttm-box-post-date -->
                                    <div class="ttm-box-post-date">
                                            <span class="ttm-entry-date">
                                                <time class="entry-date" datetime="2019-01-16T07:07:55+00:00">{{date('j',strtotime(@$post->created_at))}}<span class="entry-month entry-year">{{date('M',strtotime(@$post->created_at))}}</span></time>
                                            </span>
                                    </div><!-- ttm-box-post-date end -->
                                    <div class="post-meta">
                                            <span class="ttm-meta-line comments-link">
                                                <a href="{{url('/blog/categories/'.@$post->category->slug)}}"><i class="fa fa-list-alt"></i>{{ucwords(@$post->category->name)}}</a>
                                            </span>
                                        <span class="ttm-meta-line byline"><i class="fa fa-user"></i>{{@\App\Models\User::find($post->created_by)->name}}</span>
                                    </div><!-- post-meta end -->
                                </div>
                                <div class="post-title featured-title">
                                    <h3><a href="{{route('blog.single',$post->slug)}}">{{ucwords($post->title)}}</a></h3>
                                </div>
                                <a class="ttm-btn ttm-btn-size-md ttm-btn-color-darkgrey btn-inline" href="#" tabindex="-1">Read More</a>
                            </div>
                        </div><!-- featured-imagebox-post end -->
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="margin_top35 res-991-margin_top30 text-center">
                            <a href="{{route('blog.frontend')}}" class="end_button">
                                <span>+</span>
                            </a><span class="end_button_txt ttm-textcolor-darkgrey">Explore More News</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--blog-section end-->
    @endif


    </div><!--site-main end-->
@endsection


@section('js')

@endsection
