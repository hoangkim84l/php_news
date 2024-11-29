@extends('layouts.app')

@section('content')
<!-- ticker Wrapper -->
<div class="flex-center" id="ticker-wrapper">
      <div class="ticker container row-x1 section" id="ticker" name="ticker News">
            <div class="widget PopularPosts" data-version="2" id="PopularPosts1">
                  <div class="widget-title">
                        <h3 class="title">Trending:</h3>
                  </div>
                  <div class="widget-content">
                        <div class="ticker-items">
                              @foreach ($trendingStories as $index => $trendingStory)
                              <div class="ticker-item item-{{ $index }}">
                                    <h2 class="entry-title">
                                          <a href="{{ route('show-truyen', ['truyen' => $trendingStory->slug]) }}"
                                                title="{{ $trendingStory->site_title }}">
                                                {{ $trendingStory->name }}
                                          </a>
                                    </h2>
                              </div>
                              @endforeach
                        </div>
                  </div>
            </div>
      </div>
</div>
<!-- Featured Posts -->
<div class="flex-center" id="featured-wrapper">
      <div class="featured container row-x1 section" id="featured" name="Featured News">
            <div class="widget PopularPosts" data-version="2" id="PopularPosts3">
                  <div class="widget-content">
                        <div class="featured-items">
                              @foreach ($storiesNew as $index => $storyNew)
                              <div class="featured-item cs item-{{ $index }}">
                                    <a class="featured-inner"
                                          href="{{ route('show-truyen', ['truyen' => $storyNew->slug]) }}"
                                          title="{{ $storyNew->site_title }}">
                                          <span class="entry-image-wrap before-mask is-image">
                                                <span class="entry-thumb"
                                                      data-image="{{ asset('storage/upload/stories/' . $storyNew->image_link) }}"></span>
                                          </span>
                                          <div class="entry-header entry-info">
                                                <span class="entry-category">HOT</span>
                                                <h2 class="entry-title">{{ $storyNew->name }}</h2>
                                                <div class="entry-meta">
                                                      <span class="entry-author mi"><span
                                                                  class="sp">by</span><span
                                                                  class="author-name">{{ $storyNew->author }}</span></span>
                                                      <span class="entry-time mi"><span
                                                                  class="sp">"</span><time class="published"
                                                                  datetime="{{ $storyNew->created_at }}">{{ $storyNew->created_at }}</time></span>
                                                </div>
                                          </div>
                                    </a>
                              </div>
                              @endforeach
                        </div>
                  </div>
            </div>
      </div>
</div>
<!-- Content Wrapper -->
<div class="flex-center" id="content-wrapper">
      <div class="container row-x1">
            <!-- Main Wrapper -->
            <main class="has-cs2" id="main-wrapper">
                  <div class="content-section section" id="content-section-1" name="Content Section 1">
                        <div class="widget HTML is-visible" data-version="2" id="HTML10">
                              <div class="widget-title title-wrap">
                                    <h3 class="title">Thịnh Hành</h3>
                              </div>
                              <div class="widget-content">
                                    <div class="content-block block-items">
                                          <div class="block-left">
                                                @foreach ($populars->slice(0, 1) as $index => $row)
                                                <div class="block-item item-0">
                                                      <a title="Khám phá Redis" class="entry-image-wrap is-image" href="{{ route('show-truyen', ['truyen' => $row->slug]) }}"><span class="entry-thumb lazy-ify" data-image="{{ asset('storage/upload/stories/' . $row->image_link) }}"></span></a>
                                                      <div class="entry-header">
                                                      <h2 class="entry-title"><a href="{{ route('show-truyen', ['truyen' => $row->slug]) }}" title="{{ $row->site_title }}">{{ $row->name }}</a></h2>
                                                      <div class="entry-meta"><span class="entry-author mi"><span class="sp">by</span><span class="author-name">{{ $row->author }}</span></span><span class="entry-time mi"><span class="sp">•</span><time class="published" datetime="{{ $row->created_at }}">{{ $row->created_at }}</time></span></div>
                                                      </div>
                                                </div>
                                                @endforeach
                                          </div>
                                          <div class="block-right">
                                                @foreach ($populars->slice(1, 3) as $index => $row)
                                                <?php $imageUrl = asset('storage/upload/stories/' . $row->image_link); ?>
                                                <div class="block-item item-1">
                                                      <a title="Một ngày trải nghiệm ở JUNO" class="entry-image-wrap is-image" href="{{ route('show-truyen', ['truyen' => $row->slug]) }}"><span class="entry-thumb lazy-ify" data-image="{{ asset('storage/upload/stories/' . $row->image_link) }}" style="background-image:url('{{ $imageUrl }}')"></span></a>
                                                      <div class="entry-header">
                                                      <h2 class="entry-title"><a href="{{ route('show-truyen', ['truyen' => $row->slug]) }}" title="{{ $row->site_title }}">{{ $row->name }}</a></h2>
                                                      <div class="entry-meta"><span class="entry-time mi"><time class="published" datetime="{{ $row->created_at }}">{{ $row->created_at }}</time></span></div>
                                                      </div>
                                                </div>
                                                @endforeach
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="widget HTML is-visible" data-version="2" id="HTML12">
                              <div class="widget-title title-wrap">
                                    <h3 class="title">Nổi Bật</h3>
                              </div>
                              <div class="widget-content">
                                    <div class="content-block grid-items">
                                          @foreach ($highlight as $index => $row)
                                          <?php $imageUrl = asset('storage/upload/stories/' . $row->image_link); ?>
                                          <div class="grid-item item-{{ $index }}">
                                                <a title="{{ $row->site_title }}" class="entry-image-wrap is-image" href="{{ route('show-truyen', ['truyen' => $row->slug]) }}"><span class="entry-thumb lazy-ify" data-image="{{ asset('storage/upload/stories/' . $row->image_link) }}" style="background-image:url('{{ $imageUrl }}')"></span></a>
                                                <div class="entry-header">
                                                      <h2 class="entry-title"><a title="{{ $row->site_title }}" href="{{ route('show-truyen', ['truyen' => $row->slug]) }}">{{ $row->name }}</a></h2>
                                                      <div class="entry-meta"><span class="entry-time mi"><time class="published" datetime="{{ $row->created_at }}">{{ $row->created_at }}</time></span></div>
                                                </div>
                                          </div>
                                          @endforeach
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="main section" id="main" name="Main Posts">
                        <div class="widget Blog" data-version="2" id="Blog1">
                              <div class="blog-posts-wrap">
                                    <div class="title-wrap bp-title">
                                          <h3 class="title">Xem Thêm</h3><a class="wt-l"
                                                href="{{ route('truyen') }}">Xem tất cả</a>
                                    </div>
                                    <div class="blog-posts hfeed index-post-wrap">
                                          @foreach ($populars->slice(4) as $index => $storyView)
                                          @php 
                                          $cleanText = strip_tags($storyView->description);
                                          $shortDescription = substr($cleanText, 0, 200);
                                          @endphp
                                          <article class="blog-post hentry index-post post-{{ $index }}">
                                                <a class="entry-image-wrap is-image"
                                                      href="{{ route('show-truyen', ['truyen' => $storyView->slug]) }}"
                                                      title="{{ $storyView->site_title }}"><span class="entry-thumb"
                                                            data-image="{{ asset('storage/upload/stories/' . $storyView->image_link) }}"></span>
                                                </a>
                                                <div class="entry-header">
                                                      <h2 class="entry-title"><a class="entry-title-link"
                                                                  href="{{ route('show-truyen', ['truyen' => $storyView->slug]) }}"
                                                                  rel="bookmark" title="{{ $storyView->site_title }}">{{ $storyView->name }}</a></h2>
                                                      <p class="entry-excerpt excerpt">{!! $shortDescription !!} ...</p>
                                                      <div class="entry-meta">
                                                            <span class="entry-author mi"><span
                                                                        class="by sp">by</span><span
                                                                        class="author-name">{{ $storyView->author }}</span></span>
                                                            <span class="entry-time mi"><span
                                                                        class="sp">"</span><time
                                                                        class="published"
                                                                        datetime="{{ $storyView->created_at }}">{{ $storyView->created_at }}</time></span>
                                                      </div>
                                                </div>
                                          </article>
                                          @endforeach
                                    </div>
                              </div>
                              <div class="blog-pager" id="blog-pager">
                                    <a class="blog-pager-older-link load-more btn"
                                          data-load=""
                                          href="{{ route('truyen') }}" id="litespot-pro-load-more-link">
                                          Xem thêm
                                    </a>
                                    <span class="loading">
                                          <div class="loader"></div>
                                    </span>
                                    <span class="no-more load-more btn">
                                          Đó là tất cả rồi bro ơi
                                    </span>
                              </div>
                              <script type="text/javascript">
                                    var exportify = {
                                          noTitle: "No title",
                                          viewAll: "View all",
                                          postAuthor: true,
                                          postAuthorLabel: "by",
                                          postDate: true,
                                          postDateLabel: "&#8226;"
                                    }
                              </script>
                        </div>
                  </div>
            </main>
            <!-- Sidebar Wrapper -->
            <aside id="sidebar-wrapper">
                  <div class="sidebar litespot-pro-widget-ready section" id="sidebar" name="Sidebar">
                        <div class="widget LinkList" data-version="2" id="LinkList1">
                              <div class="widget-title title-wrap">
                                    <h3 class="title">Anh Em Theo Tôi</h3>
                              </div>
                              <div class="widget-content">
                                    <ul class="social-icons social social-bg">
                                          <li class="facebook link-0"><a alt="facebook" class="facebook btn"
                                                      href="https://www.facebook.com/cafesuateam/ #Facebook"
                                                      rel="noopener noreferrer" target="_blank"
                                                      title="facebook"></a></li>
                                          <li class="twitter link-1"><a alt="twitter" class="twitter btn"
                                                      href="https://www.facebook.com/cafesuateam/ # Twitter"
                                                      rel="noopener noreferrer" target="_blank"
                                                      title="twitter"></a></li>
                                          <li class="youtube link-2"><a alt="youtube" class="youtube btn"
                                                      href="https://www.facebook.com/cafesuateam/ # YouTube"
                                                      rel="noopener noreferrer" target="_blank"
                                                      title="youtube"></a></li>
                                          <li class="instagram link-3"><a alt="instagram"
                                                      class="instagram btn" href="https://www.facebook.com/cafesuateam/ # Instagram"
                                                      rel="noopener noreferrer" target="_blank"
                                                      title="instagram"></a></li>
                                          <li class="linkedin link-4"><a alt="linkedin" class="linkedin btn"
                                                      href="https://www.facebook.com/cafesuateam/ # LinkedIn" rel="noopener noreferrer"
                                                      target="_blank" title="linkedin"></a></li>
                                          <li class="skype link-5"><a alt="skype" class="skype btn"
                                                      href="https://www.facebook.com/cafesuateam/ # Skype" rel="noopener noreferrer"
                                                      target="_blank" title="skype"></a></li>
                                    </ul>
                              </div>
                        </div>
                        <div class="widget PopularPosts" data-version="2" id="PopularPosts2">
                              <div class="widget-title title-wrap">
                                    <h3 class="title">Chap Mới</h3>
                              </div>
                              <div class="widget-content default-items">
                                    @foreach ($phoBien as $index => $row)
                                    <div class="default-item ds item-{{ $index }}">
                                          <div class="entry-header">
                                                <h2 class="entry-title"><a
                                                            href="{{ route('chapter-detail', ['truyen' => $row->slug, 'chuong' => $row->slug]) }}"
                                                            title="{{ $row->site_title }}">{{ $row->story->name }} - {{ $row->name }}</a></h2>
                                                <div class="entry-meta"><span class="entry-time mi"><time
                                                                  class="published"
                                                                  datetime="{{ $row->created_at }}">{{ $row->created_at }}</time></span>
                                                </div>
                                          </div>
                                    </div>
                                    @endforeach
                              </div>
                        </div>
                        @include('layouts.tags')
                  </div>
            </aside>
      </div>
</div>
@endsection