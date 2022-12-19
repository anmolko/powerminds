@extends('frontend.layouts.master')
@section('title') Blog @endsection
@section('css')
    <link rel="stylesheet" id="jssDefault" href="{{asset('assets/frontend/css/pagination.css')}}">

    <style>


    </style>
@endsection

@section('content')


    <!-- page-title -->
    <div class="ttm-page-title-row">
        <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="page-title-heading">
                            <h2 class="title">Category Search</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home mr-1"></i>
                                    <a title="Homepage" href="/">Home</a>
                                </span>
                            <span>Searched for:  <strong>{{ucwords($cat_name)}}</strong></span>
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
                    @if(count($allPosts) > 0)
                        <div class="col-lg-8 content-area">
                            <div class="container">
                                <!-- row -->
                                <div class="row">
                                    @foreach($allPosts as $post)
                                        <div class="col-lg-6">
                                            <!-- featured-imagebox-post -->
                                            <div class="featured-imagebox featured-imagebox-post style2">
                                                <div class="featured-thumbnail">
                                                    <img class="img-fluid" src="<?php if(@$post->image){?>{{asset('/images/blog/'.@$post->image)}}<?php }?>" alt="blog_img">
                                                </div>
                                                <div class="featured-content">
                                                    <div class="post-category">{{ucwords(@$post->category->name)}}</div>
                                                    <div class="post-title featured-title">
                                                        <h3><a href="{{route('blog.single',$post->slug)}}"> {{ @$post->title }}</a></h3>
                                                    </div>
                                                    <div class="post-meta">
                                                <span class="ttm-meta-line comments-link"><i class="fa fa-calendar"></i>{{date('M j, Y',strtotime(@$post->created_at))}}
                                                </span>
                                                        <span class="ttm-meta-line byline"><i class="fa fa-user"></i>{{  ucfirst( \App\Models\User::find($post->created_by)->name)}}</span>
                                                    </div>
                                                </div>
                                            </div><!-- featured-imagebox-post end -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{ $allPosts->links('vendor.pagination.default') }}

                            {{--                                <div class="pagination-block">--}}
                            {{--                                    <span class="page-numbers current">1</span>--}}
                            {{--                                    <a class="page-numbers" href="#">2</a>--}}
                            {{--                                    <a class="next page-numbers" href="#"><i class="ti ti-arrow-right"></i></a>--}}
                            {{--                                </div>--}}
                        </div>
                        @include('frontend.pages.blogs.sidebar')
                    @endif
                </div><!-- row end -->
            </div>
        </div>


    </div><!--site-main end-->


@endsection
