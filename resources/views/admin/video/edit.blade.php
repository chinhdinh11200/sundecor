@extends('admin.layout.main')

@section('content')
    <div class="card">
        <form action="{{ route('admin.video.update', ['video' => $video]) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title : </label>
                    <input type="text" id="title" name="title" value="{{ $video->title }}"  class="form-control">
                    @if($errors->has('title'))
                        <p style="color: red">{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="link">Link : </label>
                    <input type="text" id="link" name="link" value="{{ $video->link }}" class="form-control">
                    @if($errors->has('link'))
                        <p style="color: red">{{ $errors->first('link') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Vị trí</label>
                    <select type="text" class="form-control" id="priority" name="priority">
                        <option value>Chọn vị trí</option>
                        <option value="1" {{ $video->priority == 1 ? "selected" : "" }}>1</option>
                        <option value="2" {{ $video->priority == 2 ? "selected" : "" }}>2</option>
                        <option value="3" {{ $video->priority == 3 ? "selected" : "" }}>3</option>
                        <option value="4" {{ $video->priority == 4 ? "selected" : "" }}>4</option>
                        <option value="5" {{ $video->priority == 5 ? "selected" : "" }}>5</option>
                        <option value="6" {{ $video->priority == 6 ? "selected" : "" }}>6</option>
                        <option value="7" {{ $video->priority == 7 ? "selected" : "" }}>7</option>
                        <option value="8" {{ $video->priority == 8 ? "selected" : "" }}>8</option>
                    </select>
                  </div>
                <div class="form-group">
                    <label for="image">Image : </label>
                    <input type="file" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="status">Status : </label>
                    <select id="status" name="status" class="form-control">
                        <option value="1" {{ $video->status == 1 ? "selected" : "" }} >Hiển thị</option>
                        <option value="0" {{ $video->status == 0 ? "selected" : "" }}>Ẩn</option>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>
    </div>

@endsection
