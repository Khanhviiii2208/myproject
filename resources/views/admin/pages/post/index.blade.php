@extends('admin.layouts.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Danh sách bài viết</h4>
              <p class="card-description"></p>
              <div class="table-responsive table-striped">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên bài viết</th>
                        <th>Slug</th>
                        <th>Ảnh bìa</th>
                        <th>Nội dung ngắn</th>
                        <th>Trạng thái</th>
                        <th>Từ khóa SEO</th>
                        <th>Tiêu đề SEO</th>
                        <th>Mô tả SEO</th>
                        <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($post as $key => $item)
                    <tr>
                        <td>{{$key +1}}</td>
                        
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        <td>
                            <img src="{{$item->thumbnail}}" alt="" srcset="">
                        </td>
                        <td>{{$item->short_content}}</td>
                        <td>
                        @switch($item->status)
                          @case('pending')
                            Đang chờ duyệt
                          
                          @break
                          @case('reject')
                            Từ chối
                          
                          @break
                          @case('accept')
                          Đã duyệt  
                          @break  
                        @endswitch
                        <td>
                          @foreach ((json_decode($item->meta_keyword)) as $value)
                          <button class="btn btn-sm btn-secondary">{{$value->value }}</button>
                          @endforeach
                        </td>
                        <td>{{$item->meta_title}}</td>
                        <td>{{$item->meta_description}}</td>
                        <td>
                          @if(Auth()->user()->id == $item->user->id)
                            <a href="{{ route('admin.post.delete', $item->id) }}" onclick="return confirm('Bạn có chắc muốn xóa bài viết này không?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            <a href="{{ route ('admin.post.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
                            @endif
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