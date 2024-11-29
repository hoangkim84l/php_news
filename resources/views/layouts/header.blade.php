<!-- Header Wrapper -->
<header id="header-wrapper">
    <div class="main-header">
            <div class="header-inner">
                <div class="header-header flex-center">
                        <div class="container row-x1">
                            <div class="header-items">
                                    <div class="flex-left">
                                        <div class="main-logo section" id="main-logo" name="Header Logo">
                                                <div class="widget Header" data-version="2" id="Header1">
                                                    <a class="mobile-menu-toggle" href="javascript:;"
                                                            role="button" title="Menu"></a>
                                                    <a class="logo-img" href="{{ URL::to('/') }}">
                                                            <img alt="CafesuaNovel" data-height="506"
                                                                data-width="500"
                                                                src="{{ asset('storage/upload/logo/logo.png') }}"
                                                                title="CafesuaNovel">
                                                            <h1 id="h1-off">CafesuaNovel</h1>
                                                    </a>
                                                </div>
                                        </div>
                                        <div class="litespot-pro-main-nav section"
                                                id="litespot-pro-main-nav" name="Header Menu">
                                                <div class="widget LinkList" data-version="2"
                                                    id="LinkList101">
                                                    <ul id="litespot-pro-main-nav-menu" role="menubar">
                                                            <li><a href="{{ URL::to('/') }}"
                                                                        role="menuitem">Trang Chủ</a></li>
                                                            <li class="has-sub mega-menu">
                                                                <a href="{{ route('truyen') }}" role="menuitem">Đi Nhanh</a>
                                                            </li>
                                                    </ul>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="flex-right">
                                        <div class="tgl-wrap">
                                                <a class="tgl-style darkmode-toggle" href="javascript:;"
                                                    role="button"></a>
                                                <a class="tgl-style show-search" href="javascript:;"
                                                    role="button" title="Search"></a>
                                        </div>
                                    </div>
                                    <div id="main-search-wrap">
                                        <div class="main-search">
                                                <form action="{{ route('tim-truyen') }}"
                                                    class="search-form" target="_top">
                                                    <input aria-label="Search" autocomplete="off"
                                                            class="search-input" name="q"
                                                            placeholder="Search" type="search" value="">
                                                    <button class="search-close" type="reset"
                                                            value=""></button>
                                                </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
    </div>
</header>