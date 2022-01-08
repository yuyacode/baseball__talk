<!-- 球団トーク 一覧画面 -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/index_team.css') }}" rel="stylesheet">
    </head>
    <body class="body">
        @section('content')
            <div class="container_body">
                <h2 class="page_title">球団トーク</h2>
                <p>球団トークとは、各球団のファンが集まり、会話を交わすスペースです。</p>
                <p class="team_select">球団を選ぶ</p>
                <div class="teams">
                    @foreach($teams as $team)
                        <div class="team">
                            <h2 class="team_name"><a href="/teams/{{ $team->id }}">{{ $team->title }}</a></h2>
                        </div>
                    @endforeach
                </div>
            </div>
        @endsection
    </body>
</html>