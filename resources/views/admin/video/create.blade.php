@extends('admin.layout.main')

@section('content')
    <div class="card">

        <div class="card-header">
            <div class="left no-click">
                <h3 class="card-title"><a href="{{route('admin.video.index')}}">Danh sách video</a></h3>
            </div>
            <div class="right">
                <h3 class="card-title"><a href="{{route('admin.video.create')}}">Thêm video</a></h3>
            </div>
        </div>
        <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title : </label>
                    <input type="text" id="title" name="title" value="" class="form-control" placeholder="Tiêu đề video">
                    @if($errors->has('title'))
                                <p style="color: red">{{ $errors->first('title') }}</p>
                              @endif
                </div>

                <div class="form-group">
                    <label for="link">Link : </label>
                    <input type="text" id="link" name="link" value="" class="form-control" placeholder="Link video">
                    @if($errors->has('link'))
                                <p style="color: red">{{ $errors->first('link') }}</p>
                              @endif
                </div>

                <div class="form-group">
                    <label for="priority">Vị trí</label>
                    <select type="text" class="form-control" id="priority" name="priority">
                        <option value>Chọn vị trí</option>
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
                    <label for="image">Image : </label>
                    <input type="file" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="status">Status : </label>
                    <select id="status" name="status" class="form-control">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>
    </div>
@endsection
