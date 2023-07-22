<h4 class="box_header">Posts Carousel</h4>
<div class="horizontal_carousel_container page_margin_top">
    <ul class="blog horizontal_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
        @foreach ($post_carousel as $item)
            <li class="post">
                <a href="{{ route('tin.show_client', $item->id) }}" title="{{ $item->title }}">
                    <img src='{{ $item->image }}' alt='img'>
                </a>
                <h5><a href="post.html"
                        title="{{ $item->title }}">{{ strlen($item->title) > 18 ? substr($item->title, 0, 18) . '...' : $item->title }}
                    </a></h5>
                <ul class="post_details simple">
                    <li class="category"><a href="{{ route('loaitin.show_client', $item->news_categories_id) }}"
                            title="{{ App\Models\NewsCategories::find($item->news_categories_id)->name }}">{{ strlen(App\Models\NewsCategories::find($item->news_categories_id)->name) > 15 ? substr($item->title, 0, 15) . '...' : App\Models\NewsCategories::find($item->news_categories_id)->name }}</a>
                    </li>
                    <li class="date">
                        {{ date('h:m d/m/Y', strtotime($item->created_at)) }}
                    </li>
                </ul>
            </li>
        @endforeach
    </ul>
</div>
