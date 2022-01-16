<!-- Navbar -->
@include('admin.layout.header', ['text' => 'banner'])
<!-- /.navbar -->
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
                                <th class="col-1">STT</th>
                                <th class="col-1">Hình ảnh</th>
                                <th class="col-5">Link</th>
                                <th class="col-1">Thứ tự</th>
                                <th class="col-1">Trạng thái</th>
                                <th class="col-2">Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($slides as $key => $slide)
                               <tr>
                                    <td style="text-align: center; vertical-align: middle">{{ $key + 1 }}</td>
                                    <td style="text-align: center; vertical-align: middle"><img src="{{ asset('upload/images/slides') . '/' .  $slide->image  }}" alt="" style="width: 60px;"></td>
                                    <td style="">{{ $slide->title }}</td>
                                    <td style="text-align: center; vertical-align: middle">{{ $slide->priority }}</td>
                                    <td style="text-align: center; vertical-align: middle">{{ $slide->status == 1 ? "Hiển thị" : "Ẩn" }}</td>
                                    <td  style="text-align: center; vertical-align: middle">
                                        <div class="d-flex justify-content-center" style="max-height: 38px">
                                             <a href="{{ route('admin.banner.edit', $slide->id) }}" class="btn btn-primary mr-3">Sửa</a>
                                             <form action="{{ route('admin.banner.destroy', $slide->id) }}" method="POST">
                                                 @csrf
                                                 @method('delete')
                                                 <button type="submit" class="btn btn-danger">Xóa</button>
                                             </form>
                                        </div>
                                     </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="box-trang">
                    {{$slides->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
@endsection
