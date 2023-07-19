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
                @include('parts.col-2')
                @include('parts.col-1')
            </div>
        </div>
    </div>
    @include('parts.footer')
@stop
