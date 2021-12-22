@extends('admin.layout.main')

@section('content')

    <div class="card">
        <form action="{{ route('admin.supporter.update', ['supporter'=> $supporter]) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="fullname">Họ và tên : </label>
                        <input type="text" id="fullname" name="fullname" value="{{ $supporter->fullname }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel">Số điện thoại : </label>
                        <input type="text" id="tel" name="tel" value="{{ $supporter->tel }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Vị trí</label>
                    <select type="text" class="form-control" id="priority" name="priority">
                        <option value="null">Chọn vị trí</option>
                        <option value="1" {{ $supporter->priority == 1 ? "selected" : "" }}>1</option>
                        <option value="2" {{ $supporter->priority == 2 ? "selected" : "" }}>2</option>
                        <option value="3" {{ $supporter->priority == 3 ? "selected" : "" }}>3</option>
                        <option value="4" {{ $supporter->priority == 4 ? "selected" : "" }}>4</option>
                        <option value="5" {{ $supporter->priority == 5 ? "selected" : "" }}>5</option>
                        <option value="6" {{ $supporter->priority == 6 ? "selected" : "" }}>6</option>
                        <option value="7" {{ $supporter->priority == 7 ? "selected" : "" }}>7</option>
                        <option value="8" {{ $supporter->priority == 8 ? "selected" : "" }}>8</option>
                    </select>
                  </div>
                <div class="form-group">
                    <label for="image">Ảnh : </label>
                        <input type="file" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái : </label>
                        <select id="status" name="status" class="form-control">
                            <option value="1" {{ $supporter->status == 1 ? 'selected' : '' }} >Hiển thị</option>
                            <option value="0" {{ $supporter->status == 0 ? 'selected' : '' }}>Ẩn</option>
                        </select>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>


        </form>
    </div>

@endsection
