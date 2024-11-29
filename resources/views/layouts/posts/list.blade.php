@extends('layouts.app')

@section('content')
<div class="flex-center" id="content-wrapper" style="transform: none;">
   <div class="container row-x1" style="transform: none;">
      <!-- Main Wrapper -->
      <main id="main-wrapper" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 2289px;">
         <div class="theiaStickySidebar-2">
            <div class="main section" id="main" name="Main Posts">
               <div class="widget Blog" data-version="2" id="Blog1">
                  <div class="blog-posts-wrap">
                     <div class="blog-posts hfeed index-post-wrap">
                        @foreach ($storiesNew as $index => $storyNew)
                        @php 
                        $cleanText = strip_tags($storyNew->description);
                        $shortDescription = substr($cleanText, 0, 200);
                        @endphp
                        <?php $imageUrl = asset('storage/upload/stories/' . $storyNew->image_link); ?>
                        <article class="blog-post hentry index-post post-{{ $index }}">
                           <a class="entry-image-wrap is-image" href="{{ route('show-truyen', ['truyen' => $storyNew->slug]) }}" title="Khám phá Redis"><span class="entry-thumb lazy-ify" data-image="{{ asset('storage/upload/stories/' . $storyNew->image_link) }}" style="background-image:url('{{ $imageUrl }}')"></span>
                           </a>
                           <div class="entry-header">
                              <h2 class="entry-title"><a class="entry-title-link" href="{{ route('show-truyen', ['truyen' => $storyNew->slug]) }}" rel="bookmark" title="Khám phá Redis">{{ $storyNew->name }}</a></h2>
                              <p class="entry-excerpt excerpt">{!! $shortDescription !!} …</p>
                              <div class="entry-meta">
                                 <span class="entry-author mi"><span class="by sp">by</span><span class="author-name">{{ $storyNew->author }}</span></span>
                                 <span class="entry-time mi"><span class="sp">•</span><time class="published" datetime="{{ $storyNew->created_at }}">{{ $storyNew->created_at }}</time></span>
                              </div>
                           </div>
                        </article>
                        @endforeach
                     </div>
                  </div>
                  <div class="blog-pager" id="blog-pager">
                     <a class="blog-pager-older-link load-more btn" data-load="{{ $storiesNew->nextPageUrl() }}" href="javascript:;" id="litespot-pro-load-more-link2">
                     Xem Thêm
                     </a>
                     <span class="loading">
                        <div class="loader"></div>
                     </span>
                     <span class="no-more load-more btn">
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
               @include('layouts.story-recent')
               @include('layouts.tags')
            </div>
         </div>
      </aside>
   </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const loadMoreBtn = document.getElementById('litespot-pro-load-more-link2');
    const blogPostsContainer = document.querySelector('.blog-posts');

    let nextPageUrl = loadMoreBtn.getAttribute('data-load'); // URL của trang tiếp theo
    loadMoreBtn.addEventListener('click', function () {
        if (!nextPageUrl) {
            return; // Nếu không có trang tiếp theo thì không làm gì
        }

        loadMoreBtn.style.display = 'none'; // Ẩn nút
        document.querySelector('.loading').style.display = 'block'; // Hiển thị loader

        fetch(nextPageUrl, {
            headers: {
               'X-Requested-With': 'XMLHttpRequest'
            }
            })
            .then(response => response.json())
            .then(data => {
                // Thêm HTML của các story mới vào container
                blogPostsContainer.insertAdjacentHTML('beforeend', data.html);

                // Cập nhật URL của trang kế tiếp
                nextPageUrl = data.next_page_url;
                // Hiển thị lại nút "Xem Thêm" nếu còn trang
                if (nextPageUrl != null) {
                  loadMoreBtn.style.display = 'flex';
                } else {
                    document.querySelector('.no-more').style.display = 'block'; // Hiển thị thông báo hết dữ liệu
                }

                document.querySelector('.loading').style.display = 'none'; // Ẩn loader
            })
            .catch(error => {
                console.log(error);
                loadMoreBtn.style.display = 'flex'; // Hiển thị lại nút nếu có lỗi
                document.querySelector('.loading').style.display = 'none';
            });
    });
});
</script>
@endsection
