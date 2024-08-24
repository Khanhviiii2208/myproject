@extends('admin.layouts.layout')

@section('content')
<div class="card-header">
</div>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thêm mới bài viết</h4>
            <form action="{{ route('admin.post.store') }}" method="POST" class="forms-sample">
              @csrf
              <div class="form-group">
                <label for="thumbnail">Ảnh bìa</label>
                <input type="text" id="thumbnail" name="thumbnail" class="upload-image form-control" data-type="Images">
          <img src="https://images-ext-1.discordapp.net/external/4jULWw_BoWd1iX_D2oLrQbFF-M8LmElpv8G_9INBKFE/https/t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg?format=webp&width=600&height=450" class="img_demo upload-image value_post_thumbnail" width="100px" alt="" data-type="Images" srcset="">
          @error('thumbnail')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
              <div class="form-group">
                <label for="name">Tên bài viết</label>
                <input value="{{ old('name') }}"
                  type="text" name="name" id="name" 
                  class="form-control"
                  placeholder="Tên bài viết"
                />
                @error('name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="name">Danh mục</label> <br>
                @foreach($categories as $item)
                  <input type="checkbox" name="category_id[]" value="{{ $item->id }}" class="form-check-input" id="{{ $item->id }}">
                  <label for="{{ $item->id }}">{{ $item->name }}</label> <br>
                </input>
                @endforeach
              @error('category_id')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <div class="form-group">
                <label for="meta_title">Nội dung ngắn</label>
                  <input name="short_content" type="text" class="form-control" id="meta_title" type="text">
                  @error('short_content')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <textarea name="content" id="content" class="ck-editor">{{ old('content') }}</textarea>
                @error('content')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
              </div>              
              @include('admin.pages.components.seo')
              <button type="submit" class="btn btn-primary me-2">Tạo bài viết</button>
              <a href="{{ route('admin.post') }}" class="btn btn-light">Quay về</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection