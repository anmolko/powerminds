@extends('formbuilder::front_layout')
@section('title') {{ ucwords( $pageTitle ) }} @endsection
@section('styles')
<style>
    .card-footer {
        background-color: transparent !important;
        border-top: none!important;
    }

    .card-footer button{
        font-size: 13px!important;
        border-radius: 3px !important;
    }

    .rendered-form h1{
        font-size: 40px;
        line-height: 72px;
        margin-bottom: 0px!important;
    }

    .rendered-form input{
        background-color: #fff!important;
        color: rgba(0,0,0,.60)!important;
        border-color: #f1f1f1!important;
        border-radius: 5px!important;
        padding: 30px 15px!important;
    }
    .rendered-form input[type="file"]{
        background-color: #fff!important;
        color: rgba(0,0,0,.60)!important;
        border-color: #f1f1f1!important;
        border-radius: 5px!important;
        height: 60px!important;
        padding: 16px!important;
    }
    .rendered-form select{
        height: 60px!important;
        border: none!important;
    }
    .rendered-form textarea{
        background-color: #fff!important;
        color: rgba(0,0,0,.60)!important;
        border-color: #f1f1f1!important;
        border-radius: 5px!important;
        padding: 10px 15px!important;
        height: 122px!important;
    }


    .top_bar .social-icons {
        padding: 17px 8px !important;
    }
    .header_btn:before {
        position: absolute;
        content: "";
        left: -52px!important;
        top: -18px !important;
        border-bottom-width: 50px;
        border-bottom-style: solid;
        border-left: 35px solid transparent;
    }
    .ttm-bg.ttm-col-bgcolor-yes.ttm-right-span.ttm-bgcolor-skincolor.ttm-textcolor-white.mr-auto.margin_left50.padding_left15{
        padding: 1.1rem;
    }
    .copyright .social-icons li a{
        padding-top: 10px!important;
    }
</style>

@section('content')


        <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="page-title-heading">
                                <h2 class="title">{{ $pageTitle }}</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <i class="ti ti-home margin_right1"></i>
                                    <a title="Homepage" href="/">Home</a>
                                </span>
                                <span>Form Application</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-title end -->
        <!--- conatact-section -->
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
                                <form action="{{ route('formbuilder::form.submit', $form->identifier) }}" method="POST" id="submitForm" enctype="multipart/form-data">
                                    @csrf
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <strong class="sent-success">{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block">
                                            <strong class="error-sent">{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <div id="fb-render"></div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="submit ttm-btn ttm-btn-size-lg ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor w-100 confirm-form" data-form="submitForm" data-message="Submit your entry for '{{ $form->name }}'?">
                                            <i class="fa fa-submit"></i> Submit Form
                                        </button>
                                    </div>
                                </form>
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

@push(config('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ asset('vendor/formbuilder/js/render-form.js') }}{{ doode\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
