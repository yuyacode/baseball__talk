<!-- 球団トーク一覧 -->
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
            <!-- 球団のトーク一覧 -->
            <p>球団のトーク</p>
            <p>球団を選ぶ</p>
            <div class="teams">
                @foreach($teams as $team)
                <div class="team">
                    <p class="team-title"><a href="/teams/{{ $team->id }}">{{ $team->title }}</a></p>
                </div>
                @endforeach
            </div>
        </div>
        @endsection
    </body>
</html>