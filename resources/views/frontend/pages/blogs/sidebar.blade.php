<div class="col-lg-4 widget-area sidebar-right ttm-col-bgcolor-yes ttm-bg ttm-right-span ttm-bgcolor-grey mt_100 padding_top100 mb_100 padding_bottom100 res-991-margin_top0 res-991-padding_top0">
    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
    <aside class="widget widget-search">
        <form method="get" id="searchform" action="{{route('searchBlog')}}" class="search-form  box-shadow">
            <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="input-text" placeholder="Search …" oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required id="s" name="s">
            </label>
            <button class="btn" type="submit"><i class="fa fa-search"></i> </button>
        </form>
    </aside>
    @if(count($bcategories)>0)
        <aside class="widget widget-Categories with-title">
            <h3 class="widget-title">Categories</h3>
            <ul>
                @foreach(@$bcategories as $bcategory)
                <li><a class="@if(Request::url() === url('/blog/categories/'.$bcategory->slug)) active @endif" href="{{url('/blog/categories/'.$bcategory->slug)}}">{{ucwords(@$bcategory->name)}}</a></li>
                @endforeach

            </ul>
        </aside>
    @endif
    @if(count($latestPosts)>0)
        <aside class="widget widget-recent-post with-title">
            <h3 class="widget-title">Recent Posts</h3>
            <ul class="widget-post ttm-recent-post-list">
                @foreach($latestPosts as $index => $latest)

                    <li>
                        <a href="{{route('blog.single',@$latest->slug)}}"><img class="img-fluid" src="<?php if(@$latest->image){?>{{asset('/images/blog/thumb/thumb_'.@$latest->image)}}<?php }?>" alt="post-img"></a>
                        <div class="post-detail">
                            <a href="{{route('blog.single',@$latest->slug)}}">{{ucwords(@$latest->title)}}</a>
                            <span class="post-date">{{date('j M, Y',strtotime(@$latest->created_at))}}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
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
