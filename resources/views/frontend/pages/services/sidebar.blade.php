<div class="col-lg-4 widget-area sidebar-left ttm-col-bgcolor-yes ttm-bg ttm-left-span ttm-bgcolor-grey mt_80 padding_top80 mb_80 padding_bottom80 res-991-margin_top0 res-991-padding_top0 " id="service-sidebar">
    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
    @if(!empty($latestServices))

    <aside class="widget widget-nav-menu with-title">
        <h3 class="widget-title">Services</h3>
        <ul>
            @foreach($latestServices as $index => $latest)
                <li class="@if(Request::url() === url('/service/'.$latest->slug)) active @endif ">
                    <a href="{{route('service.single',$latest->slug)}}">{{ucwords(@$latest->title)}}</a>
                </li>
        @endforeach
    </aside>
    @endif
{{--    <aside class="widget widget-banner">--}}
{{--        <div class="ttm-col-bgcolor-yes ttm-bgcolor-darkgrey col-bg-img-one ttm-col-bgimage-yes ttm-bg padding_top50 padding_left25 padding_right20 padding_bottom50">--}}
{{--            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">--}}
{{--                <div class="ttm-col-wrapper-bg-layer-inner"></div>--}}
{{--            </div>--}}
{{--            <div class="layer-content">--}}
{{--                <h3>Dedicated Customer Agile Sevices</h3>--}}
{{--                <p>hese cases are perfectly simple and easy tv. In a free hour, when our power of choice when nothing</p>--}}
{{--                <a class="ttm-btn ttm-btn-size-md ttm-icon-btn-right ttm-btn-color-skincolor btn-inline font-weight-bold" href="services-1.html">Read more<i class="ti ti-arrow-right font-weight-bold"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </aside>--}}
{{--    <aside class="widget widget-download with-title">--}}
{{--        <h3 class="widget-title">Download</h3>--}}
{{--        <ul class="download">--}}
{{--            <li class="ttm-bgcolor-skincolor"><a href="#"><span>PDF</span><h3>Company Profit 2020</h3></a></li>--}}
{{--            <li class="ttm-bgcolor-darkgrey"><a href="#"><span>PDF</span><h3>Company Profit 2021</h3></a></li>--}}
{{--        </ul>--}}
{{--    </aside>--}}
    <aside class="widget contact-widget with-title">
        <h3 class="widget-title">Get in touch</h3>
        <ul class="contact-widget-wrapper">
            <li><i class="ttm-textcolor-skincolor ti ti-location-pin"></i>{{@$setting_data->address}}</li>
            <li><i class="ttm-textcolor-skincolor ti ti-email"></i><a href="mailto:{{@$setting_data->email}}" target="_blank">{{@$setting_data->email}}</a></li>
            <li><i class="ttm-textcolor-skincolor ti ti-mobile"></i>{{@$setting_data->phone}}</li>
            {{--            <li><i class="ttm-textcolor-skincolor ti ti-alarm-clock"></i>Mon to Sat - 9:00am to 6:00pm</li>--}}
        </ul>
    </aside>
</div>


