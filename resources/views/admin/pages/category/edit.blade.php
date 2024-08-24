@extends('admin.layouts.layout')

@section('content')
    {{-- <div class="card">
        <div class="card-header">
            <h1> {{ $title ?? 'Chưa có title' }} </h1>
            @if ($errors->any())            
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li> 
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST" class="card-body row">
            @csrf
            <div class="col-6">
                <label for="name">Tên danh mục</label>
                <input type="text" value="{{ $category->name }}" 
                name="name" id="name" class="form-control" style="background-color: #ffffff;">
            </div>
            @include('admin.pages.components.seo')
            <div class="mt-5">
                <button type="submit" class="btn btn-success">Sửa danh mục</button>
                <a href="{{ route('admin.category') }}" class="btn btn-success">Quay về</a>
            </div>
        </form>
    </div> --}}
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
                @if ($errors->any())           
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>   
            @endif
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  <p class="card-description">Basic form elements</p>
                  <form action="{{ route('admin.category.update', $category->id) }}" method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group">
                      <label for="name">Tên danh mục</label>
                      <input value="{{ $category->name }}"
                        type="text" name="name" id="name" 
                        class="form-control"
                        placeholder="Tên danh mục"
                      />
                    </div>
                    @include('admin.pages.components.seo')
                    <button type="submit" class="btn btn-primary me-2">Sửa danh mục</button>
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