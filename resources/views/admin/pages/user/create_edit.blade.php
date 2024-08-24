@extends('admin.layouts.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
    
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm mới thành viên</h4>
                  <form action="{{ route('admin.user.store') }}" method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên</label>
                      <input value="{{ old('name') }}"
                        type="text" name="name" id="name" 
                        class="form-control"
                        placeholder="Tên thành viên"
                      />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                      <input value="{{ old('email') }}"
                        type="email" name="email" id="email" 
                        class="form-control"
                        placeholder="Email"
                      />
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                      <input value="{{ old('password') }}"
                        type="password" name="password" id="password" 
                        class="form-control"
                        placeholder="Mật khẩu"
                      />
                    </div>
                    <div class="form-group">
                        <label for="password_c">Nhập lại mật khẩu</label>
                      <input value="{{ old('password_c') }}"
                        type="password" name="password_c" id="password_c" 
                        class="form-control"
                        placeholder="Nhập lại mật khẩu"
                      />
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-select" name="status" id="status">
                            <option value=""> [ CHỌN TRẠNG THÁI ] </option>
                            <option value="1"> On </option> 
                            <option value="2"> Off </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Quyền hạn</label>
                        <select class="form-select" name="role" id="status">
                            <option value=""> [ CHỌN QUYỀN HẠN ] </option>
                        @foreach ($roles as $role)
                        <option>{{$role->name}} </option>
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Tạo thành viên</button>
                    <a href="{{ route('admin.user') }}" class="btn btn-light">Quay về</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection