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
                        <span class="query-info query-success">"{{ $catalog->name }}"</span>
                     </div>
                     <div class="blog-posts hfeed index-post-wrap">
                        @foreach ($stories as $story)
                        <article class="blog-post hentry index-post post-0">
                           <a class="entry-image-wrap is-image" href="https://thaygivietdo.blogspot.com/2023/09/deploy-website-len-vps-hoac-hosting-voi.html" title="Deploy website lên VPS hoặc Hosting với Gitlab CI/CD"><span class="entry-thumb lazy-ify" data-image="https://lh3.googleusercontent.com/blogger_img_proxy/AEn0k_sjGH2EgyAC-boQFYsBt9V_EoGPdZs2koIFSmtmtYlWCbPaseqqC1cW7mofAICOsk0RfT10dRUickAnHPy6fv5p-W03emMRooWiMvg-_1iNDLvq4ZVwR38w7EO7yBYFPpPIXkw=w72-h72-p-k-no-nu" style="background-image:url(https://lh3.googleusercontent.com/blogger_img_proxy/AEn0k_sjGH2EgyAC-boQFYsBt9V_EoGPdZs2koIFSmtmtYlWCbPaseqqC1cW7mofAICOsk0RfT10dRUickAnHPy6fv5p-W03emMRooWiMvg-_1iNDLvq4ZVwR38w7EO7yBYFPpPIXkw=w220-h146-p-k-no-nu)"></span>
                           </a>
                           <div class="entry-header">
                              <h2 class="entry-title"><a class="entry-title-link" href="https://thaygivietdo.blogspot.com/2023/09/deploy-website-len-vps-hoac-hosting-voi.html" rel="bookmark" title="Deploy website lên VPS hoặc Hosting với Gitlab CI/CD">{{ $$story->name }}</a></h2>
                              <p class="entry-excerpt excerpt">Deploy website lên VPS với Gitlab CI/CD Sau một thời gian code ra được môt trang web xịn xò thì bạn có nhu cầu đưa lên int…</p>
                              <div class="entry-meta">
                                 <span class="entry-author mi"><span class="by sp">by</span><span class="author-name">{{ $story->author }}</span></span>
                                 <span class="entry-time mi"><span class="sp">•</span><time class="published" datetime="{{ $story->created_at }}">{{ $story->created_at }}</time></span>
                              </div>
                           </div>
                        </article>
                        @endforeach
                     </div>
                  </div>
                  <div class="blog-pager" id="blog-pager">
                     <span class="no-more load-more btn show">
                     Đó Là Tất Cả Rồi Bro ơi
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
               <div class="widget PopularPosts" data-version="2" id="PopularPosts2">
                  <div class="widget-title title-wrap">
                     <h3 class="title">Phổ Biến</h3>
                  </div>
                  <div class="widget-content default-items">
                     <div class="default-item ds item-0">
                        <a class="entry-image-wrap is-image" href="https://thaygivietdo.blogspot.com/2016/01/tinh-binh-phuong-1-so-trong-python.html" title="Tính Bình Phương 1 Số Trong Python"><span class="entry-thumb lazy-ify" data-image="https://resources.blogblog.com/img/blank.gif" style="background-image:url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgZBABWUS2XZv5t6dfKxQYDJjuXg_qInKBKrMLVddpFh2Jnz0deT3j-IgrFrBvj2KCpvyzeNjUlAif2xKsDgtw1fAMFg28adQd6N_vLph88ZUsEt5KhCBNrzMcrlgWvw6-rT2zeDaAoFwg/w108-h72-p-k-no-nu/nth-ify.png)"></span>
                        </a>
                        <div class="entry-header">
                           <h2 class="entry-title"><a href="https://thaygivietdo.blogspot.com/2016/01/tinh-binh-phuong-1-so-trong-python.html" title="Tính Bình Phương 1 Số Trong Python">Tính Bình Phương 1 Số Trong Python</a></h2>
                           <div class="entry-meta"><span class="entry-time mi"><time class="published" datetime="2016-01-18T02:02:00+07:00">January 18, 2016</time></span></div>
                        </div>
                     </div>
                     <div class="default-item ds item-1">
                        <a class="entry-image-wrap is-image" href="https://thaygivietdo.blogspot.com/2016/09/lay-du-lieu-tu-checkbox-bang-jsp-servlet.html" title="Lấy dữ liệu từ checkbox bằng JSP Servlet "><span class="entry-thumb lazy-ify" data-image="https://blogger.googleusercontent.com/img/a/AVvXsEivK0UZ4bh_GmWox33hUAGvJIeHEf7EcJaAoOdzLYkwXL-2YnzNP4TxWU2kb6j5WyFsEPmMmVz1bBCVzzkbp15F4_liM34LAJXtL22H04igwl9CSf8GNJXROaLPsoD2frr7B7AbvVTvCQNOfvGnds3R0mDIJV3EONYZIipxF2t_z8mZryEsR7PeY9KEQaM=w72-h72-p-k-no-nu" style="background-image:url(https://blogger.googleusercontent.com/img/a/AVvXsEivK0UZ4bh_GmWox33hUAGvJIeHEf7EcJaAoOdzLYkwXL-2YnzNP4TxWU2kb6j5WyFsEPmMmVz1bBCVzzkbp15F4_liM34LAJXtL22H04igwl9CSf8GNJXROaLPsoD2frr7B7AbvVTvCQNOfvGnds3R0mDIJV3EONYZIipxF2t_z8mZryEsR7PeY9KEQaM=w108-h72-p-k-no-nu)"></span>
                        </a>
                        <div class="entry-header">
                           <h2 class="entry-title"><a href="https://thaygivietdo.blogspot.com/2016/09/lay-du-lieu-tu-checkbox-bang-jsp-servlet.html" title="Lấy dữ liệu từ checkbox bằng JSP Servlet ">Lấy dữ liệu từ checkbox bằng JSP Servlet </a></h2>
                           <div class="entry-meta"><span class="entry-time mi"><time class="published" datetime="2016-09-17T23:43:00+07:00">September 17, 2016</time></span></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="widget HTML" data-version="2" id="HTML88">
                  <div class="widget-title title-wrap">
                     <h3 class="title">Gần Nhất</h3>
                  </div>
                  <div class="widget-content" data-shortcode="{getContent} $results={4} $label={recent} $type={mini}"></div>
               </div>
               <div class="widget HTML is-ad" data-version="2" id="HTML2">
                  <div class="widget-content">
                     <a class="ads-here" href="https://thaygivietdo.blogspot.com/">Responsive Advertisement</a>
                  </div>
               </div>
               <div class="widget Label" data-version="2" id="Label2">
                  <div class="widget-title title-wrap">
                     <h3 class="title">Tags</h3>
                  </div>
                  <div class="widget-content cloud-label">
                     <ul class="cloud-style">
                        <li><a class="label-name btn" href="https://thaygivietdo.blogspot.com/search/label/15%20ph%C3%BAt%20v%E1%BB%9Bi%20javascript">15 phút với javascript</a></li>
                        <li><a class="label-name btn" href="https://thaygivietdo.blogspot.com/search/label/404%20error">404 error</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </aside>
   </div>
</div>
@endsection