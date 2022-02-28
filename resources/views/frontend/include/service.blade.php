<div class="service__block">
  <h2 class="service__block--heading">DỊCH VỤ 5 SAO TẠI MORANI</h2>
  <div class="main-container">
      <div class="service__block--top">
        <a href="{{ route('category', $services[0]->slug) }}">
          <div class="service__block--item">
            <img class="service__block--img" src="{{asset('frontend\images\common\icon-dichvu1.png')}}" alt="">
            <h3 class="service__block--name">{{ $services[0]->name }}</h3>
          </div>
        </a>
        <a href="{{ route('category', $services[1]->slug) }}">
          <div class="service__block--item">
            <img class="service__block--img" src="{{asset('frontend\images\common\icon-dichvu2.png')}}" alt="">
            <h3 class="service__block--name">{{ $services[1]->name }}</h3>
          </div>
        </a>
      </div>
      <div class="service__block--center">
        <a href="{{ route('category', $services[2]->slug) }}">
          <div class="service__block--item">
            <img class="service__block--img" src="{{asset('frontend\images\common\icon-dichvu3.png')}}" alt="">
            <h3 class="service__block--name">{{ $services[2]->name }}</h3>
          </div>
        </a>
        <a>
          <div class="service__block--line">
            <div></div>
            <div></div>
            <div></div>
          </div>
          <div class="service__block--logo">
            <img src="{{ asset('upload/images/webinfo/' . $webInfo->logo) }}" alt="">
          </div>
        </a>
        <a href="{{ route('category', $services[3]->slug) }}">
          <div class="service__block--item">
            <img class="service__block--img" src="{{asset('frontend\images\common\icon-dichvu4.png')}}" alt="">
            <h3 class="service__block--name">{{ $services[3]->name }}</h3>
          </div>
        </a>
      </div>
      <div class="service__block--bottom">
        <a href="{{ route('category', $services[4]->slug) }}">
          <div class="service__block--item">
            <img class="service__block--img" src="{{asset('frontend\images\common\icon-dichvu5.png')}}" alt="">
            <h3 class="service__block--name">{{ $services[4]->name }}</h3>
          </div>
        </a>
        <a href="{{ route('category', $services[5]->slug) }}">
          <div class="service__block--item">
            <img class="service__block--img" src="{{asset('frontend\images\common\icon-dichvu6.png')}}" alt="">
            <h3 class="service__block--name">{{ $services[5]->name }}</h3>
          </div>
        </a>
      </div>
  </div>
</div>
