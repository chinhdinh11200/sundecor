<div class="made__block">
  <h2 class="made__block--heading">video dự án đã thực hiện</h2><a class="made__block--link" href="{{ route('category', 'tat-ca-video.html') }}">xem tất cả</a>
    <div class="row made__block--list">
        @foreach ($videos as $video)
                <div class="col-md-4 made__block--item">
                    <iframe class="made__block--video" id="framevideo" width="100%" height="600" src="https://www.youtube.com/embed/<?php
                    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->link, $matches);
                    echo $matches[1];
                    ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                <a href="{{ $video->link }}"><h3 class="made__block--name">{{ $video->title }}</h3></a>
                </div>
        @endforeach
    </div>
</div>
