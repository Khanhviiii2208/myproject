<div class="{{ $class ?? '' }} comment_body">
    <div class=" comment_panel d-flex flex-row align-items-center justify-content-start">
        <div class=" comment_author_image avt">
            <div><img style="width: 100%; height: 100%; object-fit: cover;"
                    src="https://ui-avatars.com/api/?name={{ $comment->user->name }}&background=random" alt="">
            </div>
        </div>
        <small class="post_meta"><a
                href="#">{{ $comment->user->name }}</a><span>{{ $comment->created_at }}</span></small>
                <button class="reply_button ml-auto" type="button" data-toggle="collapse" data-target="#collapseEdit_{{ $comment->id}}" aria-expanded="false" aria-controls="collapseEdit_{{ $comment->id}}">Trả lời</button>
            @if(Auth()->user()->id == $comment->user->id)
                <button class="reply_button ml-auto" type="button" data-toggle="collapse" data-target="#collapseRep_{{ $comment->id}}" aria-expanded="false" aria-controls="collapseRep_{{ $comment->id}}">Sửa </button>
                <a href="{{ route('comment.delete', $comment->id)}}" class="reply_button ml-auto">Xóa</a>
            @endif
    </div>
    <div class="comment_content">
        <p>{{ $comment->content }}</p>
    </div>
    <div class="collapse" id="collapseRep_{{ $comment->id}}">
        <div class="card card-body">

            {{-- Edit comment --}}

          <form action="{{ route('comment.update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $comment->id}}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="content" class="comment_text" placeholder="Sửa bình luận">{{ $comment->content }}</textarea>

            @if ($errors->has('content'))

                <div class="alert alert-danger">

                    {{ $errors->first('content') }}

                </div>

            @endif
                {{-- <button class="btn btn-outline-danger" data-bs-toggle="collapse"
                data-bs-target="#collapseEdit_{{ $comment->id }}" aria-expanded="false"
                aria-controls="collapseExample" type="button">Hủy</button> --}}
                <button type="submit" class="btn btn-success">Sửa</button>
          </form>
        </div>
      </div>
      <div class="collapse" id="collapseEdit_{{ $comment->id}}">
        <div class="card card-body">
            <form action="{{ route('comment.reply') }}" method="POST">
                @csrf
                    <input type="hidden" name="user_id" value="{{ Auth()->user()->id}}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <textarea name="content" class="comment_text" placeholder="Nhập bình luận">{{ old('content') }}</textarea>
            
                @if ($errors->has('content'))
                    <div class="alert alert-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                {{-- <button class="btn btn-outline-danger" data-bs-toggle="collapse"
                data-bs-target="#collapseEdit_{{ $comment->id }}" aria-expanded="false"
                aria-controls="collapseExample" type="button">Hủy</button> --}}
                <button type="submit" class="btn btn-success">Phản hồi</button>
            </form>
            
        </div>
      </div>
    <!-- Reply -->
    @foreach ($comment->replies as $reply)
        @include('client.pages.article.components.comment', ['comment' => $reply, 'class' => 'cmt_reply'])
    @endforeach

</div>
<style>
    .cmt_reply {
        margin-left: 20px;
    }
    .cmt_reply .avt{
        filter: blur(0.8);
    }
</style>
<!-- Comments -->
{{-- <div class="comments">
        <div class="comments_title">
            Comments <span>(12)</span>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="comments_container">
                    <ul class="comment_list">
                        <li class="comment">
                            <div class="{{ $class ?? '' }} comment_body">
                            <div
                            class=" comment_panel d-flex flex-row align-items-center justify-content-start">
                            <div class=" comment_author_image">
                                <div><img style="width: 100%; height: 100%; object-fit: cover;" src="https://ui-avatars.com/api/?name={{$comment->user->name}}&background=random" alt=""></div>
                            </div>
                            <small class="post_meta"><a href="#">{{$comment->user->name}}</a><span>{{$comment->created_at}}</span></small>
                            <button type="button"
                                class="reply_button ml-auto">Trả lời</button>
                            </div>
                            <div class="comment_content">
                            <p>{{$comment->content}}</p>
                            </div>
                            <!-- Reply -->
                            <ul
                                class="comment_list"
                            >
                                <li
                                    class="comment"
                                >
                                    <div
                                        class="comment_body"
                                    >
                                        <div
                                            class="comment_panel d-flex flex-row align-items-center justify-content-start"
                                        >
                                            <div
                                                class="comment_author_image"
                                            >
                                                <div>
                                                    <img
                                                        src="images/comment_author_2.jpg"
                                                        alt=""
                                                    />
                                                </div>
                                            </div>
                                            <small
                                                class="post_meta"
                                                ><a
                                                    href="#"
                                                    >Katy
                                                    Liu</a
                                                ><span
                                                    >Sep
                                                    29,
                                                    2017
                                                    at
                                                    9:48
                                                    am</span
                                                ></small
                                            >
                                            <button
                                                type="button"
                                                class="reply_button ml-auto"
                                            >
                                                Reply
                                            </button>
                                        </div>
                                        <div
                                            class="comment_content"
                                        >
                                            <p>
                                                Nulla
                                                facilisi.
                                                Aenean
                                                porttitor
                                                quis
                                                tortor
                                                id
                                                tempus.
                                                Interdum
                                                et
                                                malesuada
                                                fames
                                                ac
                                                ante
                                                ipsum
                                                primis
                                                in
                                                faucibus.
                                                Vivamus
                                                molestie
                                                varius
                                                tincidunt.
                                                Vestibulum
                                                congue
                                                sed
                                                libero
                                                ac
                                                sodales.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Reply -->
                                    <ul
                                        class="comment_list"
                                    ></ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}

