@extends('backend.layouts.master')
@section('title') Section Elements @endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/backend/plugins/dropzone/dropzone.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

    <style>
        .ck-editor__editable_inline {
            min-height: 450px !important;
        }
        .add-disabled{pointer-events: none; opacity: 0.7;}
        .icons-select {
            font-family: 'FontAwesome';
            font-weight: 500;
        }
        /*for tab*/
        li.button-5 a{
            color: #FFFFFF;
        }

        li.button-6 a{
            color: #000000;
        }

        .fade{
            display: none;
        }
        /*end for tab*/

        /*for image*/
        .avatar-upload{
            max-width: 505px!important;
        }

        .default-image{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        .word-count{
            padding: 10px 20px;
            margin-bottom: 15px;
            background: var(--ck-color-toolbar-background);
            border-left: 10px hsl(260deg 43% 53%) solid;
            box-shadow: 2px 2px 2px hsl(0deg 0% 0% / 10%);
        }

        .word-count .ck-word-count{
            font-size: 13px;
        }
        .ck-word-count .ck-word-count__words{
            display: inline-block;
            margin-right: 1em;
        }
        .ck-word-count .ck-word-count__characters{
            display: inline-block;
        }





        /*end for image*/

    </style>
@endsection
@section('content')



    <div class="page-content">
        <div class="container-fluid" style="position:relative;">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-soft-warning">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">
                                                        {{$page->name}}
                                                        - Page Section Details</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-smartphone-line align-bottom me-1"></i>
                                                            Current Status:- {{ucwords($page->status)}}
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div>
                                                            <i class="ri-user-5-line align-bottom me-1"></i>
                                                            <span class="fw-medium">
                                                                Created by :-  {{ucwords(\App\Models\User::find($page->created_by)->name)}}
                                                            </span>
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div>
                                                            <i class="ri-eye-line align-bottom me-1"></i>
                                                            <span class="fw-medium">
                                                                View in Frontend :-
                                                                <a href="{{route('page',$page->slug)}}" target="_blank">click me</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto" style="    margin-top: 1rem;">
                                        <div class="hstack gap-1 flex-wrap">
                                            <div class="d-sm-flex align-items-center justify-content-between">
                                                <div class="page-title-right">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                                        <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Pages</a></li>
                                                        <li class="breadcrumb-item active">{{str_replace('-',' ',ucwords(Request::segment(2)))}}</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    @php($i=0)
                                    @foreach(@$sections as $key=>$value)
                                        <li class="nav-item">
                                            <a class="nav-link  {{($i==0) ? 'active':''}} fw-semibold" data-bs-toggle="tab" href="#pills-{{$value}}"
                                               role="tab">
                                                {{ucfirst(str_replace('_',' ',$value))}}
                                            </a>
                                        </li>
                                        <?php $i++; ?>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        @php($j=0)
                        @foreach(@$sections as $key=>$value)
                            <div class="tab-pane fade {{($j==0) ? 'show active':''}}" id="pills-{{$value}}" role="tabpanel">
                                @if($value == 'basic_section')
                                @if($basic_elements !== null)
                                    {!! Form::open(['url'=>route('section-elements.update', @$basic_elements->id),'id'=>'basic-form','class'=>'needs-validation','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                @else
                                    {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'basic-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                @endif
                                    <figure class="figure">
                                        <figcaption>Output Sample.</figcaption>
                                        <img src="{{asset('assets/backend/img/page_sections/basic_section.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                    </figure>
                                <div class="row" id="basic-form-ajax">
                                    <div class="col-md-7">
                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">
                                                    Basic Section Details
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label>Heading <span class="text-muted text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="heading" value="{{@$basic_elements->heading}}" maxlength="30" required>
                                                    <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                    <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the basic section heading.
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Sub Heading </label>
                                                    <input type="text" class="form-control" maxlength="25" name="subheading" value="{{@$basic_elements->subheading}}">
                                                    <div class="invalid-feedback">
                                                        Please enter the basic section Sub heading.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Description <span class="text-muted text-danger">* write 1280 characters only</span></label>
                                                    <textarea class="form-control" maxlength="1280" rows="8" name="description" id="basic_editor" required>{!! @$basic_elements->description !!}</textarea>
                                                    <div class="invalid-feedback">
                                                        Please write the small summary for basic section.
                                                    </div>
{{--                                                        <div class="word-count" id="word-count"></div>--}}

                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Button Text </label>
                                                    <input type="text" maxlength="20" class="form-control" value="{{@$basic_elements->button}}" name="button">
                                                    <div class="invalid-feedback">
                                                        Please enter the button text.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Button Link </label>
                                                    <input type="text" class="form-control" value="{{@$basic_elements->button_link}}" name="button_link">
                                                    <div class="invalid-feedback">
                                                        Please enter the button link.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">
                                                    Basic Section Image <span class="text-muted text-danger">*</span>
                                                </h4>
                                            </div>
                                            <div class="card-body">

                                                <div>
                                                    <img  id="current-basic-img"  src="<?php if(!empty(@$basic_elements->image)){ echo '/images/section_elements/basic_section/'.@$basic_elements->image; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                    <input  type="file" accept="image/png, image/jpeg" hidden
                                                            id="basic-image" onchange="loadbasicFile('basic-image','current-basic-img',event)" name="image" {{(@$basic_elements->id !== null) ? "":"required" }}
                                                            class="profile-foreground-img-file-input" >

                                                    <figcaption class="figure-caption">Banner image for current basic section. (SIZE: 465 x 645px)</figcaption>
                                                    <div class="invalid-feedback" >
                                                        Please select a image.
                                                    </div>
                                                    <label for="basic-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                        <i class="ri-image-edit-line align-bottom me-1"></i> Add Basic Image
                                                    </label>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Image Alignment </label>
                                                    <select class="form-control shadow-none" name="list_image" id="list_image_align" required>
                                                        <option value disabled readonly> Select alignment</option>
                                                        <option value="left" {{(@$basic_elements->list_image == 'left') ? "selected":""}} selected> Left </option>
                                                        <option value="right"  {{(@$basic_elements->list_image == 'right') ? "selected":""}}> Right </option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select the image alignment.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3 mb-3" id="basic-form-button">
                                    <button id="basic-button-submit" type="submit" class="btn btn-success w-sm">
                                        {{(@$basic_elements !==null)? "Update Details":"Add Details"}}</button>
                                </div>
                                {!! Form::close() !!}
                            @endif

                                @if($value == 'directors_message')
                                        @if($directors_message !== null)
                                            {!! Form::open(['url'=>route('section-elements.update', @$directors_message->id),'id'=>'directors-form','class'=>'needs-validation','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                        @else
                                            {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'directors-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                        @endif
                                        <figure class="figure">
                                            <figcaption>Output Sample.</figcaption>
                                            <img src="{{asset('assets/backend/img/page_sections/directors_message.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                        </figure>
                                        <div class="row" id="directors-form-ajax">
                                            <div class="col-md-7">
                                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">
                                                            Directors Message Details
                                                        </h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group mb-3">
                                                            <label>Heading <span class="text-muted text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="heading" value="{{@$directors_message->heading}}" maxlength="40" required>
                                                            <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                            <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                            <div class="invalid-feedback">
                                                                Please enter the basic section heading.
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label>Subheading</label>
                                                            <input type="text" class="form-control" maxlength="35" name="subheading" value="{{@$directors_message->subheading}}">
                                                            <div class="invalid-feedback">
                                                                Please enter the basic section Sub heading.
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Name of Director</label>
                                                            <input type="text" class="form-control" maxlength="45" name="extra_heading" value="{{@$directors_message->extra_heading}}">
                                                            <figcaption class="figure-caption">*For example: Name of Director</figcaption>
                                                            <div class="invalid-feedback">
                                                                Please enter the basic section Sub heading.
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Message <span class="text-muted text-danger">*</span></label>
                                                            <textarea class="form-control" rows="6" name="description" maxlength="2000" id="director_editor" required>{!! @$directors_message->description !!}</textarea>
                                                            <div class="invalid-feedback">
                                                                Please write the message.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">
                                                            Directors Section Image <span class="text-muted text-danger">*</span>
                                                        </h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <label>Directors signature <span class="text-muted text-danger">*</span></label>

                                                        <div style="margin: auto; width: 50%;">
                                                            <img  id="current-director-sign-img"  src="<?php if(!empty(@$directors_message->extra_image)){ echo '/images/section_elements/basic_section/'.@$directors_message->extra_image; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                            <input  type="file" accept="image/png, image/jpeg" hidden
                                                                    id="director-sign-image" onchange="loadbasicFile('director-sign-image','current-director-sign-img',event)" name="extra_image" {{(@$directors_message->id !== null) ? "":"required" }}
                                                                    class="profile-foreground-img-file-input" >

                                                            <figcaption class="figure-caption">Image for current section.</figcaption>
                                                            <div class="invalid-feedback" >
                                                                Please select a image.
                                                            </div>
                                                            <label for="director-sign-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                                <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <img  id="current-director-img"  src="<?php if(!empty(@$directors_message->image)){ echo '/images/section_elements/basic_section/'.@$directors_message->image; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                            <input  type="file" accept="image/png, image/jpeg" hidden
                                                                    id="director-image" onchange="loadbasicFile('director-image','current-director-img',event)" name="image" {{(@$directors_message->id !== null) ? "":"required" }}
                                                                    class="profile-foreground-img-file-input" >

                                                            <figcaption class="figure-caption">Image for current section. (SIZE: 595 x 785px)</figcaption>
                                                            <div class="invalid-feedback" >
                                                                Please select a image.
                                                            </div>
                                                            <label for="director-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                                <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3 mb-3" id="directors-form-button">
                                            <button id="basic-button-submit" type="submit" class="btn btn-success w-sm">
                                                {{(@$directors_message !==null)? "Update Details":"Add Details"}}</button>
                                        </div>
                                        {!! Form::close() !!}
                                    @endif

                                 @if($value == 'basic_section2')
                                        @if($basic_elements2 !== null)
                                            {!! Form::open(['url'=>route('section-elements.update', @$basic_elements2->id),'id'=>'basic2-form','class'=>'needs-validation','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                        @else
                                            {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'basic2-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                        @endif
                                            <figure class="figure">
                                                <figcaption>Output Sample.</figcaption>
                                                <img src="{{asset('assets/backend/img/page_sections/basic_section2.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                            </figure>
                                        <div class="row" id="basic2-form-ajax">
                                            <div class="col-md-6">
                                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">
                                                            Basic Section 2 Details
                                                        </h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group mb-3">
                                                            <label>Heading <span class="text-muted text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="heading" value="{{@$basic_elements2->heading}}" maxlength="45" required>
                                                            <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                            <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                            <div class="invalid-feedback">
                                                                Please enter the basic section 2 heading.
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label>Sub Heading </label>
                                                            <input type="text" class="form-control" maxlength="35" name="subheading" value="{{@$basic_elements2->subheading}}">
                                                            <div class="invalid-feedback">
                                                                Please enter the basic section 2 Sub heading.
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Description <span class="text-muted text-danger">* write 650 characters only</span></label>
                                                            <textarea class="form-control" maxlength="650" rows="8" name="description" id="basic_editor2" required>{!! @$basic_elements2->description !!}</textarea>
                                                            <div class="invalid-feedback">
                                                                Please write the small summary for basic section.
                                                            </div>
                                                            {{--                                                        <div class="word-count" id="word-count"></div>--}}

                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Button Text </label>
                                                            <input type="text" maxlength="20" class="form-control" value="{{@$basic_elements2->button}}" name="button">
                                                            <div class="invalid-feedback">
                                                                Please enter the button text.
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Button Link </label>
                                                            <input type="text" class="form-control" value="{{@$basic_elements2->button_link}}" name="button_link">
                                                            <div class="invalid-feedback">
                                                                Please enter the button link.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">
                                                            Basic Section 2 Image <span class="text-muted text-danger">*</span>
                                                        </h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div style="margin: auto; width: 50%">
                                                            <img  id="current-basic2-img"  src="<?php if(!empty(@$basic_elements2->image)){ echo '/images/section_elements/basic_section/'.@$basic_elements2->image; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                            <input  type="file" accept="image/png, image/jpeg" hidden
                                                                    id="basic2-image" onchange="loadbasicFile('basic2-image','current-basic2-img',event)" name="image" {{(@$basic_elements2->id !== null) ? "":"required" }}
                                                                    class="profile-foreground-img-file-input" >

                                                            <figcaption class="figure-caption">Image size: 505 x 480px </figcaption>
                                                            <div class="invalid-feedback" >
                                                                Please select a image.
                                                            </div>
                                                            <label for="basic2-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                                <i class="ri-image-edit-line align-bottom me-1"></i> Add Image 1
                                                            </label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group mb-3">
                                                                    <label> Fact 1 </label>
                                                                    <input type="text" maxlength="30" class="form-control" value="{{@$basic_elements2->list_header}}" name="list_header">
                                                                    <div class="invalid-feedback">
                                                                        Please enter the fact 1.
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label>Fact 2 </label>
                                                                    <input type="text" maxlength="30" class="form-control" value="{{@$basic_elements2->extra_link}}" name="extra_link">
                                                                    <div class="invalid-feedback">
                                                                        Please enter the fact 2.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group mb-3">
                                                                    <label>Fact 1 number </label>
                                                                    <input type="number" min="0" class="form-control" value="{{@$basic_elements2->extra_heading}}" name="extra_heading">
                                                                    <div class="invalid-feedback">
                                                                        Please enter the fact 1.
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label> Fact 2 number</label>
                                                                    <input type="number" min="0" class="form-control" value="{{@$basic_elements2->extra_button}}" name="extra_button">
                                                                    <div class="invalid-feedback">
                                                                        Please enter the fact 2.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3 mb-3" id="basic2-form-button">
                                            <button id="basic2-button-submit" type="submit" class="btn btn-success w-sm">
                                                {{(@$basic_elements2 !==null)? "Update Details":"Add Details"}}</button>
                                        </div>
                                        {!! Form::close() !!}
                                    @endif

                                 @if($value == 'map_and_description')
                                     @if($map_descp !== null)
                                         {!! Form::open(['url'=>route('section-elements.update', @$map_descp->id),'id'=>'map-descrip-form','class'=>'needs-validation','method'=>'PUT','novalidate'=>'']) !!}
                                     @else
                                         {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'map-descrip-form','novalidate'=>'']) !!}
                                     @endif
                                         <figure class="figure">
                                             <figcaption>Output Sample.</figcaption>
                                             <img src="{{asset('assets/backend/img/page_sections/map_and_description.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                         </figure>
                                     <div class="row" id="map-descrip-form-ajax">
                                         <div class="col-md-12">
                                             <div class="card ctm-border-radius shadow-sm flex-fill">
                                                 <div class="card-header">
                                                     <h4 class="card-title mb-0">
                                                         Map and Description Details
                                                     </h4>
                                                 </div>
                                                 <div class="card-body">
                                                     <div class="form-group mb-3">
                                                         <label>Heading <span class="text-muted text-danger">*</span></label>
                                                         <input type="text" class="form-control" name="heading" value="{{@$map_descp->heading}}" maxlength="45" required>
                                                         <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                         <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                         <div class="invalid-feedback">
                                                             Please enter the basic section heading.
                                                         </div>
                                                     </div>

                                                     <div class="form-group mb-3">
                                                         <label>Subheading</label>
                                                         <input type="text" maxlength="20" class="form-control" value="{{@$map_descp->subheading}}" name="subheading">
                                                         <div class="invalid-feedback">
                                                             Please enter the sub heading.
                                                         </div>
                                                     </div>

                                                     <div class="form-group mb-3">
                                                         <label>Description <span class="text-muted text-danger">*</span></label>
                                                         <textarea class="form-control" maxlength="850" rows="6" name="description" required>{{@$map_descp->description}}</textarea>
                                                         <div class="invalid-feedback">
                                                             Please enter the description.
                                                         </div>
                                                     </div>

                                                     <div class="form-group mb-3">
                                                         <label>Button Text </label>
                                                         <input type="text" maxlength="35" class="form-control" value="{{@$map_descp->button}}" name="button">
                                                         <div class="invalid-feedback">
                                                             Please enter the button text.
                                                         </div>
                                                     </div>
                                                     <div class="form-group mb-3">
                                                         <label>Button Link </label>
                                                         <input type="text" class="form-control" value="{{@$map_descp->button_link}}" name="button_link">
                                                         <div class="invalid-feedback">
                                                             Please enter the button link.
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="text-center mt-3 mb-3" id="map-descrip-form-button">
                                         <button id="map-descrip-form-submit" class="btn btn-success w-sm">
                                             {{(@$map_descp !==null)? "Update Details":"Add Details"}}</button>
                                     </div>
                                     {!! Form::close() !!}
                                 @endif

                                 @if($value == 'call_to_action_1')
                                     @if($call1_elements !== null)
                                         {!! Form::open(['url'=>route('section-elements.update', @$call1_elements->id),'id'=>'call-action1-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT']) !!}
                                     @else
                                         {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'call-action1-form','novalidate'=>'']) !!}
                                     @endif
                                     <figure class="figure">
                                             <figcaption>Output Sample.</figcaption>
                                             <img src="{{asset('assets/backend/img/page_sections/calltoaction.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                         </figure>
                                     <div class="row" id="call-action1-form-ajax">
                                         <div class="col-md-12">
                                             <div class="card ctm-border-radius shadow-sm flex-fill">
                                                 <div class="card-header">
                                                     <h4 class="card-title mb-0">
                                                         Call to action: Option 1 Details
                                                     </h4>
                                                 </div>
                                                 <div class="card-body">
                                                     <div class="form-group mb-3">
                                                         <label>Heading <span class="text-muted text-danger">*</span></label>
                                                         <input type="text" class="form-control" maxlength="40" name="heading" value="{{@$call1_elements->heading}}" required>
                                                         <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                         <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                         <div class="invalid-feedback">
                                                             Please enter the call action section heading.
                                                         </div>
                                                     </div>
                                                     <div class="form-group mb-3">
                                                         <label>Small Description</label>
                                                         <input type="text" maxlength="100" class="form-control" value="{{@$call1_elements->description}}" name="description" required>
                                                         <div class="invalid-feedback">
                                                             Please enter the call action description.
                                                         </div>
                                                     </div>
                                                     <div class="form-group mb-3">
                                                         <label>Button Text </label>
                                                         <input type="text" maxlength="20" class="form-control" value="{{@$call1_elements->button}}" name="button">
                                                         <div class="invalid-feedback">
                                                             Please enter the button text.
                                                         </div>
                                                     </div>
                                                     <div class="form-group mb-3">
                                                         <label>Button Link </label>
                                                         <input type="text" class="form-control" value="{{@$call1_elements->button_link}}" name="button_link">
                                                         <div class="invalid-feedback">
                                                             Please enter the button link.
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="text-center mt-3 mb-3" id="call-action1-form-button">
                                         <button id="call-action-button-submit" class="btn btn-success w-sm">
                                             {{(@$call1_elements !==null)? "Update Details":"Add Details"}}
                                         </button>
                                     </div>
                                     {!! Form::close() !!}

                                 @endif

                                 @if($value == 'call_to_action_2')
                                        @if($call2_elements !== null)
                                            {!! Form::open(['url'=>route('section-elements.update', @$call2_elements->id),'id'=>'call-action2-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                                        @else
                                            {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'call-action2-form','novalidate'=>'']) !!}
                                        @endif
                                            <figure class="figure">
                                                <figcaption>Output Sample.</figcaption>
                                                <img src="{{asset('assets/backend/img/page_sections/calltoaction2.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                            </figure>
                                        <div class="row" id="call-action2-form-ajax">
                                            <div class="col-md-12">
                                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">
                                                            Call to action: Option 2 Details
                                                        </h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group mb-3">
                                                            <label>Subheading <span class="text-muted text-danger">*</span></label>
                                                            <input type="text" class="form-control" maxlength="40" name="subheading" value="{{@$call2_elements->subheading}}" required>
                                                            <div class="invalid-feedback">
                                                                Please enter box 1 heading.
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Heading <span class="text-muted text-danger">*</span></label>
                                                            <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                            <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                            <input type="text" class="form-control" maxlength="80" name="heading" value="{{@$call2_elements->heading}}" required>
                                                            <div class="invalid-feedback">
                                                                Please enter the call action section heading.
                                                            </div>
                                                        </div>


                                                        <div class="form-group mb-3">
                                                            <label>Button</label>
                                                            <input type="text" class="form-control" maxlength="25" value="{{@$call2_elements->button}}" name="button">
                                                            <div class="invalid-feedback">
                                                                Please enter the box 1 link
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Button Link </label>
                                                            <input type="text" class="form-control" value="{{@$call2_elements->button_link}}" name="button_link">
                                                            <div class="invalid-feedback">
                                                                Please enter the button link.
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Video Link (youtube/vimeo) <span class="text-muted text-danger">*</span></label>

                                                            <input type="text" class="form-control" name="description" value="{{@$call2_elements->description}}">
                                                            <div class="invalid-feedback">
                                                                Please enter the video link
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3 mb-3" id="call-action2-form-button">
                                            <button id="call-action2-button-submit" class="btn btn-success w-sm">
                                                {{(@$call2_elements !==null)? "Update Details":"Add Details"}}
                                            </button>
                                        </div>
                                        {!! Form::close() !!}

                                    @endif

                                 @if($value == 'background_image_section')
                                        @if($bgimage_elements !== null)
                                            {!! Form::open(['url'=>route('section-elements.update', @$bgimage_elements->id),'id'=>'background-image-form','class'=>'needs-validation','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                        @else
                                            {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'background-image-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                        @endif
                                            <figure class="figure">
                                                <figcaption>Output Sample.</figcaption>
                                                <img src="{{asset('assets/backend/img/page_sections/background_image_section.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                            </figure>

                                            <div id="background-image-form-ajax">
                                                 <div class="row">
                                                     <div class="col-md-8">
                                                         <div class="card ctm-border-radius shadow-sm flex-fill">
                                                             <div class="card-header">
                                                                 <h4 class="card-title mb-0">
                                                                     Background Image Section Details
                                                                 </h4>
                                                             </div>
                                                             <div class="card-body">
                                                                 <div class="form-group mb-3">
                                                                     <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                     <input type="text" maxlength="30" class="form-control" name="heading" value="{{@$bgimage_elements->heading}}" required>
                                                                     <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                                     <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                                     <div class="invalid-feedback">
                                                                         Please enter the Background Image Section heading.
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group mb-3">
                                                                     <label>Sub Heading </label>
                                                                     <input type="text" class="form-control" maxlength="30" name="subheading" value="{{@$bgimage_elements->subheading}}">
                                                                     <div class="invalid-feedback">
                                                                         Please enter the section Sub heading.
                                                                     </div>
                                                                 </div>
                                                                 <div class="position-relative mb-3">
                                                                     <label class="form-label">First section: Heading 1 <span class="text-muted text-danger">*</span></label>
                                                                     <input type="text" class="form-control" maxlength="30" name="list_image" value="{{@$bgimage_elements->list_image}}"
                                                                            placeholder="Enter heading " required>
                                                                     <div class="invalid-feedback">
                                                                         Please enter the heading.
                                                                     </div>
                                                                 </div>
                                                                 <div class="position-relative mb-3">
                                                                     <label class="form-label">First section: Description 1 <span class="text-muted text-danger">*</span></label>
                                                                     <textarea class="form-control" maxlength="400" name="description" placeholder="Enter description" rows="4" required>{{@$bgimage_elements->description}}</textarea>
                                                                     <div class="invalid-tooltip">
                                                                         Please enter the description.
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="col-md-4">
                                                         <div class="card ctm-border-radius shadow-sm flex-fill">
                                                             <div class="card-header">
                                                                 <h4 class="card-title mb-0">
                                                                     Background Image Section's Image <span class="text-muted text-danger">*</span>
                                                                 </h4>
                                                             </div>
                                                             <div class="card-body">
                                                                 <div>
                                                                     <img  id="current-backgroundss-img"  src="<?php if(!empty(@$bgimage_elements->image)){ echo '/images/section_elements/bgimage_section/'.@$bgimage_elements->image; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                                     <input  type="file" accept="image/png, image/jpeg" hidden
                                                                             id="background-image" onchange="loadbasicFile('background-image','current-backgroundss-img',event)" name="image"
                                                                             class="profile-foreground-img-file-input" >

                                                                     <figcaption class="figure-caption">Banner image for current background section. (SIZE: 1900 x 930px)</figcaption>
                                                                     <div class="invalid-feedback" >
                                                                         Please select a image.
                                                                     </div>
                                                                     <label for="background-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                                         <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                                                     </label>
                                                                 </div>

                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-6">
                                                        <div class="nosticky-side-div">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="card-title mb-0">Second Section</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="position-relative mb-3">
                                                                        <label class="form-label">Heading 2 <span class="text-muted text-danger">*</span></label>
                                                                        <input type="text" class="form-control" maxlength="30" name="list_header" value="{{@$bgimage_elements->list_header}}"
                                                                               placeholder="Enter heading " required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the heading.
                                                                        </div>
                                                                    </div>
                                                                    <div class="position-relative mb-3">
                                                                        <label class="form-label"> Description 2 <span class="text-muted text-danger">*</span></label>
                                                                        <textarea class="form-control" maxlength="400" name="list_description" placeholder="Enter description" rows="4" required>{{@$bgimage_elements->list_description}}</textarea>
                                                                        <div class="invalid-tooltip">
                                                                            Please enter the description.
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- end card body -->
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="nosticky-side-div">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="card-title mb-0">Third Section</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="position-relative mb-3">
                                                                        <label class="form-label">Heading 3 <span class="text-muted text-danger">*</span></label>
                                                                        <input type="text" class="form-control" maxlength="30" name="extra_heading" value="{{@$bgimage_elements->extra_heading}}"
                                                                               placeholder="Enter heading " required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the heading.
                                                                        </div>
                                                                    </div>
                                                                    <div class="position-relative mb-3">
                                                                        <label class="form-label"> Description 3 <span class="text-muted text-danger">*</span></label>
                                                                        <textarea class="form-control" maxlength="400" name="extra_description" placeholder="Enter description" rows="4" required>{{@$bgimage_elements->extra_description}}</textarea>
                                                                        <div class="invalid-tooltip">
                                                                            Please enter the description.
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- end card body -->
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                     <div class="text-center  mb-3" id="background-image-form-button">
                                         <button id="background-button-submit" class="btn btn-success w-sm">
                                             {{(@$bgimage_elements !==null)? "Update Details":"Add Details"}}</button>
                                     </div>
                                     {!! Form::close() !!}

                                 @endif

                                 @if($value == 'flash_cards')
                                     @if(sizeof($flash_elements) !== 0)
                                         {!! Form::open(['route' => 'section-elements.tablistUpdate','method'=>'post','class'=>'needs-validation','id'=>'flash-card-form','novalidate'=>'']) !!}

                                     @else
                                         {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'flash-card-form','novalidate'=>'']) !!}
                                     @endif
                                         <figure class="figure">
                                             <figcaption>Output Sample.</figcaption>
                                             <img src="{{asset('assets/backend/img/page_sections/mission_vision.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                         </figure>

                                         <div id="flash-card-form-ajax">
                                         <div class="col-md-12">
                                             <div class="card ctm-border-radius shadow-sm flex-fill">
                                                 <div class="card-header">
                                                     <h4 class="card-title mb-0">
                                                         Header Details
                                                     </h4>
                                                 </div>
                                                 <div class="card-body">
                                                     <div class="form-group mb-3">
                                                         <label>Heading </label>
                                                         <input type="text" class="form-control" name="heading[]" value="{{@$flash_elements[0]->heading}}" maxlength="40">
                                                         <div class="invalid-feedback">
                                                             Please enter the heading.
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="accordion add-tab-section1-details" id="accordion-details">
                                             <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-success" id="accordionBordered2">

                                                 <div class="accordion-item">
                                                     <h2 class="accordion-header" id="processelect-heading-mission">
                                                         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapse3" aria-expanded="true" aria-controls="accor_borderedExamplecollapse3">
                                                            Card 1
                                                         </button>
                                                     </h2>
                                                     <div id="accor_borderedExamplecollapse3" class="accordion-collapse collapse show" aria-labelledby="processelect-heading-mission" data-bs-parent="#accordionBordered2">
                                                         <div class="accordion-body">
                                                             <div class="row">
                                                                 <div class="col-md-12">

                                                                     <div class="form-group mb-3">
                                                                         <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                         <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                                         <input type="hidden" class="form-control" value="{{@$flash_elements[0]->id}}" name="id[]">
                                                                         <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                                         <input type="text" class="form-control" maxlength="25" name="list_header[]" value="{{@$flash_elements[0]->list_header}}" required>
                                                                         <div class="invalid-feedback">
                                                                             Please enter the card 1 heading.
                                                                         </div>
                                                                     </div>
                                                                     <div class="form-group mb-3">
                                                                         <label>Description <span class="text-muted text-danger">*</span></label>
                                                                         <textarea class="form-control" maxlength="500" rows="6" name="list_description[]" required>{{@$flash_elements[0]->list_description}}</textarea>
                                                                         <div class="invalid-feedback">
                                                                             Please write the card 1 description.
                                                                         </div>
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="accordion-item">
                                                     <h2 class="accordion-header" id="processelect-heading-vision">
                                                         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapse4" aria-expanded="false" aria-controls="accor_borderedExamplecollapse4">
                                                             Card 2
                                                         </button>
                                                     </h2>
                                                     <div id="accor_borderedExamplecollapse4" class="accordion-collapse collapse" aria-labelledby="processelect-heading-vision" data-bs-parent="#accordionBordered2">
                                                         <div class="accordion-body">
                                                             <div class="row">
                                                                 <div class="col-md-12">
                                                                     <div class="form-group mb-3">
                                                                         <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                         <input type="hidden" class="form-control" value="{{@$flash_elements[1]->id}}" name="id[]">
                                                                         <input type="text" class="form-control" maxlength="25" name="list_header[]" value="{{@$flash_elements[1]->list_header}}" required>
                                                                         <div class="invalid-feedback">
                                                                             Please enter the card 1 heading.
                                                                         </div>
                                                                     </div>
                                                                     <div class="form-group mb-3">
                                                                         <label>Description <span class="text-muted text-danger">*</span></label>
                                                                         <textarea class="form-control" maxlength="500" rows="6" name="list_description[]" required>{{@$flash_elements[1]->list_description}}</textarea>
                                                                         <div class="invalid-feedback">
                                                                             Please write the card 1 description.
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="accordion-item">
                                                     <h2 class="accordion-header" id="processelect-heading-values">
                                                         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapse5" aria-expanded="false" aria-controls="accor_borderedExamplecollapse5">
                                                             Card 3
                                                         </button>
                                                     </h2>
                                                     <div id="accor_borderedExamplecollapse5" class="accordion-collapse collapse" aria-labelledby="processelect-heading-values" data-bs-parent="#accordionBordered2">
                                                         <div class="accordion-body">
                                                             <div class="row">

                                                                 <div class="col-md-12">

                                                                     <div class="form-group mb-3">
                                                                         <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                         <input type="hidden" class="form-control" value="{{@$flash_elements[2]->id}}" name="id[]">
                                                                         <input type="text" class="form-control" maxlength="25" name="list_header[]" value="{{@$flash_elements[2]->list_header}}" required>
                                                                         <div class="invalid-feedback">
                                                                             Please enter the card 3 heading.
                                                                         </div>
                                                                     </div>
                                                                     <div class="form-group mb-3">
                                                                         <label>Description <span class="text-muted text-danger">*</span></label>
                                                                         <textarea class="form-control" rows="6" maxlength="500" name="list_description[]" required>{{@$flash_elements[2]->list_description}}</textarea>
                                                                         <div class="invalid-feedback">
                                                                             Please write the card 3 description.
                                                                         </div>
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>



                                         </div>
                                     </div>
                                     <div class="text-center mt-3 mb-3" id="flash-card-form-button">
                                         <button id="tab1-button-submit" class="btn btn-success w-sm">{{(sizeof(@$flash_elements) !== 0) ? "Update Details":"Add Details"}}</button>
                                     </div>
                                     {!! Form::close() !!}
                                 @endif

                                 @if($value == 'simple_header_and_description')
                                     @if($header_descp_elements !== null)
                                         {!! Form::open(['url'=>route('section-elements.update', @$header_descp_elements->id),'id'=>'header-descp-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT']) !!}
                                     @else
                                         {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'header-descp-form','novalidate'=>'']) !!}
                                     @endif
                                         <figure class="figure">
                                             <figcaption>Output Sample.</figcaption>
                                             <img src="{{asset('assets/backend/img/page_sections/simple_header_descp.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                         </figure>

                                     <div class="row" id="header-descp-form-ajax">
                                         <div class="col-md-12">
                                             <div class="card ctm-border-radius shadow-sm flex-fill">
                                                 <div class="card-header">
                                                     <h4 class="card-title mb-0">
                                                         Simple Header Description Details
                                                     </h4>
                                                 </div>
                                                 <div class="card-body">
                                                     <div class="form-group mb-3">
                                                         <label>Heading </label>
                                                         <input type="text" maxlength="60" class="form-control" value="{{@$header_descp_elements->heading}}" name="heading">
                                                         <div class="invalid-feedback">
                                                             Please enter the heading.
                                                         </div>
                                                     </div>
                                                     <div class="form-group mb-3">
                                                         <label>Description <span class="text-muted text-danger">*</span></label>
                                                         <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                         <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                         <textarea class="form-control" rows="6" name="description" id="task-textarea" required>{{@$header_descp_elements->description}}</textarea>
                                                         <div class="invalid-feedback">
                                                             Please write the description for section.
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="text-center mt-3 mb-3" id="header-descp-form-button">
                                         <button id="call-action-button-submit" class="btn btn-success w-sm">
                                             {{(@$header_descp_elements !==null)? "Update Details":"Add Details"}}
                                         </button>
                                     </div>
                                     {!! Form::close() !!}

                                 @endif

                                 @if($value == 'accordion_section')
                                     @if(sizeof($accordian2_elements) !== 0)
                                         {!! Form::open(['route' => 'section-elements.tablistUpdate','method'=>'post','class'=>'needs-validation','id'=>'accordion2-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                     @else
                                         {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'accordion2-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                     @endif
                                         <figure class="figure">
                                             <figcaption>Output Sample.</figcaption>
                                             <img src="{{asset('assets/backend/img/page_sections/simple_accordian_tab2.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                         </figure>

                                         <div id="accordion2-form-ajax">
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <div class="card ctm-border-radius shadow-sm flex-fill">
                                                     <div class="card-header">
                                                         <h4 class="card-title mb-0">
                                                             Accordion Header Details
                                                         </h4>
                                                     </div>
                                                     <div class="card-body">
                                                         <div class="form-group mb-3">
                                                             <label>Heading <span class="text-muted text-danger">*</span></label>
                                                             <input type="text" class="form-control" maxlength="25" name="heading[]" value="{{@$accordian2_elements[0]->heading}}" required>
                                                             <div class="invalid-feedback">
                                                                 Please enter the heading.
                                                             </div>
                                                         </div>
                                                         <div class="form-group mb-3">
                                                             <label>Sub Heading <span class="text-muted text-danger">*</span></label>
                                                             <input type="text" class="form-control" maxlength="40" name="subheading[]" value="{{@$accordian2_elements[0]->subheading}}">
                                                             <div class="invalid-feedback">
                                                                 Please enter the sub heading.
                                                             </div>
                                                         </div>
                                                         <div class="form-group mb-3">
                                                             <label>Description <span class="text-muted text-danger">*</span></label>
                                                             <textarea class="form-control" rows="6" maxlength="130" name="description[]">{{@$accordian2_elements[0]->description}}</textarea>
                                                             <div class="invalid-feedback">
                                                                 Please enter the description.
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>


                                         <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-success" id="accordionBordered5">
                                             <input type="hidden" class="form-control" value="{{@$accordian2_elements}}" name="accordion2_elements">
                                             @for ($i = 1; $i <=$list_2; $i++)

                                                 <div class="accordion-item">
                                                     <h2 class="accordion-header" id="accordian-heading-{{$i}}">
                                                         <button class="accordion-button {{($i==1) ? '':'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapse_{{$i}}" aria-expanded="{{($i==1) ? 'true':'false'}}" aria-controls="accor_borderedExamplecollapse_{{$i}}">
                                                             Box {{$i}} details
                                                         </button>
                                                     </h2>
                                                     <div id="accor_borderedExamplecollapse_{{$i}}" class="accordion-collapse collapse {{($i==1) ? 'show':''}} " aria-labelledby="accordian-heading-{{$i}}" data-bs-parent="#accordionBordered5">
                                                         <div class="accordion-body">
                                                             <div class="row">
                                                                 <div class="col-md-12">
                                                                     <div class="form-group mb-3">
                                                                         <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                         <input type="hidden" class="form-control" value="{{$key}}"    name="page_section_id" required>
                                                                         <input type="hidden" class="form-control" value="{{$value}}"  name="section_name" required>
                                                                         <input type="hidden" class="form-control" value="{{$list_2}}" name="list_number_2" required>
                                                                         <input type="hidden" class="form-control" value="{{@$accordian2_elements[$i-1]->id}}" name="id[]">
                                                                         <input type="text" class="form-control" maxlength="50" name="list_header[]" value="{{@$accordian2_elements[$i-1]->list_header}}" required>
                                                                         <div class="invalid-feedback">
                                                                             Please enter the heading.
                                                                         </div>
                                                                     </div>
                                                                     <div class="form-group mb-3">
                                                                         <label>Description <span class="text-muted text-danger">*</span></label>
                                                                         <textarea class="form-control" rows="6" name="list_description[]" id="accordian_two_editor_{{$i}}" required>{{@$accordian2_elements[$i-1]->list_description}}</textarea>
                                                                         <div class="invalid-feedback">
                                                                             Please write the description.
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             @endfor

                                         </div>
                                     </div>
                                     <div class="text-center mt-3 mb-3" id="accordion2-form-button">
                                         <button id="list2-button-submit" class="btn btn-success w-sm">{{(sizeof(@$accordian2_elements) !== 0) ? "Update Details":"Add Details"}}</button>
                                     </div>
                                     {!! Form::close() !!}
                                 @endif

                                @if($value == 'video_section')
                                        @if(sizeof($video_section_elements) !== 0)
                                            {!! Form::open(['route' => 'section-elements.tablistUpdate','method'=>'post','class'=>'needs-validation','id'=>'video-section-form','novalidate'=>'']) !!}
                                        @else
                                            {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'video-section-form','novalidate'=>'']) !!}
                                        @endif

                                        <div class="row" id="video-section-form-ajax">
                                            <input type="hidden" class="form-control" value="{{@$video_section_elements}}" name="video_elements">

                                            <div class="col-md-12">
                                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">
                                                            Video section details
                                                        </h4>
                                                        <p class="text-danger text-sm">*Please enter the full url as shown below: </p>
                                                        <p class="text-info text-sm"> 1. https://www.youtube.com/watch?v=ly939bnZUrE (youtube) <br/> 2. https://vimeo.com/687802653 (vimeo)</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                        <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>

                                                        <div id="multi-field-wrapper">

                                                            @if(count($video_section_elements)>0)
                                                                <div id="multi-fields">
                                                                    @foreach($video_section_elements as $key=>$value)
                                                                        <div class="multi-field custom-card" style="border-bottom: double #e3e3e3; margin-bottom: 1rem ">
                                                                            <label>Video Type </label>
                                                                            <div class="input-group mb-3">
                                                                                <select class="form-control shadow-none" name="heading[]" id="header_0" required>
                                                                                    <option value disabled readonly> Select Video Type</option>
                                                                                    <option value="youtube" {{($value->heading == 'youtube') ? "selected":""}}> YouTube </option>
                                                                                    <option value="vimeo"  {{($value->heading == 'vimeo') ? "selected":""}}> Vimeo </option>
                                                                                </select>
                                                                                <button class="btn btn-danger remove-field"><i class="ri-delete-bin-line" aria-hidden="true"></i></button>
                                                                                <div class="invalid-feedback">
                                                                                    Please select the video type.
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3 attribute-values" id="addValues">
                                                                                <div class="col-md-12 col-6">
                                                                                    <label>Video Link </label>
                                                                                    <input type="url" class="form-control" name="description[]" value="{{$value->description}}" required/>
                                                                                    <input type="hidden" class="form-control" name="id[]" value="{{$value->id}}"/>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter the link.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <div id="multi-fields">
                                                                    <div class="multi-field custom-card" style="border-bottom: double #e3e3e3; ">
                                                                        <label>Video Type </label>
                                                                        <div class="input-group mb-3">
                                                                            <select class="form-control shadow-none" name="heading[]" id="header_0" required>
                                                                                <option value disabled readonly selected> Select Video Type</option>
                                                                                <option value="youtube"> YouTube </option>
                                                                                <option value="vimeo"> Vimeo </option>
                                                                            </select>
                                                                            <button class="btn btn-danger remove-field"><i class="ri-delete-bin-line" aria-hidden="true"></i></button>
                                                                        </div>
                                                                        <div class="row mb-3 attribute-values" id="addValues">
                                                                            <div class="col-md-12 col-6">
                                                                                <label>Video Link </label>
                                                                                <input type="url" class="form-control" name="description[]" required/>
                                                                                <div class="invalid-feedback">
                                                                                    Please enter the link.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endif
                                                                <div class="text-end mt-3 mb-3">
                                                                    <a href="javascript:void(0)" class="btn btn-warning btn-sm" id="add-field"><i class="fa fa-copy"></i> Add More </a>
                                                                </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3" id="video-section-form-button">
                                            <button id="video-section-form-submit" class="btn btn-success w-sm mb-4">
                                                {{(@$video_section_elements !==null)? "Update Details":"Add Details"}}
                                            </button>
                                        </div>
                                        {!! Form::close() !!}

                                    @endif

                                @if($value == 'image_description_list')
                                     @if(sizeof($slider_list_elements) !== 0)
                                         {!! Form::open(['route' => 'section-elements.tablistUpdate','method'=>'post','class'=>'needs-validation','id'=>'slider-list-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                     @else
                                         {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'slider-list-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                     @endif
                                         <figure class="figure">
                                             <figcaption>Output Sample.</figcaption>
                                             <img src="{{asset('assets/backend/img/page_sections/image_description_list.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                         </figure>
                                     <div id="slider-list-form-ajax">
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <div class="card ctm-border-radius shadow-sm flex-fill">
                                                     <div class="card-header">
                                                         <h4 class="card-title mb-0">
                                                             General Details
                                                         </h4>
                                                     </div>
                                                     <div class="card-body">
                                                         <div class="form-group mb-3">
                                                             <label>Heading </label>
                                                             <input type="text" class="form-control" maxlength="40" name="heading[]" value="{{@$slider_list_elements[0]->heading}}">
                                                             <div class="invalid-feedback">
                                                                 Please enter the heading.
                                                             </div>
                                                         </div>
                                                         <div class="form-group mb-3">
                                                             <label>Sub Heading </label>
                                                             <input type="text" class="form-control" name="subheading[]" maxlength="30" value="{{@$slider_list_elements[0]->subheading}}">
                                                             <div class="invalid-feedback">
                                                                 Please enter the sub heading.
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>


                                         <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-success" id="accordionBordered11">
                                             <input type="hidden" class="form-control" value="{{@$slider_list_elements}}" name="slider_list_elements">

                                             @for ($i = 1; $i <=$list_3; $i++)

                                                 <div class="accordion-item">
                                                     <h2 class="accordion-header" id="slider-lists-{{$i}}">
                                                         <button class="accordion-button {{($i==1) ? '':'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapsedd_{{$i}}" aria-expanded="{{($i==1) ? 'true':'false'}}" aria-controls="accor_borderedExamplecollapsedd_{{$i}}">
                                                             List {{$i}} details
                                                         </button>
                                                     </h2>
                                                     <div id="accor_borderedExamplecollapsedd_{{$i}}" class="accordion-collapse collapse {{($i==1) ? 'show':''}} " aria-labelledby="slider-lists-{{$i}}" data-bs-parent="#accordionBordered11">
                                                         <div class="accordion-body">
                                                             <div class="row">
                                                                 <div class="col-md-7">

                                                                     <div class="form-group mb-3">
                                                                         <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                         <input type="hidden" class="form-control" value="{{$key}}"    name="page_section_id" required>
                                                                         <input type="hidden" class="form-control" value="{{$value}}"  name="section_name" required>
                                                                         <input type="hidden" class="form-control" value="{{$list_3}}" name="list_number_3" required>
                                                                         <input type="hidden" class="form-control" value="{{@$slider_list_elements[$i-1]->id}}" name="id[]">
                                                                         <input type="text" class="form-control" name="list_header[]" id="slider_title_{{$i-1}}" onkeyup="slugMaker('slider_title_{{$i-1}}','slider_slug_{{$i-1}}')" value="{{@$slider_list_elements[$i-1]->list_header}}"  required>
                                                                         <div class="invalid-feedback">
                                                                             Please enter the heading.
                                                                         </div>
                                                                     </div>
                                                                     <div class="form-group mb-3">
                                                                         <label>Description </label>
                                                                         <textarea class="form-control" rows="6" name="list_description[]" id="image_description_list_editor_{{$i}}" >{{@$slider_list_elements[$i-1]->list_description}}</textarea>
                                                                         <span class="ctm-text-sm">Please write the description</span>
                                                                         <div class="invalid-feedback">
                                                                             Please write the long description.
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                 <div class="col-md-5">
                                                                     <div>
                                                                         <img  id="current-sliderlist-{{$i}}-img"  src="<?php if(!empty(@$slider_list_elements[$i-1]->list_image)){ echo '/images/section_elements/list_1/'.@$slider_list_elements[$i-1]->list_image; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                                         <input  type="file" accept="image/png, image/jpeg" hidden
                                                                                 id="sliderlist-{{$i}}-image" onchange="loadbasicFile('sliderlist-{{$i}}-image','current-sliderlist-{{$i}}-img',event)" name="list_image[]" {{(@$slider_list_elements[$i-1]->id !== null) ? "":"required" }}
                                                                                 class="profile-foreground-img-file-input" >

                                                                         <figcaption class="figure-caption">Image. (SIZE: 350px X 235px)</figcaption>
                                                                         <div class="invalid-feedback" >
                                                                             Please select a image.
                                                                         </div>
                                                                         <label for="sliderlist-{{$i}}-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                                             <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                                                         </label>
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             @endfor

                                         </div>

                                     </div>
                                     <div class="text-center mt-3 mb-3" id="slider-list-form-button">
                                         <button id="process-button-submit" class="btn btn-success w-sm">{{(sizeof(@$slider_list_elements) !== 0) ? "Update Details":"Add Details"}}</button>
                                     </div>
                                     {!! Form::close() !!}

                                 @endif

                                @if($value == 'gallery_section')
                                     <div class="row">
                                         <div class="col-md-12">
                                             <div class="card ctm-border-radius shadow-sm flex-fill">
                                                 <div class="card-header">
                                                     <h4 class="card-title mb-0">
                                                         Add image to gallery section
                                                     </h4>
                                                     <p class="text-danger">Note* Please add the images in the multiplication of 3 (like 3, 6, 9) for perfect design  </p>
                                                 </div>
                                                 <div class="card-body">
                                                     <h2 class="page-heading">Upload your Images <span id="counter"></span></h2>
                                                     <div class="invalid-feedback">    </div>
                                                     <script type="text/javascript">
                                                         var page_section_id = "{{$key}}";
                                                     </script>
                                                     {!! Form::open(['url'=>route('section-elements-gallery.update', @$key),'method'=>'PUT','class'=>'dropzone','id'=>'myDropzone','enctype'=>'multipart/form-data']) !!}
                                                     <div class="dz-message">
                                                         <div class="col-xs-8">
                                                             <div class="">
                                                                 <p>Drop files here or Click to Upload</p>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="fallback">
                                                         <input name="file" type="file" multiple />
                                                     </div>

                                                     {!! Form::close() !!}


                                                     <div id="preview" style="display: none;">

                                                         <div class="dz-preview dz-file-preview">
                                                             <div class="dz-image"><img data-dz-thumbnail /></div>

                                                             <div class="dz-details">
                                                                 <div class="dz-size"><span data-dz-size></span></div>
                                                                 <div class="dz-filename"><span data-dz-name></span></div>
                                                             </div>
                                                             <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                                             <div class="dz-error-message"><span data-dz-errormessage></span></div>


                                                             <div class="dz-success-mark">

                                                                 <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                                     <title>Check</title>
                                                                     <desc>Created with Sketch.</desc>
                                                                     <defs></defs>
                                                                     <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                                                         <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                                                                     </g>
                                                                 </svg>

                                                             </div>
                                                             <div class="dz-error-mark">

                                                                 <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                                     <title>error</title>
                                                                     <desc>Created with Sketch.</desc>
                                                                     <defs></defs>
                                                                     <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                                                         <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                                                             <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                                                                         </g>
                                                                     </g>
                                                                 </svg>
                                                             </div>
                                                         </div>
                                                     </div>
{{--                                                     End of Dropzone Preview Template--}}

                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                 @endif

                                @if($value == 'simple_tab')
                                    @if(sizeof($process_elements) !== 0)
                                        {!! Form::open(['route' => 'section-elements.tablistUpdate','method'=>'post','class'=>'needs-validation','id'=>'process-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                    @else
                                        {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'process-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                    @endif
                                        <figure class="figure">
                                            <figcaption>Output Sample.</figcaption>
                                            <img src="{{asset('assets/backend/img/page_sections/simple_tab.png')}}"  class="figure-img img-fluid rounded" alt="...">
                                        </figure>
                                    <div id="process-form-ajax">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0">
                                                            General Details
                                                        </h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group mb-3">
                                                            <label>Heading <span class="text-muted text-danger">*</span></label>
                                                            <input type="text" class="form-control" maxlength="35" name="heading[]" value="{{@$process_elements[0]->heading}}" required>
                                                            <div class="invalid-feedback">
                                                                Please enter the heading.
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Sub Heading </label>
                                                            <input type="text" class="form-control" name="subheading[]" maxlength="25" value="{{@$process_elements[0]->subheading}}" >
                                                            <div class="invalid-feedback">
                                                                Please enter the sub heading.
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Description </label>
                                                            <textarea class="form-control" maxlength="140" rows="8" name="description[]">{{@$process_elements[0]->description}}</textarea>
                                                            <div class="invalid-feedback">
                                                                Please write the description.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-success" id="accordionBordered">
                                            <input type="hidden" class="form-control" value="{{@$process_elements}}" name="process_list_elements">

                                            @for ($i = 1; $i <=$process_num; $i++)

                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="processelect-heading-{{$i}}">
                                                            <button class="accordion-button {{($i==1) ? '':'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapse{{$i}}" aria-expanded="{{($i==1) ? 'true':'false'}}" aria-controls="accor_borderedExamplecollapse{{$i}}">
                                                                Box {{$i}} details
                                                            </button>
                                                        </h2>
                                                        <div id="accor_borderedExamplecollapse{{$i}}" class="accordion-collapse collapse {{($i==1) ? 'show':''}} " aria-labelledby="processelect-heading-{{$i}}" data-bs-parent="#accordionBordered">
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label>Heading </label>
                                                                            <input type="hidden" class="form-control" value="{{$key}}"    name="page_section_id" required>
                                                                            <input type="hidden" class="form-control" value="{{$value}}"  name="section_name" required>
                                                                            <input type="hidden" class="form-control" value="{{$process_num}}" name="list_number_3_process_num" required>
                                                                            <input type="hidden" class="form-control" value="{{@$process_elements[$i-1]->id}}" name="id[]">
                                                                            <input type="text" class="form-control" name="list_header[]" maxlength="30" value="{{@$process_elements[$i-1]->list_header}}" >
                                                                            <div class="invalid-feedback">
                                                                                Please enter the heading.
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3">
                                                                            <select class="form-control shadow-none icons-select" name="list_image[]" id="list_image" required>
                                                                                <option value disabled readonly> Select Icons</option>
                                                                                <option value="address-book" {{(@$process_elements[$i-1]->list_image == 'address-book') ? "selected":""}}>&#xf2b9; Address book</option>
                                                                                <option value='address-book-o' {{(@$process_elements[$i-1]->list_image == 'address-book-o') ? "selected":""}}>&#xf2ba; Address book Light</option>
                                                                                <option value="address-card" {{(@$process_elements[$i-1]->list_image == 'address-card') ? "selected":""}}>&#xf2bb; Address card</option>
                                                                                <option value='address-card-o' {{(@$process_elements[$i-1]->list_image == 'address-card-o') ? "selected":""}}>&#xf2bc; Address Card Light</option>
                                                                                <option value='adjust' {{(@$process_elements[$i-1]->list_image == 'adjust') ? "selected":""}}>&#xf042; Adjust</option>
                                                                                <option value='adn' {{(@$process_elements[$i-1]->list_image == 'adn') ? "selected":""}}>&#xf170; Adn</option>
                                                                                <option value='align-center' {{(@$process_elements[$i-1]->list_image == 'align-center') ? "selected":""}}>&#xf037; Align Center</option>
                                                                                <option value='align-justify' {{(@$process_elements[$i-1]->list_image == 'align-justify') ? "selected":""}}>&#xf039; Align Justify</option>
                                                                                <option value='align-left' {{(@$process_elements[$i-1]->list_image == 'align-left') ? "selected":""}}>&#xf036; Align Left</option>
                                                                                <option value='align-right' {{(@$process_elements[$i-1]->list_image == 'align-right') ? "selected":""}}>&#xf038; Align Right</option>
                                                                                <option value='amazon' {{(@$process_elements[$i-1]->list_image == 'amazon') ? "selected":""}}>&#xf270; Amazon</option>
                                                                                <option value='ambulance' {{(@$process_elements[$i-1]->list_image == 'ambulance') ? "selected":""}}>&#xf0f9; Ambulance</option>
                                                                                <option value='american-sign-language-interpreting' {{(@$process_elements[$i-1]->list_image == 'merican-sign-language-interpreting') ? "selected":""}}>&#xf2a3; American Sign Language Interpreting</option>
                                                                                <option value='anchor' {{(@$process_elements[$i-1]->list_image == 'anchor') ? "selected":""}}>&#xf13d; Anchor</option>
                                                                                <option value='android' {{(@$process_elements[$i-1]->list_image == 'android') ? "selected":""}}>&#xf17b; Android</option>
                                                                                <option value='angellist' {{(@$process_elements[$i-1]->list_image == 'angellist') ? "selected":""}}>&#xf209; Angellist</option>
                                                                                <option value='angle-double-down' {{(@$process_elements[$i-1]->list_image == 'angle-double-down') ? "selected":""}}>&#xf103; Angle Double Down</option>
                                                                                <option value='angle-double-left' {{(@$process_elements[$i-1]->list_image == 'angle-double-left') ? "selected":""}}>&#xf100; Angle Double Left</option>
                                                                                <option value='angle-double-right' {{(@$process_elements[$i-1]->list_image == 'angle-double-right') ? "selected":""}}>&#xf101; Angle Double Right</option>
                                                                                <option value='angle-double-up' {{(@$process_elements[$i-1]->list_image == 'angle-double-up') ? "selected":""}}>&#xf102; Angle Double Up</option>
                                                                                <option value='angle-down' {{(@$process_elements[$i-1]->list_image == 'angle-down') ? "selected":""}}>&#xf107; Angle Down</option>
                                                                                <option value='angle-left' {{(@$process_elements[$i-1]->list_image == 'angle-left') ? "selected":""}}>&#xf104; Angle Left</option>
                                                                                <option value='angle-right' {{(@$process_elements[$i-1]->list_image == 'angle-right') ? "selected":""}}>&#xf105; Angle Right</option>
                                                                                <option value='angle-up' {{(@$process_elements[$i-1]->list_image == 'angle-up') ? "selected":""}}>&#xf106; Angle Up</option>
                                                                                <option value='apple' {{(@$process_elements[$i-1]->list_image == 'apple') ? "selected":""}}>&#xf179; Apple</option>
                                                                                <option value='archive' {{(@$process_elements[$i-1]->list_image == 'archive') ? "selected":""}}>&#xf187; Archive</option>
                                                                                <option value='area-chart' {{(@$process_elements[$i-1]->list_image == 'area-chart') ? "selected":""}}>&#xf1fe; Area-chart</option>
                                                                                <option value='arrow-circle-down' {{(@$process_elements[$i-1]->list_image == 'arrow-circle-down') ? "selected":""}}>&#xf0ab; Arrow Circle Down</option>
                                                                                <option value='arrow-circle-left' {{(@$process_elements[$i-1]->list_image == 'arrow-circle-left') ? "selected":""}}>&#xf0a8; Arrow Circle Left</option>
                                                                                <option value='arrow-circle-o-down' {{(@$process_elements[$i-1]->list_image == 'arrow-circle-o-down') ? "selected":""}}>&#xf01a; Arrow Circle O Down</option>
                                                                                <option value='arrow-circle-o-left' {{(@$process_elements[$i-1]->list_image == 'arrow-circle-o-left') ? "selected":""}}>&#xf190; Arrow Circle O Left</option>
                                                                                <option value='arrow-circle-o-right' {{(@$process_elements[$i-1]->list_image == 'arrow-circle-o-right') ? "selected":""}}>&#xf18e; Arrow Circle O Right</option>
                                                                                <option value='arrow-circle-o-up' {{(@$process_elements[$i-1]->list_image == 'arrow-circle-o-up') ? "selected":""}}>&#xf01b; Arrow Circle O Up</option>
                                                                                <option value='arrow-circle-right' {{(@$process_elements[$i-1]->list_image == 'arrow-circle-right') ? "selected":""}}>&#xf0a9; Arrow Circle Right</option>
                                                                                <option value='arrow-circle-up' {{(@$process_elements[$i-1]->list_image == 'arrow-circle-up') ? "selected":""}}>&#xf0aa; Arrow Circle Up</option>
                                                                                <option value='arrow-down' {{(@$process_elements[$i-1]->list_image == 'arrow-down') ? "selected":""}}>&#xf063; Arrow Down</option>
                                                                                <option value='arrow-left' {{(@$process_elements[$i-1]->list_image == 'arrow-left') ? "selected":""}}>&#xf060; Arrow Left</option>
                                                                                <option value='arrow-right' {{(@$process_elements[$i-1]->list_image == 'arrow-right') ? "selected":""}}>&#xf061; Arrow Right</option>
                                                                                <option value='arrow-up' {{(@$process_elements[$i-1]->list_image == 'arrow-up') ? "selected":""}}>&#xf062; Arrow Up</option>
                                                                                <option value='arrows' {{(@$process_elements[$i-1]->list_image == 'arrows') ? "selected":""}}>&#xf047; Arrows</option>
                                                                                <option value='arrows-alt' {{(@$process_elements[$i-1]->list_image == 'arrows-alt') ? "selected":""}}>&#xf0b2; Arrows Alt</option>
                                                                                <option value='arrows-h' {{(@$process_elements[$i-1]->list_image == 'arrows-h') ? "selected":""}}>&#xf07e; Arrows H</option>
                                                                                <option value='arrows-v' {{(@$process_elements[$i-1]->list_image == 'arrows-v') ? "selected":""}}>&#xf07d; Arrows V</option>
                                                                                <option value='asl-interpreting' {{(@$process_elements[$i-1]->list_image == 'asl-interpreting') ? "selected":""}}>&#xf2a3; Asl Interpreting</option>
                                                                                <option value='assistive-listening-systems' {{(@$process_elements[$i-1]->list_image == 'assistive-listening-systems') ? "selected":""}}>&#xf2a2; Assistive Listening Systems</option>
                                                                                <option value='asterisk' {{(@$process_elements[$i-1]->list_image == 'asterisk') ? "selected":""}}>&#xf069; Asterisk</option>
                                                                                <option value='at' {{(@$process_elements[$i-1]->list_image == 'at') ? "selected":""}}>&#xf1fa; At</option>
                                                                                <option value='audio-description' {{(@$process_elements[$i-1]->list_image == 'audio-description') ? "selected":""}}>&#xf29e; Audio Description</option>
                                                                                <option value='automobile' {{(@$process_elements[$i-1]->list_image == 'automobile') ? "selected":""}}>&#xf1b9; Automobile</option>

                                                                                <option value='backward' {{(@$process_elements[$i-1]->list_image == 'backward') ? "selected":""}}>&#xf04a; Backward</option>
                                                                                <option value='balance-scale' {{(@$process_elements[$i-1]->list_image == 'balance-scale') ? "selected":""}}>&#xf24e; Balance Scale</option>
                                                                                <option value='ban' {{(@$process_elements[$i-1]->list_image == 'ban') ? "selected":""}}>&#xf05e; Ban</option>
                                                                                <option value='bandcamp' {{(@$process_elements[$i-1]->list_image == 'bandcamp') ? "selected":""}}>&#xf2d5; Bandcamp</option>
                                                                                <option value='bank' {{(@$process_elements[$i-1]->list_image == 'bank') ? "selected":""}}>&#xf19c; Bank</option>
                                                                                <option value='bar-chart' {{(@$process_elements[$i-1]->list_image == 'bar-chart') ? "selected":""}}>&#xf080; Bar Chart</option>
                                                                                <option value='bar-chart-o' {{(@$process_elements[$i-1]->list_image == 'bar-chart-o') ? "selected":""}}>&#xf080; Bar Chart O</option>
                                                                                <option value='barcode' {{(@$process_elements[$i-1]->list_image == 'barcode') ? "selected":""}}>&#xf02a; barcode</option>
                                                                                <option value='bars' {{(@$process_elements[$i-1]->list_image == 'bars') ? "selected":""}}>&#xf0c9; bars</option>
                                                                                <option value='bath' {{(@$process_elements[$i-1]->list_image == 'bath') ? "selected":""}}>&#xf2cd; bath</option>
                                                                                <option value='bathtub' {{(@$process_elements[$i-1]->list_image == 'bathtub') ? "selected":""}}>&#xf2cd; bathtub</option>
                                                                                <option value='battery' {{(@$process_elements[$i-1]->list_image == 'battery') ? "selected":""}}>&#xf240; battery</option>
                                                                                <option value='battery-0' {{(@$process_elements[$i-1]->list_image == 'battery-0') ? "selected":""}}>&#xf244; battery 0</option>
                                                                                <option value='battery-1' {{(@$process_elements[$i-1]->list_image == 'battery-1') ? "selected":""}}>&#xf243; battery 1</option>
                                                                                <option value='battery-2' {{(@$process_elements[$i-1]->list_image == 'battery-2') ? "selected":""}}>&#xf242; battery 2</option>
                                                                                <option value='battery-3' {{(@$process_elements[$i-1]->list_image == 'battery-3') ? "selected":""}}>&#xf241; battery 3</option>
                                                                                <option value='battery-4' {{(@$process_elements[$i-1]->list_image == 'battery-4') ? "selected":""}}>&#xf240; battery 4</option>
                                                                                <option value='battery-empty' {{(@$process_elements[$i-1]->list_image == 'battery-empty') ? "selected":""}}>&#xf244; battery empty</option>
                                                                                <option value='battery-full' {{(@$process_elements[$i-1]->list_image == 'battery-full') ? "selected":""}}>&#xf240; battery full</option>
                                                                                <option value='battery-half' {{(@$process_elements[$i-1]->list_image == 'battery-half') ? "selected":""}}>&#xf242; battery half</option>
                                                                                <option value='battery-quarter' {{(@$process_elements[$i-1]->list_image == 'battery-quarter') ? "selected":""}}>&#xf243; battery quarter</option>
                                                                                <option value='battery-three-quarters' {{(@$process_elements[$i-1]->list_image == 'battery-three-quarters') ? "selected":""}}>&#xf241; battery three quarters</option>
                                                                                <option value='bed' {{(@$process_elements[$i-1]->list_image == 'bed') ? "selected":""}}>&#xf236; bed</option>
                                                                                <option value='beer' {{(@$process_elements[$i-1]->list_image == 'beer') ? "selected":""}}>&#xf0fc; beer</option>
                                                                                <option value='behance' {{(@$process_elements[$i-1]->list_image == 'behance') ? "selected":""}}>&#xf1b4; behance</option>
                                                                                <option value='behance-square' {{(@$process_elements[$i-1]->list_image == 'behance-square') ? "selected":""}}>&#xf1b5; behance square</option>
                                                                                <option value='bell' {{(@$process_elements[$i-1]->list_image == 'bell') ? "selected":""}}>&#xf0f3; bell</option>
                                                                                <option value='bell-o' {{(@$process_elements[$i-1]->list_image == 'bell-o') ? "selected":""}}>&#xf0a2; bell o</option>
                                                                                <option value='bell-slash' {{(@$process_elements[$i-1]->list_image == 'bell-slash') ? "selected":""}}>&#xf1f6; bell slash</option>
                                                                                <option value='bell-slash-o' {{(@$process_elements[$i-1]->list_image == 'bell-slash-o') ? "selected":""}}>&#xf1f7; bell slash o</option>
                                                                                <option value='bicycle' {{(@$process_elements[$i-1]->list_image == 'bicycle') ? "selected":""}}>&#xf206; bicycle</option>
                                                                                <option value='binoculars' {{(@$process_elements[$i-1]->list_image == 'binoculars') ? "selected":""}}>&#xf1e5; binoculars</option>
                                                                                <option value='birthday-cake' {{(@$process_elements[$i-1]->list_image == 'birthday-cake') ? "selected":""}}>&#xf1fd; birthday cake</option>
                                                                                <option value='bitbucket' {{(@$process_elements[$i-1]->list_image == 'bitbucket') ? "selected":""}}>&#xf171; bitbucket</option>
                                                                                <option value='bitbucket-square' {{(@$process_elements[$i-1]->list_image == 'bitbucket-square') ? "selected":""}}>&#xf172; bitbucket square</option>
                                                                                <option value='bitcoin' {{(@$process_elements[$i-1]->list_image == 'bitcoin') ? "selected":""}}>&#xf15a; bitcoin</option>
                                                                                <option value='black-tie' {{(@$process_elements[$i-1]->list_image == 'black-tie') ? "selected":""}}>&#xf27e; black-tie</option>
                                                                                <option value='blind' {{(@$process_elements[$i-1]->list_image == 'blind') ? "selected":""}}>&#xf29d; blind</option>
                                                                                <option value='bluetooth' {{(@$process_elements[$i-1]->list_image == 'bluetooth') ? "selected":""}}>&#xf293; bluetooth</option>
                                                                                <option value='bluetooth-b' {{(@$process_elements[$i-1]->list_image == 'bluetooth-b') ? "selected":""}}>&#xf294; bluetooth b</option>
                                                                                <option value='bold' {{(@$process_elements[$i-1]->list_image == 'bold') ? "selected":""}}>&#xf032; bold</option>
                                                                                <option value='bolt' {{(@$process_elements[$i-1]->list_image == 'bolt') ? "selected":""}}>&#xf0e7; bolt</option>
                                                                                <option value='bomb' {{(@$process_elements[$i-1]->list_image == 'bomb') ? "selected":""}}>&#xf1e2; bomb</option>
                                                                                <option value='book' {{(@$process_elements[$i-1]->list_image == 'book') ? "selected":""}}>&#xf02d; book</option>
                                                                                <option value='bookmark' {{(@$process_elements[$i-1]->list_image == 'bookmark') ? "selected":""}}>&#xf02e; bookmark</option>
                                                                                <option value='bookmark-o' {{(@$process_elements[$i-1]->list_image == 'bookmark-o') ? "selected":""}}>&#xf097; bookmark o</option>
                                                                                <option value='braille' {{(@$process_elements[$i-1]->list_image == 'braille') ? "selected":""}}>&#xf2a1; braille</option>
                                                                                <option value='briefcase' {{(@$process_elements[$i-1]->list_image == 'briefcase') ? "selected":""}}>&#xf0b1; briefcase</option>
                                                                                <option value='btc' {{(@$process_elements[$i-1]->list_image == 'btc') ? "selected":""}}>&#xf15a; btc</option>
                                                                                <option value='bug' {{(@$process_elements[$i-1]->list_image == 'bug') ? "selected":""}}>&#xf188; bug</option>
                                                                                <option value='building' {{(@$process_elements[$i-1]->list_image == 'building') ? "selected":""}}>&#xf1ad; building</option>
                                                                                <option value='building-o' {{(@$process_elements[$i-1]->list_image == 'building-o') ? "selected":""}}>&#xf0f7; building o</option>
                                                                                <option value='bullhorn' {{(@$process_elements[$i-1]->list_image == 'bullhorn') ? "selected":""}}>&#xf0a1; bullhorn</option>
                                                                                <option value='bullseye' {{(@$process_elements[$i-1]->list_image == 'bullseye') ? "selected":""}}>&#xf140; bullseye</option>
                                                                                <option value='bus' {{(@$process_elements[$i-1]->list_image == 'bus') ? "selected":""}}>&#xf207; bus</option>
                                                                                <option value='buysellads' {{(@$process_elements[$i-1]->list_image == 'buysellads') ? "selected":""}}>&#xf20d; buysellads</option>


                                                                                <option value='cab' {{(@$process_elements[$i-1]->list_image == 'cab') ? "selected":""}}>&#xf1ba; cab</option>
                                                                                <option value='calculator' {{(@$process_elements[$i-1]->list_image == 'calculator') ? "selected":""}}>&#xf1ec; calculator</option>
                                                                                <option value="calendar" {{(@$process_elements[$i-1]->list_image == 'calendar') ? "selected":""}}>&#xf133; Calendar</option>
                                                                                <option value="calendar-alt" {{(@$process_elements[$i-1]->list_image == 'calendar-alt') ? "selected":""}}>&#xf073; calendar alt</option>
                                                                                <option value="calendar-check" {{(@$process_elements[$i-1]->list_image == 'calendar-check') ? "selected":""}}>&#xf274; Calendar check</option>
                                                                                <option value="calendar-minus" {{(@$process_elements[$i-1]->list_image == 'calendar-minus') ? "selected":""}}>&#xf272; calendar minus</option>
                                                                                <option value="calendar-plus" {{(@$process_elements[$i-1]->list_image == 'calendar-plus') ? "selected":""}}>&#xf271; Calendar plus</option>
                                                                                <option value="calendar-times" {{(@$process_elements[$i-1]->list_image == 'calendar-times') ? "selected":""}}>&#xf273; Calendar times</option>
                                                                                <option value='camera' {{(@$process_elements[$i-1]->list_image == 'camera') ? "selected":""}}>&#xf030; camera</option>
                                                                                <option value='camera-retro' {{(@$process_elements[$i-1]->list_image == 'camera-retro') ? "selected":""}}>&#xf083; camera retro</option>
                                                                                <option value='car' {{(@$process_elements[$i-1]->list_image == 'car') ? "selected":""}}>&#xf1b9; car</option>
                                                                                <option value='caret-down' {{(@$process_elements[$i-1]->list_image == 'caret-down') ? "selected":""}}>&#xf0d7; caret down</option>
                                                                                <option value='caret-left' {{(@$process_elements[$i-1]->list_image == 'caret-left') ? "selected":""}}>&#xf0d9; caret left</option>
                                                                                <option value='caret-right' {{(@$process_elements[$i-1]->list_image == 'caret-right') ? "selected":""}}>&#xf0da; caret right</option>
                                                                                <option value='caret-up' {{(@$process_elements[$i-1]->list_image == 'caret-up') ? "selected":""}}>&#xf0d8; caret up</option>
                                                                                <option value="caret-square-down" {{(@$process_elements[$i-1]->list_image == 'caret-square-down') ? "selected":""}}>&#xf150; Caret square down</option>
                                                                                <option value="caret-square-left" {{(@$process_elements[$i-1]->list_image == 'caret-square-left') ? "selected":""}}>&#xf191; caret square left</option>
                                                                                <option value="caret-square-right" {{(@$process_elements[$i-1]->list_image == 'caret-square-right') ? "selected":""}}>&#xf152; Caret square right</option>
                                                                                <option value="caret-square-up" {{(@$process_elements[$i-1]->list_image == 'caret-square-up') ? "selected":""}}>&#xf151; Caret square up</option>
                                                                                <option value='cart-arrow-down' {{(@$process_elements[$i-1]->list_image == 'cart-arrow-down') ? "selected":""}}>&#xf218; cart arrow down</option>
                                                                                <option value='cart-plus' {{(@$process_elements[$i-1]->list_image == 'cart-plus') ? "selected":""}}>&#xf217; cart plus</option>
                                                                                <option value='cc' {{(@$process_elements[$i-1]->list_image == 'cc') ? "selected":""}}>&#xf20a; cc</option>
                                                                                <option value='cc-amex' {{(@$process_elements[$i-1]->list_image == 'cc-amex') ? "selected":""}}>&#xf1f3; cc amex</option>
                                                                                <option value='cc-diners-club' {{(@$process_elements[$i-1]->list_image == 'cc-diners-club') ? "selected":""}}>&#xf24c; cc diners club</option>
                                                                                <option value='cc-discover' {{(@$process_elements[$i-1]->list_image == 'cc-discover') ? "selected":""}}>&#xf1f2; cc discover</option>
                                                                                <option value='cc-jcb' {{(@$process_elements[$i-1]->list_image == 'cc-jcb') ? "selected":""}}>&#xf24b; cc jcb</option>
                                                                                <option value='cc-mastercard' {{(@$process_elements[$i-1]->list_image == 'cc-mastercard') ? "selected":""}}>&#xf1f1; cc mastercard</option>
                                                                                <option value='cc-paypal' {{(@$process_elements[$i-1]->list_image == 'cc-paypal') ? "selected":""}}>&#xf1f4; cc paypal</option>
                                                                                <option value='cc-stripe' {{(@$process_elements[$i-1]->list_image == 'cc-stripe') ? "selected":""}}>&#xf1f5; cc stripe</option>
                                                                                <option value='cc-visa' {{(@$process_elements[$i-1]->list_image == 'cc-visa') ? "selected":""}}>&#xf1f0; cc visa</option>
                                                                                <option value='certificate' {{(@$process_elements[$i-1]->list_image == 'certificate') ? "selected":""}}>&#xf0a3; certificate</option>
                                                                                <option value='chain' {{(@$process_elements[$i-1]->list_image == 'chain') ? "selected":""}}>&#xf0c1; chain</option>
                                                                                <option value='chain-broken' {{(@$process_elements[$i-1]->list_image == 'chain-broken') ? "selected":""}}>&#xf127; chain broken</option>
                                                                                <option value="chart-bar" {{(@$process_elements[$i-1]->list_image == 'chart-bar') ? "selected":""}}>&#xf080; Chart bar</option>
                                                                                <option value='check' {{(@$process_elements[$i-1]->list_image == 'check') ? "selected":""}}>&#xf00c; check</option>
                                                                                <option value="check-circle" {{(@$process_elements[$i-1]->list_image == 'check-circle') ? "selected":""}}>&#xf058; Check circle</option>
                                                                                <option value='check-circle-o' {{(@$process_elements[$i-1]->list_image == 'check-circle-o') ? "selected":""}}>&#xf05d; check circle o</option>
                                                                                <option value="check-square" {{(@$process_elements[$i-1]->list_image == 'check-square') ? "selected":""}}>&#xf14a; Check square</option>
                                                                                <option value='check-square-o' {{(@$process_elements[$i-1]->list_image == 'check-square-o') ? "selected":""}}>&#xf046; check square o</option>
                                                                                <option value='chevron-circle-down' {{(@$process_elements[$i-1]->list_image == 'chevron-circle-down') ? "selected":""}}>&#xf13a; chevron circle down</option>
                                                                                <option value='chevron-circle-left' {{(@$process_elements[$i-1]->list_image == 'chevron-circle-left') ? "selected":""}}>&#xf137; chevron circle left</option>
                                                                                <option value='chevron-circle-right' {{(@$process_elements[$i-1]->list_image == 'chevron-circle-right') ? "selected":""}}>&#xf138; chevron circle right</option>
                                                                                <option value='chevron-circle-up' {{(@$process_elements[$i-1]->list_image == 'chevron-circle-up') ? "selected":""}}>&#xf139; chevron circle up</option>
                                                                                <option value='chevron-down' {{(@$process_elements[$i-1]->list_image == 'chevron-down') ? "selected":""}}>&#xf078; chevron down</option>
                                                                                <option value='chevron-left' {{(@$process_elements[$i-1]->list_image == 'chevron-left') ? "selected":""}}>&#xf053; chevron left</option>
                                                                                <option value='chevron-right' {{(@$process_elements[$i-1]->list_image == 'chevron-right') ? "selected":""}}>&#xf054; chevron right</option>
                                                                                <option value='chevron-up' {{(@$process_elements[$i-1]->list_image == 'chevron-up') ? "selected":""}}>&#xf077; chevron up</option>
                                                                                <option value='child' {{(@$process_elements[$i-1]->list_image == 'child') ? "selected":""}}>&#xf1ae; child</option>
                                                                                <option value='chrome' {{(@$process_elements[$i-1]->list_image == 'chrome') ? "selected":""}}>&#xf268; chrome</option>
                                                                                <option value="circle" {{(@$process_elements[$i-1]->list_image == 'circle') ? "selected":""}}>&#xf111; Circle</option>
                                                                                <option value='circle-o' {{(@$process_elements[$i-1]->list_image == 'circle-o') ? "selected":""}}>&#xf10c; circle o</option>
                                                                                <option value='circle-o-notch' {{(@$process_elements[$i-1]->list_image == 'circle-o-notch') ? "selected":""}}>&#xf1ce; circle o notch</option>
                                                                                <option value='circle-thin' {{(@$process_elements[$i-1]->list_image == 'circle-thin') ? "selected":""}}>&#xf1db; circle thin</option>
                                                                                <option value='clipboard' {{(@$process_elements[$i-1]->list_image == 'clipboard') ? "selected":""}}>&#xf0ea; clipboard</option>
                                                                                <option value="clock" {{(@$process_elements[$i-1]->list_image == 'clock') ? "selected":""}}>&#xf017; Clock</option>
                                                                                <option value="clone" {{(@$process_elements[$i-1]->list_image == 'clone') ? "selected":""}}>&#xf24d; Clone</option>
                                                                                <option value='close' {{(@$process_elements[$i-1]->list_image == 'close') ? "selected":""}}>&#xf00d; close</option>
                                                                                <option value="closed-captioning" {{(@$process_elements[$i-1]->list_image == 'closed-captioning') ? "selected":""}}>&#xf20a; Closed captioning</option>
                                                                                <option value='cloud' {{(@$process_elements[$i-1]->list_image == 'cloud') ? "selected":""}}>&#xf0c2; cloud</option>
                                                                                <option value='cloud-download' {{(@$process_elements[$i-1]->list_image == 'cloud-download') ? "selected":""}}>&#xf0ed; cloud download</option>
                                                                                <option value='cloud-upload' {{(@$process_elements[$i-1]->list_image == 'cloud-upload') ? "selected":""}}>&#xf0ee; cloud upload</option>
                                                                                <option value='cny' {{(@$process_elements[$i-1]->list_image == 'cny') ? "selected":""}}>&#xf157; cny</option>
                                                                                <option value='code' {{(@$process_elements[$i-1]->list_image == 'code') ? "selected":""}}>&#xf121; code</option>
                                                                                <option value='code-fork' {{(@$process_elements[$i-1]->list_image == 'code-fork') ? "selected":""}}>&#xf126; code fork</option>
                                                                                <option value='codiepie' {{(@$process_elements[$i-1]->list_image == 'codiepie') ? "selected":""}}>&#xf284; codiepie</option>
                                                                                <option value='coffee' {{(@$process_elements[$i-1]->list_image == 'coffee') ? "selected":""}}>&#xf0f4; coffee</option>
                                                                                <option value='cog' {{(@$process_elements[$i-1]->list_image == 'cog') ? "selected":""}}>&#xf013; cog</option>
                                                                                <option value='cogs' {{(@$process_elements[$i-1]->list_image == 'cogs') ? "selected":""}}>&#xf085; cogs</option>
                                                                                <option value='columns' {{(@$process_elements[$i-1]->list_image == 'columns') ? "selected":""}}>&#xf0db; columns</option>
                                                                                <option value="comment" {{(@$process_elements[$i-1]->list_image == 'comment') ? "selected":""}}>&#xf075; Comment</option>
                                                                                <option value='comment-o' {{(@$process_elements[$i-1]->list_image == 'comment-o') ? "selected":""}}>&#xf0e5; comment o</option>
                                                                                <option value="comment-alt" {{(@$process_elements[$i-1]->list_image == 'comment-alt') ? "selected":""}}>&#xf27a; Comment alt</option>
                                                                                <option value='commenting-o' {{(@$process_elements[$i-1]->list_image == 'commenting-o') ? "selected":""}}>&#xf27b; commenting o</option>
                                                                                <option value="comments" {{(@$process_elements[$i-1]->list_image == 'comments') ? "selected":""}}>&#xf086; Comments</option>
                                                                                <option value='comments-o' {{(@$process_elements[$i-1]->list_image == 'comments-o') ? "selected":""}}>&#xf0e6; comments o</option>
                                                                                <option value="compass" {{(@$process_elements[$i-1]->list_image == 'compass') ? "selected":""}}>&#xf14e; Compass</option>
                                                                                <option value='compress' {{(@$process_elements[$i-1]->list_image == 'compress') ? "selected":""}}>&#xf066; compress</option>
                                                                                <option value='connectdevelop' {{(@$process_elements[$i-1]->list_image == 'connectdevelop') ? "selected":""}}>&#xf20e; connectdevelop</option>
                                                                                <option value='contao' {{(@$process_elements[$i-1]->list_image == 'contao') ? "selected":""}}>&#xf26d; contao</option>
                                                                                <option value="copy" {{(@$process_elements[$i-1]->list_image == 'copy') ? "selected":""}}>&#xf0c5; Copy</option>
                                                                                <option value="copyright" {{(@$process_elements[$i-1]->list_image == 'copyright') ? "selected":""}}>&#xf1f9; Copyright</option>
                                                                                <option value='creative-commons' {{(@$process_elements[$i-1]->list_image == 'creative-commons') ? "selected":""}}>&#xf25e; creative commons</option>
                                                                                <option value="credit-card" {{(@$process_elements[$i-1]->list_image == 'credit-card') ? "selected":""}}>&#xf09d; Credit card</option>
                                                                                <option value='credit-card-alt' {{(@$process_elements[$i-1]->list_image == 'credit-card-alt') ? "selected":""}}>&#xf283; credit card alt</option>
                                                                                <option value='crop' {{(@$process_elements[$i-1]->list_image == 'crop') ? "selected":""}}>&#xf125; crop</option>
                                                                                <option value='crosshairs' {{(@$process_elements[$i-1]->list_image == 'crosshairs') ? "selected":""}}>&#xf05b; crosshairs</option>
                                                                                <option value='css3' {{(@$process_elements[$i-1]->list_image == 'css3') ? "selected":""}}>&#xf13c; css3</option>
                                                                                <option value='cube' {{(@$process_elements[$i-1]->list_image == 'cube') ? "selected":""}}>&#xf1b2; cube</option>
                                                                                <option value='cubes' {{(@$process_elements[$i-1]->list_image == 'cubes') ? "selected":""}}>&#xf1b3; cubes</option>
                                                                                <option value='cut' {{(@$process_elements[$i-1]->list_image == 'cut') ? "selected":""}}>&#xf0c4; cut</option>
                                                                                <option value='cutlery' {{(@$process_elements[$i-1]->list_image == 'cutlery') ? "selected":""}}>&#xf0f5; cutlery</option>


                                                                                <option value='dashboard' {{(@$process_elements[$i-1]->list_image == 'dashboard') ? "selected":""}}>&#xf0e4; dashboard</option>
                                                                                <option value='dashcube' {{(@$process_elements[$i-1]->list_image == 'dashcube') ? "selected":""}}>&#xf210; dashcube</option>
                                                                                <option value='database' {{(@$process_elements[$i-1]->list_image == 'database') ? "selected":""}}>&#xf1c0; database</option>
                                                                                <option value='deaf' {{(@$process_elements[$i-1]->list_image == 'deaf') ? "selected":""}}>&#xf2a4; deaf</option>
                                                                                <option value='deafness' {{(@$process_elements[$i-1]->list_image == 'deafness') ? "selected":""}}>&#xf2a4; deafness</option>
                                                                                <option value='dedent' {{(@$process_elements[$i-1]->list_image == 'dedent') ? "selected":""}}>&#xf03b; dedent</option>
                                                                                <option value='delicious' {{(@$process_elements[$i-1]->list_image == 'delicious') ? "selected":""}}>&#xf1a5; delicious</option>
                                                                                <option value='desktop' {{(@$process_elements[$i-1]->list_image == 'desktop') ? "selected":""}}>&#xf108; desktop</option>
                                                                                <option value='deviantart' {{(@$process_elements[$i-1]->list_image == 'deviantart') ? "selected":""}}>&#xf1bd; deviantart</option>
                                                                                <option value='diamond' {{(@$process_elements[$i-1]->list_image == 'diamond') ? "selected":""}}>&#xf219; diamond</option>
                                                                                <option value='digg' {{(@$process_elements[$i-1]->list_image == 'digg') ? "selected":""}}>&#xf1a6; digg</option>
                                                                                <option value='dollar' {{(@$process_elements[$i-1]->list_image == 'dollar') ? "selected":""}}>&#xf155; dollar</option>
                                                                                <option value="dot-circle" {{(@$process_elements[$i-1]->list_image == 'dot-circle') ? "selected":""}}>&#xf192; Dot circle</option>
                                                                                <option value='download' {{(@$process_elements[$i-1]->list_image == 'download') ? "selected":""}}>&#xf019; download</option>
                                                                                <option value='dribbble' {{(@$process_elements[$i-1]->list_image == 'dribbble') ? "selected":""}}>&#xf17d; dribbble</option>
                                                                                <option value='drivers-license' {{(@$process_elements[$i-1]->list_image == 'drivers-license') ? "selected":""}}>&#xf2c2; drivers license</option>
                                                                                <option value='drivers-license-o' {{(@$process_elements[$i-1]->list_image == 'drivers-license-o') ? "selected":""}}>&#xf2c3; drivers license o</option>
                                                                                <option value='dropbox' {{(@$process_elements[$i-1]->list_image == 'dropbox') ? "selected":""}}>&#xf16b; dropbox</option>
                                                                                <option value='drupal' {{(@$process_elements[$i-1]->list_image == 'drupal') ? "selected":""}}>&#xf1a9; drupal</option>



                                                                                <option value='edge' {{(@$process_elements[$i-1]->list_image == 'edge') ? "selected":""}}>&#xf282; edge</option>
                                                                                <option value="edit" {{(@$process_elements[$i-1]->list_image == 'edit') ? "selected":""}}>&#xf044; Edit</option>
                                                                                <option value='eercast' {{(@$process_elements[$i-1]->list_image == 'eercast') ? "selected":""}}>&#xf2da; eercast</option>
                                                                                <option value='eject' {{(@$process_elements[$i-1]->list_image == 'eject') ? "selected":""}}>&#xf052; eject</option>
                                                                                <option value='ellipsis-h' {{(@$process_elements[$i-1]->list_image == 'ellipsis-h') ? "selected":""}}>&#xf141; ellipsis h</option>
                                                                                <option value='ellipsis-v' {{(@$process_elements[$i-1]->list_image == 'ellipsis-v') ? "selected":""}}>&#xf142; ellipsis v</option>
                                                                                <option value='empire' {{(@$process_elements[$i-1]->list_image == 'empire') ? "selected":""}}>&#xf1d1; empire</option>
                                                                                <option value='envelope' {{(@$process_elements[$i-1]->list_image == 'envelope') ? "selected":""}}>&#xf0e0; envelope</option>
                                                                                <option value='envelope-o' {{(@$process_elements[$i-1]->list_image == 'envelope-o') ? "selected":""}}>&#xf003; envelope o</option>
                                                                                <option value="envelope-open" {{(@$process_elements[$i-1]->list_image == 'envelope-open') ? "selected":""}}>&#xf2b6; Envelope open</option>

                                                                                <option value='envelope-open-o' {{(@$process_elements[$i-1]->list_image == 'envelope-open-o') ? "selected":""}}>&#xf2b7; envelope open o</option>
                                                                                <option value='envelope-square' {{(@$process_elements[$i-1]->list_image == 'envelope-square') ? "selected":""}}>&#xf199; envelope square</option>
                                                                                <option value='envira' {{(@$process_elements[$i-1]->list_image == 'envira') ? "selected":""}}>&#xf299; envira</option>
                                                                                <option value='eraser' {{(@$process_elements[$i-1]->list_image == 'eraser') ? "selected":""}}>&#xf12d; eraser</option>
                                                                                <option value='etsy' {{(@$process_elements[$i-1]->list_image == 'etsy') ? "selected":""}}>&#xf2d7; etsy</option>
                                                                                <option value='eur' {{(@$process_elements[$i-1]->list_image == 'eur') ? "selected":""}}>&#xf153; eur</option>
                                                                                <option value='euro' {{(@$process_elements[$i-1]->list_image == 'euro') ? "selected":""}}>&#xf153; euro</option>
                                                                                <option value='exchange' {{(@$process_elements[$i-1]->list_image == 'exchange') ? "selected":""}}>&#xf0ec; exchange</option>
                                                                                <option value='exclamation' {{(@$process_elements[$i-1]->list_image == 'exclamation') ? "selected":""}}>&#xf12a; exclamation</option>
                                                                                <option value='exclamation-circle' {{(@$process_elements[$i-1]->list_image == 'exclamation-circle') ? "selected":""}}>&#xf06a; exclamation circle</option>
                                                                                <option value='exclamation-triangle' {{(@$process_elements[$i-1]->list_image == 'exclamation-triangle') ? "selected":""}}>&#xf071; exclamation triangle</option>
                                                                                <option value='expand' {{(@$process_elements[$i-1]->list_image == 'expand') ? "selected":""}}>&#xf065; expand</option>
                                                                                <option value='expeditedssl' {{(@$process_elements[$i-1]->list_image == 'expeditedssl') ? "selected":""}}>&#xf23e; expeditedssl</option>
                                                                                <option value='external-link' {{(@$process_elements[$i-1]->list_image == 'external-link') ? "selected":""}}>&#xf08e; external link</option>
                                                                                <option value='external-link-square' {{(@$process_elements[$i-1]->list_image == 'external-link-square') ? "selected":""}}>&#xf14c; external link square</option>
                                                                                <option value="eye" {{(@$process_elements[$i-1]->list_image == 'eye') ? "selected":""}}>&#xf06e; Eye</option>
                                                                                <option value="eye-slash" {{(@$process_elements[$i-1]->list_image == 'eye-slash') ? "selected":""}}>&#xf070; Eye slash</option>
                                                                                <option value='eyedropper' {{(@$process_elements[$i-1]->list_image == 'eyedropper') ? "selected":""}}>&#xf1fb; eyedropper</option>


                                                                                <option value="flag" {{(@$process_elements[$i-1]->list_image == 'flag') ? "selected":""}}>&#xf024; Flag</option>
                                                                                <option value="flushed" {{(@$process_elements[$i-1]->list_image == 'flushed') ? "selected":""}}>&#xf579; Flushed</option>
                                                                                <option value="folder" {{(@$process_elements[$i-1]->list_image == 'folder') ? "selected":""}}>&#xf07b; Folder</option>
                                                                                <option value="folder-open" {{(@$process_elements[$i-1]->list_image == 'folder-open') ? "selected":""}}>&#xf07c; Folder open </option>
                                                                                <option value="frown" {{(@$process_elements[$i-1]->list_image == 'frown') ? "selected":""}}>&#xf119; Frown</option>
                                                                                <option value="futbol" {{(@$process_elements[$i-1]->list_image == 'futbol') ? "selected":""}}>&#xf1e3; Futbol</option>
                                                                                <option value='fa' {{(@$process_elements[$i-1]->list_image == 'fa') ? "selected":""}}>&#xf2b4; fa</option>
                                                                                <option value='facebook' {{(@$process_elements[$i-1]->list_image == 'facebook') ? "selected":""}}>&#xf09a; facebook</option>
                                                                                <option value='facebook-f' {{(@$process_elements[$i-1]->list_image == 'facebook-f') ? "selected":""}}>&#xf09a; facebook-f</option>
                                                                                <option value='facebook-official' {{(@$process_elements[$i-1]->list_image == 'facebook-official') ? "selected":""}}>&#xf230; facebook-official</option>
                                                                                <option value='facebook-square' {{(@$process_elements[$i-1]->list_image == 'facebook-square') ? "selected":""}}>&#xf082; facebook-square</option>
                                                                                <option value='fast-backward' {{(@$process_elements[$i-1]->list_image == 'fast-backward') ? "selected":""}}>&#xf049; fast-backward</option>
                                                                                <option value='fast-forward' {{(@$process_elements[$i-1]->list_image == 'fast-forward') ? "selected":""}}>&#xf050; fast-forward</option>
                                                                                <option value='fax' {{(@$process_elements[$i-1]->list_image == 'fax') ? "selected":""}}>&#xf1ac; fax</option>
                                                                                <option value='feed' {{(@$process_elements[$i-1]->list_image == 'feed') ? "selected":""}}>&#xf09e; feed</option>
                                                                                <option value='female' {{(@$process_elements[$i-1]->list_image == 'female') ? "selected":""}}>&#xf182; female</option>
                                                                                <option value='fighter-jet' {{(@$process_elements[$i-1]->list_image == 'fighter-jet') ? "selected":""}}>&#xf0fb; fighter-jet</option>
                                                                                <option value="file" {{(@$process_elements[$i-1]->list_image == 'file') ? "selected":""}}>&#xf15b; File</option>
                                                                                <option value="file-archive" {{(@$process_elements[$i-1]->list_image == 'file-archive') ? "selected":""}}>&#xf1c6; File archive</option>
                                                                                <option value="file-audio" {{(@$process_elements[$i-1]->list_image == 'file-audio') ? "selected":""}}>&#xf1c7; File audio</option>
                                                                                <option value="file-code" {{(@$process_elements[$i-1]->list_image == 'file-code') ? "selected":""}}>&#xf1c9; File code</option>
                                                                                <option value="file-excel" {{(@$process_elements[$i-1]->list_image == 'file-excel') ? "selected":""}}>&#xf1c3; File excel </option>
                                                                                <option value="file-image" {{(@$process_elements[$i-1]->list_image == 'file-image') ? "selected":""}}>&#xf1c5; File image</option>
                                                                                <option value='file-movie-o' {{(@$process_elements[$i-1]->list_image == 'file-movie-o') ? "selected":""}}>&#xf1c8; file movie o</option>
                                                                                <option value='file-o' {{(@$process_elements[$i-1]->list_image == 'file-o') ? "selected":""}}>&#xf016; file o</option>
                                                                                <option value="file-pdf" {{(@$process_elements[$i-1]->list_image == 'file-pdf') ? "selected":""}}>&#xf1c1; File pdf</option>
                                                                                <option value='file-photo-o' {{(@$process_elements[$i-1]->list_image == 'file-photo-o') ? "selected":""}}>&#xf1c5; file photo o</option>
                                                                                <option value='file-picture-o' {{(@$process_elements[$i-1]->list_image == 'file-picture-o') ? "selected":""}}>&#xf1c5; file picture o</option>
                                                                                <option value="file-powerpoint" {{(@$process_elements[$i-1]->list_image == 'file-powerpoint') ? "selected":""}}>&#xf1c4; File powerpoint</option>
                                                                                <option value='file-sound-o' {{(@$process_elements[$i-1]->list_image == 'file-sound-o') ? "selected":""}}>&#xf1c7; file sound o</option>
                                                                                <option value='file-text' {{(@$process_elements[$i-1]->list_image == 'file-text') ? "selected":""}}>&#xf15c; file text</option>
                                                                                <option value='file-text-o' {{(@$process_elements[$i-1]->list_image == 'file-text-o') ? "selected":""}}>&#xf0f6; file text o</option>
                                                                                <option value="file-video" {{(@$process_elements[$i-1]->list_image == 'file-video') ? "selected":""}}>&#xf1c8; File video</option>
                                                                                <option value="file-word" {{(@$process_elements[$i-1]->list_image == 'file-word') ? "selected":""}}>&#xf1c2; File word</option>
                                                                                <option value='file-zip-o' {{(@$process_elements[$i-1]->list_image == 'file-zip-o') ? "selected":""}}>&#xf1c6; file zip o</option>
                                                                                <option value='files-o' {{(@$process_elements[$i-1]->list_image == 'files-o') ? "selected":""}}>&#xf0c5; files o</option>
                                                                                <option value='film' {{(@$process_elements[$i-1]->list_image == 'film') ? "selected":""}}>&#xf008; film</option>
                                                                                <option value='filter' {{(@$process_elements[$i-1]->list_image == 'filter') ? "selected":""}}>&#xf0b0; filter</option>
                                                                                <option value='fire' {{(@$process_elements[$i-1]->list_image == 'fire') ? "selected":""}}>&#xf06d; fire</option>
                                                                                <option value='fire-extinguisher' {{(@$process_elements[$i-1]->list_image == 'fire-extinguisher') ? "selected":""}}>&#xf134; fire extinguisher</option>
                                                                                <option value='firefox' {{(@$process_elements[$i-1]->list_image == 'firefox') ? "selected":""}}>&#xf269; firefox</option>
                                                                                <option value='first-order' {{(@$process_elements[$i-1]->list_image == 'first-order') ? "selected":""}}>&#xf2b0; first order</option>
                                                                                <option value='flag' {{(@$process_elements[$i-1]->list_image == 'flag') ? "selected":""}}>&#xf024; flag</option>
                                                                                <option value='flag-checkered' {{(@$process_elements[$i-1]->list_image == 'flag-checkered') ? "selected":""}}>&#xf11e; flag checkered</option>
                                                                                <option value='flag-o' {{(@$process_elements[$i-1]->list_image == 'flag-o') ? "selected":""}}>&#xf11d; flag o</option>
                                                                                <option value='flash' {{(@$process_elements[$i-1]->list_image == 'flash') ? "selected":""}}>&#xf0e7; flash</option>
                                                                                <option value='flask' {{(@$process_elements[$i-1]->list_image == 'flask') ? "selected":""}}>&#xf0c3; flask</option>
                                                                                <option value='flickr' {{(@$process_elements[$i-1]->list_image == 'flickr') ? "selected":""}}>&#xf16e; flickr</option>
                                                                                <option value='floppy-o' {{(@$process_elements[$i-1]->list_image == 'floppy-o') ? "selected":""}}>&#xf0c7; floppy o</option>
                                                                                <option value='folder' {{(@$process_elements[$i-1]->list_image == 'folder') ? "selected":""}}>&#xf07b; folder</option>
                                                                                <option value='folder-o' {{(@$process_elements[$i-1]->list_image == 'folder-o') ? "selected":""}}>&#xf114; folder o</option>
                                                                                <option value='folder-open' {{(@$process_elements[$i-1]->list_image == 'folder-open') ? "selected":""}}>&#xf07c; folder open</option>
                                                                                <option value='folder-open-o' {{(@$process_elements[$i-1]->list_image == 'folder-open-o') ? "selected":""}}>&#xf115; folder open o</option>
                                                                                <option value='font' {{(@$process_elements[$i-1]->list_image == 'font') ? "selected":""}}>&#xf031; font</option>
                                                                                <option value='font-awesome' {{(@$process_elements[$i-1]->list_image == 'font-awesome') ? "selected":""}}>&#xf2b4; font awesome</option>
                                                                                <option value='fonticons' {{(@$process_elements[$i-1]->list_image == 'fonticons') ? "selected":""}}>&#xf280; fonticons</option>
                                                                                <option value='fort-awesome' {{(@$process_elements[$i-1]->list_image == 'fort-awesome') ? "selected":""}}>&#xf286; fort awesome</option>
                                                                                <option value='forumbee' {{(@$process_elements[$i-1]->list_image == 'forumbee') ? "selected":""}}>&#xf211; forumbee</option>
                                                                                <option value='forward' {{(@$process_elements[$i-1]->list_image == 'forward') ? "selected":""}}>&#xf04e; forward</option>
                                                                                <option value='foursquare' {{(@$process_elements[$i-1]->list_image == 'foursquare') ? "selected":""}}>&#xf180; foursquare</option>
                                                                                <option value='free-code-camp' {{(@$process_elements[$i-1]->list_image == 'free-code-camp') ? "selected":""}}>&#xf2c5; free code camp</option>
                                                                                <option value='frown-o' {{(@$process_elements[$i-1]->list_image == 'frown-o') ? "selected":""}}>&#xf119; frown o</option>
                                                                                <option value='futbol-o' {{(@$process_elements[$i-1]->list_image == 'futbol-o') ? "selected":""}}>&#xf1e3; futbol o</option>

                                                                                <option value='gamepad' {{(@$process_elements[$i-1]->list_image == 'gamepad') ? "selected":""}}>&#xf11b; gamepad</option>
                                                                                <option value='gavel' {{(@$process_elements[$i-1]->list_image == 'gavel') ? "selected":""}}>&#xf0e3; gavel</option>
                                                                                <option value='gbp' {{(@$process_elements[$i-1]->list_image == 'gbp') ? "selected":""}}>&#xf154; gbp</option>
                                                                                <option value='ge' {{(@$process_elements[$i-1]->list_image == 'ge') ? "selected":""}}>&#xf1d1; ge</option>
                                                                                <option value='gear' {{(@$process_elements[$i-1]->list_image == 'gear') ? "selected":""}}>&#xf013; gear</option>
                                                                                <option value='gears' {{(@$process_elements[$i-1]->list_image == 'gears') ? "selected":""}}>&#xf085; gears</option>
                                                                                <option value='genderless' {{(@$process_elements[$i-1]->list_image == 'genderless') ? "selected":""}}>&#xf22d; genderless</option>
                                                                                <option value='get-pocket' {{(@$process_elements[$i-1]->list_image == 'get-pocket') ? "selected":""}}>&#xf265; get-pocket</option>
                                                                                <option value='gg' {{(@$process_elements[$i-1]->list_image == 'gg') ? "selected":""}}>&#xf260; gg</option>
                                                                                <option value='gg-circle' {{(@$process_elements[$i-1]->list_image == 'gg-circle') ? "selected":""}}>&#xf261; gg circle</option>
                                                                                <option value='gift' {{(@$process_elements[$i-1]->list_image == 'gift') ? "selected":""}}>&#xf06b; gift</option>
                                                                                <option value='git' {{(@$process_elements[$i-1]->list_image == 'git') ? "selected":""}}>&#xf1d3; git</option>
                                                                                <option value='git-square' {{(@$process_elements[$i-1]->list_image == 'git-square') ? "selected":""}}>&#xf1d2; git square</option>
                                                                                <option value='github' {{(@$process_elements[$i-1]->list_image == 'github') ? "selected":""}}>&#xf09b; github</option>
                                                                                <option value='github-alt' {{(@$process_elements[$i-1]->list_image == 'github-alt') ? "selected":""}}>&#xf113; github alt</option>
                                                                                <option value='github-square' {{(@$process_elements[$i-1]->list_image == 'github-square') ? "selected":""}}>&#xf092; github square</option>
                                                                                <option value='gitlab' {{(@$process_elements[$i-1]->list_image == 'gitlab') ? "selected":""}}>&#xf296; gitlab</option>
                                                                                <option value='gittip' {{(@$process_elements[$i-1]->list_image == 'gittip') ? "selected":""}}>&#xf184; gittip</option>
                                                                                <option value='glass' {{(@$process_elements[$i-1]->list_image == 'glass') ? "selected":""}}>&#xf000; glass</option>
                                                                                <option value='glide' {{(@$process_elements[$i-1]->list_image == 'glide') ? "selected":""}}>&#xf2a5; glide</option>
                                                                                <option value='glide-g' {{(@$process_elements[$i-1]->list_image == 'glide-g') ? "selected":""}}>&#xf2a6; glide g</option>
                                                                                <option value='globe' {{(@$process_elements[$i-1]->list_image == 'globe') ? "selected":""}}>&#xf0ac; globe</option>
                                                                                <option value='google' {{(@$process_elements[$i-1]->list_image == 'google') ? "selected":""}}>&#xf1a0; google</option>
                                                                                <option value='google-plus' {{(@$process_elements[$i-1]->list_image == 'google-plus') ? "selected":""}}>&#xf0d5; google plus</option>
                                                                                <option value='google-plus-circle' {{(@$process_elements[$i-1]->list_image == 'google-plus-circle') ? "selected":""}}>&#xf2b3; google plus circle</option>
                                                                                <option value='google-plus-official' {{(@$process_elements[$i-1]->list_image == 'google-plus-official') ? "selected":""}}>&#xf2b3; google plus official</option>
                                                                                <option value='google-plus-square' {{(@$process_elements[$i-1]->list_image == 'google-plus-square') ? "selected":""}}>&#xf0d4; google plus square</option>
                                                                                <option value='google-wallet' {{(@$process_elements[$i-1]->list_image == 'google-wallet') ? "selected":""}}>&#xf1ee; google wallet</option>
                                                                                <option value='graduation-cap' {{(@$process_elements[$i-1]->list_image == 'graduation-cap') ? "selected":""}}>&#xf19d; graduation cap</option>
                                                                                <option value='gratipay' {{(@$process_elements[$i-1]->list_image == 'gratipay') ? "selected":""}}>&#xf184; gratipay</option>
                                                                                <option value='grav' {{(@$process_elements[$i-1]->list_image == 'grav') ? "selected":""}}>&#xf2d6; grav</option>
                                                                                <option value='group' {{(@$process_elements[$i-1]->list_image == 'group') ? "selected":""}}>&#xf0c0; group</option>

                                                                                <option value='h-square' {{(@$process_elements[$i-1]->list_image == 'h-square') ? "selected":""}}>&#xf0fd; h-square</option>
                                                                                <option value='hacker-news' {{(@$process_elements[$i-1]->list_image == 'hacker-news') ? "selected":""}}>&#xf1d4; hacker news</option>
                                                                                <option value='hand-grab-o' {{(@$process_elements[$i-1]->list_image == 'hand-grab-o') ? "selected":""}}>&#xf255; hand grab o</option>
                                                                                <option value="hand-lizard" {{(@$process_elements[$i-1]->list_image == 'hand-lizard') ? "selected":""}}>&#xf258; Hand lizard</option>
                                                                                <option value="hand-point-down" {{(@$process_elements[$i-1]->list_image == 'hand-point-down') ? "selected":""}}>&#xf0a7; Hand point down</option>
                                                                                <option value="hand-point-left" {{(@$process_elements[$i-1]->list_image == 'hand-point-left') ? "selected":""}}>&#xf0a5; Hand point left</option>
                                                                                <option value="hand-point-right" {{(@$process_elements[$i-1]->list_image == 'hand-point-right') ? "selected":""}}>&#xf0a4; Hand point right</option>
                                                                                <option value="hand-point-up" {{(@$process_elements[$i-1]->list_image == 'hand-point-up') ? "selected":""}}>&#xf0a6; Hand point up</option>
                                                                                <option value="hand-paper" {{(@$process_elements[$i-1]->list_image == 'hand-paper') ? "selected":""}}>&#xf256; Hand paper</option>
                                                                                <option value="hand-peace" {{(@$process_elements[$i-1]->list_image == 'hand-peace') ? "selected":""}}>&#xf25b; Hand peace</option>
                                                                                <option value="hand-pointer" {{(@$process_elements[$i-1]->list_image == 'hand-pointer') ? "selected":""}}>&#xf25a; Hand pointer</option>
                                                                                <option value="hand-rock" {{(@$process_elements[$i-1]->list_image == 'hand-rock') ? "selected":""}}>&#xf255; Hand rock </option>
                                                                                <option value="hand-scissors" {{(@$process_elements[$i-1]->list_image == 'hand-scissors') ? "selected":""}}>&#xf257; Hand scissors</option>
                                                                                <option value="hand-spock" {{(@$process_elements[$i-1]->list_image == 'hand-spock') ? "selected":""}}>&#xf259; Hand spock</option>
                                                                                <option value='hand-stop-o' {{(@$process_elements[$i-1]->list_image == 'hand-stop-o') ? "selected":""}}>&#xf256; hand stop o</option>
                                                                                <option value="handshake" {{(@$process_elements[$i-1]->list_image == 'handshake') ? "selected":""}}>&#xf2b5; Handshake</option>
                                                                                <option value='hard-of-hearing' {{(@$process_elements[$i-1]->list_image == 'hard-of-hearing') ? "selected":""}}>&#xf2a4; hard of hearing</option>
                                                                                <option value='hashtag' {{(@$process_elements[$i-1]->list_image == 'hashtag') ? "selected":""}}>&#xf292; hashtag</option>
                                                                                <option value="hdd" {{(@$process_elements[$i-1]->list_image == 'hdd') ? "selected":""}}>&#xf0a0; Hdd</option>
                                                                                <option value='header' {{(@$process_elements[$i-1]->list_image == 'header') ? "selected":""}}>&#xf1dc; header</option>
                                                                                <option value='headphones' {{(@$process_elements[$i-1]->list_image == 'headphones') ? "selected":""}}>&#xf025; headphones</option>
                                                                                <option value="heart" {{(@$process_elements[$i-1]->list_image == 'heart') ? "selected":""}}>&#xf004; Heart</option>
                                                                                <option value='heart-o' {{(@$process_elements[$i-1]->list_image == 'heart-o') ? "selected":""}}>&#xf08a; heart o</option>
                                                                                <option value='heartbeat' {{(@$process_elements[$i-1]->list_image == 'heartbeat') ? "selected":""}}>&#xf21e; heartbeat</option>
                                                                                <option value='history' {{(@$process_elements[$i-1]->list_image == 'history') ? "selected":""}}>&#xf1da; history</option>
                                                                                <option value="home" {{(@$process_elements[$i-1]->list_image == 'home') ? "selected":""}}>&#xf015; Home</option>
                                                                                <option value="hospital" {{(@$process_elements[$i-1]->list_image == 'hospital') ? "selected":""}}>&#xf0f8; Hospital</option>
                                                                                <option value='hotel' {{(@$process_elements[$i-1]->list_image == 'hotel') ? "selected":""}}>&#xf236; hotel</option>
                                                                                <option value="hourglass" {{(@$process_elements[$i-1]->list_image == 'hourglass') ? "selected":""}}>&#xf254; Hourglass</option>
                                                                                <option value='hourglass-1' {{(@$process_elements[$i-1]->list_image == 'hourglass-1') ? "selected":""}}>&#xf251; hourglass 1</option>
                                                                                <option value='hourglass-2' {{(@$process_elements[$i-1]->list_image == 'hourglass-2') ? "selected":""}}>&#xf252; hourglass 2</option>
                                                                                <option value='hourglass-3' {{(@$process_elements[$i-1]->list_image == 'hourglass-3') ? "selected":""}}>&#xf253; hourglass 3</option>
                                                                                <option value='hourglass-end' {{(@$process_elements[$i-1]->list_image == 'hourglass-end') ? "selected":""}}>&#xf253; hourglass end</option>
                                                                                <option value='hourglass-half' {{(@$process_elements[$i-1]->list_image == 'hourglass-half') ? "selected":""}}>&#xf252; hourglass half</option>
                                                                                <option value='hourglass-o' {{(@$process_elements[$i-1]->list_image == 'hourglass-o') ? "selected":""}}>&#xf250; hourglass o</option>
                                                                                <option value='hourglass-start' {{(@$process_elements[$i-1]->list_image == 'hourglass-start') ? "selected":""}}>&#xf251; hourglass start</option>
                                                                                <option value='houzz' {{(@$process_elements[$i-1]->list_image == 'houzz') ? "selected":""}}>&#xf27c; houzz</option>
                                                                                <option value='html5' {{(@$process_elements[$i-1]->list_image == 'html5') ? "selected":""}}>&#xf13b; html5</option>


                                                                                <option value='i-cursor' {{(@$process_elements[$i-1]->list_image == 'i-cursor') ? "selected":""}}>&#xf246; i cursor</option>
                                                                                <option value='id-badge' {{(@$process_elements[$i-1]->list_image == 'id-badge') ? "selected":""}}>&#xf2c1; id badge</option>
                                                                                <option value="id-card" {{(@$process_elements[$i-1]->list_image == 'id-card') ? "selected":""}}>&#xf2c2; Id card </option>
                                                                                <option value='id-card-o' {{(@$process_elements[$i-1]->list_image == 'id-card-o') ? "selected":""}}>&#xf2c3; id card o</option>
                                                                                <option value='ils' {{(@$process_elements[$i-1]->list_image == 'ils') ? "selected":""}}>&#xf20b; ils</option>
                                                                                <option value="image" {{(@$process_elements[$i-1]->list_image == 'image') ? "selected":""}}>&#xf03e; Image</option>
                                                                                <option value='imdb' {{(@$process_elements[$i-1]->list_image == 'imdb') ? "selected":""}}>&#xf2d8; imdb</option>
                                                                                <option value='inbox' {{(@$process_elements[$i-1]->list_image == 'inbox') ? "selected":""}}>&#xf01c; inbox</option>
                                                                                <option value='indent' {{(@$process_elements[$i-1]->list_image == 'indent') ? "selected":""}}>&#xf03c; indent</option>
                                                                                <option value='industry' {{(@$process_elements[$i-1]->list_image == 'industry') ? "selected":""}}>&#xf275; industry</option>
                                                                                <option value='info' {{(@$process_elements[$i-1]->list_image == 'info') ? "selected":""}}>&#xf129; info</option>
                                                                                <option value='info-circle' {{(@$process_elements[$i-1]->list_image == 'info-circle') ? "selected":""}}>&#xf05a; info circle</option>
                                                                                <option value='inr' {{(@$process_elements[$i-1]->list_image == 'inr') ? "selected":""}}>&#xf156; inr</option>
                                                                                <option value='instagram' {{(@$process_elements[$i-1]->list_image == 'instagram') ? "selected":""}}>&#xf16d; instagram</option>
                                                                                <option value='institution' {{(@$process_elements[$i-1]->list_image == 'institution') ? "selected":""}}>&#xf19c; institution</option>
                                                                                <option value='internet-explorer' {{(@$process_elements[$i-1]->list_image == 'internet-explorer') ? "selected":""}}>&#xf26b; internet explorer</option>
                                                                                <option value='intersex' {{(@$process_elements[$i-1]->list_image == 'intersex') ? "selected":""}}>&#xf224; intersex</option>
                                                                                <option value='ioxhost' {{(@$process_elements[$i-1]->list_image == 'ioxhost') ? "selected":""}}>&#xf208; ioxhost</option>
                                                                                <option value='italic' {{(@$process_elements[$i-1]->list_image == 'italic') ? "selected":""}}>&#xf033; italic</option>

                                                                                <option value='joomla' {{(@$process_elements[$i-1]->list_image == 'joomla') ? "selected":""}}>&#xf1aa; joomla</option>
                                                                                <option value='jpy' {{(@$process_elements[$i-1]->list_image == 'jpy') ? "selected":""}}>&#xf157; jpy</option>
                                                                                <option value='jsfiddle' {{(@$process_elements[$i-1]->list_image == 'jsfiddle') ? "selected":""}}>&#xf1cc; jsfiddle</option>

                                                                                <option value='key' {{(@$process_elements[$i-1]->list_image == 'key') ? "selected":""}}>&#xf084; key</option>
                                                                                <option value="keyboard" {{(@$process_elements[$i-1]->list_image == 'keyboard') ? "selected":""}}>&#xf11c; Keyboard</option>
                                                                                <option value='krw' {{(@$process_elements[$i-1]->list_image == 'krw') ? "selected":""}}>&#xf159; krw</option>


                                                                                <option value='language' {{(@$process_elements[$i-1]->list_image == 'language') ? "selected":""}}>&#xf1ab; language</option>
                                                                                <option value='laptop' {{(@$process_elements[$i-1]->list_image == 'laptop') ? "selected":""}}>&#xf109; laptop</option>
                                                                                <option value='lastfm' {{(@$process_elements[$i-1]->list_image == 'lastfm') ? "selected":""}}>&#xf202; lastfm</option>
                                                                                <option value='lastfm-square' {{(@$process_elements[$i-1]->list_image == 'lastfm-square') ? "selected":""}}>&#xf203; lastfm square</option>
                                                                                <option value='leaf' {{(@$process_elements[$i-1]->list_image == 'leaf') ? "selected":""}}>&#xf06c; leaf</option>
                                                                                <option value='leanpub' {{(@$process_elements[$i-1]->list_image == 'leanpub') ? "selected":""}}>&#xf212; leanpub</option>
                                                                                <option value='legal' {{(@$process_elements[$i-1]->list_image == 'legal') ? "selected":""}}>&#xf0e3; legal</option>
                                                                                <option value="lemon" {{(@$process_elements[$i-1]->list_image == 'lemon') ? "selected":""}}>&#xf094; Lemon</option>
                                                                                <option value='level-down' {{(@$process_elements[$i-1]->list_image == 'level-down') ? "selected":""}}>&#xf149; level down</option>
                                                                                <option value='level-up' {{(@$process_elements[$i-1]->list_image == 'level-up') ? "selected":""}}>&#xf148; level up</option>
                                                                                <option value="life-ring" {{(@$process_elements[$i-1]->list_image == 'life-ring') ? "selected":""}}>&#xf1cd; Life ring</option>
                                                                                <option value="lightbulb" {{(@$process_elements[$i-1]->list_image == 'lightbulb') ? "selected":""}}>&#xf0eb; Lightbulb</option>
                                                                                <option value='line-chart' {{(@$process_elements[$i-1]->list_image == 'line-chart') ? "selected":""}}>&#xf201; line chart</option>
                                                                                <option value='link' {{(@$process_elements[$i-1]->list_image == 'link') ? "selected":""}}>&#xf0c1; link</option>
                                                                                <option value='linkedin' {{(@$process_elements[$i-1]->list_image == 'linkedin') ? "selected":""}}>&#xf0e1; linkedin</option>
                                                                                <option value='linkedin-square' {{(@$process_elements[$i-1]->list_image == 'linkedin-square') ? "selected":""}}>&#xf08c; linkedin square</option>
                                                                                <option value='linode' {{(@$process_elements[$i-1]->list_image == 'linode') ? "selected":""}}>&#xf2b8; linode</option>
                                                                                <option value='linux' {{(@$process_elements[$i-1]->list_image == 'linux') ? "selected":""}}>&#xf17c; linux</option>
                                                                                <option value='list' {{(@$process_elements[$i-1]->list_image == 'list') ? "selected":""}}>&#xf03a; list</option>
                                                                                <option value="list-alt" {{(@$process_elements[$i-1]->list_image == 'list-alt') ? "selected":""}}>&#xf022; List alt</option>
                                                                                <option value='list-ol' {{(@$process_elements[$i-1]->list_image == 'list-ol') ? "selected":""}}>&#xf0cb; list ol</option>
                                                                                <option value='list-ul' {{(@$process_elements[$i-1]->list_image == 'list-ul') ? "selected":""}}>&#xf0ca; list ul</option>
                                                                                <option value='location-arrow' {{(@$process_elements[$i-1]->list_image == 'location-arrow') ? "selected":""}}>&#xf124; location arrow</option>
                                                                                <option value='lock' {{(@$process_elements[$i-1]->list_image == 'lock') ? "selected":""}}>&#xf023; lock</option>
                                                                                <option value='long-arrow-down' {{(@$process_elements[$i-1]->list_image == 'long-arrow-down') ? "selected":""}}>&#xf175; long arrow down</option>
                                                                                <option value='long-arrow-left' {{(@$process_elements[$i-1]->list_image == 'long-arrow-left') ? "selected":""}}>&#xf177; long arrow left</option>
                                                                                <option value='long-arrow-right' {{(@$process_elements[$i-1]->list_image == 'long-arrow-right') ? "selected":""}}>&#xf178; long arrow right</option>
                                                                                <option value='long-arrow-up' {{(@$process_elements[$i-1]->list_image == 'long-arrow-up') ? "selected":""}}>&#xf176; long arrow up</option>
                                                                                <option value='low-vision' {{(@$process_elements[$i-1]->list_image == 'low-vision') ? "selected":""}}>&#xf2a8; low vision</option>

                                                                                <option value='magic' {{(@$process_elements[$i-1]->list_image == 'magic') ? "selected":""}}>&#xf0d0; magic</option>
                                                                                <option value='magnet' {{(@$process_elements[$i-1]->list_image == 'magnet') ? "selected":""}}>&#xf076; magnet</option>
                                                                                <option value='mail-forward' {{(@$process_elements[$i-1]->list_image == 'mail-forward') ? "selected":""}}>&#xf064; mail forward</option>
                                                                                <option value='mail-reply' {{(@$process_elements[$i-1]->list_image == 'mail-reply') ? "selected":""}}>&#xf112; mail reply</option>
                                                                                <option value='mail-reply-all' {{(@$process_elements[$i-1]->list_image == 'mail-reply-all') ? "selected":""}}>&#xf122; mail reply all</option>
                                                                                <option value='male' {{(@$process_elements[$i-1]->list_image == 'male') ? "selected":""}}>&#xf183; male</option>
                                                                                <option value="map" {{(@$process_elements[$i-1]->list_image == 'map') ? "selected":""}}>&#xf279; Map</option>
                                                                                <option value='map-marker' {{(@$process_elements[$i-1]->list_image == 'map-marker') ? "selected":""}}>&#xf041; map marker</option>
                                                                                <option value='map-o' {{(@$process_elements[$i-1]->list_image == 'map-o') ? "selected":""}}>&#xf278; map o</option>
                                                                                <option value='map-pin' {{(@$process_elements[$i-1]->list_image == 'map-pin') ? "selected":""}}>&#xf276; map pin</option>
                                                                                <option value='map-signs' {{(@$process_elements[$i-1]->list_image == 'map-signs') ? "selected":""}}>&#xf277; map signs</option>
                                                                                <option value='mars' {{(@$process_elements[$i-1]->list_image == 'mars') ? "selected":""}}>&#xf222; mars</option>
                                                                                <option value='mars-double' {{(@$process_elements[$i-1]->list_image == 'mars-double') ? "selected":""}}>&#xf227; mars double</option>
                                                                                <option value='mars-stroke' {{(@$process_elements[$i-1]->list_image == 'mars-stroke') ? "selected":""}}>&#xf229; mars stroke</option>
                                                                                <option value='mars-stroke-h' {{(@$process_elements[$i-1]->list_image == 'mars-stroke-h') ? "selected":""}}>&#xf22b; mars stroke h</option>
                                                                                <option value='mars-stroke-v' {{(@$process_elements[$i-1]->list_image == 'mars-stroke-v') ? "selected":""}}>&#xf22a; mars stroke v</option>
                                                                                <option value='maxcdn' {{(@$process_elements[$i-1]->list_image == 'maxcdn') ? "selected":""}}>&#xf136; maxcdn</option>
                                                                                <option value='meanpath' {{(@$process_elements[$i-1]->list_image == 'meanpath') ? "selected":""}}>&#xf20c; meanpath</option>
                                                                                <option value='medium' {{(@$process_elements[$i-1]->list_image == 'medium') ? "selected":""}}>&#xf23a; medium</option>
                                                                                <option value='medkit' {{(@$process_elements[$i-1]->list_image == 'medkit') ? "selected":""}}>&#xf0fa; medkit</option>
                                                                                <option value='meetup' {{(@$process_elements[$i-1]->list_image == 'meetup') ? "selected":""}}>&#xf2e0; meetup</option>
                                                                                <option value="meh" {{(@$process_elements[$i-1]->list_image == 'meh') ? "selected":""}}>&#xf11a; Meh</option>
                                                                                <option value='mercury' {{(@$process_elements[$i-1]->list_image == 'mercury') ? "selected":""}}>&#xf223; mercury</option>
                                                                                <option value='microchip' {{(@$process_elements[$i-1]->list_image == 'microchip') ? "selected":""}}>&#xf2db; microchip</option>
                                                                                <option value='microphone' {{(@$process_elements[$i-1]->list_image == 'microphone') ? "selected":""}}>&#xf130; microphone</option>
                                                                                <option value='microphone-slash' {{(@$process_elements[$i-1]->list_image == 'microphone-slash') ? "selected":""}}>&#xf131; microphone slash</option>
                                                                                <option value='minus' {{(@$process_elements[$i-1]->list_image == 'minus') ? "selected":""}}>&#xf068; minus</option>
                                                                                <option value='minus-circle' {{(@$process_elements[$i-1]->list_image == 'minus-circle') ? "selected":""}}>&#xf056; minus circle</option>
                                                                                <option value="minus-square" {{(@$process_elements[$i-1]->list_image == 'minus-square') ? "selected":""}}>&#xf146; Minus square</option>
                                                                                <option value='minus-square-o' {{(@$process_elements[$i-1]->list_image == 'minus-square-o') ? "selected":""}}>&#xf147; minus square o</option>
                                                                                <option value='mixcloud' {{(@$process_elements[$i-1]->list_image == 'mixcloud') ? "selected":""}}>&#xf289; mixcloud</option>
                                                                                <option value='mobile' {{(@$process_elements[$i-1]->list_image == 'mobile') ? "selected":""}}>&#xf10b; mobile</option>
                                                                                <option value='mobile-phone' {{(@$process_elements[$i-1]->list_image == 'mobile-phone') ? "selected":""}}>&#xf10b; mobile phone</option>
                                                                                <option value='modx' {{(@$process_elements[$i-1]->list_image == 'modx') ? "selected":""}}>&#xf285; modx</option>
                                                                                <option value='money' {{(@$process_elements[$i-1]->list_image == 'money') ? "selected":""}}>&#xf0d6; money</option>
                                                                                <option value="moon" {{(@$process_elements[$i-1]->list_image == 'moon') ? "selected":""}}>&#xf186; Moon</option>
                                                                                <option value='mortar-board' {{(@$process_elements[$i-1]->list_image == 'mortar-board') ? "selected":""}}>&#xf19d; mortar board</option>
                                                                                <option value='motorcycle' {{(@$process_elements[$i-1]->list_image == 'motorcycle') ? "selected":""}}>&#xf21c; motorcycle</option>
                                                                                <option value='mouse-pointer' {{(@$process_elements[$i-1]->list_image == 'mouse-pointer') ? "selected":""}}>&#xf245; mouse pointer</option>
                                                                                <option value='music' {{(@$process_elements[$i-1]->list_image == 'music') ? "selected":""}}>&#xf001; music</option>

                                                                                <option value='navicon' {{(@$process_elements[$i-1]->list_image == 'navicon') ? "selected":""}}>&#xf0c9; navicon</option>
                                                                                <option value='neuter' {{(@$process_elements[$i-1]->list_image == 'neuter') ? "selected":""}}>&#xf22c; neuter</option>
                                                                                <option value="newspaper" {{(@$process_elements[$i-1]->list_image == 'newspaper') ? "selected":""}}>&#xf1ea; Newspaper</option>

                                                                                <option value="object-group" {{(@$process_elements[$i-1]->list_image == 'object-group') ? "selected":""}}>&#xf247; Object group</option>
                                                                                <option value="object-upgroup" {{(@$process_elements[$i-1]->list_image == 'object-upgroup') ? "selected":""}}>&#xf248; Object upgroup</option>
                                                                                <option value='odnoklassniki' {{(@$process_elements[$i-1]->list_image == 'odnoklassniki') ? "selected":""}}>&#xf263; odnoklassniki</option>
                                                                                <option value='odnoklassniki-square' {{(@$process_elements[$i-1]->list_image == 'odnoklassniki-square') ? "selected":""}}>&#xf264; odnoklassniki square</option>
                                                                                <option value='opencart' {{(@$process_elements[$i-1]->list_image == 'opencart') ? "selected":""}}>&#xf23d; opencart</option>
                                                                                <option value='openid' {{(@$process_elements[$i-1]->list_image == 'openid') ? "selected":""}}>&#xf19b; openid</option>
                                                                                <option value='opera' {{(@$process_elements[$i-1]->list_image == 'opera') ? "selected":""}}>&#xf26a; opera</option>
                                                                                <option value='optin-monster' {{(@$process_elements[$i-1]->list_image == 'optin-monster') ? "selected":""}}>&#xf23c; optin monster</option>
                                                                                <option value='outdent' {{(@$process_elements[$i-1]->list_image == 'outdent') ? "selected":""}}>&#xf03b; outdent</option>

                                                                                <option value='pagelines' {{(@$process_elements[$i-1]->list_image == 'pagelines') ? "selected":""}}>&#xf18c; pagelines</option>
                                                                                <option value='paint-brush' {{(@$process_elements[$i-1]->list_image == 'paint-brush') ? "selected":""}}>&#xf1fc; paint brush</option>
                                                                                <option value="paper-plane" {{(@$process_elements[$i-1]->list_image == 'paper-plane') ? "selected":""}}>&#xf1d8; Paper plane</option>
                                                                                <option value='paper-plane-o' {{(@$process_elements[$i-1]->list_image == 'paper-plane-o') ? "selected":""}}>&#xf1d9; paper plane o</option>
                                                                                <option value='paperclip' {{(@$process_elements[$i-1]->list_image == 'paperclip') ? "selected":""}}>&#xf0c6; paperclip</option>
                                                                                <option value='paragraph' {{(@$process_elements[$i-1]->list_image == 'paragraph') ? "selected":""}}>&#xf1dd; paragraph</option>
                                                                                <option value='paste' {{(@$process_elements[$i-1]->list_image == 'paste') ? "selected":""}}>&#xf0ea; paste</option>
                                                                                <option value='pause' {{(@$process_elements[$i-1]->list_image == 'pause') ? "selected":""}}>&#xf04c; pause</option>
                                                                                <option value="pause-circle" {{(@$process_elements[$i-1]->list_image == 'pause-circle') ? "selected":""}}>&#xf28b; Pause circle</option>
                                                                                <option value='pause-circle-o' {{(@$process_elements[$i-1]->list_image == 'pause-circle-o') ? "selected":""}}>&#xf28c; pause circle o</option>
                                                                                <option value='paw' {{(@$process_elements[$i-1]->list_image == 'paw') ? "selected":""}}>&#xf1b0; paw</option>
                                                                                <option value='paypal' {{(@$process_elements[$i-1]->list_image == 'paypal') ? "selected":""}}>&#xf1ed; paypal</option>
                                                                                <option value='pencil' {{(@$process_elements[$i-1]->list_image == 'pencil') ? "selected":""}}>&#xf040; pencil</option>
                                                                                <option value='pencil-square' {{(@$process_elements[$i-1]->list_image == 'pencil square') ? "selected":""}}>&#xf14b; pencil square</option>
                                                                                <option value='pencil-square-o' {{(@$process_elements[$i-1]->list_image == 'pencil square o') ? "selected":""}}>&#xf044; pencil square o</option>
                                                                                <option value='percent' {{(@$process_elements[$i-1]->list_image == 'percent') ? "selected":""}}>&#xf295; percent</option>
                                                                                <option value='phone' {{(@$process_elements[$i-1]->list_image == 'phone') ? "selected":""}}>&#xf095; phone</option>
                                                                                <option value='phone-square' {{(@$process_elements[$i-1]->list_image == 'phone-square') ? "selected":""}}>&#xf098; phone square</option>
                                                                                <option value='photo' {{(@$process_elements[$i-1]->list_image == 'photo') ? "selected":""}}>&#xf03e; photo</option>
                                                                                <option value='picture-o' {{(@$process_elements[$i-1]->list_image == 'picture-o') ? "selected":""}}>&#xf03e; picture o</option>
                                                                                <option value='pie-chart' {{(@$process_elements[$i-1]->list_image == 'pie-chart') ? "selected":""}}>&#xf200; pie chart</option>
                                                                                <option value='pied-piper' {{(@$process_elements[$i-1]->list_image == 'pied-piper') ? "selected":""}}>&#xf2ae; pied piper</option>
                                                                                <option value='pied-piper-alt' {{(@$process_elements[$i-1]->list_image == 'pied-piper-alt') ? "selected":""}}>&#xf1a8; pied piper alt</option>
                                                                                <option value='pied-piper-pp' {{(@$process_elements[$i-1]->list_image == 'pied-piper-pp') ? "selected":""}}>&#xf1a7; pied piper pp</option>
                                                                                <option value='pinterest' {{(@$process_elements[$i-1]->list_image == 'pinterest') ? "selected":""}}>&#xf0d2; pinterest</option>
                                                                                <option value='pinterest-p' {{(@$process_elements[$i-1]->list_image == 'pinterest-p') ? "selected":""}}>&#xf231; pinterest p</option>
                                                                                <option value='pinterest-square' {{(@$process_elements[$i-1]->list_image == 'pinterest-square') ? "selected":""}}>&#xf0d3; pinterest square</option>
                                                                                <option value='plane' {{(@$process_elements[$i-1]->list_image == 'plane') ? "selected":""}}>&#xf072; plane</option>
                                                                                <option value='play' {{(@$process_elements[$i-1]->list_image == 'play') ? "selected":""}}>&#xf04b; play</option>
                                                                                <option value="play-circle" {{(@$process_elements[$i-1]->list_image == 'play-circle') ? "selected":""}}>&#xf144; Play circle </option>
                                                                                <option value='play-circle-o' {{(@$process_elements[$i-1]->list_image == 'play-circle-o') ? "selected":""}}>&#xf01d; play circle o</option>
                                                                                <option value='plug' {{(@$process_elements[$i-1]->list_image == 'plug') ? "selected":""}}>&#xf1e6; plug</option>
                                                                                <option value='plus' {{(@$process_elements[$i-1]->list_image == 'plus') ? "selected":""}}>&#xf067; plus</option>
                                                                                <option value='plus-circle' {{(@$process_elements[$i-1]->list_image == 'plus-circle') ? "selected":""}}>&#xf055; plus circle</option>
                                                                                <option value="plus-square" {{(@$process_elements[$i-1]->list_image == 'plus-square') ? "selected":""}}>&#xf0fe; Plus square</option>
                                                                                <option value='plus-square-o' {{(@$process_elements[$i-1]->list_image == 'plus-square-o') ? "selected":""}}>&#xf196; plus square o</option>
                                                                                <option value='podcast' {{(@$process_elements[$i-1]->list_image == 'podcast') ? "selected":""}}>&#xf2ce; podcast</option>
                                                                                <option value='power-off' {{(@$process_elements[$i-1]->list_image == 'power-off') ? "selected":""}}>&#xf011; power off</option>
                                                                                <option value='print' {{(@$process_elements[$i-1]->list_image == 'print') ? "selected":""}}>&#xf02f; print</option>
                                                                                <option value='product-hunt' {{(@$process_elements[$i-1]->list_image == 'product-hunt') ? "selected":""}}>&#xf288; product hunt</option>
                                                                                <option value='puzzle-piece' {{(@$process_elements[$i-1]->list_image == 'puzzle-piece') ? "selected":""}}>&#xf12e; puzzle piece</option>

                                                                                <option value='qq' {{(@$process_elements[$i-1]->list_image == 'qq') ? "selected":""}}>&#xf1d6; qq</option>
                                                                                <option value='qrcode' {{(@$process_elements[$i-1]->list_image == 'qrcode') ? "selected":""}}>&#xf029; qrcode</option>
                                                                                <option value='question' {{(@$process_elements[$i-1]->list_image == 'question') ? "selected":""}}>&#xf128; question</option>
                                                                                <option value="question-circle" {{(@$process_elements[$i-1]->list_image == 'question-circle') ? "selected":""}}>&#xf059; Question circle</option>
                                                                                <option value='question-circle-o' {{(@$process_elements[$i-1]->list_image == 'question-circle-o') ? "selected":""}}>&#xf29c; question circle o</option>
                                                                                <option value='quora' {{(@$process_elements[$i-1]->list_image == 'quora') ? "selected":""}}>&#xf2c4; quora</option>
                                                                                <option value='quote-left' {{(@$process_elements[$i-1]->list_image == 'quote-left') ? "selected":""}}>&#xf10d; quote left</option>
                                                                                <option value='quote-right' {{(@$process_elements[$i-1]->list_image == 'quote-right') ? "selected":""}}>&#xf10e; quote right</option>

                                                                                <option value='ra' {{(@$process_elements[$i-1]->list_image == 'ra') ? "selected":""}}>&#xf1d0; ra</option>
                                                                                <option value='random' {{(@$process_elements[$i-1]->list_image == 'random') ? "selected":""}}>&#xf074; random</option>
                                                                                <option value='ravelry' {{(@$process_elements[$i-1]->list_image == 'ravelry') ? "selected":""}}>&#xf2d9; ravelry</option>
                                                                                <option value='rebel' {{(@$process_elements[$i-1]->list_image == 'rebel') ? "selected":""}}>&#xf1d0; rebel</option>
                                                                                <option value='recycle' {{(@$process_elements[$i-1]->list_image == 'recycle') ? "selected":""}}>&#xf1b8; recycle</option>
                                                                                <option value='reddit' {{(@$process_elements[$i-1]->list_image == 'reddit') ? "selected":""}}>&#xf1a1; reddit</option>
                                                                                <option value='reddit-alien' {{(@$process_elements[$i-1]->list_image == 'reddit-alien') ? "selected":""}}>&#xf281; reddit alien</option>
                                                                                <option value='reddit-square' {{(@$process_elements[$i-1]->list_image == 'reddit-square') ? "selected":""}}>&#xf1a2; reddit square</option>
                                                                                <option value='refresh' {{(@$process_elements[$i-1]->list_image == 'refresh') ? "selected":""}}>&#xf021; refresh</option>
                                                                                <option value="registered" {{(@$process_elements[$i-1]->list_image == 'registered') ? "selected":""}}>&#xf25d; Registered</option>
                                                                                <option value='remove' {{(@$process_elements[$i-1]->list_image == 'remove') ? "selected":""}}>&#xf00d; remove</option>
                                                                                <option value='renren' {{(@$process_elements[$i-1]->list_image == 'renren') ? "selected":""}}>&#xf18b; renren</option>
                                                                                <option value='reorder' {{(@$process_elements[$i-1]->list_image == 'reorder') ? "selected":""}}>&#xf0c9; reorder</option>
                                                                                <option value='repeat' {{(@$process_elements[$i-1]->list_image == 'repeat') ? "selected":""}}>&#xf01e; repeat</option>
                                                                                <option value='reply' {{(@$process_elements[$i-1]->list_image == 'reply') ? "selected":""}}>&#xf112; reply</option>
                                                                                <option value='reply-all' {{(@$process_elements[$i-1]->list_image == 'reply-all') ? "selected":""}}>&#xf122; reply all</option>
                                                                                <option value='resistance' {{(@$process_elements[$i-1]->list_image == 'resistance') ? "selected":""}}>&#xf1d0; resistance</option>
                                                                                <option value='retweet' {{(@$process_elements[$i-1]->list_image == 'retweet') ? "selected":""}}>&#xf079; retweet</option>
                                                                                <option value='rmb' {{(@$process_elements[$i-1]->list_image == 'rmb') ? "selected":""}}>&#xf157; rmb</option>
                                                                                <option value='road' {{(@$process_elements[$i-1]->list_image == 'road') ? "selected":""}}>&#xf018; road</option>
                                                                                <option value='rocket' {{(@$process_elements[$i-1]->list_image == 'rocket') ? "selected":""}}>&#xf135; rocket</option>
                                                                                <option value='rotate-left' {{(@$process_elements[$i-1]->list_image == 'rotate-left') ? "selected":""}}>&#xf0e2; rotate left</option>
                                                                                <option value='rotate-right' {{(@$process_elements[$i-1]->list_image == 'rotate-right') ? "selected":""}}>&#xf01e; rotate right</option>
                                                                                <option value='rouble' {{(@$process_elements[$i-1]->list_image == 'rouble') ? "selected":""}}>&#xf158; rouble</option>
                                                                                <option value='rss' {{(@$process_elements[$i-1]->list_image == 'rss') ? "selected":""}}>&#xf09e; rss</option>
                                                                                <option value='rss-square' {{(@$process_elements[$i-1]->list_image == 'rss-square') ? "selected":""}}>&#xf143; rss square</option>
                                                                                <option value='rub' {{(@$process_elements[$i-1]->list_image == 'rub') ? "selected":""}}>&#xf158; rub</option>
                                                                                <option value='ruble' {{(@$process_elements[$i-1]->list_image == 'ruble') ? "selected":""}}>&#xf158; ruble</option>
                                                                                <option value='rupee' {{(@$process_elements[$i-1]->list_image == 'rupee') ? "selected":""}}>&#xf156; rupee</option>


                                                                                <option value='s15' {{(@$process_elements[$i-1]->list_image == 's15') ? "selected":""}}>&#xf2cd; s15</option>
                                                                                <option value='safari' {{(@$process_elements[$i-1]->list_image == 'safari') ? "selected":""}}>&#xf267; safari</option>
                                                                                <option value="save" {{(@$process_elements[$i-1]->list_image == 'save') ? "selected":""}}>&#xf0c7; Save</option>
                                                                                <option value='scissors' {{(@$process_elements[$i-1]->list_image == 'scissors') ? "selected":""}}>&#xf0c4; scissors</option>
                                                                                <option value='scribd' {{(@$process_elements[$i-1]->list_image == 'scribd') ? "selected":""}}>&#xf28a; scribd</option>
                                                                                <option value='search' {{(@$process_elements[$i-1]->list_image == 'search') ? "selected":""}}>&#xf002; search</option>
                                                                                <option value='search-minus' {{(@$process_elements[$i-1]->list_image == 'search-minus') ? "selected":""}}>&#xf010; search minus</option>
                                                                                <option value='search-plus' {{(@$process_elements[$i-1]->list_image == 'search-plus') ? "selected":""}}>&#xf00e; search plus</option>
                                                                                <option value='sellsy' {{(@$process_elements[$i-1]->list_image == 'sellsy') ? "selected":""}}>&#xf213; sellsy</option>
                                                                                <option value='send' {{(@$process_elements[$i-1]->list_image == 'send') ? "selected":""}}>&#xf1d8; send</option>
                                                                                <option value='send-o' {{(@$process_elements[$i-1]->list_image == 'send-o') ? "selected":""}}>&#xf1d9; send o</option>
                                                                                <option value='server' {{(@$process_elements[$i-1]->list_image == 'server') ? "selected":""}}>&#xf233; server</option>
                                                                                <option value='share' {{(@$process_elements[$i-1]->list_image == 'share') ? "selected":""}}>&#xf064; share</option>
                                                                                <option value='share-alt' {{(@$process_elements[$i-1]->list_image == 'share-alt') ? "selected":""}}>&#xf1e0; share alt</option>
                                                                                <option value='share-alt-square' {{(@$process_elements[$i-1]->list_image  == 'share-alt-square') ? "selected":""}}>&#xf1e1; share alt square</option>
                                                                                <option value="share-square" {{(@$process_elements[$i-1]->list_image  == 'share-square') ? "selected":""}}>&#xf14d; Share square</option>
                                                                                <option value='share-square-o' {{(@$process_elements[$i-1]->list_image  == 'share-square-o') ? "selected":""}}>&#xf045; share square o</option>
                                                                                <option value='shekel' {{(@$process_elements[$i-1]->list_image  == 'shekel') ? "selected":""}}>&#xf20b; shekel</option>
                                                                                <option value='sheqel' {{(@$process_elements[$i-1]->list_image  == 'sheqel') ? "selected":""}}>&#xf20b; sheqel</option>
                                                                                <option value='shield' {{(@$process_elements[$i-1]->list_image == 'shield') ? "selected":""}}>&#xf132; shield</option>
                                                                                <option value='ship' {{(@$process_elements[$i-1]->list_image == 'ship') ? "selected":""}}>&#xf21a; ship</option>
                                                                                <option value='shirtsinbulk' {{(@$process_elements[$i-1]->list_image == 'shirtsinbulk') ? "selected":""}}>&#xf214; shirtsinbulk</option>
                                                                                <option value='shopping-bag' {{(@$process_elements[$i-1]->list_image == 'shopping-bag') ? "selected":""}}>&#xf290; shopping bag</option>
                                                                                <option value='shopping-basket' {{(@$process_elements[$i-1]->list_image == 'shopping-basket') ? "selected":""}}>&#xf291; shopping basket</option>
                                                                                <option value='shopping-cart' {{(@$process_elements[$i-1]->list_image == 'shopping-cart') ? "selected":""}}>&#xf07a; shopping cart</option>
                                                                                <option value='shower' {{(@$process_elements[$i-1]->list_image == 'shower') ? "selected":""}}>&#xf2cc; shower</option>
                                                                                <option value='sign-in' {{(@$process_elements[$i-1]->list_image == 'sign-in') ? "selected":""}}>&#xf090; sign in</option>
                                                                                <option value='sign-language' {{(@$process_elements[$i-1]->list_image == 'sign-language') ? "selected":""}}>&#xf2a7; sign language</option>
                                                                                <option value='sign-out' {{(@$process_elements[$i-1]->list_image == 'sign-out') ? "selected":""}}>&#xf08b; sign out</option>
                                                                                <option value='signal' {{(@$process_elements[$i-1]->list_image == 'signal') ? "selected":""}}>&#xf012; signal</option>
                                                                                <option value='signing' {{(@$process_elements[$i-1]->list_image == 'signing') ? "selected":""}}>&#xf2a7; signing</option>
                                                                                <option value='simplybuilt' {{(@$process_elements[$i-1]->list_image == 'simplybuilt') ? "selected":""}}>&#xf215; simplybuilt</option>
                                                                                <option value='sitemap' {{(@$process_elements[$i-1]->list_image == 'sitemap') ? "selected":""}}>&#xf0e8; sitemap</option>
                                                                                <option value='skyatlas' {{(@$process_elements[$i-1]->list_image == 'skyatlas') ? "selected":""}}>&#xf216; skyatlas</option>
                                                                                <option value='skype' {{(@$process_elements[$i-1]->list_image == 'skype') ? "selected":""}}>&#xf17e; skype</option>
                                                                                <option value='slack' {{(@$process_elements[$i-1]->list_image == 'slack') ? "selected":""}}>&#xf198; slack</option>
                                                                                <option value='sliders' {{(@$process_elements[$i-1]->list_image == 'sliders') ? "selected":""}}>&#xf1de; sliders</option>
                                                                                <option value='slideshare' {{(@$process_elements[$i-1]->list_image == 'slideshare') ? "selected":""}}>&#xf1e7; slideshare</option>
                                                                                <option value="smile" {{(@$process_elements[$i-1]->list_image == 'smile') ? "selected":""}}>&#xf118; Smile</option>
                                                                                <option value="snowflake" {{(@$process_elements[$i-1]->list_image == 'snowflake') ? "selected":""}}>&#xf2dc; Snowflake</option>
                                                                                <option value='soccer-ball-o' {{(@$process_elements[$i-1]->list_image == 'soccer-ball-o') ? "selected":""}}>&#xf1e3; soccer ball o</option>
                                                                                <option value='soundcloud' {{(@$process_elements[$i-1]->list_image == 'soundcloud') ? "selected":""}}>&#xf1be; soundcloud</option>
                                                                                <option value='space-shuttle' {{(@$process_elements[$i-1]->list_image == 'space-shuttle') ? "selected":""}}>&#xf197; space shuttle</option>
                                                                                <option value='spinner' {{(@$process_elements[$i-1]->list_image == 'spinner') ? "selected":""}}>&#xf110; spinner</option>
                                                                                <option value='spoon' {{(@$process_elements[$i-1]->list_image == 'spoon') ? "selected":""}}>&#xf1b1; spoon</option>
                                                                                <option value="square" {{(@$process_elements[$i-1]->list_image == 'square') ? "selected":""}}>&#xf0c8; Square</option>
                                                                                <option value='square-o' {{(@$process_elements[$i-1]->list_image == 'square-o') ? "selected":""}}>&#xf096; square o</option>
                                                                                <option value='stack-exchange' {{(@$process_elements[$i-1]->list_image == 'stack-exchange') ? "selected":""}}>&#xf18d; stack exchange</option>
                                                                                <option value='stack-overflow' {{(@$process_elements[$i-1]->list_image == 'stack-overflow') ? "selected":""}}>&#xf16c; stack overflow</option>
                                                                                <option value="star" {{(@$process_elements[$i-1]->list_image == 'star') ? "selected":""}}>&#xf005; Star</option>
                                                                                <option value="star-half" {{(@$process_elements[$i-1]->list_image == 'star-half') ? "selected":""}}>&#xf089; Star half</option>
                                                                                <option value='star-half-empty' {{(@$process_elements[$i-1]->list_image == 'star-half-empty') ? "selected":""}}>&#xf123; star half empty</option>
                                                                                <option value='star-half-full' {{(@$process_elements[$i-1]->list_image == 'star-half-full') ? "selected":""}}>&#xf123; star half full</option>
                                                                                <option value='star-half-o' {{(@$process_elements[$i-1]->list_image == 'star-half-o') ? "selected":""}}>&#xf123; star half o</option>
                                                                                <option value='star-o' {{(@$process_elements[$i-1]->list_image == 'star-o') ? "selected":""}}>&#xf006; star o</option>
                                                                                <option value='steam' {{(@$process_elements[$i-1]->list_image == 'steam') ? "selected":""}}>&#xf1b6; steam</option>
                                                                                <option value='steam-square' {{(@$process_elements[$i-1]->list_image == 'steam-square') ? "selected":""}}>&#xf1b7; steam square</option>
                                                                                <option value='step-backward' {{(@$process_elements[$i-1]->list_image == 'step-backward') ? "selected":""}}>&#xf048; step backward</option>
                                                                                <option value='step-forward' {{(@$process_elements[$i-1]->list_image == 'step-forward') ? "selected":""}}>&#xf051; step forward</option>
                                                                                <option value='stethoscope' {{(@$process_elements[$i-1]->list_image == 'stethoscope') ? "selected":""}}>&#xf0f1; stethoscope</option>
                                                                                <option value="sticky-note" {{(@$process_elements[$i-1]->list_image == 'sticky-note') ? "selected":""}}>&#xf249; sticky note</option>
                                                                                <option value='sticky-note-o' {{(@$process_elements[$i-1]->list_image == 'sticky-note-o') ? "selected":""}}>&#xf24a; sticky note o</option>
                                                                                <option value='stop' {{(@$process_elements[$i-1]->list_image == 'stop') ? "selected":""}}>&#xf04d; stop</option>
                                                                                <option value="stop-circle" {{(@$process_elements[$i-1]->list_image == 'stop-circle') ? "selected":""}}>&#xf28d; Stop circle</option>
                                                                                <option value='stop-circle-o' {{(@$process_elements[$i-1]->list_image == 'stop-circle-o') ? "selected":""}}>&#xf28e; stop circle o</option>
                                                                                <option value='street-view' {{(@$process_elements[$i-1]->list_image == 'street-view') ? "selected":""}}>&#xf21d; street-view</option>
                                                                                <option value='strikethrough' {{(@$process_elements[$i-1]->list_image == 'strikethrough') ? "selected":""}}>&#xf0cc; strikethrough</option>
                                                                                <option value='stumbleupon' {{(@$process_elements[$i-1]->list_image == 'stumbleupon') ? "selected":""}}>&#xf1a4; stumbleupon</option>
                                                                                <option value='stumbleupon-circle' {{(@$process_elements[$i-1]->list_image == 'stumbleupon-circle') ? "selected":""}}>&#xf1a3; stumbleupon circle</option>
                                                                                <option value='subscript' {{(@$process_elements[$i-1]->list_image == 'subscript') ? "selected":""}}>&#xf12c; subscript</option>
                                                                                <option value='subway' {{(@$process_elements[$i-1]->list_image == 'subway') ? "selected":""}}>&#xf239; subway</option>
                                                                                <option value='suitcase' {{(@$process_elements[$i-1]->list_image == 'suitcase') ? "selected":""}}>&#xf0f2; suitcase</option>
                                                                                <option value="sun" {{(@$process_elements[$i-1]->list_image == 'sun') ? "selected":""}}>&#xf185; Sun</option>
                                                                                <option value='superpowers' {{(@$process_elements[$i-1]->list_image == 'superpowers') ? "selected":""}}>&#xf2dd; superpowers</option>
                                                                                <option value='superscript' {{(@$process_elements[$i-1]->list_image == 'superscript') ? "selected":""}}>&#xf12b; superscript</option>
                                                                                <option value='support' {{(@$process_elements[$i-1]->list_image == 'support') ? "selected":""}}>&#xf1cd; support</option>
                                                                                <option value="surprise" {{(@$process_elements[$i-1]->list_image == 'surprise') ? "selected":""}}>&#xf5c2; Surprise </option>


                                                                                <option value='table' {{(@$process_elements[$i-1]->list_image == 'table') ? "selected":""}}>&#xf0ce; table</option>
                                                                                <option value='tablet' {{(@$process_elements[$i-1]->list_image == 'tablet') ? "selected":""}}>&#xf10a; tablet</option>
                                                                                <option value='tachometer' {{(@$process_elements[$i-1]->list_image == 'tachometer') ? "selected":""}}>&#xf0e4; tachometer</option>
                                                                                <option value='tag' {{(@$process_elements[$i-1]->list_image == 'tag') ? "selected":""}}>&#xf02b; tag</option>
                                                                                <option value='tags' {{(@$process_elements[$i-1]->list_image == 'tags') ? "selected":""}}>&#xf02c; tags</option>
                                                                                <option value='tasks' {{(@$process_elements[$i-1]->list_image == 'tasks') ? "selected":""}}>&#xf0ae; tasks</option>
                                                                                <option value='taxi' {{(@$process_elements[$i-1]->list_image == 'taxi') ? "selected":""}}>&#xf1ba; taxi</option>
                                                                                <option value='telegram' {{(@$process_elements[$i-1]->list_image == 'telegram') ? "selected":""}}>&#xf2c6; telegram</option>
                                                                                <option value='television' {{(@$process_elements[$i-1]->list_image == 'television') ? "selected":""}}>&#xf26c; television</option>
                                                                                <option value='tencent-weibo' {{(@$process_elements[$i-1]->list_image == 'tencent-weibo') ? "selected":""}}>&#xf1d5; tencent weibo</option>
                                                                                <option value='terminal' {{(@$process_elements[$i-1]->list_image == 'terminal') ? "selected":""}}>&#xf120; terminal</option>
                                                                                <option value='themeisle' {{(@$process_elements[$i-1]->list_image == 'themeisle') ? "selected":""}}>&#xf2b2; themeisle</option>
                                                                                <option value='thermometer' {{(@$process_elements[$i-1]->list_image == 'thermometer') ? "selected":""}}>&#xf2c7; thermometer</option>
                                                                                <option value='thumb-tack' {{(@$process_elements[$i-1]->list_image == 'thumb-tack') ? "selected":""}}>&#xf08d; thumb tack</option>
                                                                                <option value="thumbs-down" {{(@$process_elements[$i-1]->list_image == 'thumbs-down') ? "selected":""}}>&#xf165; Thumbs down</option>
                                                                                <option value='thumbs-o-down' {{(@$process_elements[$i-1]->list_image == 'thumbs-o-down') ? "selected":""}}>&#xf088; thumbs o down</option>
                                                                                <option value='thumbs-o-up' {{(@$process_elements[$i-1]->list_image == 'thumbs-o-up') ? "selected":""}}>&#xf087; thumbs o up</option>
                                                                                <option value='thumbs-up' {{(@$process_elements[$i-1]->list_image == 'thumbs-up') ? "selected":""}}>&#xf164; thumbs up</option>
                                                                                <option value='ticket' {{(@$process_elements[$i-1]->list_image == 'ticket') ? "selected":""}}>&#xf145; ticket</option>
                                                                                <option value='times' {{(@$process_elements[$i-1]->list_image == 'times') ? "selected":""}}>&#xf00d; times</option>
                                                                                <option value="times-circle" {{(@$process_elements[$i-1]->list_image == 'times-circle') ? "selected":""}}>&#xf057; Times circle</option>
                                                                                <option value='times-circle-o' {{(@$process_elements[$i-1]->list_image == 'times-circle-o') ? "selected":""}}>&#xf05c; times circle o</option>
                                                                                <option value='times-rectangle' {{(@$process_elements[$i-1]->list_image == 'times-rectangle') ? "selected":""}}>&#xf2d3; times rectangle</option>
                                                                                <option value='times-rectangle-o' {{(@$process_elements[$i-1]->list_image == 'times-rectangle-o') ? "selected":""}}>&#xf2d4; times rectangle o</option>
                                                                                <option value='tint' {{(@$process_elements[$i-1]->list_image == 'tint') ? "selected":""}}>&#xf043; tint</option>
                                                                                <option value='trademark' {{(@$process_elements[$i-1]->list_image == 'trademark') ? "selected":""}}>&#xf25c; trademark</option>
                                                                                <option value='train' {{(@$process_elements[$i-1]->list_image == 'train') ? "selected":""}}>&#xf238; train</option>
                                                                                <option value='transgender' {{(@$process_elements[$i-1]->list_image == 'transgender') ? "selected":""}}>&#xf224; transgender</option>
                                                                                <option value='transgender-alt' {{(@$process_elements[$i-1]->list_image == 'transgender-alt') ? "selected":""}}>&#xf225; transgender alt</option>
                                                                                <option value='trash' {{(@$process_elements[$i-1]->list_image == 'trash') ? "selected":""}}>&#xf1f8; trash</option>
                                                                                <option value='trash-o' {{(@$process_elements[$i-1]->list_image == 'trash-o') ? "selected":""}}>&#xf014; trash o</option>
                                                                                <option value='tree' {{(@$process_elements[$i-1]->list_image == 'tree') ? "selected":""}}>&#xf1bb; tree</option>
                                                                                <option value='trello' {{(@$process_elements[$i-1]->list_image == 'trello') ? "selected":""}}>&#xf181; trello</option>
                                                                                <option value='tripadvisor' {{(@$process_elements[$i-1]->list_image == 'tripadvisor') ? "selected":""}}>&#xf262; tripadvisor</option>
                                                                                <option value='trophy' {{(@$process_elements[$i-1]->list_image == 'trophy') ? "selected":""}}>&#xf091; trophy</option>
                                                                                <option value='truck' {{(@$process_elements[$i-1]->list_image == 'truck') ? "selected":""}}>&#xf0d1; truck</option>
                                                                                <option value='try' {{(@$process_elements[$i-1]->list_image == 'try') ? "selected":""}}>&#xf195; try</option>
                                                                                <option value='tty' {{(@$process_elements[$i-1]->list_image == 'tty') ? "selected":""}}>&#xf1e4; tty</option>
                                                                                <option value='tumblr' {{(@$process_elements[$i-1]->list_image == 'tumblr') ? "selected":""}}>&#xf173; tumblr</option>
                                                                                <option value='turkish-lira' {{(@$process_elements[$i-1]->list_image == 'turkish-lira') ? "selected":""}}>&#xf195; turkish lira</option>
                                                                                <option value='tv' {{(@$process_elements[$i-1]->list_image == 'tv') ? "selected":""}}>&#xf26c; tv</option>
                                                                                <option value='twitch' {{(@$process_elements[$i-1]->list_image == 'twitch') ? "selected":""}}>&#xf1e8; twitch</option>
                                                                                <option value='twitter' {{(@$process_elements[$i-1]->list_image == 'twitter') ? "selected":""}}>&#xf099; twitter</option>


                                                                                <option value='umbrella' {{(@$process_elements[$i-1]->list_image == 'umbrella') ? "selected":""}}>&#xf0e9; umbrella</option>
                                                                                <option value='underline' {{(@$process_elements[$i-1]->list_image == 'underline') ? "selected":""}}>&#xf0cd; underline</option>
                                                                                <option value='undo' {{(@$process_elements[$i-1]->list_image == 'undo') ? "selected":""}}>&#xf0e2; undo</option>
                                                                                <option value='universal-access' {{(@$process_elements[$i-1]->list_image == 'universal-access') ? "selected":""}}>&#xf29a; universal access</option>
                                                                                <option value='university' {{(@$process_elements[$i-1]->list_image == 'university') ? "selected":""}}>&#xf19c; university</option>
                                                                                <option value='unlink' {{(@$process_elements[$i-1]->list_image == 'unlink') ? "selected":""}}>&#xf127; unlink</option>
                                                                                <option value='unlock' {{(@$process_elements[$i-1]->list_image == 'unlock') ? "selected":""}}>&#xf09c; unlock</option>
                                                                                <option value='unlock-alt' {{(@$process_elements[$i-1]->list_image == 'unlock-alt') ? "selected":""}}>&#xf13e; unlock alt</option>
                                                                                <option value='unsorted' {{(@$process_elements[$i-1]->list_image == 'unsorted') ? "selected":""}}>&#xf0dc; unsorted</option>
                                                                                <option value='upload' {{(@$process_elements[$i-1]->list_image == 'upload') ? "selected":""}}>&#xf093; upload</option>
                                                                                <option value='usb' {{(@$process_elements[$i-1]->list_image == 'usb') ? "selected":""}}>&#xf287; usb</option>
                                                                                <option value='usd' {{(@$process_elements[$i-1]->list_image == 'usd') ? "selected":""}}>&#xf155; usd</option>
                                                                                <option value="user" {{(@$process_elements[$i-1]->list_image == 'user') ? "selected":""}}>&#xf007; User</option>
                                                                                <option value="user-circle" {{(@$process_elements[$i-1]->list_image == 'user-circle') ? "selected":""}}>&#xf2bd; User circle</option>
                                                                                <option value='user-circle-o' {{(@$process_elements[$i-1]->list_image == 'user-circle-o') ? "selected":""}}>&#xf2be; user circle o</option>
                                                                                <option value='user-md' {{(@$process_elements[$i-1]->list_image == 'user-md') ? "selected":""}}>&#xf0f0; user md</option>
                                                                                <option value='user-o' {{(@$process_elements[$i-1]->list_image == 'user-o') ? "selected":""}}>&#xf2c0; user o</option>
                                                                                <option value='user-plus' {{(@$process_elements[$i-1]->list_image == 'user-plus') ? "selected":""}}>&#xf234; user plus</option>
                                                                                <option value='user-secret' {{(@$process_elements[$i-1]->list_image == 'user-secret') ? "selected":""}}>&#xf21b; user secret</option>
                                                                                <option value='user-times' {{(@$process_elements[$i-1]->list_image == 'user-times') ? "selected":""}}>&#xf235; user times</option>
                                                                                <option value='users' {{(@$process_elements[$i-1]->list_image == 'users') ? "selected":""}}>&#xf0c0; users</option>
                                                                                <option value='vcard' {{(@$process_elements[$i-1]->list_image == 'vcard') ? "selected":""}}>&#xf2bb; vcard</option>
                                                                                <option value='vcard-o' {{(@$process_elements[$i-1]->list_image == 'vcard-o') ? "selected":""}}>&#xf2bc; vcard-o</option>
                                                                                <option value='venus' {{(@$process_elements[$i-1]->list_image == 'venus') ? "selected":""}}>&#xf221; venus</option>
                                                                                <option value='venus-double' {{(@$process_elements[$i-1]->list_image == 'venus-double') ? "selected":""}}>&#xf226; venus double</option>
                                                                                <option value='venus-mars' {{(@$process_elements[$i-1]->list_image == 'venus-mars') ? "selected":""}}>&#xf228; venus mars</option>
                                                                                <option value='viacoin' {{(@$process_elements[$i-1]->list_image == 'viacoin') ? "selected":""}}>&#xf237; viacoin</option>
                                                                                <option value='viadeo' {{(@$process_elements[$i-1]->list_image == 'viadeo') ? "selected":""}}>&#xf2a9; viadeo</option>
                                                                                <option value='viadeo-square' {{(@$process_elements[$i-1]->list_image == 'viadeo-square') ? "selected":""}}>&#xf2aa; viadeo square</option>
                                                                                <option value='video-camera' {{(@$process_elements[$i-1]->list_image == 'video-camera') ? "selected":""}}>&#xf03d; video camera</option>
                                                                                <option value='vimeo' {{(@$process_elements[$i-1]->list_image == 'vimeo') ? "selected":""}}>&#xf27d; vimeo</option>
                                                                                <option value='vimeo-square' {{(@$process_elements[$i-1]->list_image == 'vimeo-square') ? "selected":""}}>&#xf194; vimeo square</option>
                                                                                <option value='vine' {{(@$process_elements[$i-1]->list_image == 'vine') ? "selected":""}}>&#xf1ca; vine</option>
                                                                                <option value='vk' {{(@$process_elements[$i-1]->list_image == 'vk') ? "selected":""}}>&#xf189; vk</option>
                                                                                <option value='volume-control-phone' {{(@$process_elements[$i-1]->list_image == 'volume-control-phone') ? "selected":""}}>&#xf2a0; volume control phone</option>
                                                                                <option value='volume-down' {{(@$process_elements[$i-1]->list_image == 'volume-down') ? "selected":""}}>&#xf027; volume down</option>
                                                                                <option value='volume-off' {{(@$process_elements[$i-1]->list_image == 'volume-off') ? "selected":""}}>&#xf026; volume off</option>
                                                                                <option value='volume-up' {{(@$process_elements[$i-1]->list_image == 'volume-up') ? "selected":""}}>&#xf028; volume up</option>
                                                                                <option value='warning' {{(@$process_elements[$i-1]->list_image == 'warning') ? "selected":""}}>&#xf071; warning</option>
                                                                                <option value='weibo' {{(@$process_elements[$i-1]->list_image == 'weibo') ? "selected":""}}>&#xf18a; weibo</option>
                                                                                <option value='weixin' {{(@$process_elements[$i-1]->list_image == 'weixin') ? "selected":""}}>&#xf1d7; weixin</option>
                                                                                <option value='whatsapp' {{(@$process_elements[$i-1]->list_image == 'whatsapp') ? "selected":""}}>&#xf232; whatsapp</option>
                                                                                <option value='wheelchair' {{(@$process_elements[$i-1]->list_image == 'wheelchair') ? "selected":""}}>&#xf193; wheelchair</option>
                                                                                <option value='wheelchair-alt' {{(@$process_elements[$i-1]->list_image == 'wheelchair-alt') ? "selected":""}}>&#xf29b; wheelchair alt</option>
                                                                                <option value='wifi' {{(@$process_elements[$i-1]->list_image == 'wifi') ? "selected":""}}>&#xf1eb; wifi</option>
                                                                                <option value='wikipedia-w' {{(@$process_elements[$i-1]->list_image == 'wikipedia-w') ? "selected":""}}>&#xf266; wikipedia w</option>
                                                                                <option value='window-close' {{(@$process_elements[$i-1]->list_image == 'window-close') ? "selected":""}}>&#xf2d3; window close</option>
                                                                                <option value='window-close-o' {{(@$process_elements[$i-1]->list_image == 'window-close-o') ? "selected":""}}>&#xf2d4; window close o</option>
                                                                                <option value='window-maximize' {{(@$process_elements[$i-1]->list_image == 'window-maximize') ? "selected":""}}>&#xf2d0; window maximize</option>
                                                                                <option value='window-minimize' {{(@$process_elements[$i-1]->list_image == 'window-minimize') ? "selected":""}}>&#xf2d1; window minimize</option>
                                                                                <option value='window-restore' {{(@$process_elements[$i-1]->list_image == 'window-restore') ? "selected":""}}>&#xf2d2; window restore</option>
                                                                                <option value='windows' {{(@$process_elements[$i-1]->list_image == 'windows') ? "selected":""}}>&#xf17a; windows</option>
                                                                                <option value='won' {{(@$process_elements[$i-1]->list_image == 'won') ? "selected":""}}>&#xf159; won</option>
                                                                                <option value='wordpress' {{(@$process_elements[$i-1]->list_image == 'wordpress') ? "selected":""}}>&#xf19a; wordpress</option>
                                                                                <option value='wpbeginner' {{(@$process_elements[$i-1]->list_image == 'wpbeginner') ? "selected":""}}>&#xf297; wpbeginner</option>
                                                                                <option value='wpexplorer' {{(@$process_elements[$i-1]->list_image == 'wpexplorer') ? "selected":""}}>&#xf2de; wpexplorer</option>
                                                                                <option value='wpforms' {{(@$process_elements[$i-1]->list_image == 'wpforms') ? "selected":""}}>&#xf298; wpforms</option>
                                                                                <option value='wrench' {{(@$process_elements[$i-1]->list_image == 'wrench') ? "selected":""}}>&#xf0ad; wrench</option>
                                                                                <option value='yahoo' {{(@$process_elements[$i-1]->list_image == 'yahoo') ? "selected":""}}>&#xf19e; yahoo</option>
                                                                                <option value='yc' {{(@$process_elements[$i-1]->list_image == 'yc') ? "selected":""}}>&#xf23b; yc</option>
                                                                                <option value='yelp' {{(@$process_elements[$i-1]->list_image == 'yelp') ? "selected":""}}>&#xf1e9; yelp</option>
                                                                                <option value='yen' {{(@$process_elements[$i-1]->list_image == 'yen') ? "selected":""}}>&#xf157; yen</option>
                                                                                <option value='youtube' {{(@$process_elements[$i-1]->list_image == 'youtube') ? "selected":""}}>&#xf167; youtube</option>

                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mb-3">
                                                                            <label>Description <span class="text-muted text-danger">*</span></label>
                                                                            <textarea class="form-control" maxlength="250" rows="8" name="list_description[]" required>{{@$process_elements[$i-1]->list_description}}</textarea>
                                                                            <div class="invalid-feedback">
                                                                                Please write the description.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endfor

                                        </div>
                                    </div>
                                        <div class="text-end mb-4 mt-4" id="process-form-button">
                                            <button  id="process-button-submit" type="submit" class="btn btn-success w-sm">{{(sizeof(@$process_elements) !== 0) ? "Update Details":"Add Details"}}</button>
                                        </div>

                                    {!! Form::close() !!}

                                @endif
                            </div>
                            <?php $j++; ?>
                        @endforeach
                    </div>
                </div>
                <!-- end col -->
            </div>


        </div>
    </div>

@endsection

@section('js')
{{--    <!-- <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script> -->--}}
    <script type="text/javascript">
        var section_list = new Array();
        <?php foreach($sections as $key => $val){ ?>
        section_list.push('<?php echo $val; ?>');
            <?php } ?>
    </script>

    @include('backend.ckeditor')
    <script src="{{asset('assets/backend/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/dropzone/dropzone.config.js')}}"></script>


    <script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    </script>

    <script type="text/javascript">
        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        function reload(){
            location.reload();
        }

        function slugMaker(title, slug){
            $("#"+ title).keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                var regExp = /\s+/g;
                Text = Text.replace(regExp,'-');
                $("#"+slug).val(Text);
            });
        }

        function ElementData(post_url,request_method,form_data,divID,buttonID){
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data,
                contentType: false,
                cache: false,
                processData:false
            }).done(function(response){
                if (response=="successfully created" || response=="successfully updated"){
                    var replacement = '<div class="card">' +
                        '<div class="card-body p-0"> ' +
                        '<div class="alert alert-success border-0 rounded-0 m-0 d-flex align-items-center" role="alert"> ' +
                        '<i class="ri-user-smile-line me-3 align-middle fs-16"></i>'+
                        '<div class="flex-grow-1 text-truncate">Success !</div>' +
                        '<div class="flex-shrink-0"> ' +
                        '</div> ' +
                        '</div> ' +
                        '<div class="row align-items-end"> ' +
                        '<div class="col-sm-8"> ' +
                        '<div class="p-3"> ' +
                        '<p class="fs-16 lh-base">Section element has been <span class="fw-semibold">'+ response +' </span>, You can continue to add other elements or ‘Click below’ <i class="mdi mdi-arrow-right"></i></p> ' +
                        '<div class="mt-3"> ' +
                        '<a onclick="reload()" class="btn btn-success">Refresh Page!</a>' +
                        '</div> ' +
                        '</div> ' +
                        '</div> ' +
                        '</div> ' +
                        '</div> ' +
                        '</div>';
                    $('#' + divID).html(replacement);
                    $('#' + buttonID).html("");
                }
                else{
                    var replacements = ' <div class="col-md-12"><div id="container"> ' +
                        '<div id="error-box"> ' +
                        '<div class="face2"> ' +
                        '<div class="eye"></div><div class="eye right"></div><div class="mouth sad"></div> ' +
                        '</div> ' +
                        '<div class="shadow scale"></div> ' +
                        '<div class="message2"><h1 class="alert">Error! Something went wrong.</h1><p class="alert-para">The section element could not be created or updated.</div> ' +
                        '<a onclick="reload()" class="button-box"><h1 class="red">try again</h1></a></div></div> ' +
                        '</div>';
                    $('#' + divID).html(replacements);
                    $('#' + buttonID).html("");
                }
            });
        }

        function createEditor2 ( elementId ) {

            return ClassicEditor
                .create( document.querySelector( '#' + elementId ), {
                    toolbar : {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'link', '|',
                            'outdent', 'indent', '|',
                            'bulletedList', 'numberedList', '|',
                            'insertTable', 'blockQuote', '|',
                            'undo', 'redo'
                        ],
                    },
                    link: {
                        // Automatically add target="_blank" and rel="noopener noreferrer" to all external links.
                        addTargetToExternalLinks: true,

                        // Let the users control the "download" attribute of each link.
                        decorators: [
                            {
                                mode: 'manual',
                                label: 'Downloadable',
                                attributes: {
                                    download: 'download'
                                }
                            }
                        ]
                    },
                } )
                .then( editor => {
                    window.editor = editor;
                    editor.model.document.on( 'change:data', () => {
                        $( '#' + elementId).text(editor.getData());
                    } );
                } )
                .catch( err => {
                    console.error( err.stack );
                } );
        }


        //for attributes and values
        var counter = 0;
        $('#multi-field-wrapper').each(function() {
            var $wrapper = $('#multi-fields', this);

            //disable the delete button if the cloned div is just one
            clonecount = $('.multi-field').length;
            if(clonecount == 1){
                $('.remove-field').addClass('add-disabled');
            }

            $("#add-field", $(this)).click(function(e) {
                counter++;
                clonecount = clonecount + 1;
                //remove the disable option for button once the cloned div is more than 1
                if(clonecount > 1){
                    $('.remove-field').removeClass('add-disabled');
                }
                //clone the element and add the id to div to make select field unique.
                var newElem = $('.multi-field:last-child', $wrapper).clone(true).appendTo($wrapper).attr('id', 'cloned-' + counter).find("input").val("");
                //remove the initial id from select and add new ID
                $('.multi-field').find('select').last().removeAttr('id').attr('id', 'header_' + counter).find('option').focus();
                $('.multi-field').find('select').last().val('');
            });

            $('.multi-field .remove-field', $wrapper).click(function() {
                clonecount = clonecount - 1;
                if(clonecount == 1){
                    $('.remove-field').addClass('add-disabled');
                }else if (clonecount > 1){
                    $('.remove-field').removeClass('add-disabled');
                }
                if ($('.multi-field', $wrapper).length > 1){
                    var id = $(this).prev().find('option:selected').val();
                    $(this).parent('.input-group').parent('.multi-field').remove();
                }
            });

        });


        $(document).ready(function () {
            if(section_list.includes("directors_message")){
                createEditor2('director_editor');
            }
            if(section_list.includes("basic_section")){
                createEditor2('basic_editor');
            }
            if(section_list.includes("simple_header_and_description")){
                createEditor('task-textarea');
            }

            if(section_list.includes("image_description_list")){
                var list3 = "{{$list_3}}";
                for ($i = 1; $i <=list3; $i++){
                    createEditor2('image_description_list_editor_'+$i);
                }
            }


        });

        if($.inArray("basic_section", section_list) !== -1) {

            $("#basic-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false; }
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });

        }

        if($.inArray("directors_message", section_list) !== -1) {

            $("#directors-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false; }
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });

        }

        if($.inArray("video_section", section_list) !== -1) {

            $("#video-section-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false; }
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });

        }


        if($.inArray("basic_section2", section_list) !== -1) {

            $("#basic2-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false; }
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });

        }

        if($.inArray("map_and_description", section_list) !== -1) {

            $("#map-descrip-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false; }
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });

        }

        if($.inArray("call_to_action_1", section_list) !== -1) {
            $("#call-action1-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}

                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("call_to_action_2", section_list) !== -1) {
            $("#call-action2-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}

                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("background_image_section", section_list) !== -1) {
            $("#background-image-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}

                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("flash_cards", section_list) !== -1) {
            $("#flash-card-form").submit(function(event){
                if (!this.checkValidity()) { return false;}

                event.preventDefault(); //prevent default action
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);
            });
        }

        if($.inArray("simple_header_and_description", section_list) !== -1) {
            $("#header-descp-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}

                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);
            });
        }

        if($.inArray("accordion_section", section_list) !== -1) {

            $("#accordion2-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("image_description_list", section_list) !== -1) {

            $("#slider-list-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("simple_tab", section_list) !== -1) {

            $("#process-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }


    </script>


@endsection
