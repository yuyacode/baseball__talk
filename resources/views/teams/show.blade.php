<!-- 球団トークの詳細画面 -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/show.css') }}" rel="stylesheet">
    </head>
    <body class="body">
        @section('content')
        <div class="container_body">
            <!-- 球団名 -->
            <h2 class="talk_theme">{{ $team->title }}</h2>
            <!-- トークの投稿を取得 -->
            <div class="post_list">
                @foreach($posts as $post)
                <!-- 自分の投稿 -->
                @if(Auth::user()->id === $post->user_id)
                <div class="post_item_myself">
                    <div class="post_content_myself">
                        <div class="post_info_myself">
                            <p><a href="/mypage/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
                            <p>（{{ $post->created_at }}）</p>
                        </div>
                        <div class="post_body_myself"><p>{{ $post->body }}</p></div>
                    </div>
                    <div class="post_others_myself">
                        @if(isset($post->user->profile_image))
                        <p class="profile_image_myself"><img src="https://s3.ap-northeast-1.amazonaws.com/baseballtalk.profile.image/{{ $post->user->profile_image }}"></p>
                        @else
                        <p class="profile_image_myself"><img src="{{ asset('image/noimage.jpg') }}"></p>
                        @endif
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete_btn">削除</button> 
                        </form>
                    </div>
                </div>
                <!-- 他人の投稿 -->
                @else
                <div class="post_item">
                    @if(isset($post->user->profile_image))
                    <p class="profile_image"><img src="https://s3.ap-northeast-1.amazonaws.com/baseballtalk.profile.image/{{ $post->user->profile_image }}"></p>
                    @else
                    <p class="profile_image"><img src="{{ asset('image/noimage.jpg') }}"></p>
                    @endif
                    <div class="post_content">
                        <div class="post_info">
                            <p><a href="/mypage/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
                            <p>（{{ $post->created_at }}）</p>
                        </div>
                        <div class="post_body"><p>{{ $post->body }}</p></div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="others">
                <!-- ユーザーの投稿作成箇所 -->
                <div class="create_post">
                    <form action="/posts" method="POST" class="create_post_form">
                        @csrf
                        <input type="hidden" name="post[talk_id]" value="{{ $team->id }}" />
                        <input type="hidden" name="post[kinds]" value="team" />
                        <textarea name="post[body]" class="create_post_area" placeholder="投稿を作成する（最大250文字）">{{ old('post.body') }}</textarea>
                        <p class="error">{{ $errors->first('post.body') }}</p>
                        <input type="submit" class="send_btn" value="送信"/>
                    </form>
                </div>
                <!-- 球団一覧へ -->
                <div class="talk_list">
                    <p><a href="/teams">球団一覧へ</a></p>
                </div>
            </div>
        </div>
        @endsection
        <!-- ページトップ -->
        <div id="js-scroll-fadein" class="js-scroll-fadein arrow"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>