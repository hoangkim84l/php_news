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
                                 <h2 style="text-align: left;"><span style="font-family: Nunito; font-size: medium;">{{ $story->name }}</span></h2>
                                 <p><span style="font-family: Nunito; font-size: medium;"></span></p>
                                 <div class="separator" style="clear: both; text-align: center;">
                                    <span style="font-family: Nunito; font-size: medium;">
                                       <a href="#" style="margin-left: 1em; margin-right: 1em;">
                                          <img alt="" data-original-height="194" data-original-width="259" height="240" loading="lazy" src="{{ asset('storage/upload/stories/' . $story->image_link) }}" width="320">
                                       </a>
                                    </span>
                                 </div>
                                 <span style="font-family: Nunito; font-size: medium;"><br></span>
                                 <p></p>
                                 {!! $story->description !!}
                              </div>
                              <div class="entry-labels">
                                 <span class="labels-label">Tags:</span>
                                 @foreach ($storyTags as $index => $tag)
                                 <a class="label-link" href="{{ route('show-danh-muc', ['slug' => $tag->slug]) }}" rel="tag">{{ $tag->name }}</a>
                                 @endforeach
                              </div>
                              <div class="post-share">
                              <div class="widget-content cloud-label">
                                 <ul class="cloud-style">
                                       @foreach ($chapters as $index => $chap)
                                       <li><a class="label-name btn" href="{{ route('chapter-detail', ['truyen' => $story->slug, 'chuong' => $chap->slug]) }}">{{ $chap->name }}</a></li>
                                       @endforeach
                                 </ul>
                              </div>
                              </div>
                           </div>
                        </div>
                     </article>
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
               @include('layouts.story-recent')
               @include('layouts.tags')
            </div>
         </div>
      </aside>
   </div>
</div>
@endsection