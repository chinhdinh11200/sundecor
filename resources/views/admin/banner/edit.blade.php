@extends('admin.layout.main')
@section('content')
    <div class="card">

        <form role="form" action="{{ route('admin.banner.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="">Link</label>
                    <input type="text" name="link" class="form-control" value="{{ $slide->link }}">
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <div>
                        <input type="file" name="image" id="image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $slide->status == 1 ? "selected" : ""}}>Hiển thị</option>
                        <option value="0" {{ $slide->status == 0 ? "selected" : ""}}>Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Vị trí</label>
                    <select type="text" name="priority" class="form-control">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

@endsection
