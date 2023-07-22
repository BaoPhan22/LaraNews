<h4 class="box_header">Bài viết mới trong danh mục
    "{{ App\Models\NewsCategories::find($latest_post_by_cate[0]->news_categories_id)->name }}"
</h4>
<div class="row">
    <ul class="blog column column_1_2">
        @foreach ($latest_post_by_cate as $item)
            <li class="post">
                <a href="{{ route('tin.show_client', $item) }}" title="{{ $item->title }}">
                    <img src='{{ $item->image }}' alt='img'>
                </a>
                <h2 class="with_number">
                    <a href="{{ route('tin.show_client', $item) }}"
                        title="{{ $item->title }}">{{ strlen($item->title) > 15 ? substr($item->title, 0, 15) . '...' : $item->title }}</a>
                </h2>
                <ul class="post_details">
                    <li class="category"><a href="{{ route('loaitin.show_client', $item->news_categories_id) }}"
                            title="{{ App\Models\NewsCategories::find($item->news_categories_id)->name }}">{{ strlen(App\Models\NewsCategories::find($item->news_categories_id)->name) > 18 ? substr(App\Models\NewsCategories::find($item->news_categories_id)->name, 0, 15) . '...' : App\Models\NewsCategories::find($item->news_categories_id)->name }}</a>
                    </li>
                    <li class="date">
                        {{ date('h:m d/m/Y', strtotime($item->created_at)) }}
                    </li>
                </ul>
                <p>{{ strlen($item->summary) > 30 ? substr($item->summary, 0, 30) . '...' : $item->summary }}</p>
                <a class="read_more" href="{{ route('tin.show_client', $item) }}" title="Xem thêm"><span
                        class="arrow"></span><span>Xem thêm</span></a>
            </li>
            @if ($loop->index % 2 !== 0)
    </ul>
    <ul class="blog column column_1_2">
        @endif
        @endforeach

    </ul>

</div>
