@extends('layouts.master')

@section('title', 'Tác giả')

@section('content')
{{-- @php
    dd($data);
@endphp --}}
    <div class="page">
        <div class="page_header clearfix page_margin_top">
            <div class="page_header_left">
                <h1 class="page_title">Tác giả</h1>
            </div>
            <div class="page_header_right">
                <ul class="bread_crumb">
                    <li>
                        <a title="Trang chủ" href="{{ url('/') }}">
                            Trang chủ
                        </a>
                    </li>
                    <li class="separator icon_small_arrow right_gray">
                        &nbsp;
                    </li>
                    <li>
                        Tác giả
                    </li>
                </ul>
            </div>
        </div>
        <div class="page_layout clearfix">
            <div class="divider_block clearfix">
                <hr class="divider first">
                <hr class="divider subheader_arrow">
                <hr class="divider last">
            </div>
            <div class="row">
                <div class="column column_2_3">
                    <div class="row">
                        <ul class="authors_list rating">
                            @foreach ($data as $item)
                                <li class="author clearfix">
                                    <div class="avatar_block">
                                        <a href="{{ route('author', $item) }}" title="{{ $item->name }}">
                                            <img src='{{ $item->image }}' alt='img'>
                                        </a>
                                        {{-- <div class="details clearfix">
                                            <ul class="columns">
                                                <li class="column">
                                                    <span class="number animated_element"
                                                        data-value="{{ $item->news_count }}
                                                        ">{{ $item->news_count }}</span>
                                                    <h5>Bài viết</h5>
                                                </li>
                                                <li class="column">
                                                    <span class="number animated_element" data-value="24 231"></span>
                                                    <h5>Views</h5>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <div class="content">
                                        
                                        <h6>{{ $item->role == 0 ? 'Admin' : 'Tác giả' }}</h6>
                                        <h2><a href="{{ route('author', $item) }}" title="{{ $item->name }}">{{ $item->name }}</a></h2>
                                        <p>{{ $item->about }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="column column_1_3 page_margin_top">

                </div>
            </div>
        </div>
    </div>


@stop
