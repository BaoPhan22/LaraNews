@php
    $list_cat = App\Models\NewsCategories::all();
@endphp


<div class="header_container">
    <div class="header clearfix">
        <div class="logo">
            <h1><a href="{{ url('/') }}" title="FPL">FPL</a></h1>
            <h4>Trang tin tức FPL</h4>
        </div>
        <div class="placeholder">728 x 90</div>
    </div>
</div>

<div class="menu_container clearfix">
    <nav>
        <ul class="sf-menu">
            <li class="{{ request()->routeIs('homepage') ? 'selected' : '' }}">
                <a href="{{ url('/') }}" title="Trang chủ">
                    Trang chủ
                </a>
            </li>
            <li class="submenu {{ request()->routeIs('loaitin.show_client') ? 'selected' : '' }}">
                <a href="{{ url('/') }}" title="Danh mục">
                    Danh mục
                </a>
                <ul>
                    @foreach ($list_cat as $newCate)
                        <li class="">
                            <a href="{{ route('loaitin.show_client', $newCate) }}" title="{{ $newCate->name }}">
                                {{ $newCate->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="{{ request()->routeIs('authors') ? 'selected' : '' }}">
                <a href="{{ route('authors') }}" title="Tác giả">
                    Tác giả
                </a>
            </li>
        </ul>
    </nav>
    <div class="mobile_menu_container">
        <a href="#" class="mobile-menu-switch">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </a>
        <div class="mobile-menu-divider"></div>
        <nav>
            <ul class="mobile-menu">
                <li class="submenu">
                    <a href="home.html" title="Home">
                        Home
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
