@extends('frontend.layouts.master')
@section('title') Services @endsection
@section('css')
<style>
   .blog-page__pagination {
            text-align: center;
        }

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
                                <h2 class="title">Our Services</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="/">Home</a>
                                </span>
                                <span>Services we provide</span>
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

                        <div class="col-lg-8 content-area">


                                    <!-- row -->
                                    <div class="row row-equal-height">
                                        @if(count($allservices) > 0)
                                            @foreach($allservices as $service)
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <!--featured-icon-box-->
                                                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                                                        <!-- ttm-box-view-overlay -->
                                                        <div class="ttm-box-view-overlay">
                                                            <!-- featured-thumbnail -->
                                                            <div class="featured-thumbnail">
                                                                <a href="#" tabindex="0"><img class="img-fluid" src="<?php if(@$service->banner_image){?>{{asset('/images/service/'.@$service->banner_image)}}<?php }?>" alt="image"></a>
                                                            </div><!-- featured-thumbnail end-->
                                                            <div class="featured-content">
                                                                <div class="featured-title">
                                                                    <h3><a href="{{route('service.single',$service->slug)}}">{{ucwords(@$service->title)}}</a></h3>
                                                                </div>
                                                                <div class="featured-iconbox ttm-media-link">
                                                                    <a class="ttm_prettyphoto ttm_image" title="{{ucwords(@$service->title)}}" data-rel="prettyPhoto" href="{{asset('/images/service/'.@$service->banner_image)}}" tabindex="0">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                    <a class="ttm_link" href="{{route('service.single',$service->slug)}}">
                                                                        <i class="fa fa-expand"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div><!-- ttm-box-view-overlay end-->
                                                    </div><!-- featured-icon-box end-->
                                                </div>
                                            @endforeach
                                        @endif

                                    </div><!-- row end -->
                                   {{ $allservices->links('vendor.pagination.default') }}


                        </div>
                    </div><!-- row end -->
                </div>
            </div>


        </div><!--site-main end-->



@endsection
