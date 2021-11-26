@extends('admin.layout.main')

@section('content')
<form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table >
        <tr>
            <td >
                <label for="title">Title : </label>
            </td>
            <td>
                <input type="text" id="title" name="title" value="">
            </td>
        </tr>
        <tr>
            <td >
                <label for="link">Link : </label>
            </td>
            <td>
                <input type="text" id="link" name="link" value="">
            </td>
        </tr>
        <tr>
            <td >
                <label for="priority">Priority : </label>
            </td>
            <td>
                <input type="text" id="priority" name="priority" value="">
            </td>
        </tr>
        <tr>
            <td >
                <label for="image">Image : </label>
            </td>
            <td>
                <input type="file" id="image" name="image" value="">
            </td>
        </tr>
        <tr>
            <td >
                <label for="status">Status : </label>
            </td>
            <td>
                <select id="status" name="status">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
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
