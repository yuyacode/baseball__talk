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
                <div class="top_talks--popular">
                    <h2>人気のトーク</h2>
                    <div class="talk_popular">
                        @foreach($talks_popular as $talk_popular)
                        <h2 class="talk_popular--title"><a href="talks/{{ $talk_popular->id }}">{{ $talk_popular->title }}</a></h2>
                        <p class="talk_popular--created_at">{{ $talk_popular->created_at }}</p>
                        @endforeach
                    </div>
                    <p><a href="/talks_popular">一覧へ</a></p>
                </div>
                <!-- 最新のトーク -->
                <div class="top_talks--latest">
                    <h2>最新のトーク</h2>
                    <div class="talk_latest">
                        @foreach($talks_latest as $talk_latest)
                        <h2 class="talk_latest--title"><a href="talks/{{ $talk_latest->id }}">{{ $talk_latest->title }}</a></h2>
                        <p class="talk_latest--created_at">{{ $talk_latest->created_at }}</p>
                        @endforeach
                    </div>
                    <p><a href="/talks_latest">一覧へ</a></p>
                </div>
                <!-- 各トークテーマ一覧 -->
                <div class="talk_theme_list">
                    <h2 class="talk_theme_list--title">トークテーマ（その他）</h2>
                    <p><a href="/team_talks">球団トーク</a></p>
                    <p><a href="/stadium_talks">球場情報</a></p>
                </div>
            </div>
            <!-- 画面右側 -->
            <div class="wrapper-right">
                <!-- ユーザーのトーク作成箇所 -->
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