@extends('admin.layout.main')

@section('content')


    <form action="{{ route('admin.supporter.update', ['supporter'=> $supporter]) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <table class="table table-border">
            <tr>
                <td >
                    <label for="fullname">Fullname : </label>
                </td>
                <td>
                    <input type="text" id="fullname" name="fullname" value="{{ $supporter->fullname }}">
                </td>
            </tr>
            <tr>
                <td >
                    <label for="tel">Tel : </label>
                </td>
                <td>
                    <input type="text" id="tel" name="tel" value="{{ $supporter->tel }}">
                </td>
            </tr>
            <tr>
                <td >
                    <label for="priority">Priority : </label>
                </td>
                <td>
                    <input type="text" id="priority" name="priority" value="{{ $supporter->priority }}">
                </td>
            </tr>
            <tr>
                <td >
                    <label for="image">Image : </label>
                </td>
                <td>
                    {{-- sua lai cho sua anh --}}
                    <input type="file" id="image" name="image" value="">
                    <img src="{{ asset('backend/images/supporter/'.$supporter->image_url) }}" alt="ảnh" style="width: 100px; height: 100px">
                    <button type="button">Xóa ảnh này</button>
                </td>
            </tr>
            <tr>
                <td >
                    <label for="status">Status : </label>
                </td>
                <td>
                    <select id="status" name="status">
                        <option value="1" selected={{ $supporter->status == 1 ? 1 : 0 }} >Hiển thị</option>
                        <option value="0" selected={{ $supporter->status == 0 ? 1 : 0 }}>Ẩn</option>
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
    </form>

@endsection