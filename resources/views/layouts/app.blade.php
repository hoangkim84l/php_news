<!DOCTYPE html>
<html class="ltr" dir="ltr" lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:b="http://www.google.com/2005/gml/b"
xmlns:data="http://www.google.com/2005/gml/data" xmlns:expr="http://www.google.com/2005/gml/expr">
<head>
    @include('layouts.head')
</head>
<body>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="theme-options" style="display:none">
        <div class="ify-panel section" id="ify-panel" name="Theme Options">
                <div class="widget TextList" data-version="2" id="TextList100">
                </div>
                <div class="widget Image" data-version="2" id="Image100">
                    <script
                            type="text/javascript">var noThumbnail = "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgZBABWUS2XZv5t6dfKxQYDJjuXg_qInKBKrMLVddpFh2Jnz0deT3j-IgrFrBvj2KCpvyzeNjUlAif2xKsDgtw1fAMFg28adQd6N_vLph88ZUsEt5KhCBNrzMcrlgWvw6-rT2zeDaAoFwg/w72-h72-p-k-no-nu/nth-ify.png";</script>
                </div>
                <div class="widget HTML" data-version="2" id="HTML100">
                </div>
        </div>
    </div>
    <!-- Outer Wrapper -->
    <div id="outer-wrapper">
        @include('layouts.header')
            <main>
                @yield('content')
                <div class="overlay"></div>
            </main>
        </div>
    <!-- Mobile Menu and Back Top -->
    <div id="slide-menu">
        <div class="slide-menu-header">
                <div class="mobile-search">
                    <form action="https://yBtsNp32f97G.com/search" class="search-form" role="search">
                            <input autocomplete="off" class="search-input" name="q" placeholder="Search" type="search"
                                value="">
                            <button class="search-action" type="submit" value=""></button>
                    </form>
                </div>
                <a class="hide-litespot-pro-mobile-menu" href="javascript:;" role="button"></a>
        </div>
        <div class="slide-menu-flex">
                <div class="litespot-pro-mobile-menu" id="litespot-pro-mobile-menu"></div>
                <div class="mm-footer">
                    <div class="mm-social"></div>
                    <div class="mm-menu"></div>
                </div>
        </div>
    </div>
    @include('layouts.footer')
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>