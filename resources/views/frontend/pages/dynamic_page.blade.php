@extends('frontend.layouts.master')
@section('title') {{ucwords(@$page_detail->name)}} @endsection
@section('css')
    <style>

    .theme-btn.style-three, a.theme-btn.style-three.faq-button {
        color: #293043 !important;
        background: transparent;
        border: 1px solid rgba(0, 102, 255, 0.2);
    }
  .custom-editor .media{
        display: block;
    }
    .inside.ttm-fid-view-lefticon.style1 .ttm-fid-contents {
        padding: 28px 45px 30px;
        margin-left: -76px;
        border-radius: 6px;
        min-height: 236px;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        transition: 0.25s ease;
        background-color: #1e303e !important;
        border: 1px solid rgba(255,255,255,.1);
    }
    .ttm-fid.inside.ttm-fid-with-icon.style1{
     margin-left: 0px !important;
    }
    .featured-icon-box.style9{
        box-shadow: 0 0 12px 0 rgb(43 52 59 / 30%)!important;
    }
    .ttm-pf-view-left-image .ttm-pf-single-content-area h2 {
        text-align: center;
        font-size: 36px;
        line-height: 46px;
        margin-bottom: 20px;
    }

    .ck-texts blockquote {
        display: block;
        padding: 55px 50px 55px 30px;
        position: relative;
        color: #223645;
        margin: 30px 0 30px 0;
        font-weight: 600;
        background-color: #ebf5f5;
        font-size: 22px;
        line-height: 36px;
        min-height: 100px;
        border-radius: 10px;
        font-style: italic;
        border: none;
    }
    .ck-texts blockquote:before {
        display: block;
        height: 60%;
        content: '';
        position: absolute;
        left: 0;
        width: 4px;
        top: 40px;
        background-color: #000;
    }

    .ck-texts blockquote:after {
        content: "\e67f";
        font-family: "themify";
        font-size: 110px;
        line-height: 110px;
        font-weight: 400;
        position: absolute;
        left: 40px;
        letter-spacing: 0;
        top: 30px;
        opacity: 0.06;
        font-style: normal;
        display: block;
    }
    .ttm-icon {
        margin-bottom: 2px;
    }

    .featured-imagebox-portfolio.style2 .ttm-media-link {
        display: flex;
        position: relative;
        padding-top: 5px;
        padding-bottom: 4px;
    }
    .featured-imagebox-portfolio.style2 .ttm-media-link a{
        border: none;
        font-size: 40px;
    }
    .featured-imagebox-portfolio.style2 .ttm-media-link:after {
        height: 0px;
    }
    .featured-imagebox-portfolio.style2 .ttm-media-link a:hover{
        border-color: transparent;
        background-color: transparent;
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
                                <h2 class="title">{{ Request::segment(1) }}</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="/">Home</a>
                                </span>
                                <span>{{ucwords(@$page_detail->name)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-title end -->

        <!--site-main start-->
        <div class="site-main">

             @foreach($sections as $key=>$value)

                @if($value == "basic_section")
                        <!--- Basic Section--->
                        <section class="ttm-row about-section clearfix">
                          <div class="container">
                              <div class="row">
                                  @if(@$basic_elements->list_image == "right")

                                  <div class="col-lg-7 col-md-6 col-sm-8">
                                      <div class="padding_top40 res-991-padding_left0">
                                          <!-- section title -->
                                          <div class="section-title">
                                              <div class="title-header">
                                                  @if(@$basic_elements->subheading)
                                                      <h3>{{ucfirst(@$basic_elements->subheading)}}</h3>
                                                  @endif
                                                  @if(@$basic_elements->heading)

                                                      <h2 class="title">{{ucwords(@$basic_elements->heading)}}</h2>
                                                  @endif
                                              </div>
                                              <div class="title-desc justified">
                                                  {!! @$basic_elements->description !!}
                                              </div>
                                              @if(@$basic_elements->button)
                                                  <div class="d-inline-block ">
                                                      <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor margin_right20 margin_top15" href="{{@$basic_elements->button_link}}">
                                                          {{ucwords(@$basic_elements->button)}}
                                                      </a>
                                                  </div>
                                              @endif

                                          </div><!-- section title end -->
                                      </div>
                                  </div>
                                  <div class="col-lg-5 col-md-12 col-xs-12">
                                      <div class="ttm_single_image-wrapper p-10 border">
                                          <img class="img-fluid w-100" src="{{asset('/images/section_elements/basic_section/'.@$basic_elements->image) }}" alt="single-06">
                                      </div>
                                  </div>
                                  @else


                                  <div class="col-lg-5 col-md-6 col-sm-8">
                                      <div class="ttm_single_image-wrapper p-10 border">
                                          <img class="img-fluid w-100" src="{{asset('/images/section_elements/basic_section/'.@$basic_elements->image) }}" alt="single-06">
                                      </div>
                                  </div>
                                  <div class="col-lg-7 col-md-12 col-xs-12">
                                      <div class="padding_left30 padding_top40 res-991-padding_left0">
                                          <!-- section title -->
                                          <div class="section-title">
                                              <div class="title-header">
                                                  @if(@$basic_elements->subheading)
                                                    <h3>{{ucfirst(@$basic_elements->subheading)}}</h3>
                                                  @endif
                                                  @if(@$basic_elements->heading)

                                                    <h2 class="title">{{ucwords(@$basic_elements->heading)}}</h2>
                                                  @endif
                                              </div>
                                              <div class="title-desc justified">
                                                  {!! @$basic_elements->description !!}
                                              </div>
                                              @if(@$basic_elements->button)
                                              <div class="d-inline-block ">
                                                  <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor margin_right20 margin_top15" href="{{@$basic_elements->button_link}}">
                                                      {{ucwords(@$basic_elements->button)}}
                                                  </a>
                                              </div>
                                              @endif

                                          </div><!-- section title end -->
                                      </div>
                                  </div>
                                  @endif
                              </div><!-- row end -->
                          </div>
                      </section>
                @endif

                @if($value == "call_to_action_1")
                    <!--cta-section-->
                     <section class="ttm-row cta-section bg-img9 ttm-bgcolor-darkgrey ttm-bg ttm-bgimage-yes clearfix">
                            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="container">
                                <!--row-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="res-991-padding_bottom0 text-center">
                                            <!-- section title -->
                                            <div class="section-title">
                                                <div class="title-header">
                                                    <h2 class="title">{{ @$call1_elements->heading }} </h2>
                                                </div>
                                                <div class="title-desc mt_5">
                                                    <p class="fs-20">{{@$call1_elements->description}}</p>
                                                </div>
                                            </div><!-- section title end -->
                                            @if(@$call1_elements->button_link !== null )
                                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor margin_top5" href="{{@$call1_elements->button_link }}">{{@$call1_elements->button}}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div><!--row end-->
                            </div>
                        </section>
                     <!--cta-section end-->

                @endif

                <!-- call2_elements -->
                @if($value == "call_to_action_2")
                    <!--cta-section-->
                        <section class="ttm-row cta-section ttm-textcolor-white bg-img2 clearfix">
                            <div class="container">
                                <!-- row -->
                                <div class="row align-items-md-center justify-content-between">
                                    <div class="col-lg-10 col-md-12 mr-auto">
                                        <!-- section-title -->
                                        <div class="section-title">
                                            <div class="title-header">
                                                @if(@$call2_elements->subheading)
                                                <h3 class="font-weight-normal">{{@$call2_elements->subheading}}</h3>
                                                @endif
                                                <h2 class="title call-action">{!! wordwrap(@$call2_elements->heading,45,"<br>\n",TRUE) !!}</h2>
                                            </div>
                                        </div><!-- section-title end -->
                                        <div class="d-inline-block">
                                            @if(@$call2_elements->button_link)
                                                <a class="ttm-btn ttm-btn-size-md ttm-btn-style-border ttm-btn-shape-rounded ttm-btn-color-white" href="{{@$call2_elements->button_link}}" tabindex="0">
                                                    {{ ($call2_elements->button !== null) ? $call2_elements->button : 'Explore'}}
                                                </a>
                                            @endif
                                            @if(@$call2_elements->description)

                                                <a href="{{@$call2_elements->description}}" target="_self" class="ttm_prettyphoto ttm-btn-color-white pl-2 ttm-btn btn-inline ttm-btn-size-md">
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

                @if($value == "video_section")


                    <!--grid-section-->
                        <section class="ttm-row grid-section clearfix">
                            <div class="container">
                                <!-- row -->
                                <div class="section-title title-style-center_text">
                                    <div class="title-header">
                                        <h3>Powermind special showcase</h3>
                                        <h2 class="title">Our Video Gallery</h2>
                                    </div>
                                </div>
                                <div class="row row-equal-height">
                                    @foreach(@$video_section_elements as $video_element)
                                        @if(@$video_element->heading == "youtube")
                                            @if(str_contains(@$video_element->description,'youtube'))
                                                <?php
                                                $thumbnail=get_youtube_thumbnail($video_element->description);
                                                ?>
                                            @else
                                                <?php
                                                $thumbnail=get_vimeo_thumbnail($video_element->description);
                                                ?>
                                            @endif
                                        @else
                                            @if(str_contains(@$video_element->description,'youtube'))
                                                <?php
                                                $thumbnail=get_youtube_thumbnail($video_element->description);
                                                ?>
                                            @else
                                                <?php
                                                $thumbnail=get_vimeo_thumbnail($video_element->description);
                                                ?>
                                            @endif
                                        @endif
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                        <!--featured-icon-box-->
                                        <div class="featured-imagebox featured-imagebox-portfolio style2">
                                            <!-- ttm-box-view-overlay -->
                                            <div class="ttm-box-view-overlay">
                                                <!-- featured-thumbnail -->
                                                <div class="featured-thumbnail">
                                                    <a href="#" tabindex="0"><img class="img-fluid" src="{{@$thumbnail}}" style="    height: 208px;" alt="image"></a>
                                                </div><!-- featured-thumbnail end-->
                                                <div class="featured-content">

                                                    <div class="featured-iconbox ttm-media-link">
                                                        <a href="{{@$video_element->description}}" target="_self" class="ttm_prettyphoto ttm_image">
                                                    <span class="ttm-icon ttm-icon_element-color-white ttm-textcolor-white  ttm-icon_element-style-rounded">
                                                         <i class="fa fa-play"></i>
                                                    </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div><!-- ttm-box-view-overlay end-->
                                        </div><!-- featured-icon-box end-->
                                    </div>
                                    @endforeach
                                </div><!-- row end -->
                            </div>
                        </section>
                        <!--grid-section end-->





                @endif

                @if($value == "background_image_section")
                        <!--padding_zero-section-->
                        <section class="ttm-row padding_zero-section margin_left30 margin_right30 res-991-m-0 border-rad_6 clearfix"
                        style="
                            background-image: url(<?php if(!empty(@$bgimage_elements->image)){ echo '/images/section_elements/bgimage_section/'.@$bgimage_elements->image; }else{ echo '/assets/frontend/images/bg-image/row-bgimage-6.jpg'; } ?>);

                            background-repeat: no-repeat;
                            background-size: cover;
                            background-attachment: fixed;
                            background-position: center;
                            " >
{{--                            asset('assets/frontend/images/bg-image/row-bgimage-6.jpg')--}}
                            <div class="container">
                                <!-- row -->
                                <div class="row">
                                    <div class="col-lg-6 ml-auto">
                                        <div class="ttm-col-bgcolor-yes ttm-bgcolor-skincolor ttm-col-bgimage-yes ttm-bg spacing-6 border-rad_6 overflow-hidden">
                                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                                <div class="ttm-col-wrapper-bg-layer-inner"></div>
                                            </div>
                                            <div class="layer-content">
                                                <!-- section title -->
                                                <div class="section-title">
                                                    <div class="title-header">
                                                        @if(@$bgimage_elements->subheading)
                                                            <h3>{{@$bgimage_elements->subheading}}</h3>
                                                        @endif
                                                        <h4 class="title">{{@$bgimage_elements->heading}}</h4>
                                                    </div>
                                                </div><!-- section title end -->
                                                <div class="accordion">
                                                    <!-- toggle -->
                                                    <div class="toggle ttm-toggle_style_classic ttm-toggle-title-bgcolor-white">
                                                        <div class="toggle-title"><a href="#" class="active">{{@$bgimage_elements->list_image}}</a></div>
                                                        <div class="toggle-content show justified">
                                                            <p>{{@$bgimage_elements->description}}</p>

                                                        </div>
                                                    </div><!-- toggle end -->
                                                    <!-- toggle -->
                                                    <div class="toggle ttm-toggle_style_classic ttm-toggle-title-bgcolor-white">
                                                        <div class="toggle-title"><a href="#">{{@$bgimage_elements->list_header}}</a></div>
                                                        <div class="toggle-content justified">
                                                            <p>{{@$bgimage_elements->list_description}}</p>
                                                        </div>
                                                    </div><!-- toggle end -->
                                                    <!-- toggle -->
                                                    <div class="toggle ttm-toggle_style_classic ttm-toggle-title-bgcolor-white">
                                                        <div class="toggle-title"><a href="#">{{@$bgimage_elements->extra_heading}}</a></div>
                                                        <div class="toggle-content justified">
                                                            <p>{{@$bgimage_elements->extra_description}}</p>
                                                        </div>
                                                    </div><!-- toggle end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--padding_zero-section end-->
                @endif

                @if($value == "basic_section2")
                    <!--about-section-->
                        <section class="ttm-row bg-img4 about-section clearfix">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-xs-12">
                                        <div class="padding_top40 res-991-padding_top0 res-991-padding_bottom50">
                                            <!-- section title -->
                                            <div class="section-title">
                                                <div class="title-header">
                                                    @if(@$basic_elements2->subheading)
                                                        <h3>{{@$basic_elements2->subheading}}</h3>
                                                    @endif
                                                    @if(@$basic_elements2->subheading)
                                                        <h2 class="title">{{ucwords(@$basic_elements2->heading)}}</h2>
                                                    @endif
                                                </div>
                                                <div class="title-desc justified">
                                                    {!! @$basic_elements2->description !!}
                                                </div>
                                            </div><!-- section title end -->
                                            @if(@$basic_elements2->button)
                                                <div class="d-inline-block">
                                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-grey margin_top15" href="{{@$basic_elements2->button_link}}">
                                                        {{ucwords(@$basic_elements2->button)}}
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="d-sm-flex">
                                            <div class="ttm_single_image-wrapper text-left">
                                                <img class="img-fluid" src="{{asset('/images/section_elements/basic_section/'.@$basic_elements2->image) }}" alt="single-07">
                                            </div>
                                            @if($basic_elements2->extra_heading !== null || $basic_elements2->extra_button !== null)
                                                <div class="d-inline-block justify-content-end ttm-bgcolor-white padding_top40 padding_right20 padding_bottom40 padding_left40 margin_top140 box-shadow res-575-margin_top30 ml_200 res-575-margin_left0 border-rad_6 z-index-1">
                                                <!-- ttm-fid -->
                                                <div class="ttm-fid inside ttm-fid-with-icon style4">
                                                    <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                        <i class="flaticon flaticon-bussiness-man-1"></i>
                                                    </div>
                                                    <div class="ttm-fid-contents">
                                                        <h4 class="ttm-fid-inner">
                                                        <span   data-appear-animation="animateDigits"
                                                                data-from="0"
                                                                data-to="{{ (@$basic_elements2->extra_heading) ? @$basic_elements2->extra_heading : '890'}}"
                                                                data-interval="10"
                                                                data-before=""
                                                                data-before-style="sup"
                                                                data-after=""
                                                                data-after-style="sub"
                                                                class="numinate">{{ (@$basic_elements2->extra_heading) ? @$basic_elements2->extra_heading : '890'}}
                                                        </span>
                                                        </h4>
                                                        <h3 class="ttm-fid-title">{{ ucfirst(@$basic_elements2->list_header)}}</h3>
                                                    </div>
                                                </div><!-- ttm-fid end -->
                                                <div class="ttm-horizontal_sep width-100 margin_top25 margin_bottom25"></div>
                                                <!-- ttm-fid -->
                                                <div class="ttm-fid inside ttm-fid-with-icon style4">
                                                    <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                        <i class="flaticon flaticon-analytics"></i>
                                                    </div>
                                                    <div class="ttm-fid-contents">
                                                        <h4 class="ttm-fid-inner">
                                                        <span   data-appear-animation="animateDigits"
                                                                data-from="0"
                                                                data-to="{{ (@$basic_elements2->extra_button) ? @$basic_elements2->extra_button : '645'}}"
                                                                data-interval="10"
                                                                data-before=""
                                                                data-before-style="sup"
                                                                data-after=""
                                                                data-after-style="sub"
                                                                class="numinate">{{ (@$basic_elements2->extra_button) ? @$basic_elements2->extra_button : '645'}}
                                                        </span>
                                                        </h4>
                                                        <h3 class="ttm-fid-title">{{ ucfirst(@$basic_elements2->extra_link)}}</h3>
                                                    </div>
                                                </div><!-- ttm-fid end -->
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- row end -->
                            </div>
                        </section>
                        <!--about-section end-->
                @endif

                @if($value == "directors_message")
                    <!--- Basic Section--->

                        <!-- broken-section -->
                        <section class="ttm-row broken-section bg-layer-equal-height margin_top160 res-991-margin_top0 clearfix">
                            <div class="container">
                                <div class="row no-gutters">
                                    <div class="col-lg-5 col-md-6 col-sm-6 m-lg-0 m-auto">
                                        <!-- col-bg-img-two -->
                                        <div class="col-bg-img-two ttm-bg ttm-col-bgimage-yes border-rad_6 overflow-hidden mt_120 res-991-margin_top15">
                                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer" style=" background-image:url({{ asset('/images/section_elements/basic_section/'.@$directors_message->image) }}) !important;">
                                                <div class="padding_top15 ttm-bgcolor-skincolor"></div>
                                                <div class="ttm-col-wrapper-bg-layer-inner"></div>
                                            </div>
                                        </div>
                                        <!-- col-bg-img-one end -->
                                        <div class="d-inline-block border-rad_6 overflow-hidden m-auto text-center res-991-margin_left15 res-991-margin_right15">
                                            <div class="res-991-padding_top15 mb_15 position-relative ttm-bgcolor-skincolor"></div>
                                            <img src="{{asset('/images/section_elements/basic_section/'.@$directors_message->image) }}" class="ttm-equal-height-image img-fluid" alt="col-bgimage-1">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12 col-sm-12">
                                        <div class="ttm-bg ttm-col-bgimage-yes ttm-right-span ttm-bgcolor-grey border-rad_6 spacing-8 ">
                                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer border-rad_6 overflow-hidden"></div>
                                            <div class="layer-content">
                                                <!-- section title -->
                                                <div class="section-title">
                                                    <div class="title-header">
                                                        @if(@$directors_message->subheading !== null)
                                                            <h3>{{@$directors_message->subheading}}</h3>
                                                        @endif
                                                        <h2 class="title">{{@$directors_message->heading}}</h2>
                                                    </div>
                                                    <div class="title-desc">
                                                        {!! @$directors_message->description !!}
                                                    </div>
                                                </div>
                                                <!-- section title end -->
                                                <div class="d-inline-block margin_top15">
                                                    <img class="img-fluid" src="<?php if(!empty(@$directors_message->extra_image)){ echo '/images/section_elements/basic_section/'.@$directors_message->extra_image; } ?>" alt="single_02" style="height: 70px; width: auto">
                                                    <h4 class="pt-2">{{@$directors_message->extra_heading}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- col-bg-img-two end -->
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- broken-section end -->
                @endif

                @if($value == "flash_cards")

                        <section class="ttm-row ttm-bgcolor-grey padding_top70 padding_bottom55 clearfix">

                            <div class="container">
                                    @if(@$flash_elements[0]->heading)
                                        <h3>{{ucfirst(@$flash_elements[0]->heading)}}</h3>
                                    @endif
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ttm-team-member-content">
                                            <div class="row row-equal-height">
                                                @foreach(@$flash_elements as $key=>$flash_element)

                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <!--featured-icon-box-->
                                                    <div class="featured-icon-box icon-align-top-content style9">
                                                        <div class="featured-icon">
                                                            <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                                                                @if($key == '0')
                                                                    <i class="fa fa-bullseye"></i>
                                                                @elseif($key == '1')
                                                                    <i class="fa fa-low-vision"></i>
                                                                @else
                                                                    <i class="fa fa-heart-o"></i>
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="featured-content">
                                                            <div class="featured-title">
                                                                <h3>{{ucwords(@$flash_element->list_header)}}</h3>
                                                            </div>
                                                            <div class="featured-desc">
                                                                <p>{{@$flash_element->list_description}}</p>
                                                            </div>
                                                        </div>
                                                    </div><!-- featured-icon-box end-->
                                                </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                @endif

                @if($value == "simple_header_and_description")
                        <section class="ttm-row clearfix" style="    padding: 50px 0;">
                            <div class="container">
                                <!-- row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ttm-pf-single-content-wrapper ttm-pf-view-left-image">
                                            <div class="ttm-pf-single-content-wrapper-innerbox">

                                                <div class="ttm-pf-single-content-area">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            @if(@$header_descp_elements->heading !== null)
                                                                <h2>{{@$header_descp_elements->heading}}</h2>
                                                            @endif
                                                             <div class="ck-texts">
                                                                {!! @$header_descp_elements->description !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- row end-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                @endif

                @if($value == "map_and_description")
                  <!--- Map & Description--->
                  <section class="about-two">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12 col-lg-5">
                          <div class="about-two__image">
                            @if(@$map_descp->list_description)
                              {!! @$map_descp->list_description !!}
                              @elseif(@$setting_data->google_map)
                                <iframe frameborder="0" width="100%" height="660px"scrolling="no" marginheight="0" marginwidth="0" src="{{@$setting_data->google_map}}"
                                          title="%3$s" aria-label="%3$s"></iframe>
                            @endif
                            @if(@$map_descp->button)
                                <a href="{{@$map_descp->button_link}}" class="thm-btn map-button"><span>{{ucwords(@$map_descp->button)}}</span></a>
                              @endif
                          </div><!-- /.about-two__image -->
                        </div><!-- /.col-md-12 -->
                        <div class="col-md-12 col-lg-7">
                          <div class="about-two__content" style="padding: 50px;">
                            <div class="section-title text-left">
                                @if(@$map_descp->subheading)
                                  <span class="section-title__tagline">{{ucfirst(@$map_descp->subheading)}}</span>

                                  @endif
                                  @if(@$map_descp->heading)
                                  <h2 class="section-title__title">
                                      <span><?php
                                          $split = explode(" ", ucwords(@$map_descp->heading));?> {{preg_replace('/\W\w+\s*(\W*)$/', '$1', ucwords(@$map_descp->heading))."\n"}}</span>
                                      <span class="text-last">{{$split[count($split)-1]}}</span>

                                  </h2>
                                  @endif
                            </div>
                            <div class="about-two__box">
                              <!-- /.about-two__box__icon -->
                              <div class="about-two__box__content">
                               {{ ucfirst(@$map_descp->description) }}
                            </div><!-- /.about-two__box__content -->
                            </div><!-- /.about-two__box -->
                            <!-- /.about-two__summery -->
                          </div><!-- /.about-two__content -->
                        </div><!-- /.col-md-12 -->
                      </div><!-- /.row -->
                    </div><!-- /.container -->
                  </section>



                @endif

                @if($value == "accordion_section")
                    <!-- FAQs Page Area start -->
                    <section class="faqs-page">
                        <div class="faqs-page-bg" style="background-image: url({{asset('assets/frontend/images/backgrounds/faqs-page-bg.jpg')}})"></div>
                        <div class="container">
                          <div class="section-title text-center">
                            <span class="section-title__tagline">{{ucwords(@$accordian2_elements[0]->subheading)}}</span>
                            <h2 class="section-title__title">
                                   <span><?php
                                       $split = explode(" ", ucwords(@$accordian2_elements[0]->heading));?> {{preg_replace('/\W\w+\s*(\W*)$/', '$1', ucwords(@$accordian2_elements[0]->heading))."\n"}}</span>
                                <span class="text-last">{{$split[count($split)-1]}}</span>

                            </h2>
                          </div>
                          <div class="row">
                            @foreach($accordian2_elements->chunk(2) as $index => $chunk )

                              <div class="col-xl-6 col-lg-6">
                                <div class="faqs-page__single">
                                  <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion">
                                    @foreach($chunk as  $accordian2_element)

                                        <div class="accrodion @if($loop->first) active @endif @if($loop->last) last-chiled @endif">
                                          <div class="accrodion-title">
                                            <h4>{{@$accordian2_element->list_header}}</h4>
                                          </div>
                                          <div class="accrodion-content" style="@if($loop->first)  @else display: none; @endif">
                                            <div class="inner">
                                              <p>{!! @$accordian2_element->list_description !!}</p>
                                            </div><!-- /.inner -->
                                          </div>
                                        </div>
                                    @endforeach

                                  </div>
                                </div>
                              </div>
                            @endforeach


                          </div>
                        </div>
                      </section>
                  <!-- FAQs Page Area end -->
                @endif

                @if($value == "gallery_section")
                  <!--- Gallery Section 1-->
                <section class="gallery-one">


                  <div class="container-fluid">
                      @if(Request::is('about-us'))
                          <div class="section-title text-center">
                              <span class="section-title__tagline">Our Gallery</span>
                              <h2 class="section-title__title">
                                <span>Legal </span><span class="text-last">Documents</span>
                              </h2>
                          </div>

                          @else
                          <div class="section-title text-center">
                              <span class="section-title__tagline">NMS Recruitment</span>
                              <h2 class="section-title__title">
                                  <span>Our </span><span class="text-last">Gallery</span>
                              </h2>
                          </div>
                      @endif
                    <div class="row masonary-layout">

                    @foreach(@$gallery_elements as $gallery_element)

                      <div class="col-md-6 col-lg-4">
                          <div class="team-one__single">
                              <div class="team-one__img-box">
                                  <div class="team-one__img gallery-one__card">
                                      <img src="{{asset('/images/section_elements/gallery/'.@$gallery_element->filename)}}" alt="">
                                      <a href="{{asset('/images/section_elements/gallery/'.@$gallery_element->filename)}}" class="img-popup">
                                          <span></span>
                                      </a>
                                  </div>
                                  <div class="team-one__social">
                                      <div class="team-one__member-info">
                                          <p class="team-one__member-title">{{ ucfirst(str_replace('-',' ',$gallery_element->original_name))}}</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- /.col-md-6 col-lg-3 -->
                      @endforeach


                    </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
                </section><!-- /.gallery-one -->

                @endif

                @if($value == "slider_list")
                  <!-- Slider List Area start -->
                  @if(@$slider_list_elements[0]->heading)

                    <!--Portfolio Two Start-->
                    <section class="portfolio-two" style="margin-top: 80px;margin-bottom: 20px;">
                        <div class="container">
                            <div class="section-title text-center">
                                <span class="section-title__tagline">{{ucfirst(@$slider_list_elements[0]->description)}}</span>
                                <h2 class="section-title__title">
                                    <span><?php
                                        $split = explode(" ", ucwords(@$slider_list_elements[0]->heading));?> {{preg_replace('/\W\w+\s*(\W*)$/', '$1', ucwords(@$slider_list_elements[0]->heading))."\n"}}</span>
                                    <span class="text-last">{{$split[count($split)-1]}}</span>
                                </h2>
                            </div>
                            <div class="portfolio-two__carousel owl-theme owl-carousel">

                              @for ($i = 1; $i <=@$list_3; $i++)

                                <div class="portfolio-one__single">
                                    <div class="portfolio-one__img">
                                        <img src="{{asset('/images/section_elements/list_1/'.@$slider_list_elements[$i-1]->list_image)}}" alt="">
                                        <div class="portfolio-one__experience">

                                            <div class="portfolio-one__fimlor">
                                                <p class="portfolio-one__fimlor-title"><a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}">{{ucwords(@$slider_list_elements[$i-1]->list_header)}}</a></p>
                                            </div>
                                        </div>
                                        <div class="portfolio-one__arrow">
                                            <a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}"><span class="icon-right-arrow"></span></a>
                                        </div>
                                    </div>
                                </div>
                                @endfor

                            </div>
                        </div>
                    </section>
                    <!--Portfolio Two End-->

                  @endif
                @endif

                @if($value == "simple_accordion_tab2")

                <section class="we-change">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="we-change__left-faqs">
                                    <div class="section-title text-left">
                                      <span class="section-title__tagline">{{ucwords(@$process_elements[0]->description)}}</span>
                                      <h2 class="section-title__title">
                                          <span><?php
                                              $split = explode(" ", ucwords(@$process_elements[0]->heading));?> {{preg_replace('/\W\w+\s*(\W*)$/', '$1', ucwords(@$process_elements[0]->heading))."\n"}}</span>
                                          <span class="text-last">{{$split[count($split)-1]}}</span>
                                      </h2>
                                    </div>
                                    <div class="we-change__faqs">
                                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                            <div class="accrodion active">
                                                <div class="accrodion-title">
                                                    <h4>{{@$process_elements[0]->list_header}}</h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        <p>{!! @$process_elements[0]->list_description !!}</p>
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>
                                            <div class="accrodion">
                                                <div class="accrodion-title">
                                                    <h4>{{@$process_elements[1]->list_header}}</h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        <p>{!! @$process_elements[1]->list_description !!}</p>
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>
                                            <div class="accrodion last-chiled">
                                                <div class="accrodion-title">
                                                    <h4>{{@$process_elements[2]->list_header}}</h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        <p>{!! @$process_elements[2]->list_description !!}</p>
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="we-change__right">
                                    <div class="we-change__right-img">
                                        <img src="{{asset('/images/section_elements/list_1/'.@$process_elements[0]->list_image)}}" alt="">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endif



            @endforeach

             @if( Request::segment(1) == 'about-us')

             <!--fid-section-->
                 <section class="ttm-row fid-section ttm-bgimage-yes bg-img3 ttm-bg ttm-bgcolor-darkgrey clearfix">
                     <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                     <div class="container">
                         <!-- row -->
                         <div class="row row-equal-height">
                             <div class="col-lg-3 " >
                                 <!-- ttm-fid -->
                                 <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style1">
                                     <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                         <i class="flaticon flaticon-maintenance"></i>
                                     </div>
                                     <div class="ttm-fid-contents">
                                         <span>Industry</span>
                                         <h4 class="ttm-fid-inner">
                                    <span   data-appear-animation="animateDigits"
                                            data-from="0"
                                            data-to="{{ (@$homepage_info->project_completed) ? @$homepage_info->project_completed : '180'}}"
                                            data-interval="15"
                                            data-before=""
                                            data-before-style="sup"
                                            data-after="K"
                                            data-after-style="sub"
                                            class="numinate">{{ (@$homepage_info->project_completed) ? @$homepage_info->project_completed : '180'}}
                                    </span>
                                             {{--                                                    <span>K</span>--}}
                                         </h4>
                                         <h3 class="ttm-fid-title">Industries Served</h3>
                                     </div>
                                 </div><!-- ttm-fid end -->
                             </div>
                             <div class="col-lg-3 " >
                                 <!-- ttm-fid -->
                                 <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style1">
                                     <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                         <i class="flaticon flaticon-salary"></i>
                                     </div>
                                     <div class="ttm-fid-contents">
                                         <span>Jobs</span>
                                         <h4 class="ttm-fid-inner">
                                    <span   data-appear-animation="animateDigits"
                                            data-from="0"
                                            data-to="{{ (@$homepage_info->success_stories) ? @$homepage_info->success_stories : '360'}}"
                                            data-interval="15"
                                            data-before=""
                                            data-before-style="sup"
                                            data-after="+"
                                            data-after-style="span"
                                            class="numinate">{{ (@$homepage_info->success_stories) ? @$homepage_info->success_stories : '360'}}
                                    </span>
                                             <span>+</span>
                                         </h4>
                                         <h3 class="ttm-fid-title">Jobs Created</h3>
                                     </div>
                                 </div><!-- ttm-fid end -->
                             </div>
                             <div class="col-lg-3 " >
                                 <!-- ttm-fid -->
                                 <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style1">
                                     <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                         <i class="flaticon flaticon-business-man"></i>
                                     </div>
                                     <div class="ttm-fid-contents">
                                         <span>Happy Clients</span>
                                         <h4 class="ttm-fid-inner">
                                    <span   data-appear-animation="animateDigits"
                                            data-from="0"
                                            data-to="{{ (@$homepage_info->happy_clients) ? @$homepage_info->happy_clients : '495'}}"
                                            data-interval="15"
                                            data-before=""
                                            data-before-style="sup"
                                            data-after="%"
                                            data-after-style="span"
                                            class="numinate">{{ (@$homepage_info->happy_clients) ? @$homepage_info->happy_clients : '495'}}
                                    </span>
                                             <span>k</span>
                                         </h4>
                                         <h3 class="ttm-fid-title">Clients Served</h3>
                                     </div>
                                 </div><!-- ttm-fid end -->
                             </div>
                             <div class="col-lg-3 " >
                                 <!-- ttm-fid -->
                                 <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style1">
                                     <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                         <i class="fa fa-star-o"></i>
                                     </div>
                                     <div class="ttm-fid-contents">
                                         <span>PSMB</span>
                                         <h4 class="ttm-fid-inner">
                                    <span   data-appear-animation="animateDigits"
                                            data-from="0"
                                            data-to="{{ (@$homepage_info->visa_approved) ? @$homepage_info->visa_approved : '5'}}"
                                            data-interval="5"
                                            data-before=""
                                            data-before-style="sup"
                                            data-after="%"
                                            data-after-style="span"
                                            class="numinate">{{ (@$homepage_info->visa_approved) ? @$homepage_info->visa_approved : '5'}}
                                    </span>
                                             <span style="padding-left: 5px"> star </span>
                                         </h4>
                                         <h3 class="ttm-fid-title">Rated Training Provider</h3>
                                     </div>
                                 </div><!-- ttm-fid end -->
                             </div>
                         </div><!-- row end -->
                     </div>
                 </section>
                 <!--fid-section end-->


             @endif



        </div>


@endsection
@section('js')

@endsection
