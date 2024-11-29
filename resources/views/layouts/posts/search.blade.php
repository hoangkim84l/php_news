@extends('layouts.app')

@section('content')
<div class="flex-center" id="content-wrapper" style="transform: none;">
   <div class="container row-x1" style="transform: none;">
      <!-- Main Wrapper -->
      <main id="main-wrapper" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 267.594px;">
         <div class="theiaStickySidebar-2">
            <div class="main section" id="main" name="Main Posts">
               <div class="widget Blog" data-version="2" id="Blog1">
                  <div class="blog-posts-wrap">
                     <div class="queryMessage">
                        <span class="query-info query-success">"{{ $tag }}"</span>
                     </div>
                     <div class="blog-posts hfeed index-post-wrap">
                        @foreach($stories as $index => $row)
                        @php 
                        $cleanText = strip_tags($row->description);
                        $shortDescription = substr($cleanText, 0, 200);
                        @endphp
                        <?php $imageUrl = asset('storage/upload/stories/' . $row->image_link); ?>
                        <article class="blog-post hentry index-post post-0">
                           <a class="entry-image-wrap is-image" href="{{ route('show-truyen', ['truyen' => $row->slug]) }}" title="{{ $row->site_title }}"><span class="entry-thumb lazy-ify" data-image="{{ asset('storage/upload/stories/' . $row->image_link) }}" style="background-image:url('{{ $imageUrl }}')"></span>
                           </a>
                           <div class="entry-header">
                              <h2 class="entry-title"><a class="entry-title-link" href="{{ route('show-truyen', ['truyen' => $row->slug]) }}" rel="bookmark" title="{{ $row->site_title }}">{{ $row->name }}</a></h2>
                              <p class="entry-excerpt excerpt">{{ $shortDescription }} …</p>
                              <div class="entry-meta">
                                 <span class="entry-author mi"><span class="by sp">by</span><span class="author-name">{{ $row->author }}</span></span>
                                 <span class="entry-time mi"><span class="sp">•</span><time class="published" datetime="{{ $row->created_at }}">{{ $row->created_at }}</time></span>
                              </div>
                           </div>
                        </article>
                        @endforeach
                     </div>
                  </div>
                  <div class="blog-pager" id="blog-pager">
                     <span class="no-more load-more btn show">
                     Đó là tất cả rồi bro
                     </span>
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
                        <li class="facebook link-0"><a alt="facebook" class="facebook btn" href="https://www.facebook.com/cafesuateam/" rel="noopener noreferrer" target="_blank" title="facebook"><span class="text">Facebook</span></a></li>
                        <li class="twitter link-1"><a alt="twitter" class="twitter btn" href="https://www.facebook.com/cafesuateam/" rel="noopener noreferrer" target="_blank" title="twitter"><span class="text">Twitter</span></a></li>
                        <li class="youtube link-2"><a alt="youtube" class="youtube btn" href="https://www.facebook.com/cafesuateam/" rel="noopener noreferrer" target="_blank" title="youtube"><span class="text">YouTube</span></a></li>
                        <li class="instagram link-3"><a alt="instagram" class="instagram btn" href="https://www.facebook.com/cafesuateam/" rel="noopener noreferrer" target="_blank" title="instagram"><span class="text">Instagram</span></a></li>
                        <li class="linkedin link-4"><a alt="linkedin" class="linkedin btn" href="https://www.facebook.com/cafesuateam/" rel="noopener noreferrer" target="_blank" title="linkedin"><span class="text">LinkedIn</span></a></li>
                        <li class="skype link-5"><a alt="skype" class="skype btn" href="https://www.facebook.com/cafesuateam/" rel="noopener noreferrer" target="_blank" title="skype"><span class="text">Skype</span></a></li>
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