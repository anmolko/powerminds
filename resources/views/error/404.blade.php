@extends('frontend.layouts.master')
@section('title')  Page Not Found @endsection
@section('content')


    <!--site-main start-->
    <div class="site-main">

        <section class="error-404 bg-img3">
            <div class="container">
                <div class="ttm-big-icon ttm-textcolor-skincolor">
                    <i class="fa fa-exclamation-circle"></i>
                </div>
                <header class="page-header"><h1 class="page-title">404 ERROR</h1></header>
                <div class="page-content"> <p>This page may have been moved or deleted. Be sure to check your spelling.</p></div>
                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-dark" href="/">Back To Home</a>
            </div>
        </section>

    </div><!--site-main end-->


@endsection
