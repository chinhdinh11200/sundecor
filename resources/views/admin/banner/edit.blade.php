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
                    <label for="">Vị trí</label>
                    <select type="text" name="priority" class="form-control">
                        <option value="{{ null }}">Chọn vị trí</option>
                        <option value="1" {{ $slide->id == 1 ? "selected" : '' }}>1</option>
                        <option value="2" {{ $slide->id == 2 ? "selected" : '' }}>2</option>
                        <option value="3" {{ $slide->id == 3 ? "selected" : '' }}>3</option>
                        <option value="4" {{ $slide->id == 4 ? "selected" : '' }}>4</option>
                        <option value="5" {{ $slide->id == 5 ? "selected" : '' }}>5</option>
                        <option value="6" {{ $slide->id == 6 ? "selected" : '' }}>6</option>
                        <option value="7" {{ $slide->id == 7 ? "selected" : '' }}>7</option>
                        <option value="8" {{ $slide->id == 8 ? "selected" : '' }}>8</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $slide->status == 1 ? "selected" : ""}}>Hiển thị</option>
                        <option value="0" {{ $slide->status == 0 ? "selected" : ""}}>Ẩn</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

@endsection
