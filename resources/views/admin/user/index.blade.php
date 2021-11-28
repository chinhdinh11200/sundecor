@extends('admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>THÔNG TIN ADMIN</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('backend/images/trang-chu/logo.png')}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$biendata->nameAdmin}}</h3>

                            <p class="text-muted text-center">(ADMIN abc)</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$biendata->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Số Điện Thoại</b> <a class="float-right">{{$biendata->number}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b class="fab fa-facebook" style="font-size: 20px;"></b> <a class="float-right" target="_blank" href="{{$biendata->url}}">{{$biendata->url}}</a>
                                </li>
                            </ul>

                            <code>Tên Đăng Nhập: {{$biendata->userName}}</code>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Thay Đổi Thông Tin
                                        Đổi mật khẩu
                                    </a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Đổi Mật Khẩu</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <form class="form-horizontal" method="POST" action="{{route('admin.user.update',$biendata->id)}}">
                                        @csrf

                                        <div class="form-group row">
                                            @if(session('alert'))
                                                <div>
                                                    <script>alert('Cập nhật thông tin thành công!'); //location='user';</script>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Họ & Tên</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nameAdmin" value="{{$biendata->nameAdmin}}" id="inputName" placeholder="Name">
                                            </div>
                                            @if($errors->has('nameAdmin'))
                                                <span class="">{{$errors->first('nameAdmin')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" value="{{$biendata->email}}" id="inputEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Số Điện Thoại</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="number" value="{{$biendata->number}}" id="inputName2" placeholder="Số Điện Thoại">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Link Facebook</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="url" id="inputExperience" placeholder="Link Facebook">{{$biendata->url}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger"> Cập Nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <form class="form-horizontal" action="{{route('admin.user.update',$biendata->id)}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Mật khẩu hiện tại</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="passNow" class="form-control" id="inputName" placeholder="Mật khẩu hiện tại">
                                            </div>
                                            @if($errors->has('passNow'))
                                                <span class="">{{$errors->first('passNow')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Mật khẩu mới</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="passNew" class="form-control" id="inputEmail" placeholder="Mật khẩu mới">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Nhập lại mật khẩu mới</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="againPassNew" class="form-control" id="inputEmail" placeholder="Nhập lại mật khẩu mới">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-danger"> Cập Nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                    @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                    @endif
                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
