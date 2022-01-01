<!-- 人気のトーク一覧 -->
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
            <!-- 人気のトーク一覧 -->
            <h2 class="talks_title">人気のトーク一覧</h2>
            <!-- 期間 -->
            <div class="period_specify--wrapper">
                <!-- 対象期間 -->
                <p class="target_period">対象期間：{{ $term }}</p>
                <!-- 期間を指定する -->
                <div class="period_specify--title">
                    <p>期間を指定する</p>
                </div>
                <div class="period_specify">
                    @if($term == '今月')
                    <p class="period_specify--candidate"><a href="/talks_popular_today">今日</a></p>
                    <p class="period_specify--candidate"><a href="/talks_popular_week">今週</a></p>
                    <p class="period_specify--subject">今月</p>
                    @elseif($term == '今週')
                    <p class="period_specify--candidate"><a href="/talks_popular_today">今日</a></p>
                    <p class="period_specify--subject">今週</p>
                    <p class="period_specify--candidate"><a href="/talks_popular_month">今月</a></p>
                    @else
                    <p class="period_specify--subject">今日</p>
                    <p class="period_specify--candidate"><a href="/talks_popular_week">今週</a></p>
                    <p class="period_specify--candidate"><a href="/talks_popular_month">今月</a></p>
                    @endif
                </div>
            </div>
            <div class="talks">
                @foreach($talks as $talk)
                <div class="talk">
                    <div class="talk_info">
                        <h2 class="talk-title"><a href="talks/{{ $talk->id }}">{{ $talk->title }}</a></h2>
                        <p class="talk-posts_number">（投稿数：{{ $talk->posts_number }}）</p>
                    </div>
                    <p class="talk-created_at">（{{ $talk->created_at }}）</p>
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