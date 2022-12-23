@extends('frontend.layouts.master')
@section('title') Album @endsection
@section('styles')

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
                            <h2 class="title">Our Collection</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="/">Home</a>
                                </span>
                            <span>Albums</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->
    <!--site-main start-->
    <div class="site-main">

    @if(count(@$albums) > 0)

        <!--grid-section-->
        <section class="ttm-row grid-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    @foreach($albums as $album)
                        <div class="col-lg-4 col-md-6">
                            <!--featured-imagebox-->
                            <div class="featured-imagebox featured-imagebox-services style2">
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="{{route('album.gallery',$album->slug)}}">{{ucwords(@$album->name)}}</a></h3>
                                    </div>
                                    <span class="ser_cate">Images ({{count(@$album->gallery)}})  </span>

                                </div>
                                <div class="ttm-box-view-overlay border-rad_6">
                                    <!-- featured-thumbnail -->
                                    <div class="featured-thumbnail">
                                        <img class="img-fluid" src="{{asset('/images/albums/'.@$album->cover_image)}}" alt="image">
                                    </div><!-- featured-thumbnail end-->
                                    <div class="featured-hover-content">
                                        <div class="bottom-footer">
                                            <a class="ttm-btn btn-inline ttm-btn-size-sm ttm-btn-color-skincolor" href="{{route('album.gallery',$album->slug)}}">View Gallery</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox end-->
                        </div>
                    @endforeach

                </div>
                <!-- row end -->
            </div>
        </section>
        <!--grid-section end-->
    @endif

    </div><!--site-main end-->


@endsection


