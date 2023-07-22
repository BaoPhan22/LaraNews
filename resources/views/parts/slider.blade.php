<div class="caroufredsel_wrapper caroufredsel_wrapper_slider">
    <ul class="slider">
        @foreach ($slider as $item)
            <li class="slide">
                <img src='{{ $item->image }}' alt='img'>
                <div class="slider_content_box">
                    <ul class="post_details simple">
                        <li class="category"><a href="{{ route('loaitin.show_client', $item->news_categories_id) }}"
                                title="{{ App\Models\NewsCategories::find($item->news_categories_id)->name }}">{{ App\Models\NewsCategories::find($item->news_categories_id)->name }}</a>
                        </li>
                        <li class="date">
                            {{ date('h:m d/m/Y', strtotime($item->created_at)) }}
                        </li>
                    </ul>
                    <h2><a href="{{ route('tin.show_client', $item) }}" title="Nuclear Fusion Closer to Becoming a Reality">{{ $item->title }}</a>
                    </h2>
                    <p class="clearfix">{{ $item->summary }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>
