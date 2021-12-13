<!--マイページ-->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
        <!--<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">-->
        <!--<link href="{{secure_asset('/assets/〇〇')}}" rel="stylesheet">-->
    </head>
    <body>
        @section('content')
        <div class="container">
            <p>マイページ</p>
            <div class="own_talks">
                @foreach($own_talks as $talk)
                <p><a href="/talks/{{$talk->id}}">{{ $talk->title }}</a></p>
                <p>投稿数：{{ $talk->posts_number }}</p>
                <p>{{ $talk->created_at }}</p>
                @if(Auth::user()->id === $talk->user_id)
                <form action="/talks/{{ $talk->id }}" id="form_{{ $talk->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button> 
                </form>
                @endif
                @endforeach
            </div>
            <!-- ページネーション -->
            <div class='paginate'>
                {{ $own_talks->links() }}
            </div>
        </div>
        @endsection
    </body>
</html>