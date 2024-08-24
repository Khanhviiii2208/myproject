@extends('admin.layouts.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              <h4 class="card-title">Danh sách vai trò</h4>
              <p class="card-description"></p>
              <div class="table-responsive table-striped">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Vai trò</th>
                        <th>Tên quyền</th>
                        <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{$key +1}}</td>
                            <td>{{$role->name}}</td>
                          
                            <td>
                                @foreach($role->permissions as $item)
                                 <p class="btn btn-sm btn-warning">
                                    {{$item->name}}
                                </p></br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.role.delete', $role->id) }}" onclick="return confirm('Bạn có chắc muốn xóa không>')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="{{ route ('admin.role.edit', $role->id)}}" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

@endsection