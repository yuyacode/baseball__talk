<!-- 球団トーク一覧 -->
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
        <div class="container_teams">
            <!-- 球団のトーク一覧 -->
            <h2 class="teams_title">球団トーク</h2>
            <p>球団トークとは、各球団のファンが集まり、会話を交わすスペースです。</p>
            <p class="choose_teams">球団を選ぶ</p>
            <div class="teams">
                @foreach($teams as $team)
                <div class="team">
                    <h2 class="team-title"><a href="/teams/{{ $team->id }}">{{ $team->title }}</a></h2>
                </div>
                @endforeach
            </div>
        </div>
        @endsection
    </body>
</html>