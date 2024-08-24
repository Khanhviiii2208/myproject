@extends('admin.layouts.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Danh sách thành viên</h4>
        {{-- <p class="card-description"> Add class <code>.table</code> --}}
        </p>
        <div class="table-responsive">
          <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Quyền hạn</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $item)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->getRoleNames()->first()}}</td>
                    <td>{!! $item->status == '1'
                        ? '<label class="badge badge-success">On</label>'
                        : '<label class="badge badge-danger">OFF</label>' !!}
                    </td>
                    <td>
                        <a href="{{ route('admin.user.delete', $item->id) }}" onclick="return confirm('Bạn có chắc muốn xóa không>')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                        <a href="{{ route ('admin.user.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
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
@endsection