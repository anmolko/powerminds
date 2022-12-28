
@extends('frontend.layouts.master')
@section('title') Contact Us @endsection
@section('css')
<style>
    div#msgSubmit {
        margin-top: 20px;
        text-align: center;
    }
    .featured-desc a{
        color:  #7a8a9e;
    }
    .featured-desc a:hover{
        color:  #27aae1;
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
                                <h2 class="title">Contact Us</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="/">Home</a>
                                </span>
                                <span>Contact Us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-title end -->


        <!--site-main start-->
        <div class="site-main">


            <!--- conatact-section -->
            <section class="ttm-row conatact-section clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section title -->
                            <div class="section-title without-seperator title-style-center_text">
                                <div class="title-header">
                                    <h3>Reach out</h3>
                                        <h2 class="title">Send Us a Message</h2>
                                </div>
                                <div class="title-desc">
                                    <p>Have something in mind? Get in touch with us and we will get back to you as soon as possible. We are fully committed to apply full range of talent to creating perfect solution for each client’s needs.</p>
                                </div>
                            </div><!-- section title end -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="padding_right30 res-991-padding_right0 res-991-margin_bottom30">
                                <div class="ttm_single_image-wrapper margin_bottom40">
                                    <img class="img-fluid w-100" src="{{asset('images/office.jpeg')}}" alt="single-12">
                                </div>
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content style11">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-skincolor ttm-icon_element-size-md ttm-icon_element-style-round">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>Give us a call</h3>
                                        </div>
                                        <div class="featured-desc"><a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +9771238798 @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +9771238798 @endif</a></div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                                <div class="ttm-horizontal_sep width-100 margin_top20 margin_bottom20"></div>
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content style11">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-skincolor ttm-icon_element-size-md ttm-icon_element-style-round">
                                            <i class="fa fa-globe"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>Send Email</h3>
                                        </div>
                                        <div class="featured-desc">
                                            <a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif">@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</a>
                                        </div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                                <div class="ttm-horizontal_sep width-100 margin_top20 margin_bottom20"></div>
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content style11 margin_bottom0">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-skincolor ttm-icon_element-size-md ttm-icon_element-style-round">
                                            <i class="ti ti-home"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>Visit Office</h3>
                                        </div>
                                        <div class="featured-desc">
                                            {{@$setting_data->address}}
                                        </div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                                 @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block alert-dismissible">
                                        <strong class="sent-success">{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block alert-dismissible">
                                        <strong class="error-sent">{{ $message }}</strong>
                                    </div>
                                @endif
                            <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-grey z-index-2 p-50 res-991-margin_top30 res-991-p-15">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content">
                                    <form id="contact_form" class="contact_form wrap-form clearfix" method="post" novalidate="novalidate" action="{{route('contact.store')}}">
                                        @csrf
                                        <div class="row ttm-boxes-spacing-15px">
                                            <div class="col-md-12 ttm-box-col-wrapper">
                                                <label>
                                                    <span class="text-input margin_bottom0"><input name="name" type="text" value="" placeholder="Your Name" required="required"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-6 ttm-box-col-wrapper">
                                                <label>
                                                    <span class="text-input margin_bottom0"><input name="email" type="text" value="" placeholder="Your Email" required="required"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-6 ttm-box-col-wrapper">
                                                <label>
                                                    <span class="text-input margin_bottom0"><input name="subject" type="text" value="" placeholder="Subject" required="required"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-12 ttm-box-col-wrapper">
                                                <label>
                                                    <span class="text-input margin_bottom0"><input name="phone" type="text" value="" placeholder="Phone Number" required="required"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-12 ttm-box-col-wrapper">
                                                <label>
                                                    <span class="text-input margin_bottom0"><textarea name="message" rows="3" placeholder="Message" required="required"></textarea></span>
                                                </label>
                                            </div>
                                        </div>
                                        <button class="submit ttm-btn ttm-btn-size-lg ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor w-100" type="submit">SEND A MESSAGE!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </section>
            <!-- conatact-section end -->

        @if(@$setting_data->google_map)

            <!--google_map-->
            <div id="google_map" class="google_map">
                <div class="map_container clearfix">
                    <div id="map">
                        <iframe src="{{@$setting_data->google_map}}" width="100%" height="100%" aria-hidden="false" tabindex="0"></iframe>
                    </div>
{{--                    <div class="container">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <div class="ttm_contact_widget_wrapper clearfix">--}}
{{--                                    <h3>Opening Hours</h3>--}}
{{--                                    <ul>--}}
{{--                                        <li><h6>Monday</h6>12:00pm – 19:00 pm</li>--}}
{{--                                        <li><h6>Tuesday To Friday</h6>12:00pm – 19:00 pm</li>--}}
{{--                                        <li><h6>Saturday</h6>12:00pm – 19:00 pm</li>--}}
{{--                                    </ul>--}}
{{--                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor margin_top10" href="contact-us.html">Make A Appoinment</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>

        </div><!--site-main end-->
        @endif



@endsection
@section('js')
  <!-- For Contact Form -->

@endsection
