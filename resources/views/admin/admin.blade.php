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

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-body -->
        @endif

    </form>
</div>
@endsection

