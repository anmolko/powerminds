@extends('frontend.layouts.master')
@section('title') Career @endsection
@section('css')
<style>

   article.ttm-blog-classic .ttm-blog-classic-content{
        margin-top: 0px;
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
                            <h2 class="title">Career Opportunity</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home mr-1"></i>
                                    <a title="Homepage" href="/">Home</a>
                                </span>
                            <span>Career</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->




    @if(count(@$careers) > 0)
        <div class="site-main">
            <div class="ttm-row ttm-sidebar-right ttm-bgcolor-white overflow-hidden clearfix">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12 content-area">
                            @foreach(@$careers as $career)
                                <article class="post ttm-blog-classic clearfix">
                                    <!-- ttm-blog-classic-content -->
                                    <div class="ttm-blog-classic-content">
                                        <div class="ttm-post-entry-header">
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="{{@$career->form_link}}">{{ucwords(@$career->name)}}</a></h2>
                                            </header>
                                            <div class="post-meta">
                                                <span class="ttm-meta-line byline"><i class="fa fa-clock-o"></i> Type: {{ ucwords(str_replace('_',' ', @$career->type)) }} </span>
                                                <span class="ttm-meta-line tags-links"><i class="fa fa-comment"></i> Open Positions: {{@$career->open_position}}</span>
                                                <span class="ttm-meta-line entry-date"><i class="fa fa-calendar"></i>Apply until: {{date('M j, Y',strtotime(@$career->end_date))}}</span>
                                            </div>
                                        </div>
                                        <div class="entry-content">
                                            <div class="ttm-blogbox-desc-footer">
                                                <div class="ttm-blogbox-footer-readmore">
                                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-color-dark btn-inline" href="{{@$career->form_link}}">Apply Now</a>
                                                </div>
                                                <div class="ttm-social-share-wrapper">
                                                    <a href="{{@$career->form_link}}" class="ttm-social-share-icon_btn"><i class="ti ti-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- ttm-blog-classic-content end -->
                                </article>
                            @endforeach
                        </div>
                    </div>
                    {{ $careers->links('vendor.pagination.default') }}

                </div>
            </div>
        </div>

    @else
    <section class="blog-sidebar">
        <div class="container">
            <div class="row">
                <h2 class="section-title">Job Not Posted Yet !!</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                <div class="section-description">It seems we cannot find what you are looking for.</div>
            </div>
        </div>
    </section>
    @endif



@endsection
