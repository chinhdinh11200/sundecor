<div class="news__block">
  <div class="main-container">
    <div class="row news__block--row">
      <div class="col-md-4 news__block--col">
        <div class="news__block--title d-flex">
          <h3>kiến thức về đèn</h3>
          <div class="news__block--line"></div>
          <a href="{{ route('category', \App\Models\Menu::find(3)->slug ) }}" class="news__block--link">xem tất cả</a>
        </div>
        <div class="news__block--list">
            @foreach ($news_know as $new_know)
                <div class="news__block--item row">
                    <div class="news__block--img col-5">
                        <a href="{{ route('category', $new_know->slug) }}">
                            <img src="{{ asset('upload/images/news/'. $new_know->image) }}" alt="">
                        </a>
                    </div>
                    <div class="news__block--description col-7">
                        <a href="{{ route('category', $new_know->slug) }}">
                            {{ $new_know->name }}
                        </a>
                        <p>
                            {{ $new_know->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
      <div class="col-md-4 news__block--col">
        <div class="news__block--title d-flex">
          <h3>bộ sưu tập đèn</h3>
          <div class="news__block--line"></div>
          <a href="{{ route('category', \App\Models\Menu::find(4)->slug ) }}" class="news__block--link">xem tất cả</a>
        </div>
        <div class="news__block--list">
            @foreach ($news_collection as $new_collection)
                <div class="news__block--item row">
                    <div class="news__block--img col-5">
                        <a href="{{ route('category', $new_collection->slug ) }}">
                            <img src="{{ asset('upload/images/news/'. $new_collection->image) }}" alt="">
                        </a>
                    </div>
                    <div class="news__block--description col-7">
                        <a href="{{ route('category', $new_collection->slug ) }}">
                            {{ $new_collection->name }}
                        </a>
                        <p>
                            {{ $new_know->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
      <div class="col-md-4 news__block--col">
        <div class="news__block--title d-flex">
          <h3>hướng dẫn sử dụng</h3>
          <div class="news__block--line"></div>
          <a href="{{ route('category', \App\Models\Menu::find(5)->slug ) }}" class="news__block--link">xem tất cả</a>
        </div>
        <div class="news__block--list">
          @foreach ($news_tutorial as $new_tutorial)
                <div class="news__block--item row">
                    <div class="news__block--img col-5">
                        <a href="{{ route('category', $new_tutorial->slug) }}">
                            <img src="{{ asset('upload/images/news/'. $new_tutorial->image) }}" alt="">
                        </a>
                    </div>
                    <div class="news__block--description col-7">
                        <a href="{{ route('category', $new_tutorial->slug) }}">
                            {{ $new_tutorial->name }}
                        </a>
                        <p>
                            {{ $new_know->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
