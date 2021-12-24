<!-- 人気のトーク一覧 -->
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
            <!-- 人気のトーク一覧 -->
            <p>人気のトーク一覧</p>
            <!-- 対象期間 -->
            <p>（{{ $term }}）</p>
            <!-- 期間を指定する -->
            <div>
                <p>期間を指定する</p>
                @if($term == '今月')
                <p>今月</p>
                <p><a href="/talks_popular_week">今週</a></p>
                <p><a href="/talks_popular_today">今日</a></p>
                @elseif($term == '今週')
                <p><a href="/talks_popular_month">今月</a></p>
                <p>今週</p>
                <p><a href="/talks_popular_today">今日</a></p>
                @else
                <p><a href="/talks_popular_month">今月</a></p>
                <p><a href="/talks_popular_week">今週</a></p>
                <p>今日</p>
                @endif
            </div>
            <div class="talks">
                @foreach($talks as $talk)
                <div class="talk">
                    <h2 class="talk--title"><a href="talks/{{ $talk->id }}">{{ $talk->title }}</a></h2>
                    <p class="talk--posts_number">投稿数：{{ $talk->posts_number }}</p>
                    <p class="talk--created_at">{{ $talk->created_at }}</p>
                </div>
                @endforeach
            </div>
            <!-- ページネーション -->
            <div class="paginate">
                {{ $talks->links() }}
            </div>
        </div>
        @endsection
    </body>
</html>