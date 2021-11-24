@extends('admin.layout.main')

@section('content')
    <form action="{{ route('admin.supporter.update', ['supporter'=> $supporter]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="fullname">Fullname : </label>
        <input type="text" id="fullname" name="fullname" value="{{ $supporter->fullname }}"> <br>
        <label for="tel">Tel : </label>
        <input type="text" id="tel" name="tel" value="{{ $supporter->tel }}"> <br>
        <label for="priority">Priority : </label>
        <input type="text" id="priority" name="priority" value="{{ $supporter->priority }}"> <br>
        <label for="status">Status : </label>
        <select id="status" name="status">
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
        </select> <br>
        <button type="submit">Gửi</button>
    </form>

@endsection
