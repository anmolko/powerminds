@extends('frontend.layouts.seo_master')
@section('css')
    <style>

    .custom-editor .media{
        display: block;
    }

    .custom-editor{
        font-size: 1.1875rem;
    }
    .canosoft-listing ul,.canosoft-listing ol {
        padding: 0;
        margin-left: 15px;
    }
    .single-post  .elementor-top-section {
        padding: 0;
    }
    </style>
@endsection
@section('seo')
    <title>{{ucfirst(@$singleBlog->title)}} | @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else NMS Recruitment Service @endif</title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singleBlog->meta_description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singleBlog->meta_tags)}}' />
    <meta property='article:published_time' content='<?php if(@$singleBlog->updated_at !=''){?>{{@$singleBlog->updated_at}} <?php }else {?> {{@$singleBlog->created_at}} <?php }?>' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$singleBlog->meta_description)}}" />
    <meta property="og:title" content="{{ucfirst(@$singleBlog->meta_title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="Coperation" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else NMS Recruitment Service @endif" />
    <meta property="og:image" content="<?php if(@$singleBlog->image){?>{{asset('/images/blog/'.@$singleBlog->image)}}<?php }?>" />
    <meta property="og:image:url" content="<?php if(@$singleBlog->image){?>{{asset('/images/blog/'.@$singleBlog->image)}}<?php }?>" />
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
                                <h2 class="title">{{ @$singleBlog->title }}</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="/">Home</a>
                                </span>
                                <span class="divide">
                                    <i class="ti ti-book margin_right1"></i>
                                    <a title="Homepage" href="{{url('/blog')}}">Blog</a>
                                </span>
                                <span class="divide">
                                    <i class="ti ti-list margin_right1"></i>
                                    <a title="Homepage" href="{{route('blog.category',$singleBlog->category->slug)}}">{{ucwords($singleBlog->category->name)}}</a>
                                </span>
                                <span>{{ @$singleBlog->title }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-title end -->




        <!--site-main start-->
        <div class="site-main">


            <div class="ttm-row sidebar ttm-sidebar-right ttm-bgcolor-white overflow-hidden clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-8 content-area">
                            <!-- post --><article class="post ttm-blog-single clearfix">
                                <!-- post-featured-wrapper -->
                                <div class="ttm-post-featured-wrapper ttm-featured-wrapper">
                                    <div class="ttm-post-featured">
                                        <img class="img-fluid" src="{{ asset('/images/blog/'.@$singleBlog->image) }}" alt="">
                                    </div>
                                </div><!-- post-featured-wrapper end -->
                                <!-- ttm-blog-classic-content -->
                                <div class="ttm-blog-single-content">
                                    <div class="ttm-post-entry-header">
                                        <div class="post-meta">
                                            <span class="ttm-meta-line byline"><i class="fa fa-user"></i>{{  ucfirst( \App\Models\User::find($singleBlog->created_by)->name)}}</span>
                                            <span class="ttm-meta-line comments-links"><i class="fa fa-list"></i>{{ucwords($singleBlog->category->name)}}</span>
                                            <span class="ttm-meta-line posted-on"><i class="fa fa-calendar"></i><time class="entry-date published" datetime="2020-10-10T12:20:49+00:00">October 10, 2020</time></span>
                                        </div>
                                    </div>
                                    <div class="entry-content">
                                        <div class="ttm-box-desc-text">
                                            {!! $singleBlog->description !!}

                                            <div class="social-media-block">
                                                <div class="d-sm-flex justify-content-between">
                                                    <div class="ttm-social-share-wrapper margin_top15">
                                                        <h6 class="font-weight-normal m-0 margin_right10">Share : </h6>
                                                        <ul class="social-icons circle">
                                                            <li><a href="#"><i class="fa fa-facebook" onclick='fbShare("{{route('blog.single',$singleBlog->slug)}}")'></i></a></li>
                                                            <li><a href="#"><i class="fa fa-twitter" onclick='twitShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")'></i></a></li>
                                                            <li><a href="#"><i class="fa fa-whatsapp" onclick='whatsappShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")'></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="margin_top15">
                                                        <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-grey font-weight-normal text-capitalize margin_right10" href="{{route('blog.category',$singleBlog->category->slug)}}">{{ucwords($singleBlog->category->name)}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- ttm-blog-classic-content end -->
                            </article><!-- post end -->
                        </div>

{{--                        sidebar--}}
                        @include('frontend.pages.blogs.sidebar')

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
