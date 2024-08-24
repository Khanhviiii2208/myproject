@extends('admin.layouts.layout') @section('content') 

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách danh mục</h4>
            <p class="card-description"></p>
            <div class="table-responsive table-striped">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Từ khóa SEO</th>
                    <th>Tiêu đề SEO</th>
                    <th>Mô tả SEO</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($category as $key => $item)
      <tr>
        <td>{{$key +1}}</td>
        <td>{{$item->name}}</td>
        <td>
          @if($item->meta_keyword !== null)
            @foreach ((json_decode($item->meta_keyword)) as $value)
            <button class="btn btn-sm btn-secondary">{{$value->value }}</button>
            @endforeach
          @endif
        </td>
     
        <td>{{$item->meta_title}}</td>
        <td>{{$item->meta_description}}</td>
        <td>
          <a
            href="{{ route('admin.category.delete', $item->id) }}"
            onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')"
            class="btn btn-sm btn-danger"
            ><i class="bi bi-trash"></i
          ></a>
          <a
            href="{{ route ('admin.category.edit', $item->id)}}"
            class="btn btn-sm btn-primary"
            ><i class="bi bi-pen"></i
          ></a>
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

@endsection