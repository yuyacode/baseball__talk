<!-- 球団トークの詳細 -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
    </head>
    <body>
        @section('content')
        <div class="container">
            <!-- 球団名 -->
            <p>{{ $team->title }}</p>
            <!-- トークの投稿を取得 -->
            <div>
                @foreach($posts as $post)
                <p>{{ $post->body }}</p>
                <!-- プロフィール画像の表示 -->
                @if(isset($post->user->profile_image))
                <p><img src="https://s3.ap-northeast-1.amazonaws.com/baseballtalk.profile.image/{{ $post->user->profile_image }}" width="100" height="100"></p>
                @else
                <p><img src="{{ asset('image/noimage.jpg') }}" width="100" height="100"></p>
                @endif
                <p><a href="/mypage/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
                <p>{{ $post->created_at }}</p>
                @if(Auth::user()->id === $post->user_id)
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button> 
                </form>
                @endif
                @endforeach
            </div>
            <!-- ページネーション -->
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
            <!-- ユーザーの投稿作成箇所 -->
            <form action="/posts" method="POST">
                @csrf
                <div class="create_post">
                    <input type="hidden" name="post[talk_id]" value="{{ $team->id }}" />
                    <input type="hidden" name="post[kinds]" value="team" />
                    <textarea name="post[body]" placeholder="投稿を作成する（最大250文字）">{{ old('post.body') }}</textarea>
                    <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <input type="submit" value="送信"/>
            </form>
            <!-- 球団トークの一覧へ -->
            <p><a href="/teams">球団トーク一覧へ</a></p>
        </div>
        @endsection
    </body>
</html>