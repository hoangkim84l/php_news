@extends('layouts.app')

@section('content')
<div class="flex-center" id="content-wrapper" style="transform: none;">
   <div class="container row-x1" style="transform: none;">
      <!-- Main Wrapper -->
      <main id="main-wrapper" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1736.31px;">
         <div class="theiaStickySidebar-2">
            <div class="main section" id="main" name="Main Posts">
               <div class="widget Blog" data-version="2" id="Blog1">
                  <div class="blog-posts hfeed item-post-wrap">
                     <article class="blog-post hentry item-post">
                     <script type="application/ld+json">{"@context":"https://schema.org","@type":"NewsArticle","mainEntityOfPage":{"@type":"WebPage","@id":"{{ route('show-truyen', ['truyen' => $story->slug]) }}"},"headline":"{{ $story->name }}","description":"{{ $story->name }}","datePublished":"2021-03-31T14:56:00+07:00","dateModified":"2024-09-29T22:11:52+07:00","image":{"@type":"ImageObject","url":"{{ asset('storage/upload/stories/' . $story->image_link) }}","height":675,"width":1200},"author":{"@type":"Person","name":"{{ $story->author }}"},"publisher":{"@type":"Organization","name":"Blogger","logo":{"@type":"ImageObject","url":"{{ asset('storage/upload/stories/' . $story->image_link) }}","width":206,"height":60}}}</script>
                        <div class="item-post-inner">
                           <div class="entry-header blog-entry-header p-eh has-meta">
                           <nav id="breadcrumb"><a class="home" href="{{ URL::to('/') }}">Trang Chủ</a><em class="delimiter"></em><a class="label" href="{{ route('truyen') }}">Truyện/Manga</a></nav>
                              <script type="application/ld+json">{"@context":"http://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"{{ URL::to('/') }}"},{"@type":"ListItem","position":2,"name":"Truyện/Manga","item":"{{ route('truyen') }}"},{"@type":"ListItem","position":3,"name":"{{ $story->name }}","item":"{{ route('show-truyen', ['truyen' => $story->slug]) }}"}]}</script>
                              <h1 class="entry-title">{{ $story->name }}</h1>
                              <div class="entry-meta">
                                 <div class="align-left">
                                 <?php $imageUrl = asset('storage/upload/stories/' . $story->image_link); ?>
                                    <span class="entry-author mi"><span class="author-avatar-wrap"><span class="author-avatar lazy-ify" data-image="{{ asset('storage/upload/stories/' . $story->image_link) }}" style="background-image:url('{{ $imageUrl }}')"></span></span><span class="by sp">by</span><span class="author-name">{{ $story->author }}</span></span>
                                    <span class="entry-time mi"><span class="sp">•</span><time class="published" datetime="{{ $story->created_at }}">{{ $story->created_at }}</time></span>
                                 </div>
                                 <div class="align-right">
                                    <span class="entry-comments-link show">0</span>
                                 </div>
                              </div>
                           </div>
                           <div class="entry-content-wrap">
                              <div class="post-body entry-content" id="post-body">
                                 <h2 style="text-align: left;"><span style="font-family: Nunito; font-size: medium;">{{ $chapter->name }}</span></h2>
                                 <div class="post-nav">
                                    @if ($previousChapter)
                                    <a class="post-nav-older-link" href="{{ route('chapter-detail', ['truyen' => $story->slug, 'chuong' => $previousChapter->slug]) }}" id="Blog1_post-nav-newer-link">
                                       Chapter Trước
                                    </a>
                                    @endif
                                    @if ($nextChapter)
                                    <a class="post-nav-newer-link" href="{{ route('chapter-detail', ['truyen' => $story->slug, 'chuong' => $nextChapter->slug]) }}" id="Blog1_post-nav-older-link">
                                       Chapter Tiếp Theo
                                    </a>
                                    @endif
                                 </div>
                                 <p></p>
                                 {!! $chapter->content !!}
                              </div>
                              <div class="post-nav">
                                    @if ($previousChapter)
                                    <a class="post-nav-older-link" href="{{ route('chapter-detail', ['truyen' => $story->slug, 'chuong' => $previousChapter->slug]) }}" id="Blog1_post-nav-newer-link">
                                       Chapter Trước
                                    </a>
                                    @endif
                                    @if ($nextChapter)
                                    <a class="post-nav-newer-link" href="{{ route('chapter-detail', ['truyen' => $story->slug, 'chuong' => $nextChapter->slug]) }}" id="Blog1_post-nav-older-link">
                                       Chapter Tiếp Theo
                                    </a>
                                    @endif
                              </div>
                              <div class="post-share">
                                 <ul class="litespot-pro-share-links social social-bg">
                                    <li class="facebook has-span"><a class="facebook btn window-ify" data-height="500" data-url="https://www.facebook.com/cafesuateam/" data-width="520" href="javascript:;" rel="nofollow" title="Facebook"><span>Facebook</span></a></li>
                                    <li class="twitter has-span"><a class="twitter btn window-ify" data-height="520" data-url="https://www.facebook.com/cafesuateam/" data-width="860" href="javascript:;" rel="nofollow" title="Twitter"><span>Twitter</span></a></li>
                                    <li class="whatsapp"><a class="whatsapp btn window-ify" data-height="520" data-url="https://www.facebook.com/cafesuateam/" data-width="860" href="javascript:;" rel="nofollow" title="WhatsApp"></a></li>
                                    <li class="pinterest-p"><a class="pinterest btn window-ify" data-height="520" data-url="https://www.facebook.com/cafesuateam/" data-width="860" href="javascript:;" rel="nofollow" title="Pinterest"></a></li>
                                    <li class="reddit"><a class="reddit btn window-ify" data-height="520" data-url="https://www.facebook.com/cafesuateam/" data-width="860" href="javascript:;" rel="nofollow" title="Reddit"></a></li>
                                    <li class="linkedin"><a class="linkedin btn window-ify" data-height="520" data-url="https://www.facebook.com/cafesuateam/" data-width="860" href="javascript:;" rel="nofollow" title="LinkedIn"></a></li>
                                    <li class="tumblr"><a class="tumblr btn window-ify" data-height="520" data-url="https://www.facebook.com/cafesuateam/" data-width="860" href="javascript:;" rel="nofollow" title="Tumblr"></a></li>
                                    <li class="telegram"><a class="telegram btn window-ify" data-height="520" data-url="https://www.facebook.com/cafesuateam/" data-width="860" href="javascript:;" rel="nofollow" title="Telegram"></a></li>
                                    <li class="email"><a class="email btn window-ify" data-height="500" data-url="mailto:?subject=Đổi tên \x22READ MORE\x22 trong bài post&amp;body=https://www.facebook.com/cafesuateam/" data-width="520" href="javascript:;" rel="nofollow" title="Email"></a></li>
                                    <li class="show-hid"><a class="btn" href="javascript:;" rel="nofollow" title="Show more"></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        @include('layouts.story-related')
                     </article>
                     <div class="litespot-pro-blog-post-comments comments-system-blogger" data-shortcode="$type={blogger}" style="display: block;">
                        <a name="comments"></a>
                        <div class="title-wrap comments-title">
                           <h3 class="title">Post a Comment</h3>
                        </div>
                        <section class="comments threaded no-comments" data-embed="true" data-num-comments="0" id="comments">
                           <div class="comment-form">
                              <a name="comment-form"></a>
                              <a href="https://www.blogger.com/comment/frame/1207703353679584054?po=1458586028793057986&amp;hl=en&amp;skin=soho&amp;blogspotRpcToken=1200752" id="comment-editor-src" rel="noopener noreferrer" title="Comment Form Link"></a>
                              <iframe allowtransparency="allowtransparency" class="blogger-iframe-colorize blogger-comment-from-post" frameborder="0" height="65px" id="comment-editor" name="comment-editor" src="https://www.blogger.com/comment/frame/1207703353679584054?po=1458586028793057986&amp;hl=en&amp;skin=soho&amp;blogspotRpcToken=1200752" width="100%" data-resized="true"></iframe>
                           </div>
                        </section>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <!-- Sidebar Wrapper -->
      <aside id="sidebar-wrapper" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
         <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
            <div class="sidebar litespot-pro-widget-ready section" id="sidebar" name="Sidebar">
               <div class="widget LinkList" data-version="2" id="LinkList1">
                  <div class="widget-title title-wrap">
                     <h3 class="title">Anh Em Theo Tôi</h3>
                  </div>
                  <div class="widget-content">
                     <ul class="social-icons social social-bg">
                        <li class="facebook link-0"><a alt="facebook" class="facebook btn" href="https://www.facebook.com/profile.php?id=100066821057747" rel="noopener noreferrer" target="_blank" title="facebook"><span class="text">Facebook</span></a></li>
                        <li class="twitter link-1"><a alt="twitter" class="twitter btn" href="https://www.facebook.com/" rel="noopener noreferrer" target="_blank" title="twitter"><span class="text">Twitter</span></a></li>
                        <li class="youtube link-2"><a alt="youtube" class="youtube btn" href="https://aaaa" rel="noopener noreferrer" target="_blank" title="youtube"><span class="text">YouTube</span></a></li>
                        <li class="instagram link-3"><a alt="instagram" class="instagram btn" href="https://www/" rel="noopener noreferrer" target="_blank" title="instagram"><span class="text">Instagram</span></a></li>
                        <li class="linkedin link-4"><a alt="linkedin" class="linkedin btn" href="" rel="noopener noreferrer" target="_blank" title="linkedin"><span class="text">LinkedIn</span></a></li>
                        <li class="skype link-5"><a alt="skype" class="skype btn" href="" rel="noopener noreferrer" target="_blank" title="skype"><span class="text">Skype</span></a></li>
                     </ul>
                  </div>
               </div>
               <div class="widget PopularPosts" data-version="2" id="PopularPosts2">
                  <div class="widget-title title-wrap">
                     <h3 class="title"><a href="{{ route('show-chuong', ['truyen' => $story->slug]) }}">Danh Sách Chương</a></h3>
                  </div>
                  <div class="widget-content default-items scroll-2">
                     @foreach($chapters as $index => $row)
                     <?php 
                     $colorMain = '';
                     if($chapter->id === $row->id){
                        $colorMain = "custom-color";
                     }
                     ?>
                     <div class="default-item ds scroll-force-overflow item-{{ $index }} {{$colorMain}}">
                        <div class="entry-header">
                           <h2 class="entry-title"><a href="{{ route('chapter-detail', ['truyen' => $story->slug, 'chuong' => $row->slug]) }}" title="{{ $row->site_title }}">{{ $row->name }}</a></h2>
                           <div class="entry-meta"><span class="entry-time mi"><time class="published" datetime="{{ $row->created_at }}">{{ $row->created_at }}</time></span></div>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
               @include('layouts.story-recent')
            </div>
         </div>
      </aside>
   </div>
</div>
@endsection