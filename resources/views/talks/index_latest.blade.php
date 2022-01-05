<!-- 最新のトーク一覧 -->
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
            <!-- 最新のトーク一覧 -->
            <h2 class="page_title">最新のトーク一覧</h2>
            <div class="talks">
                @foreach($talks as $talk)
                <div class="talk">
                    <h2 class="talk_title"><a href="talks/{{ $talk->id }}">{{ $talk->title }}</a></h2>
                    <p class="talk_created_at">（{{ $talk->created_at }}）</p>
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