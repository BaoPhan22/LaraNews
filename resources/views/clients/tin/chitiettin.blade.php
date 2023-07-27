@extends('layouts.master')

@section('title', 'Trang bài viết ')

@section('content')
    <div class="page">
        <div class="page_layout page_margin_top clearfix">

            <div class="row page_margin_top">
                <div class="column column_2_3">
                    <div class="row">
                        <div class="post single">
                            <h1 class="post_title">
                                {{ $data[0]->title }}
                            </h1>
                            <ul class="post_details clearfix">
                                <li class="detail category">Danh mục: <a
                                        href="{{ route('loaitin.show_client', $data[0]->news_categories->id) }}"
                                        title="{{ $data[0]->news_categories->name }}">
                                        {{ $data[0]->news_categories->name }}</a>
                                </li>
                                <li class="detail date">{{ date('d/m/Y', strtotime($data[0]->created_at)) }}</li>
                                <li class="detail author">Tác giả <a href="{{ route('author', $data[0]->user) }}"
                                        title="{{ $data[0]->user->name }}">{{ $data[0]->user->name }}</a>
                                </li>
                                <li class="detail views">{{ $data[0]->views }} Lượt xem</li>
                                <li class="detail comments"><a href="#"
                                        class="scroll_to_comments">{{ count($data[0]->comment) }} Bình luận</a></li>
                            </ul>
                            <div class="post_content page_margin_top_section clearfix">
                                <div class="content_box">
                                    <h3 class="excerpt">{{ $data[0]->summary }}</h3>
                                    <img src="{{ $data[0]->image }}" alt="img" style="display: block">
                                    <div class="text">
                                        {!! $data[0]->content !!}
                                    </div>
                                </div>
                                <div class="author_box animated_element"
                                    style="position: absolute; top: 0px; bottom: auto;">
                                    <div class="author">
                                        <a title="{{ $data[0]->user->name }}" href="{{ route('author', $data[0]->user) }}"
                                            class="thumb">
                                            <img alt="img" style="width: 100px;" src="{{ $data[0]->user->image }}">
                                        </a>
                                        <div class="details">
                                            <h5><a title="{{ $data[0]->user->name }}"
                                                    href="{{ route('author', $data[0]->user) }}">{{ $data[0]->user->name }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if (Auth::user())
                        <div class="row page_margin_top_section">
                            <h4 class="box_header">Để lại bình luận</h4>

                            <form class="comment_form margin_top_15" id="comment_form" method="post"
                                action="{{ route('tin.binhluan.store', $data[0]->id) }}">
                                @csrf
                                <textarea name="content" placeholder="Bình luận *" class="hint"></textarea>
                                </fieldset>
                                <fieldset>
                                    <input type="submit" value="BÌNH LUẬN" class="more active">
                                </fieldset>
                            </form>
                        </div>
                        <div class="row page_margin_top_section">
                            <h4 class="box_header">{{ count($data[0]->comment) }} Bình luận</h4>
                            <ul id="comments_list">
                                @foreach ($data[0]->comment as $item)
                                    <li class="comment clearfix" id="comment-1">
                                        <div class="comment_author_avatar">
                                            <img src="{{ App\Models\User::find($item->user_id)->image }}" alt=""
                                                style="width: 100px;">
                                        </div>
                                        <div class="comment_details">
                                            <div class="posted_by clearfix">
                                                <h5><a class="author"
                                                        href="{{ route('author', App\Models\User::find($item->user_id)->id) }}"
                                                        title="{{ App\Models\User::find($item->user_id)->name }}">{{ App\Models\User::find($item->user_id)->name }}</a>
                                                </h5>
                                                <abbr title="22 July 2014" class="timeago">
                                                    {{ date('h:m d/m/Y', strtotime($item->created_at)) }}
                                                </abbr>
                                            </div>
                                            <p>
                                                {{ $item->content }}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    @else
                        <div class="row page_margin_top_section">
                            <p>Bạn chưa đăng nhập. Vui lòng <a href="{{ url('/login') }}">đăng nhập</a> để xem và bình luận
                            </p>
                        </div>
                    @endif

                </div>
                <div class="column column_1_3">
                </div>

            </div>
        </div>
    </div>
@stop
