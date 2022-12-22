@extends('formbuilder::front_layout')
@section('title') {{ $pageTitle }} @endsection
@section('styles')
<style>
    .card-footer {
        background-color: transparent !important;
        border-top: none!important;
    }

    .rendered-form h1{
        font-size: 40px;
        line-height: 72px;
        margin-bottom: 0px!important;
    }

    .rendered-form input, .rendered-form textarea{
        background-color: #fff!important;
        color: rgba(0,0,0,.60)!important;
        border-color: #f1f1f1!important;
        border-radius: 5px!important;
        padding: 30px 15px!important;
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
                    <div class="col-lg-12">
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
                <button type="submit" class="btn btn-primary confirm-form" data-form="submitForm" data-message="Submit your entry for '{{ $form->name }}'?">
                    <i class="fa fa-submit"></i> Submit Form
                </button>
            </div>
        </form>
                            </div>
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
