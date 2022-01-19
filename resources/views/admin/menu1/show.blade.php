@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.menu1.index')}}">Danh sách</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.menu1.create')}}">Thêm mới</a></h3>
                        </div>
                    </div>

                    <!-- /.card-option -->
                    <form action="" class="card-option">
                        <select class="form-control" aria-label="Default select example" onchange="window.location=this.value">
                            <option value="{{route('admin.menu1.index')}}">---- Chọn loại menu ----</option>
                            @if (!empty($menutype))
                                @foreach ($menutype as $mt )
                                    <option value="{{route('admin.menu1.show', ['menu1' => $mt->id])}}" <?php echo ($mt->id==$menu_type_id?"selected":""); ?>>{{$mt->name}}</option>
                                @endforeach
                            @else
                                <option>Trống</option>
                            @endif
                        </select>
                    </form>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <th class="col-1">Ảnh</th>
                                <th class="col-4">Tiêu đề</th>
                                <th class="col-2">Loại menu</th>
                                <th class="col-1">Vị trí</th>
                                <th class="col-1">Trạng thái</th>
                                <th class="col-2">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (!empty($datas))
                                    @foreach ($datas as $data )
                                        <tr class="class">
                                            <?php if($data->images != null){ ?>
                                                <td style="vertical-align: middle; text-align: center"><img style="width: 60px; height: 60px; object-fit: cover;" src="{{ asset('upload/images/menu1/' . $data->images) }}"></td>
                                            <?php  }else{ ?>
                                                <td style="vertical-align: middle; text-align: center"><img style="width: 60px; height: 60px; object-fit: cover;" src="../public/frontend/images/common/logo.png"></td>
                                            <?php } ?>
                                            <td>{{ $data->name }}</td>
                                            <td style="vertical-align: middle; text-align: center">{{ $data->menuType->name }}</td>
                                            <td style="vertical-align: middle; text-align: center" style="text-align: center;">{{ $data->priority }}</td>
                                            <td style="vertical-align: middle; text-align: center" style="text-align: center;">{{ $data->status == true ? 'Hiển thị' : 'Ẩn' }}</td>
                                            <td style="vertical-align: middle; text-align: center">
                                                <div class="d-flex justify-content-center" style="max-height: 38px">
                                                    <a href="{{ route('admin.menu1.edit', ['menu1' => $data]) }}" class="btn btn-primary mr-3">Sửa</a>
                                                <form action="{{ route('admin.menu1.destroy', ['menu1' => $data->id]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onClick="confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>Menu rỗng</tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                    <div class="box-trang">
                        {{ $datas->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
