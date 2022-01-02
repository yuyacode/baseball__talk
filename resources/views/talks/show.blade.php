<!-- トークの詳細 -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body class="body">
        @section('content')
        <div class="container_talks">
            <!-- トークテーマ -->
            <h2 class="talk_theme">{{ $talk->title }}</h2>
            <!-- トーク作成者 -->
            <p>（トーク作成者：<a href="/mypage/{{ $talk->user->id }}">{{ $talk->user->name }}</a>）</p>
            <!--トークに属する投稿を取得-->
            <div class="post_list">
                @foreach($posts as $post)
                <!-- 自分の投稿 -->
                @if(Auth::user()->id === $post->user_id)
                <div class="post_item--myself">
                    <div class="post_item--content">
                        <div class="post_item--info--myself">
                            <p>（{{ $post->created_at }}）</p>
                            <p><a href="/mypage/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
                        </div>
                        <div class="post_item--body--myself"><p>{{ $post->body }}</p></div>
                    </div>
                    @if(isset($post->user->profile_image))
                    <p class="post_item--profile_image--myself"><img src="https://s3.ap-northeast-1.amazonaws.com/baseballtalk.profile.image/{{ $post->user->profile_image }}"></p>
                    @else
                    <p class="post_item--profile_image--myself"><img src="{{ asset('image/noimage.jpg') }}"></p>
                    @endif
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete_btn">削除</button> 
                    </form>
                </div>
                <!-- 他人の投稿 -->
                @else
                <div class="post_item">
                    @if(isset($post->user->profile_image))
                    <p class="post_item--profile_image"><img src="https://s3.ap-northeast-1.amazonaws.com/baseballtalk.profile.image/{{ $post->user->profile_image }}"></p>
                    @else
                    <p class="post_item--profile_image"><img src="{{ asset('image/noimage.jpg') }}"></p>
                    @endif
                    <div class="post_item--content">
                        <div class="post_item--info">
                            <p><a href="/mypage/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
                            <p>（{{ $post->created_at }}）</p>
                        </div>
                        <div class="post_item--body"><p>{{ $post->body }}</p></div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="post_list--others">
                <!-- ユーザーの投稿作成箇所 -->
                <div class="create_post">
                    <form action="/posts" method="POST" class="create_post">
                        @csrf
                        <input type="hidden" name="post[talk_id]" value="{{ $talk->id }}" />
                        <input type="hidden" name="post[kinds]" value="general" />
                        <textarea name="post[body]" class="create_post_area" placeholder="投稿を作成する（最大250文字）">{{ old('post.body') }}</textarea>
                        <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
                        <input type="submit" class="send_btn" value="送信"/>
                    </form>
                </div>
                <!-- トーク一覧へ -->
                <div class="talk_list_btn">
                    <p><a href="/talks_popular_week">「人気のトーク」一覧へ</a></p>
                    <p><a href="/talks_latest">「最新のトーク」一覧へ</a></p>
                </div>
            </div>
        </div>
        @endsection
    </body>
</html>