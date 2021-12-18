<!--マイページ-->
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
            <p>マイページ</p>
            <!-- 名前 -->
            <p>{{ $user->name }}</p>
            <!-- 登録日時 -->
            <p>（登録日時：{{ $user->created_at }}）</p>
            <!-- 自分のマイページのみ表示 -->
            @if(Auth::user()->id === $user->id)
            <div>
                <!-- マイページ編集ボタン -->
                <p><a href="/mypage/{{ $user->id }}/edit">編集</a></p>
                <!-- トーク作成箇所 -->
                <form action="/talks" method="POST">
                    @csrf
                    <p>トークテーマを作成</p>
                    <input type="text" name="talk[title]" value="{{ old('talk.title') }}" />
                    <p class="title_error" style="color:red">{{ $errors->first('talk.title') }}</p>
                    <input type="submit" value="作成"/>
                </form>
            </div>
            @endif
            <!-- 好きな球団 -->
            @if(isset($user->team_id))
            <p>好きな球団：<a href="/teams/{{ $user->team->id }}">{{ $user->team->title }}</a></p>
            @endif
            <!-- プロフィール -->
            @if(isset($user->profile))
            <p>{{ $user->profile }}</p>
            @endif
            <!-- トーク一覧 -->
            <div class="talks">
                <p>トーク一覧</p>
                @foreach($talks as $talk)
                <p><a href="/talks/{{$talk->id}}">{{ $talk->title }}</a></p>
                <p>投稿数：{{ $talk->posts_number }}</p>
                <p>{{ $talk->created_at }}</p>
                @if(Auth::user()->id === $talk->user_id)
                <form action="/talks/{{ $talk->id }}" id="form_{{ $talk->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button> 
                </form>
                @endif
                @endforeach
            </div>
            <!-- ページネーション -->
            <div class='paginate'>
                {{ $talks->links() }}
            </div>
        </div>
        @endsection
    </body>
</html>