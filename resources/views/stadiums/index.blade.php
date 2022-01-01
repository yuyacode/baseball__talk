<!-- 球場情報一覧 -->
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
        <div class="container_stadiums">
            <!-- 球場情報一覧 -->
            <h2 class="stadiums_title">球場情報</h2>
            <p>球場情報とは、各球場の魅力や楽しさなど、様々な情報を共有し合うスペースです。</p>
            <p class="choose_stadiums">球場を選ぶ</p>
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