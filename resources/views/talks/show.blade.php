<!-- トークの詳細 -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
        <!--<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">-->
        <!--<link href="{{secure_asset('/assets/〇〇')}}" rel="stylesheet">-->
    </head>
    <body>
        @section('content')
        <div class="container">
            <!-- トークテーマ -->
            <p>{{ $talk->title }}</p>
            <!-- トーク作成者 -->
            <p>トーク作成者：<a href="/mypage/{{ $talk->user->id }}">{{ $talk->user->name }}</a></p>
            <!--トークに属する投稿を取得-->
            <div>
                @foreach($posts as $post)
                <p>{{ $post->body }}</p>
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
                    <input type="hidden" name="post[talk_id]" value="{{ $talk->id }}" />
                    <input type="hidden" name="post[kinds]" value="general" />
                    <textarea name="post[body]" placeholder="投稿を作成する（最大250文字）">{{ old('post.body') }}</textarea>
                    <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <input type="submit" value="送信"/>
            </form>
            <!-- トーク一覧へ -->
            <p><a href="/talks_popular">「人気のトーク」一覧へ</a></p>
            <p><a href="/talks_latest">「最新のトーク」一覧へ</a></p>
        </div>
        @endsection
    </body>
</html>