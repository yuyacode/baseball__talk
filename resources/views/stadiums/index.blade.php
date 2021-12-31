<!-- 球場情報の一覧 -->
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
            <!-- 球場情報一覧 -->
            <p>球場情報</p>
            <p>球場を選ぶ</p>
            <div class="stadiums">
                @foreach($stadiums as $stadium)
                <div class="stadium">
                    <p class="stadium-title"><a href="/stadiums/{{ $stadium->id }}">{{ $stadium->title }}</a></p>
                    <p>（{{ $stadium->place }}）</p>
                </div>
                @endforeach
            </div>
        </div>
        @endsection
    </body>
</html>