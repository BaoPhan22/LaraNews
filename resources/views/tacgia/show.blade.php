@extends('layouts.master')

@section('title', 'Tác giả')
@php
    $totalViews = 0;
@endphp
@foreach ($data->news as $views_count)
    {{ $totalViews += $views_count->views }}
@endforeach
@section('content')
    <div class="page">
        <div class="page_header clearfix page_margin_top">
            <div class="page_header_left">
                <h1 class="page_title">{{ $data->name }}</h1>
            </div>
            <div class="page_header_right">
                <ul class="bread_crumb">
                    <li>
                        <a title="Trang chủ" href="/">
                            Trang chủ
                        </a>
                    </li>
                    <li class="separator icon_small_arrow right_gray">
                        &nbsp;
                    </li>
                    <li>
                        <a title="Authors" href="{{ route('authors') }}">
                            Tác giả
                        </a>
                    </li>
                    <li class="separator icon_small_arrow right_gray">
                        &nbsp;
                    </li>
                    <li>
                        {{ $data->name }}
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
            <div class="row page_margin_top">
                <div class="column column_2_3">
                    <div class="row">
                        <ul class="authors_list rating">
                            <li class="author clearfix">
                                <div class="avatar_block">
                                    <a href="{{ $data->image }}" class="prettyPhoto" title="{{ $data->name }}">
                                        <img src='{{ $data->image }}' alt='img'>
                                    </a>
                                    <div class="details clearfix">
                                        <ul class="columns">
                                            <li class="column">
                                                <span class="number animated_element"
                                                    data-value="{{ count($data->news) }}">{{ count($data->news) }}</span>
                                                <h5>Bài viết</h5>
                                            </li>

                                            <li class="column">

                                                <span class="number animated_element" data-value="{{ $totalViews }}">
                                                    {{ $totalViews }}
                                                </span>
                                                <h5>Lượt xem</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <ul class="social_icons clearfix">
                                        <li>
                                            <a target="_blank" title="" href="#" class="social_icon facebook">
                                                &nbsp;
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="" href="#" class="social_icon twitter">
                                                &nbsp;
                                            </a>
                                        </li>
                                        <li>
                                            <a title="" href="#" class="social_icon skype">
                                                &nbsp;
                                            </a>
                                        </li>
                                    </ul>
                                    <h6>{{ $data->role == 1 ? 'Tác giả' : 'Admin' }}</h6>
                                    <h2>{{ $data->name }}</h2>
                                    <p>{{ $data->about }}</p>
                                    <blockquote class="simple">
                                        The people who are crazy enough to think they can change the world are the ones who
                                        do.
                                        <span class="author">&#8212;&nbsp;&nbsp;Steve Jobs</span>
                                    </blockquote>
                                </div>
                            </li>
                        </ul>
                        <h4 class="box_header page_margin_top_section">Bài viết của {{ $data->name }}
                            ({{ count($data->news) }}) </h4>
                        <div class="row">
                            <ul class="blog column column_1_2">
                                @foreach ($data->news as $item)
                                    <li class="post">
                                        <a href="{{ route('tin.show_client', $item) }}" title="{{ $item->title }}">
                                            <img src='{{ $item->image }}' alt='img' style="display: block">
                                        </a>
                                        <h2 class="with_number">
                                            <a href="{{ route('tin.show_client', $item) }}"
                                                title="{{ $item->title }}">{{ $item->title }}</a>
                                        </h2>
                                        <ul class="post_details">
                                            <li class="category"><a
                                                    href="{{ route('loaitin.show_client', $item->news_categories_id) }}"
                                                    title="{{ App\Models\NewsCategories::find($item->news_categories_id)->name }}">{{ App\Models\NewsCategories::find($item->news_categories_id)->name }}</a>
                                            </li>
                                            <li class="date">
                                                {{ date('h:m d/m/Y', strtotime($item->created_at)) }}
                                            </li>
                                        </ul>
                                        <p>{{ $item->summary }}</p>
                                        <a class="read_more" href="{{ route('tin.show_client', $item) }}"
                                            title="Xem thêm"><span class="arrow"></span><span>Xem thêm</span></a>
                                    </li>
                                    {{-- <p>{{$loop->index}}</p> --}}
                                    @if ($loop->index % 2 !== 0)
                            </ul>
                            <ul class="blog column column_1_2">
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
