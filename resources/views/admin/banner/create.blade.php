@extends('admin.layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="left no-click">
                <h3 class="card-title"><a href="{{route('admin.banner.index')}}">Danh sách</a></h3>
            </div>
            <div class="right">
                <h3 class="card-title"><a href="{{route('admin.banner.create')}}">Thêm banner</a></h3>
            </div>
        </div>

        <form role="form" action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Tiêu đề banner">
                    @if($errors->has('title'))
                                <p style="color: red">{{ $errors->first('title') }}</p>
                              @endif
                </div>
                <div class="form-group">
                    <label for="">Link</label>
                    <input type="text" name="link" class="form-control" placeholder="Link">
                    @if($errors->has('link'))
                                <p style="color: red">{{ $errors->first('link') }}</p>
                              @endif
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <div>
                        <input type="file" name="image" id="image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select type="text" name="status" class="form-control">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Vị trí</label>
                    <select type="text" name="priority" class="form-control">
                        <option value="">Chọn vị trí</option>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

@endsection
