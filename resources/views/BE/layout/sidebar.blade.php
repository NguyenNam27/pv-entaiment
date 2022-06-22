<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset(Auth::User()->image)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::User()->name}}</p>
          <a href="{{Auth::User()->is_active}}"><i class="fa fa-circle text-success"></i> {{(Auth::User()->is_active==0) ? 'online' : 'offline'}}</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="{{route('admin.user.index')}}">
            <i class="fa fa-user"></i> <span >QUẢN LÝ TÀI KHOẢN</span>
          </a>
        </li>
          <li class="active">
              <a href="{{route('admin.banner.index')}}">
                  <i class="fa fa-user"></i> <span >QUẢN LÝ BANNER</span>
              </a>
          </li>
          <li class="active">
              <a href="{{route('admin.subcategory.index')}}">
                  <i class="fa fa-user"></i> <span >QUẢN LÝ DANH MỤC</span>
              </a>
          </li>
          <li class="active">
              <a href="{{route('admin.product.index')}}">
                  <i class="fa fa-user"></i> <span >QUẢN LÝ SẢN PHẨM</span>
              </a>
          </li>
          <li class="active">
              <a href="{{route('admin.post.index')}}">
                  <i class="fa fa-user"></i> <span >QUẢN LÝ BÀI VIẾT</span>
              </a>
          </li>
          <li class="active">
              <a href="{{route('admin.setting.index')}}">
                  <i class="fa fa-user"></i> <span >PROFILE</span>
              </a>
          </li>
          <li class="active">
              <a href="{{route('admin.video.index')}}">
                  <i class="fa fa-user"></i> <span >QUẢN LÝ VIDEO</span>
              </a>
          </li>
          <li class="active">
              <a href="{{route('admin.booking.index')}}">
                  <i class="fa fa-user"></i> <span >BOOKING</span>
              </a>
          </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
