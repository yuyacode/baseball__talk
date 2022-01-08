<!-- 人気のトーク 一覧画面 -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/index_talk.css') }}" rel="stylesheet">
    </head>
    <body class="body">
        @section('content')
            <div class="container_body">
                <h2 class="page_title">人気のトーク一覧</h2>
                <div class="term_container">
                    <p class="term_selected">対象期間：{{ $term }}</p>
                    <div class="term_wrapper">
                        <div class="term_text"><p>期間を指定する</p></div>
                        <div class="term_list">
                            @if($term == '今月')
                                <p class="term_item"><a href="/talks_popular_today">今日</a></p>
                                <p class="term_item"><a href="/talks_popular_week">今週</a></p>
                                <p class="term_item_selected">今月</p>
                            @elseif($term == '今週')
                                <p class="term_item"><a href="/talks_popular_today">今日</a></p>
                                <p class="term_item_selected">今週</p>
                                <p class="term_item"><a href="/talks_popular_month">今月</a></p>
                            @else
                                <p class="term_item_selected">今日</p>
                                <p class="term_item"><a href="/talks_popular_week">今週</a></p>
                                <p class="term_item"><a href="/talks_popular_month">今月</a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="talks">
                    @foreach($talks as $talk)
                        <div class="talk">
                            <div class="talk_info">
                                <h2 class="talk_title"><a href="talks/{{ $talk->id }}">{{ $talk->title }}</a></h2>
                                <p class="talk_posts_number">（投稿数：{{ $talk->posts_number }}）</p>
                            </div>
                            <p class="talk_created_at">（{{ $talk->created_at }}）</p>
                        </div>
                    @endforeach
                </div>
                <div class="paginate">
                    {{ $talks->links() }}
                </div>
            </div>
        @endsection
    </body>
</html>