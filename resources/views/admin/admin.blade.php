@extends('admin.layout.main')
@section('content')
<div class="card">

    <div class="card-header">
    </div>
  <!-- /.card-header -->
  <!-- form start -->

    <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.webinfo.store')}}">
        @csrf
        @if ($webInfo)
        <div class="card-body">
            <div class="form-group">
                <label for="receiveEmail">Email nhận : </label>
                <input type="email" class="form-control" id="receiveEmail" placeholder="Email nhận" name="receiveEmail" value="{{ $webInfo->receiveEmail }}">
                @if($errors->has('receiveEmail'))
                    <p style="color: red">{{ $errors->first('receiveEmail') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tel">Tel 1 : </label>
                <input type="text" class="form-control" id="tel1" placeholder="Tel" name="tel1" value="{{ $webInfo->tel1 }}">
                @if($errors->has('tel1'))
                    <p style="color: red">{{ $errors->first('tel1') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tel">Tel 2 : </label>
                <input type="text" class="form-control" id="tel2" placeholder="Tel" name="tel2" value="{{ $webInfo->tel2 }}">
                @if($errors->has('tel2'))
                    <p style="color: red">{{ $errors->first('tel2') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="hotline">Hotline : </label>
                <input type="text" class="form-control" id="hotline" placeholder="Hotline" name="hotline" value="{{ $webInfo->hotline }}">
                @if($errors->has('hotline'))
                    <p style="color: red">{{ $errors->first('hotline') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="facebook">Facebook : </label>
                <input type="text" class="form-control" id="facebook" placeholder="Facebook" name="facebook" value="{{ $webInfo->facebook }}">
                @if($errors->has('facebook'))
                    <p style="color: red">{{ $errors->first('facebook') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="link_map">Link GG Map : </label>
                <input type="text" class="form-control" id="link_map" placeholder="" name="link_map" value="{{ $webInfo->link_map }}">
                @if($errors->has('link_map'))
                    <p style="color: red">{{ $errors->first('link_map') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="image_web">Ảnh website : </label>
                <input type="file" id="image_web" name="image_web" value="{{ $webInfo->image_web }}">
                <div class="col-3 mb-5">
                    <img src="{{ asset('upload/images/webinfo/' . $webInfo->image_web) }}" alt="image_web" style="width: 100%;">
                </div>
                @if($errors->has('image_web'))
                    <p style="color: red">{{ $errors->first('image_web') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="logo">Logo : </label>
                <input type="file" id="logo" name="logo" value="{{ $webInfo->logo }}">
                <div class="col-3 mb-5">
                    <img src="{{ asset('upload/images/webinfo/' . $webInfo->logo) }}" alt="logo" style="width: 100%;">
                </div>
                @if($errors->has('logo'))
                    <p style="color: red">{{ $errors->first('logo') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="banner_ad">Banner tư vấn : </label>
                <input type="file" id="banner_ad" name="banner_ad" value="{{ $webInfo->banner_ad }}">
                <div class="col-8 mb-5">
                    <img src="{{ asset('upload/images/webinfo/' . $webInfo->banner_ad) }}" alt="banner_ad" style="width: 100%;">
                </div>
                @if($errors->has('banner_ad'))
                    <p style="color: red">{{ $errors->first('banner_ad') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="site_name">Tên page : </label>
                <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $webInfo->site_name }}">
                @if($errors->has('site_name'))
                    <p style="color: red">{{ $errors->first('site_name') }}</p>
                @endif
            </div><div class="form-group">
                <label for="keywords">Từ khóa : </label>
                <input type="text" class="form-control" id="keywords" name="keywords" value="{{ $webInfo->keywords }}">
                @if($errors->has('keywords'))
                    <p style="color: red">{{ $errors->first('keywords') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="title">Title : </label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $webInfo->title }}">
                @if($errors->has('title'))
                    <p style="color: red">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Mô tả : </label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $webInfo->description }}">
                @if($errors->has('description'))
                    <p style="color: red">{{ $errors->first('description') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="sale">Khuyến mãi : </label>
                <input type="text" class="form-control" id="sale" name="sale" value="{{ $webInfo->sale }}">
                @if($errors->has('sale'))
                    <p style="color: red">{{ $errors->first('sale') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="gift">Quà tặng : </label>
                <input type="text" class="form-control" id="gift" name="gift" value="{{ $webInfo->gift }}">
                @if($errors->has('gift'))
                    <p style="color: red">{{ $errors->first('gift') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="reason">Tại sao chọn : </label>
                <textarea class="form-control" id="reason" name="reason" value="{{ old('reason') }}">{{ $webInfo->reason }}</textarea>
                <script>
                    CKEDITOR.replace( 'reason' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
                @if($errors->has('reason'))
                    <p style="color: red">{{ $errors->first('reason') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="promotion">Khuyến mãi : </label>
                <textarea class="form-control" id="promotion" name="promotion" value="{{ old('promotion') }}">{{ $webInfo->promotion }}</textarea>
                <script>
                    CKEDITOR.replace( 'promotion' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
                @if($errors->has('promotion'))
                    <p style="color: red">{{ $errors->first('promotion') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tutorial">Hướng dẫn mua hàng : </label>
                <textarea class="form-control" id="tutorial" name="tutorial" value="{{ old('tutorial') }}">{{ $webInfo->tutorial }}</textarea>
                <script>
                    CKEDITOR.replace( 'tutorial' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
                @if($errors->has('tutorial'))
                    <p style="color: red">{{ $errors->first('tutorial') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ liên hệ : </label>
                <textarea class="form-control" id="address" name="address" value="{{ old('address') }}">{{ $webInfo->address }}</textarea>
                <script>
                    CKEDITOR.replace( 'address' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
                @if($errors->has('address'))
                    <p style="color: red">{{ $errors->first('address') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="info">Thông tin footer : </label>
                <textarea class="form-control" id="info" name="info" value="{{ old('info') }}">{{ $webInfo->info }}</textarea>
                <script>
                    CKEDITOR.replace( 'info' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
                @if($errors->has('info'))
                    <p style="color: red">{{ $errors->first('info') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-body -->
        @else
        <div class="card-body">
            <div class="form-group">
                <label for="receiveEmail">Email nhận : </label>
                <input type="email" class="form-control" id="receiveEmail" placeholder="Email nhận" name="receiveEmail">
                @if($errors->has('receiveEmail'))
                    <p style="color: red">{{ $errors->first('receiveEmail') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tel">Tel 1 : </label>
                <input type="text" class="form-control" id="tel1" placeholder="Tel" name="tel1">
                @if($errors->has('tel1'))
                    <p style="color: red">{{ $errors->first('tel1') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tel">Tel 2 : </label>
                <input type="text" class="form-control" id="tel2" placeholder="Tel" name="tel2">
                @if($errors->has('tel2'))
                    <p style="color: red">{{ $errors->first('tel2') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="hotline">Hotline : </label>
                <input type="text" class="form-control" id="hotline" placeholder="Hotline" name="hotline">
                @if($errors->has('hotline'))
                    <p style="color: red">{{ $errors->first('hotline') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="facebook">Facebook : </label>
                <input type="text" class="form-control" id="facebook" placeholder="Facebook" name="facebook">
                @if($errors->has('facebook'))
                    <p style="color: red">{{ $errors->first('facebook') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="link_map">Link GG Map : </label>
                <input type="text" class="form-control" id="link_map" placeholder="" name="link_map">
                @if($errors->has('link_map'))
                    <p style="color: red">{{ $errors->first('link_map') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="image_web">Ảnh website : </label>
                <input type="file" id="image_web" name="image_web">
                @if($errors->has('image_web'))
                    <p style="color: red">{{ $errors->first('image_web') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="logo">Logo : </label>
                <input type="file" id="logo" name="logo">
                @if($errors->has('logo'))
                    <p style="color: red">{{ $errors->first('logo') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="banner_ad">Banner tư vấn : </label>
                <input type="file" id="banner_ad" name="banner_ad">
                @if($errors->has('banner_ad'))
                    <p style="color: red">{{ $errors->first('banner_ad') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="site_name">Tên page : </label>
                <input type="text" class="form-control" id="site_name" name="site_name">
                @if($errors->has('site_name'))
                    <p style="color: red">{{ $errors->first('site_name') }}</p>
                @endif
            </div><div class="form-group">
                <label for="keywords">Từ khóa : </label>
                <input type="text" class="form-control" id="keywords" name="keywords">
                @if($errors->has('keywords'))
                    <p style="color: red">{{ $errors->first('keywords') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="title">Title : </label>
                <input type="text" class="form-control" id="title" name="title">
                @if($errors->has('title'))
                    <p style="color: red">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Mô tả : </label>
                <input type="text" class="form-control" id="description" name="description">
                @if($errors->has('description'))
                    <p style="color: red">{{ $errors->first('description') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="sale">Khuyến mãi : </label>
                <input type="text" class="form-control" id="sale" name="sale">
                @if($errors->has('sale'))
                    <p style="color: red">{{ $errors->first('sale') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="gift">Khuyến mãi : </label>
                <input type="text" class="form-control" id="gift" name="gift">
                @if($errors->has('gift'))
                    <p style="color: red">{{ $errors->first('gift') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="reason">Tại sao chọn : </label>
                <textarea class="form-control" id="reason" name="reason"></textarea>
                <script>
                    CKEDITOR.replace( 'reason' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
                @if($errors->has('reason'))
                    <p style="color: red">{{ $errors->first('reason') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="promotion">Khuyến mãi : </label>
                <textarea class="form-control" id="promotion" name="promotion"></textarea>
                <script>
                    CKEDITOR.replace( 'promotion' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
                @if($errors->has('promotion'))
                    <p style="color: red">{{ $errors->first('promotion') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="tutorial">Hướng dẫn mua hàng : </label>
                <textarea class="form-control" id="tutorial" name="tutorial"></textarea>
                <script>
                    CKEDITOR.replace( 'tutorial' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
                @if($errors->has('tutorial'))
                    <p style="color: red">{{ $errors->first('tutorial') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ liên hệ : </label>
                <textarea class="form-control" id="address" name="address"></textarea>
                <script>
                    CKEDITOR.replace( 'address' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
                @if($errors->has('address'))
                    <p style="color: red">{{ $errors->first('address') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="info">Thông tin footer : </label>
                <textarea class="form-control" id="info" name="info" value="{{ old('info') }}"></textarea>
                <script>
                    CKEDITOR.replace( 'info' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
                @if($errors->has('info'))
                    <p style="color: red">{{ $errors->first('info') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-body -->
        @endif

    </form>
</div>
@endsection

