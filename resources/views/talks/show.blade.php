<!--各トークの詳細画面（トーク画面）-->
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
            <!--トークテーマ-->
            <h2>{{ $talk->title }}</h2>
            <!--トークに属する投稿を取得-->
            @foreach($own_posts as $post)
            <div>
                <p>{{ $post->body }}</p>
                <p>{{ $post->created_at }}</p>
            </div>
            @endforeach
            <!-- ユーザーの投稿作成箇所 -->
            <form action="/posts" method="POST">
                @csrf
                <div class="create_post">
                    <input type="hidden" name="post[talk_id]" value="{{ $talk->id }}" />
                    <textarea name="post[body]" placeholder="投稿を作成する（最大100文字）">{{ old('post.body') }}</textarea>
                    <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <input type="submit" value="送信"/>
            </form>
            <!--一覧画面へのリダイレクト-->
            <p><a href="/talks_popular">「人気のトーク」一覧へ</a></p>
            <p><a href="/talks_latest">「最新のトーク」一覧へ</a></p>
        </div>
        @endsection
    </body>
</html>