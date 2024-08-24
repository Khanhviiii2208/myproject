{{-- <div class="col-3 sidebar border">
    <ul>
        <li><a href="{{ route('admin.user') }}" class="link_vd btn ">Quản lý thành viên</a></li>
        <li><a href="{{ route('admin.post') }}" class="link_vd btn ">Quản lý bài viết</a></li>
        <li><a href="{{ route('admin.category') }}" class="link_vd btn ">Quản lý danh mục</a></li>
        <li><a href="{{ route('admin.dashboard') }}" class="link_vd btn">Dashboard</a></li>
    </ul>
</div> --}}

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Quản trị</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">Bài viết</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.post') }}">Danh sách bài viết</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.post.create') }}">Thêm mới bài viết</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          {{-- <span class="menu-title">Form elements</span> --}}
          <span class="menu-title">Danh mục</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.category') }}">Danh sách danh mục</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.category.create') }}">Thêm mới danh mục</a></li>
          </ul>
        
        </div>
    
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">Vai trò</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.role')}}">Danh sách vai trò</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.role.create')}}">Thêm vai trò</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="menu-icon mdi mdi-table"></i>
          <span class="menu-title">Thành viên</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.user') }}">Danh sách thành viên</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.user.create') }}">Thêm thành viên</a></li>
          </ul>
        </div>
      </li>
      
      @if(Auth()->user()->hasRole(["Ban biên tập", "Admin"]))
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
            <i class="menu-icon mdi mdi-layers-outline"></i>
            <span class="menu-title">Duyệt bài viết</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="icons">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ route('admin.approve-post')}}">Danh sách bài viết cần duyệt</a></li>
            </ul>
          </div>
        </li>
      @endif
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="docs/documentation.html">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
  </nav>
<script>
    let link_vd = document.querySelectorAll('.link_vd') 
    link_vd.forEach( (link) => {
    console.log(link.href);
    console.log(window.location.href);
    if(window.location.href == link.href) {
        link.classList.add('btn-success')
    }
} )
</script>