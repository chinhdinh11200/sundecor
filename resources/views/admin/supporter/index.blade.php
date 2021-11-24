@extends('admin.layout.main')
@section('content')
    <a>Thêm mới</a>

    @foreach ($supporters as $supporter)
    <div style="display: flex; justify-content:space-between; padding: 0 100px">
        <div>
            <h5>{{ $supporter->fullname }}</h5>
            <p>{{ $supporter->tel }}</p>
        </div>
        <div>
            {{ $supporter->priority }}
        </div>
        <div>
            {{ $supporter->status ? 'Hiển thị' : 'Ẩn' }}
        </div>
        <div>
            <a href="{{ route('admin.supporter.edit', ['supporter' => $supporter]) }}">sửa</a>
            <button>xóa</button>
        </div>
    </div>
    @endforeach

@endsection
