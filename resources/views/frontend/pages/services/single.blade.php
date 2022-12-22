@extends('frontend.layouts.seo_master')
@section('css')
    <style>

    .custom-editor .media{
        display: block;
    }

    @media only screen and (min-width: 1000px) {

    .sticky-sidebar{
        width: 400px;
        height:720px;


    }
    .sticky-sidebar.stick {
        position:fixed;
        /* position: -webkit-sticky; */
        top: 80px;
        z-index: 10;
        /* border-radius: 0 0 0.5em 0.5em; */
        left: 75px;
        }
    }

    #sticky-anchor{
        display:none;
    }


    </style>
@endsection
@section('seo')
    <title>{{ucfirst(@$singleService->title)}} | @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else NMS Recruitment Service @endif </title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singleService->meta_description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singleService->meta_tags)}}' />
    <meta property='article:published_time' content='<?php if(@$singleService->updated_at !=''){?>{{@$singleService->updated_at}} <?php }else {?> {{@$singleService->created_at}} <?php }?>' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$singleService->meta_description)}}" />
    <meta property="og:title" content="{{ucfirst(@$singleService->meta_title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="Coperation" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else NMS Recruitment Service @endif" />
    <meta property="og:image" content="<?php if(@$singleService->banner_image){?>{{asset('/images/service/'.@$singleService->banner_image)}}<?php }?>" />
    <meta property="og:image:url" content="<?php if(@$singleService->banner_image){?>{{asset('/images/service/'.@$singleService->banner_image)}}<?php }?>" />
    <meta property="og:image:size" content="300" />
@endsection

@section('content')

        <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="page-title-heading">
                                <h2 class="title"></h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="">Home</a>
                                </span>
                                <span class="divide">
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="{{route('service.frontend')}}">Services</a>
                                </span>
                                <span>{{ @$singleService->title }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-title end -->


        <!--site-main start-->
        <div class="site-main">


            <div class="ttm-row sidebar ttm-sidebar-left ttm-bgcolor-white overflow-hidden clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">

                        {{--sidebar--}}
                        @include('frontend.pages.services.sidebar')
                        {{-- end sidebar--}}
                        <div id="sticky-anchor"></div>

                        <div class="col-lg-8 content-area">
                            <div class="ttm-service-single-content-area">

                                <div class="ttm-service-description pb-4">
                                    <h3>{{ @$singleService->title }}</h3>
                                    {!! @$singleService->sub_description !!}
                                </div>
                                <div class="ttm-featured-wrapper margin_bottom40">
                                    <img class="img-fluid" src="<?php if(@$singleService->banner_image){?>{{asset('/images/service/'.@$singleService->banner_image)}}<?php }?>" alt="{{@$singleService->slug}}">
                                </div>
                                <div class="ttm-service-description ck-texts">
                                    {!! @$singleService->description !!}
                                </div>
                                <div class="social-media-block">
                                    <div class="d-sm-flex justify-content-between">
                                        <div class="ttm-social-share-wrapper margin_top15">
                                            <h6 class="font-weight-normal m-0 margin_right10">Share : </h6>
                                            <ul class="social-icons circle">
                                                <li><a href="#"><i class="fa fa-facebook" onclick='fbShare("{{route('service.single',$singleService->slug)}}")'></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter" onclick='twitShare("{{route('service.single',$singleService->slug)}}","{{ $singleService->title }}")'></i></a></li>
                                                <li><a href="#"><i class="fa fa-whatsapp" onclick='whatsappShare("{{route('service.single',$singleService->slug)}}","{{ $singleService->title }}")'></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </div>


        </div><!--site-main end-->


@endsection
@section('js')
<script>

function fbShare(url) {
  window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
}
function twitShare(url, title) {
    window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
}
function whatsappShare(url, title) {
    message = title + " " + url;
    window.open("https://api.whatsapp.com/send?text=" + message);
}
</script>
@endsection
