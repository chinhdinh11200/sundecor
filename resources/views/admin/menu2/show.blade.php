@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.menu2.index')}}">Danh sách</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.menu2.create')}}">Thêm mới</a></h3>
                        </div>
                    </div>

                    <!-- /.card-option -->
                    <form action="" class="card-option">
                        <select id="selectMenu" class="form-control" aria-label="Default select example" onchange="changeMenu(this)">
                            <option value="0">---- Chọn menu ----</option>
                            @if (!empty($menu1))
                                @foreach ($menu1 as $mn1 )
                                    <option value="{{ $mn1->id }}">{{$mn1->name}}</option>
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
                                                <td><img style="width: 120px; height: 120px; object-fit: cover;" src="../../public/{{ $data->images }}"></td>
                                            <?php  }else{ ?>
                                                <td><img style="width: 120px; height: 120px; object-fit: cover;" src="../../public/frontend/images/common/logo.png"></td>
                                            <?php } ?>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->menuType->name }}</td>
                                            <td style="text-align: center;">{{ $data->priority }}</td>
                                            <td style="text-align: center;">{{ $data->status == true ? 'Hiển thị' : 'Ẩn' }}</td>
                                            <td>
                                                <a href="{{ route('admin.menu2.edit', ['menu2' => $data]) }}" class="btn btn-info">Sửa</a>
                                                <form action="{{ route('admin.menu2.destroy', ['menu2' => $data->id]) }}" method="POST">
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

    <script>
        function changeMenu(e){
            if(e.value > 0) {
                window.location = window.location.origin + '/admin/menu2/' + e.value;
            }else {
                window.location = window.location.origin + '/admin/menu2'
            }
        }

        $(document).ready(function() {
            console.log('c');
            if(parseInt(window.location.pathname.split('/').pop()) > 0) {
                document.getElementById('selectMenu').value = parseInt(window.location.pathname.split('/').pop())
            }else {
                console.log("chữ");
            }
        })
    </script>
@endsection
