@extends('layouts.master')

@section('title', 'Trang danh mục ' . $data[0]->name)

@section('content')



    <div class="page">
        <div class="page_header clearfix page_margin_top">
            <div class="page_header_left">
                <h1 class="page_title">Danh mục {{$data[0]->name}}</h1>
            </div>
            <div class="page_header_right">
                <ul class="bread_crumb">
                    <li>
                        <a title="Home" href="home.html">
                            Trang chủ
                        </a>
                    </li>
                    <li class="separator icon_small_arrow right_gray">
                        &nbsp;
                    </li>
                    <li>
                        Danh mục {{$data[0]->name}}
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
                        <ul class="blog big" >
                            @foreach ($data[0]->news as $item)
                            <li class="post" >
                                <a href="post.html" title="{{$item->title}}">
                                    <img src="{{ asset('images/samples/330x242/image_10.jpg') }}" alt='img' style="display: block">
                                </a>
                                <div class="post_content">
                                    <h2 class="with_number">
                                        <a href="post.html" title="{{$item->title}}">{{$item->title}}</a>
                                        {{-- <a class="comments_number" href="post.html#comments_list" title="2 comments">2<span
                                                class="arrow_comments"></span></a> --}}
                                    </h2>
                                    <ul class="post_details">
                                        <li class="date">
                                            {{$item->created_at}}
                                        </li>
                                    </ul>
                                    <p>{{$item->summary}}</p>
                                    <a class="read_more" href="{{route('tin.show_client',$item)}}" title="Read more"><span
                                            class="arrow"></span><span>Xem thêm</span></a>
                                </div>
                            </li>
                            <div style="border-bottom: 1px solid red"></div>
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
