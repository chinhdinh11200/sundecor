@extends('admin.layout.main')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title">Cập nhật thông tin</h3>
                        </div>
                        <div class="right no-click">
                            {{-- <h3 class="card-title"><a href="{{route('admin.product.create')}}"></a></h3> --}}
                        </div>
                    </div>
                    <form action="{{ route('admin.promotion.update', $promotion) }}" method="post">\
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Họ và tên</label>
                                <input type="text" id="fullname" name="fullname" class="form-control" value="{{ $promotion->fullname }}">
                                @if($errors->has('fullname'))
                                    <p style="color: red">{{ $errors->first('fullname') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tel">Số điện thoại</label>
                                <input type="text" id="tel" name="tel" class="form-control" value="{{ $promotion->tel }}">
                                @if($errors->has('tel'))
                                    <p style="color: red">{{ $errors->first('tel') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <input type="text" id="description" name="description" class="form-control" value="{{ $promotion->description }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái&emsp;</label>
                                {{-- <input type="checkbox" id="status" name="status" {{ $promotion->status == 1 ? 'selected' : '' }}> Đã thanh toán --}}
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $promotion->status == 1 ? 'selected' : '' }}>Đã liên hệ</option>
                                    <option value="0" {{ $promotion->status == 0 ? 'selected' : '' }}>Chưa liên hệ</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
