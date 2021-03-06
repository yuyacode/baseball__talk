<!-- TOPページ -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/toppage.css') }}" rel="stylesheet">
    </head>
    <body class="body">
        @section('content')
            <div class="container_body">
                <div class="wrapper_left">
                    <div class="change_talks">
                        <div class="popular_talks">
                            <h2 class="popular_talks_title">人気のトーク</h2>
                            <div class="popular_talk">
                                @foreach($popular_talks as $popular_talk)
                                    <h2 class="popular_talk_title"><a href="talks/{{ $popular_talk->id }}">{{ $popular_talk->title }}</a></h2>
                                    <p class="popular_talk_created_at">（{{ $popular_talk->created_at }}）</p>
                                @endforeach
                            </div>
                            <p class="to_list"><a href="/talks_popular_week">一覧へ</a></p>
                        </div>
                        <div class="latest_talks">
                            <h2 class="latest_talks_title">最新のトーク</h2>
                            <div class="latest_talk">
                                @foreach($latest_talks as $latest_talk)
                                    <h2 class="latest_talk_title"><a href="talks/{{ $latest_talk->id }}">{{ $latest_talk->title }}</a></h2>
                                    <p class="latest_talk_created_at">（{{ $latest_talk->created_at }}）</p>
                                @endforeach
                            </div>
                            <p class="to_list"><a href="/talks_latest">一覧へ</a></p>
                        </div>
                    </div>
                </div>
                <div class="wrapper_right">
                    @if(isset(Auth::user()->profile_image))
                        <p class="profile_image"><img src="https://s3.ap-northeast-1.amazonaws.com/baseballtalk.profile.image/{{ Auth::user()->profile_image }}"></p>
                    @else
                        <p class="profile_image"><img src="{{ asset('image/noimage.jpg') }}"></p>
                    @endif
                    <p class="mypage_link"><a href="/mypage/{{ Auth::user()->id }}">マイページ</a></p>
                    <div class="immutable_talks">
                        <h2 class="immutable_talks_title">各種トークテーマ</h2>
                        <p class="teams_talks_link"><a href="/teams">球団トーク</a></p>
                        <p class="stadiums_talks_link"><a href="/stadiums">球場情報</a></p>
                    </div>
                    <div class="create_talk">
                        <p class="create_talk_theme">トークテーマを作成</p>
                        <form action="/talks" method="POST">
                            @csrf
                            <input type="text" class="create_talk_box" name="talk[title]" value="{{ old('talk.title') }}" />
                            <p class="error">{{ $errors->first('talk.title') }}</p>
                            <input type="submit" class="create_btn" value="作成"/>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
    </body>
</html>