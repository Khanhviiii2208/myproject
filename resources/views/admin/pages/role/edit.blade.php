@extends('admin.layouts.layout')

@section('content')
   <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thông tin vai trò</h4>
                  <form action="{{ route('admin.role.update', $role->id) }}" method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên vai trò</label>
                        <input value="{{$role->name}}"
                        type="text" name="name" id="name" 
                        class="form-control"
                        placeholder="Tên vai trò"
                      />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                            <label for="name">Quyền</label></br>
                            @foreach ($permissions as $key => $permission)
                            <input type="checkbox" name="permissions[]"
                            value="{{$permission->name}}"
                            id="{{$key}}"  
                             @if(in_array($permission->name, $role->permissions->pluck('name')->toArray())) checked @endif>
                            <label for="{{$key}}">{{$permission->name}}</label></br>
                                    @endforeach
                    </div>
                    {{-- <div class="col-6">
                        <label for="permissions">Quyền</label><br>
                        @foreach ($permissions as $key => $permission)
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="{{ $key }}"                          
                                @if(in_array($permission->name, $role->permissions->pluck('name')->toArray())) checked @endif>
                                <label class="form-check-label" for="{{ $key }}">{{ $permission->name }}</label><br>
                        @endforeach
                    </div> --}}
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <a href="{{ route('admin.role') }}" class="btn btn-light">Quay về</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection