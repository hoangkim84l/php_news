<div class="widget PopularPosts" data-version="2" id="PopularPosts2">
    <div class="widget-title title-wrap">
        <h3 class="title">Thread Vừa Xem</h3>
    </div>
    <div class="widget-content default-items">
        @foreach($viewedPosts as $index => $row)
        <?php $imageUrl = asset('storage/' . $row->img_link); ?>
        <div class="default-item ds item-{{ $index }}">
        <a class="entry-image-wrap is-image" href="{{ route('show-thread', ['thread' => $row->slug]) }}" title="{{ $row->site_title }}"><span class="entry-thumb lazy-ify" data-image="{{ asset('storage/' . $row->img_link) }}" style="background-image:url('{{ $imageUrl }}')"></span>
        </a>
        <div class="entry-header">
            <h2 class="entry-title"><a href="{{ route('show-thread', ['thread' => $row->slug]) }}" title="{{ $row->site_title }}">{{ $row->name }}</a></h2>
            <div class="entry-meta"><span class="entry-time mi"><time class="published" datetime="{{ $row->created_at }}">{{ $row->created_at }}</time></span></div>
        </div>
        </div>
        @endforeach
    </div>
</div>