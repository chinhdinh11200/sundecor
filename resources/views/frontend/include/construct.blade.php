<div class="made__block made__block--construct">
  <h2 class="made__block--heading">công trình đã thực hiện</h2><a class="made__block--link" href="{{ route('category', \App\Models\Menu::find(2)->slug ) }}">xem tất cả</a>
  <div class="row made__block--list">
    @foreach ($news_made as $new_made)
        <div class="col-md-3 made__block--item">
            <a href="{{ route('category', $new_made->slug) }}">
                <div class="made__block--img"><img src="{{ asset('upload/images/news/'. $new_made->image) }}" alt="" /></div>
                <h3 class="made__block--name">{{ $new_made->title }}</h3>
            </a>
        </div>
    @endforeach
  </div>
</div>
