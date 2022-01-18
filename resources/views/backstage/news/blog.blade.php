@extends('layouts.backstage-template')

@section('css')
<link rel="stylesheet" href="{{asset('css/blog.css')}}">
@endsection


@section('main')
    
    <div class="function-area">
        <a class="create-msg" href="/news/create">新增貼文</a>
    </div>

    <div id="message">
        @foreach ($news as $item)
            <div class="message-card">
                <div class="msg-info">
                    <div class="title">{{$item->title}}</div>
                    <div class="post-time">{{ substr($item->created_at , 0 , 10 ) }}
                    </div>
                    <a href="/news/edit/{{$item->id}}" class="edit">編輯</a>
                    <a href="/news/delete/{{$item->id}}" class="delete">刪除</a>

                </div>
                <div class="msg-content">
                    {{$item->text}}
                </div>
            </div>
        @endforeach
       

        {{-- <div class="message-card">
            <div class="msg-info">
                <div class="title">這是測試標題</div>
                <div class="auther">文章作者</div>
                <div class="post-time">po文時間</div>
            </div>
            <div class="msg-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et obcaecati ratione dolores, earum nemo expedita porro praesentium? Natus quidem eos quae exercitationem cumque reprehenderit maiores repellendus similique illo dolore non, explicabo qui velit iusto ipsa, saepe dolorum odio dicta molestias eveniet? In excepturi cupiditate impedit nobis laboriosam maiores hic quibusdam, reprehenderit nulla dolor, sapiente nisi commodi et autem maxime possimus libero dolore ullam molestias neque officiis? Nisi et, magni quidem magnam architecto id sunt nihil vitae tempora debitis sapiente porro officia officiis ea at. Placeat, culpa quidem eius ad maxime, facilis reprehenderit in dolorem a optio quas ducimus dolor eaque.
            </div>

        </div>
        <div class="message-card">
            <div class="msg-info">
                <div class="title">這是測試標題</div>
                <div class="auther">文章作者</div>
                <div class="post-time">po文時間</div>
            </div>
            <div class="msg-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et obcaecati ratione dolores, earum nemo expedita porro praesentium? Natus quidem eos quae exercitationem cumque reprehenderit maiores repellendus similique illo dolore non, explicabo qui velit iusto ipsa, saepe dolorum odio dicta molestias eveniet? In excepturi cupiditate impedit nobis laboriosam maiores hic quibusdam, reprehenderit nulla dolor, sapiente nisi commodi et autem maxime possimus libero dolore ullam molestias neque officiis? Nisi et, magni quidem magnam architecto id sunt nihil vitae tempora debitis sapiente porro officia officiis ea at. Placeat, culpa quidem eius ad maxime, facilis reprehenderit in dolorem a optio quas ducimus dolor eaque.
            </div>

        </div> --}}

    </div>
    @endsection