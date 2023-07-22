<h4 class="box_header">Có thể bạn muốn xem</h4>
<ul class="blog small_margin clearfix">
    @foreach ($side_bar as $item)
        <li class="post">
            <a href="{{ route('tin.show_client', $item->id) }}" title="{{ $item->title }}">
                <span class="icon gallery"></span>
                <img src='{{ $item->image }}' alt='img'>
            </a>
            <div class="post_content">
                <h5>
                    <a href="{{ route('tin.show_client', $item->id) }}"
                        title="{{ $item->title }}">{{ strlen($item->title) > 18 ? substr($item->title, 0, 18) . '...' : $item->title }}</a>
                </h5>
                <ul class="post_details simple">
                    <li class="category"><a href="{{ route('loaitin.show_client', $item->news_categories_id) }}"
                            title="{{ App\Models\NewsCategories::find($item->news_categories_id)->name }}">{{ strlen(App\Models\NewsCategories::find($item->news_categories_id)->name) > 18 ? substr($item->title, 0, 15) . '...' : App\Models\NewsCategories::find($item->news_categories_id)->name }}</a>
                    </li>
                    <li class="date">
                        {{ date('h:m d/m/Y', strtotime($item->created_at)) }}
                    </li>
                </ul>
            </div>
        </li>
    @endforeach
</ul>
