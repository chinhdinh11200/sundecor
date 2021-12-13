@extends('admin.layout.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="left">
                        <h3 class="card-title"><a href="{{route('admin.banner.index')}}">Danh Sách</a></h3>
                    </div>
                    <div class="right no-click">
                        <h3 class="card-title"><a href="{{route('admin.banner.create')}}">Thêm banner</a></h3>
                    </div>
                </div>



                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Link</th>
                                <th>Thứ tự</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($slides as $key => $slide)
                               <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset('upload/images/slides') . '/' .  $slide->image  }}" alt="" style="width: 100px"></td>
                                    <td>{{ $slide->link }}</td>
                                    <td>{{ $slide->priority }}</td>
                                    <td>{{ $slide->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.banner.edit', $slide->id) }}" class="btn btn-primary">sửa</a>
                                        <form action="{{ route('admin.banner.destroy', $slide->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">xóa</button>
                                        </form>
                                    </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
