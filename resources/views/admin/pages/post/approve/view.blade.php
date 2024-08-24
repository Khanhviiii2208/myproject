@extends('admin.layouts.layout')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="https://ui-avatars.com/api/?name={{$post->user->name}}&background=random" class="rounded-circle me-2" alt="" style="width: 40px; height: 40px;">
            <p class="mb-0">{{$post->user->name}}</p>
        </div>
        <p class="mb-0 text-muted">{{$post->created_at}}</p>
    </div>
    
    <div class="card-body">
        <div class="alert" role="alert">
            <p class="mt-3 mb-4">{!! $post->content !!}</p>
        </div>
    </div>
    
    <div class="card-footer">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Duyệt
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nhận xét về bài viết</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.approve-post.update', ['id'=>$post->id, 'status'=>'accept'])}}" method="get">
                        @csrf
                        <input type="text" class="form-control" name="comment" id="" required placeholder="Vui lòng nhập nhận xét về bài viết">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <input type="submit" class="btn btn-primary" value="Gửi">
                            </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        {{-- tuchoi --}}
                <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Từ chối
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Nhận xét về bài viết</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('admin.approve-post.update', ['id'=>$post->id, 'status'=>'reject'])}}" method="get">
                    @csrf
                    <input type="text" class="form-control" name="comment" id="" required placeholder="Vui lòng nhập nhận xét về bài viết">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <input type="submit" class="btn btn-primary" value="Gửi">
                        </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection