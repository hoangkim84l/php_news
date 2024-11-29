@foreach ($storiesNew as $index => $storyNew)
@php
$cleanText = strip_tags($storyNew->description);
$shortDescription = substr($cleanText, 0, 200);
$imageUrl = asset('storage/upload/stories/' . $storyNew->image_link);
@endphp
<article class="blog-post hentry index-post post-{{ $index }}">
   <a class="entry-image-wrap is-image" href="{{ route('show-truyen', ['truyen' => $storyNew->slug]) }}" title="{{ $storyNew->name }}">
      <span class="entry-thumb lazy-ify" data-image="{{ asset('storage/upload/stories/' . $storyNew->image_link) }}" style="background-image:url('{{ $imageUrl }}')"></span>
   </a>
   <div class="entry-header">
      <h2 class="entry-title">
         <a class="entry-title-link" href="{{ route('show-truyen', ['truyen' => $storyNew->slug]) }}" rel="bookmark" title="{{ $storyNew->name }}">{{ $storyNew->name }}</a>
      </h2>
      <p class="entry-excerpt excerpt">{{ $shortDescription }} …</p>
      <div class="entry-meta">
         <span class="entry-author mi"><span class="by sp">by</span><span class="author-name">{{ $storyNew->author }}</span></span>
         <span class="entry-time mi"><span class="sp">•</span><time class="published" datetime="{{ $storyNew->created_at }}">{{ $storyNew->created_at }}</time></span>
      </div>
   </div>
</article>
@endforeach