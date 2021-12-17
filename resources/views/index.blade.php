<!-- TOPページ -->
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
            <!-- 画面左側 -->
            <div class="wrapper-left">
                <!-- 人気のトーク -->
                <div class="popular_talks">
                    <h2>人気のトーク</h2>
                    <div class="popular_talk">
                        @foreach($popular_talks as $popular_talk)
                        <h2 class="popular_talk--title"><a href="talks/{{ $popular_talk->id }}">{{ $popular_talk->title }}</a></h2>
                        <p class="popular_talk--created_at">{{ $popular_talk->created_at }}</p>
                        @endforeach
                    </div>
                    <p><a href="/talks_popular">一覧へ</a></p>
                </div>
                <!-- 最新のトーク -->
                <div class="latest_talks">
                    <h2>最新のトーク</h2>
                    <div class="latest_talk">
                        @foreach($latest_talks as $latest_talk)
                        <h2 class="latest_talk--title"><a href="talks/{{ $latest_talk->id }}">{{ $latest_talk->title }}</a></h2>
                        <p class="latest_talk--created_at">{{ $latest_talk->created_at }}</p>
                        @endforeach
                    </div>
                    <p><a href="/talks_latest">一覧へ</a></p>
                </div>
                <!-- 各トークテーマ一覧 -->
                <div class="talk_theme_list">
                    <h2 class="talk_theme_list--title">トークテーマ（その他）</h2>
                    <p><a href="/teams">球団トーク</a></p>
                    <p><a href="/stadiums">球場情報</a></p>
                </div>
            </div>
            <!-- 画面右側 -->
            <div class="wrapper-right">
                <!-- マイページ -->
                <p><a href="/mypage/{{ Auth::user()->id }}">マイページへ</a></p>
                <!-- トーク作成箇所 -->
                <div class="create_talk">
                    <form action="/talks" method="POST">
                        @csrf
                        <p>トークテーマを作成</p>
                        <input type="text" name="talk[title]" value="{{ old('talk.title') }}" />
                        <p class="title_error" style="color:red">{{ $errors->first('talk.title') }}</p>
                        <input type="submit" value="作成"/>
                    </form>
                </div>
            </div>
        </div>
        @endsection
    </body>
</html>