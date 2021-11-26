@extends('admin.layout.main')

@section('content')
<form action="{{ route('admin.video.update', ['video' => $video]) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <table class="table table-border">
        <tr>
            <td >
                <label for="title">Title : </label>
            </td>
            <td>
                <input type="text" id="title" name="title" value="{{ $video->title }}">
            </td>
        </tr>
        <tr>
            <td >
                <label for="link">Link : </label>
            </td>
            <td>
                <input type="text" id="link" name="link" value="{{ $video->link }}">
            </td>
        </tr>
        <tr>
            <td >
                <label for="priority">Priority : </label>
            </td>
            <td>
                <input type="text" id="priority" name="priority" value="{{ $video->priority }}">
            </td>
        </tr>
        <tr>
            <td >
                <label for="image">Image : </label>
            </td>
            <td>
                {{-- sua lai cho sua anh --}}
                <input type="file" id="image" name="image" value="">
                <img src="{{ asset('backend/images/video/'.$video->image_url) }}" alt="ảnh" style="width: 100px; height: 100px">
                <button type="button">Xóa ảnh này</button>
            </td>
        </tr>
        <tr>
            <td >
                <label for="status">Status : </label>
            </td>
            <td>
                <select id="status" name="status">
                    <option value="1" selected={{ $video->status == 1 ? 1 : 0 }} >Hiển thị</option>
                    <option value="0" selected={{ $video->status == 0 ? 1 : 0 }}>Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td ></td>
            <td>
                <button type="submit">Gửi</button>
            </td>
        </tr>
    </table>

    @if ($errors->any)
        <div>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

</form>
@endsection
