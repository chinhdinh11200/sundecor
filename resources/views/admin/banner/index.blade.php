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
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th class="col-1">STT</th>
                                <th class="col-2">Hình ảnh</th>
                                <th class="col-6">Link</th>
                                <th class="col-1">Thứ tự</th>
                                <th class="col-1">Trạng thái</th>
                                <th class="col-3"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($slides as $key => $slide)
                               <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset('upload/images/slides') . '/' .  $slide->image  }}" alt="" style="width: 80px"></td>
                                    <td>{{ $slide->link }}</td>
                                    <td>{{ $slide->priority }}</td>
                                    <td>{{ $slide->status == 1 ? "Hiển thị" : "Ẩn" }}</td>
                                    <td>
                                       <div class="d-flex justify-content-around">
                                            <a href="{{ route('admin.banner.edit', $slide->id) }}" class="btn btn-primary">sửa</a>
                                            <form action="{{ route('admin.banner.destroy', $slide->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">xóa</button>
                                            </form>
                                       </div>
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
