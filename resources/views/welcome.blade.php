@extends('layouts.master')

@section('title', 'Trang chủ')

@section('content')
    <!-- slider -->
    @include('parts.slider')
    <div class="page">
        <div class='slider_posts_list_container'>
        </div>
        <div class="page_layout page_margin_top clearfix">
            <div class="row">
                <div class="column column_2_3">
                    @include('parts.latest-post', $latest_post)

                    <div class="row page_margin_top_section">
                        @include('parts.post-carousel')
                    </div>

                    <div class="row page_margin_top_section">
                        @include('parts.latest-post-by-cate', $post_carousel)
                    </div>
                </div>

                <div class="column column_1_3">
                    @include('parts.side_bar', $side_bar)
                </div>
            </div>
        </div>
    </div>
@stop
