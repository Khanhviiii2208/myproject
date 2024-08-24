@extends('admin.layouts.layout')

@section('content')
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
              <h4 class="card-title">Sửa bài viết</h4>
              <form action="{{ route('admin.post.update', $post->id)}}" method="POST" class="forms-sample">
                @csrf
                <div class="form-group">
                  <label for="thumbnail">Ảnh bìa</label>
                  <input type="text" id="thumbnail" value="{{$post->thumbnail}}" name="thumbnail" class="upload-image form-control" data-type="Images">
            <img src="{{$post->thumbnail}}" class="img_demo upload-image value_post_thumbnail" width="100px" alt="" data-type="Images" srcset="">
                </div>
                <div class="form-group">
                  <label for="name">Tên bài viết</label>
                  <input value=" {{$post->name}}"
                    type="text" name="name" id="name" 
                    class="form-control"
                    placeholder="Tên danh mục"
                  />
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="category_id">Danh mục</label> <br>                  
                    @foreach($categories as $key => $item)
                    @php
                    $check[$key]='';
                    @endphp
                      @foreach ($data as $value )
                      @php 
                       if($item->id == $value->id){
                        $check[$key] = 'checked';
                        }
                        @endphp
                      @endforeach
                      <div class="form-check">
                        <input {{ $check[$key] }} type="checkbox" name="category_id[]" value="{{ $item->id }}" id="{{ $item->id }}" class="form-check-input">
                        <label for="{{ $item->id }}" >{{ $item->name }}</label>
                    </div>
                    @endforeach
                 
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                  <label for="meta_title">Nội dung ngắn</label>
                  <input name="short_content" type="text" class="form-control" id="meta_title" type="text" value="{{ $post->short_content}}">
              </div>
                <div class="mb-3">
                  <textarea name="content" id="content" class="ck-editor">{{$post->content ?  : ''}}</textarea>
                  {{-- @include('admin.pages.components.editor') --}}
              </div>
                </div>              
                <div class="card-body">
                    <div class="mb-3">
                        <label for="meta_title">Tiêu đề</label>
                        <input name="meta_title" type="text" class="form-control" id="meta_title" type="text" value="{{ old('meta_title', $post->meta_title) }}">
                    </div>
            
                    <div class="mb-3">
                        <label for="meta_keyword">Từ khóa SEO</label>
                        <input name="meta_keyword" type="text" autofocus class="form-control" id="meta_keyword" value="{{ old('meta_keyword', $post->meta_keyword) }}">
                    </div>
            
                    <div class="mb-3">
                        <label for="meta_description">Mô tả SEO</label>
                        <textarea name="meta_description" id="meta_description" class="form-control">
                            {{ old('meta_description', $post->meta_description) }}
                        </textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Lưu</button>
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