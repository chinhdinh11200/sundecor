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
                                                <td style="text-align: center; vertical-align: middle"><img style="width: 60px; height: 60px; object-fit: cover;" src="{{ asset('upload/images/menu2/' . $data->images) }}"></td>
                                            <?php  }else{ ?>
                                                <td style="text-align: center; vertical-align: middle"><img style="width: 60px; height: 60px; object-fit: cover;" src="../../public/frontend/images/common/logo.png"></td>
                                            <?php } ?>
                                            <td>{{ $data->name }}</td>
                                            <td style="text-align: center; vertical-align: middle">{{ $data->menuType->name }}</td>
                                            <td style="text-align: center; vertical-align: middle;">{{ $data->priority }}</td>
                                            <td style="text-align: center; vertical-align: middle;">{{ $data->status == true ? 'Hiển thị' : 'Ẩn' }}</td>
                                            <td style="vertical-align: middle">
                                                <div class="d-flex justify-content-center" style="max-height: 38px">
                                                    <a href="{{ route('admin.menu2.edit', ['menu2' => $data->id]) }}" class="btn btn-primary mr-3">Sửa</a>
                                                <form action="{{ route('admin.menu2.destroy', ['menu2' => $data]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
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
