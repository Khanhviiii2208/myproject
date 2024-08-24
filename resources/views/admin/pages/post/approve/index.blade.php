@extends('admin.layouts.layout')


@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách bài viết duyệt</h4>
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
                  @if($posts && count($posts)>0)
                    @foreach ($posts as $key => $item)
                    <tr>
                        <td>{{$key +1}}</td>
                        
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        <td>
                            <img src="{{$item->thumbnail}}" alt="" srcset="">
                        </td>
                        <td>{{$item->short_content}}</td>
                        <td>
                          <label class="badge badge-danger">
                            {{$item->status=='pending' ? "Đang chờ duyệt":" "}}
                          </label>
                        </td>                      
                        <td>
                          @foreach ((json_decode($item->meta_keyword)) as $value)
                          <button class="btn btn-sm btn-secondary">{{$value->value }}</button>
                          @endforeach
                        </td>                      
                        <td>{{$item->meta_title}}</td>
                        <td>{{$item->meta_description}}</td>
                        <td>
                            <a href="{{ route('admin.approve-post.view',$item->slug) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  @else
                    <td colspan="10">
                      <h3 class="text-danger">Không có bài viết nào cần duyệt!!</h3>
                    </td>
                  @endif
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