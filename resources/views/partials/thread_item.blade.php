@foreach ($storiesNew as $index => $threadNew)
@php
$cleanText = strip_tags($threadNew->content);
$shortDescription = substr($cleanText, 0, 200);
$imageUrl = asset('storage/' . $threadNew->img_link);
@endphp
<article class="blog-post hentry index-post post-{{ $index }}">
   <a class="entry-image-wrap is-image" href="{{ route('show-thread', ['thread' => $threadNew->slug]) }}" title="{{ $threadNew->name }}">
      <span class="entry-thumb lazy-ify" data-image="{{ asset('storage/' . $threadNew->image_link) }}" style="background-image:url('{{ $imageUrl }}')"></span>
   </a>
   <div class="entry-header">
      <h2 class="entry-title">
         <a class="entry-title-link" href="{{ route('show-thread', ['thread' => $threadNew->slug]) }}" rel="bookmark" title="{{ $threadNew->name }}">{{ $threadNew->name }}</a>
      </h2>
      <p class="entry-excerpt excerpt">{{ $shortDescription }} …</p>
      <div class="entry-meta">
         <span class="entry-author mi"><span class="by sp">by</span><span class="author-name">{{ $threadNew->author }}</span></span>
         <span class="entry-time mi"><span class="sp">•</span><time class="published" datetime="{{ $threadNew->created_at }}">{{ $threadNew->created_at }}</time></span>
      </div>
   </div>
</article>
@endforeach