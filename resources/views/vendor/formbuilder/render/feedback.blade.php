@extends('formbuilder::front_layout')
@section('title') {{ $form->name }} @endsection
@section('css')
<style>
     input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
        color: #468847;
        background-color: #DFF0D8;
        border: 1px solid #D6E9C6;
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
        color: #B94A48;
        background-color: #F2DEDE;
        border: 1px solid #EED3D7;
    }

    .parsley-errors-list {
        margin: 2px 0 3px;
        padding: 0;
        list-style-type: none;
        font-size: 0.9em;
        line-height: 0.9em;
        opacity: 0;
        color: #B94A48;

        transition: all .3s ease-in;
        -o-transition: all .3s ease-in;
        -moz-transition: all .3s ease-in;
        -webkit-transition: all .3s ease-in;
    }

    .parsley-errors-list.filled {
        opacity: 1;
    }

    .card {
    position: relative !important;
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: normal !important;
    -ms-flex-direction: column !important;
    flex-direction: column !important;
    min-width: 0 !important;
    word-wrap: break-word !important;
    background-color: var(--vz-card-bg) !important;
    background-clip: border-box !important;
    border: 0 solid rgba(0,0,0,.125) !important;
    border-radius: 0.25rem !important;
}
.card-header:first-child {
    border-radius: 0.25rem 0.25rem 0 0 !important;
}

.card-header {
    padding: 1rem 1rem !important;
    margin-bottom: 0 !important;
    background-color: var(--vz-card-cap-bg) !important;
    border-bottom: 0 solid rgba(0,0,0,.125) !important;
}

.card-footer:last-child {
    border-radius: 0 0 0.25rem 0.25rem !important;
}

.card-footer {
    padding: 1rem 1rem !important;
    background-color: var(--vz-card-cap-bg) !important;
    border-top: 0 solid rgba(0,0,0,.125) !important;
}

.btn-primary {
    color: #fff !important;
    background-color: #405189 !important;
    border-color: #405189 !important;
}

.btn {
    display: inline-block !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    text-align: center !important;
    text-decoration: none !important;
    vertical-align: middle !important;
    cursor: pointer !important;
    -webkit-user-select: none !important;
    -moz-user-select: none !important;
    -ms-user-select: none !important;
    user-select: none !important;
    border: 1px solid transparent !important;
    padding: 0.5rem 0.9rem !important;
    font-size: .8125rem !important;
    border-radius: 0.25rem !important;
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
                            <h2 class="title">{{ ucwords($pageTitle) }}</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="/">Home</a>
                                </span>
                            <span>Form Application Response</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Page Title End-->

    <section class="ttm-row conatact-section clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title without-seperator title-style-center_text">
                        <div class="title-header">
                            <h3>Powermind's Form</h3>
                            <h2 class="title">Submit your application</h2>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-grey z-index-2 p-50 res-991-margin_top30 res-991-p-15">
                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                        <div class="layer-content">
                            <h3 class="text-center">
                                Your entry for <strong>{{ ucwords($form->name) }}</strong> was successfully submitted.
                            </h3>
                            <div class="card-footer text-center">
                                <p> {{ @$form->custom_description }}</p>
                                <div class="text-center pt-3">
                                    <a href="{{ route('career') }}" class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-dark margin_right4">
                                        <i class="fa fa-briefcase"></i> Career List
                                    </a>
                                    <a href="{{ url()->previous() }}" class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-dark margin_right4">
                                        <i class="fa fa-eye"></i> View Form
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            </div>
        </div>
    </section>
@endsection
