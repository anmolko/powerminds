@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleAlbum->name)}}'s Gallery @endsection
@section('css')

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
                            <h2 class="title">{{ucwords(@$singleAlbum->name)}}'s Gallery</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="/">Home</a>
                                </span>
                                <span class="divide">
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="{{url('/album')}}">Albums</a>
                                </span>
                            <span>Gallery</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <!--site-main start-->
    <div class="site-main">


        <!--grid-section-->
        <section class="ttm-row grid-section clearfix">
            <div class="container">
                @if(count(@$singleAlbum->gallery) > 0)
                    <!-- row -->
                    <div class="row row-equal-height">
                        @foreach($singleAlbum->gallery as $gallery)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <!--featured-icon-box-->
                                <div class="featured-imagebox featured-imagebox-portfolio style2" >
                                    <!-- ttm-box-view-overlay -->
                                    <div class="ttm-box-view-overlay">
                                        <!-- featured-thumbnail -->
                                        <div class="featured-thumbnail" >
                                            <a href="#" tabindex="0"><img class="img-fluid" src="{{asset('/images/albums/gallery/thumb_'.@$gallery->filename)}}" alt="image"></a>
                                        </div><!-- featured-thumbnail end-->
                                        <div class="featured-content">
                                            <div class="featured-iconbox ttm-media-link">
                                                <a class="ttm_prettyphoto ttm_image" title="{{ucwords(@$singleAlbum->name)}}'s image" data-rel="prettyPhoto" href="{{asset('/images/albums/gallery/'.@$gallery->filename)}}" tabindex="0">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- ttm-box-view-overlay end-->
                                </div><!-- featured-icon-box end-->
                            </div>
                        @endforeach

                    </div><!-- row end -->
                @endif
            </div>
        </section>
        <!--grid-section end-->


    </div><!--site-main end-->

@endsection
