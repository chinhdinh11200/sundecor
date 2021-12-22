@extends('admin.layout.main')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="left no-click">
                <h3 class="card-title">
                    <a href="{{ route('admin.supporter.index') }}">Danh sách</a>
                </h3>
            </div>
            <div class="right">
                <h3 class="card-title">
                    <a href="{{ route('admin.supporter.create') }}">Thêm mới</a>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.supporter.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="fullname">Họ và tên : </label>
                        <input type="text" id="fullname" name="fullname" value=""  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tel">Số điện thoại : </label>
                                <input type="text" id="tel" name="tel" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="priority">Vị trí</label>
                        <select type="text" class="form-control" id="priority" name="priority">
                            <option value="null">Chọn vị trí</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="image">Ảnh : </label>
                                <input type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái : </label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>

                    @if ($errors->any)
                        <div>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>

            </form>
        </div>
    </div>

@endsection
