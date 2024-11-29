<footer class="post-footer">
    <div id="related-wrap" class="type-related">
        <div class="title-wrap related-title">
            <span class="title"><span class="t-text">Chắc Bạn Cũng Quan Tâm</span></span>
        </div>
        <div class="litespot-prod-related-content">
            <div class="related-posts">
            @foreach($storiesSameTag as $index => $row)
            <?php $imageUrl = asset('storage/upload/stories/' . $row->image_link); ?>
            <div class="related-item item-{{ $index }}">
                    <a title="{{ $row->site_title }}" class="entry-image-wrap is-image" href="{{ route('show-truyen', ['truyen' => $row->slug]) }}"><span class="entry-thumb lazy-ify" data-image="{{ route('show-truyen', ['truyen' => $row->slug]) }}" style="background-image:url('{{ $imageUrl }}')"></span></a>
                    <div class="entry-header">
                        <h2 class="entry-title"><a href="{{ route('show-truyen', ['truyen' => $row->slug]) }}" title="{{ $row->site_title }}">{{ $row->name }}</a></h2>
                        <div class="entry-meta"><span class="entry-time mi"><time class="published" datetime="{{ $row->created_at }}">{{ $row->created_at }}</time></span></div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</footer>