 <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="Brand-Logo">
      <div class="logo-admin d-flex justify-content-center align-items-center">
        <a href="">
          <img src="{{asset('/frontend/images/common/logo-white.png')}}">
        </a>
      </div>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('admin.webinfo.index') }}" class="nav-link">
              <i class="nav-icon fas fa-globe-asia"></i>
              <p>
                Thông tin website
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-list-alt"></i>
              <p>
                Quản lý menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.menu1.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>QL menu cấp 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.menu2.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>QL menu cấp 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Quản lý khách hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.consultation.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KH khuyễn mãi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.promotion.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KH tư vấn</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.product.index') }}" class="nav-link">
              <i class="nav-icon fas fa-lightbulb"></i>
              <p>
                Quản lý sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.bill.index') }}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Quản lý giỏ hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.news.index')}}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Tin Tức
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.banner.index') }}" class="nav-link">
              <i class="nav-icon fas fa-film"></i>
              <p>
                Quản lý banner
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.video.index') }}" class="nav-link">
              <i class="nav-icon fas fa-play-circle"></i>
              <p>
                Quản lý video
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.supporter.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Quản lý người hỗ trợ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.customer.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
              <p>
                Quản lý khách hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Đổi mật khẩu
              </p>
            </a>
          </li>
          <li class="nav-item my-4">
            <a href="{{ route('admin.logout') }}" class="nav-link btn btn-danger">
              <i class="nav-icon"></i>
              <p>
                Đăng xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
