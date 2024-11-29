<div class="widget Label" data-version="2" id="Label2">
    <div class="widget-title title-wrap">
        <h3 class="title">Tags</h3>
    </div>
    <div class="widget-content cloud-label">
        <ul class="cloud-style">
                @foreach ($tags as $index => $tag)
                <li><a class="label-name btn" href="{{ route('show-danh-muc', ['slug' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                @endforeach
        </ul>
    </div>
</div>