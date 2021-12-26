@extends('admin.layout.main')
@section('content')
<div class="card">

    <div class="card-header">

    </div>
  <!-- /.card-header -->
  <!-- form start -->

    <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.webinfo.store')}}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="receiveEmail">Email nhận : </label>
                <input type="email" class="form-control" id="receiveEmail" placeholder="Email nhận" name="receiveEmail" value="{{ $webInfo->receiveEmail }}">
            </div>
            <div class="form-group">
                <label for="tel">Tel : </label>
                <input type="text" class="form-control" id="tel" placeholder="Tel" name="tel" value="{{ $webInfo->tel }}">
            </div>
            <div class="form-group">
                <label for="hotline">Hotline : </label>
                <input type="text" class="form-control" id="hotline" placeholder="Hotline" name="hotline" value="{{ $webInfo->hotline }}">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook : </label>
                <input type="text" class="form-control" id="facebook" placeholder="Facebook" name="facebook" value="{{ $webInfo->facebook }}">
            </div>
            <div class="form-group">
                <label for="reason">Tại sao chọn : </label>
                <textarea class="form-control" id="reason" name="reason" value="{{ old('reason') }}">{{ $webInfo->reason }}</textarea>
                <script>
                    CKEDITOR.replace( 'reason' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
            </div>
            <div class="form-group">
                <label for="promotion">Khuyến mãi : </label>
                <textarea class="form-control" id="promotion" name="promotion" value="{{ old('promotion') }}">{{ $webInfo->promotion }}</textarea>
                <script>
                    CKEDITOR.replace( 'promotion' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
            </div>
            <div class="form-group">
                <label for="tutorial">Hướng dẫn mua hàng : </label>
                <textarea class="form-control" id="tutorial" name="tutorial" value="{{ old('tutorial') }}">{{ $webInfo->tutorial }}</textarea>
                <script>
                    CKEDITOR.replace( 'tutorial' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ liên hệ : </label>
                <textarea class="form-control" id="address" name="address" value="{{ old('address') }}">{{ $webInfo->address }}</textarea>
                <script>
                    CKEDITOR.replace( 'address' , {
                            width: ['100%'], height: ['500px']
                    });
                </script>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-body -->

    </form>
</div>
@endsection

