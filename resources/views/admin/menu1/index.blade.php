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
                        @csrf
                        <select class="form-control" aria-label="Default select example" onchange="window.location=this.value">
                            <option selected>---- Chọn loại menu ----</option>
                            @if (!empty($menutype))
                                @foreach ($menutype as $mt )
                                    <option value="{{route('admin.menu1.show', ['menu1' => $mt->id])}}">{{$mt->name}}</option>
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
                                <th style="width: 120px;">ẢNH Sản Phẩm</th>
                                <th>TIÊU ĐỀ</th>
                                <th>LOẠI MENU</th>
                                <th style="width: 70px;">VỊ TRÍ</th>
                                <th style="width: 100px;">TRẠNG THÁI</th>
                                <th style="width: 0;">EDIT</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (!empty($datas))
                                    @foreach ($datas as $data )
                                        <tr class="class">
                                            <?php if($data->images != null){ ?>
                                                <td><img style="width: 120px; height: 120px; object-fit: cover;" src="{{ asset('upload/images/menu1/' . $data->images) }}"></td>
                                            <?php  }else{ ?>
                                                <td><img style="width: 120px; height: 120px; object-fit: cover;" src="../public/frontend/images/common/logo.png"></td>
                                            <?php } ?>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->menuType->name }}</td>
                                            <td style="text-align: center;">{{ $data->priority }}</td>
                                            <td style="text-align: center;">{{ $data->status == true ? 'Hiển thị' : 'Ẩn' }}</td>
                                            <td>
                                                <a href="{{ route('admin.menu1.edit', ['menu1' => $data]) }}" class="btn btn-info">Sửa</a>
                                                <form action="{{ route('admin.menu1.destroy', ['menu1' => $data->id]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onClick="confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                                                </form>
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
