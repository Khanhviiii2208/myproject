@extends('admin.layouts.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm mới danh mục</h4>
                  {{-- <p class="card-description">Basic form elements</p> --}}
                  <form action="{{ route('admin.category.store') }}" method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group">
                      <label for="name">Tên danh mục</label>
                      <input value="{{ old('name') }}"
                        type="text" name="name" id="name" 
                        class="form-control"
                        placeholder="Tên danh mục"
                      />
                      @error('name')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    @include('admin.pages.components.seo')
                    <button type="submit" class="btn btn-primary me-2">Tạo danh mục</button>
                    <a href="{{ route('admin.category') }}" class="btn btn-light">Quay về</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

