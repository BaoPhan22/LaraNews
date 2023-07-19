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
                                <li class="detail category">In <a
                                        href="{{ route('loaitin.show_client', $data[0]->news_categories->id) }}"
                                        title="{{ $data[0]->news_categories->name }}">
                                        {{ $data[0]->news_categories->name }}</a>
                                </li>
                                <li class="detail date">{{ date('d/m/Y', strtotime($data[0]->created_at)) }}</li>
                                <li class="detail author">Tác giả <a href="#"
                                        title="Anna Shubina">{{ $data[0]->user->name }}</a>
                                </li>
                                <li class="detail views">{{ $data[0]->views }} Views</li>
                                <li class="detail comments"><a href="#"
                                        class="scroll_to_comments">{{ count($data[0]->comment) }} Bình luận</a></li>
                            </ul>
                            {{-- <a href="images/samples/690x450/image_10.jpg" class="post_image page_margin_top prettyPhoto"
                                title="Britons are never more comfortable than when talking about the weather.">
                                <img src="images/samples/690x450/image_10.jpg" alt="img" style="display: block;">
                            </a>
                            <div class="sentence">
                                <span class="text">Britons are never more comfortable than when talking about the
                                    weather.</span>
                                <span class="author">John Smith, Flickr</span>
                            </div> --}}
                            <div class="post_content page_margin_top_section clearfix">
                                <div class="content_box">
                                    <h3 class="excerpt">{{ $data[0]->summary }}</h3>
                                    <div class="text">
                                        <p>
                                            {{ $data[0]->content }}
                                        </p>
                                    </div>
                                </div>
                                <div class="author_box animated_element"
                                    style="position: absolute; top: 0px; bottom: auto;">
                                    <div class="author">
                                        <a title="Anna Shubina" href="author.html" class="thumb">
                                            <img alt="img" src="{{asset('images/samples/Team_100x100/image_02.jpg')}}">
                                        </a>
                                        <div class="details">
                                            <h5><a title="Anna Shubina" href="author.html">{{ $data[0]->user->name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    
                    @if (Auth::user())
                    <div class="row page_margin_top_section">
                        <h4 class="box_header">Để lại bình luận</h4>

                        <form class="comment_form margin_top_15" id="comment_form" method="post" action="{{ route('tin.binhluan.store', $data[0]->id) }}">
                            <fieldset class="column column_1_3">
                                <input class="text_input hint" name="name" type="text"
                                    placeholder="Tên bạn *">
                            </fieldset>
                            <fieldset class="column column_1_3">
                                <input class="text_input hint" name="email" type="text"
                                    placeholder="Email của bạn *">
                            </fieldset>
                            <fieldset class="column column_1_3">
                                <input class="text_input hint" name="website" type="text"
                                    placeholder="Website">
                            </fieldset>
                            <fieldset>
                                <textarea name="content" placeholder="Bình luận *" class="hint"></textarea>
                            </fieldset>
                            <fieldset>
                                <input type="submit" value="POST COMMENT" class="more active">
                                <a href="#cancel" id="cancel_comment" title="Cancel reply">Cancel reply</a>
                            </fieldset>
                            @csrf

                        </form>
                    </div>
                    <div class="row page_margin_top_section">
                        <h4 class="box_header">{{ count($data[0]->comment) }} Bình luận</h4>
                        <ul id="comments_list">
                            @foreach ($data[0]->comment as $item)
                                
                            <li class="comment clearfix" id="comment-1">
                                <div class="comment_author_avatar">
                                    &nbsp;
                                </div>
                                <div class="comment_details">
                                    <div class="posted_by clearfix">
                                        <h5><a class="author" href="#" title="Kevin Nomad">{{ App\Models\User::find($item->user_id)->name }}</a></h5>
                                        <abbr title="22 July 2014" class="timeago">9 years ago</abbr>
                                    </div>
                                    <p>
                                        {{$item->content}}
                                    </p>
                                </div>
                            </li>
                            @endforeach

                        </ul>

                    </div>
                    @else
                    <p>Bạn chưa đăng nhập. Vui lòng <a href="{{ url('/login') }}">đăng nhập</a> để xem và bình luận</p>
                    @endif

                </div>
                <div class="column column_1_3">
                </div>

            </div>
        </div>
    </div>
@stop
