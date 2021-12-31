<!-- 球場情報の詳細画面 -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <?php
        $location_info = array(
            "latitude" => $stadium->latitude,
            "longitude" => $stadium->longitude,
        );
        $location_info__json = json_encode( $location_info );
        ?>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google-map.apikey') }}"></script>
        <script>
            var location_info = JSON.parse('<?php echo $location_info__json; ?>');
            function makeMap(latitude, longitude) {
                var canvas = document.getElementById('map');
                var latlng = new google.maps.LatLng(latitude, longitude);
                var mapOptions = {
                    zoom: 16.9,
                    center: latlng,
                };
                var map = new google.maps.Map(canvas, mapOptions);
                return map;
            };
            window.onload = function() {
                makeMap(location_info['latitude'], location_info['longitude']);
            };
        </script>
    </head>
    <body>
        @section('content')
        <div class="container">
            <!-- 球場名表示 -->
            <p>{{ $stadium->title }}</p>
            <!-- トークの投稿を取得 -->
            <div>
                @foreach($posts as $post)
                <p>{{ $post->body }}</p>
                <!-- プロフィール画像の表示 -->
                @if(isset($post->user->profile_image))
                <p><img src="https://s3.ap-northeast-1.amazonaws.com/baseballtalk.profile.image/{{ $post->user->profile_image }}" width="100" height="100"></p>
                @else
                <p><img src="{{ asset('image/noimage.jpg') }}" width="100" height="100"></p>
                @endif
                <p><a href="/mypage/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
                <p>{{ $post->created_at }}</p>
                @if(Auth::user()->id === $post->user_id)
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button> 
                </form>
                @endif
                @endforeach
            </div>
            <!-- ページネーション -->
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
            <!-- ユーザーの投稿作成箇所 -->
            <form action="/posts" method="POST">
                @csrf
                <div class="create_post">
                    <input type="hidden" name="post[talk_id]" value="{{ $stadium->id }}" />
                    <input type="hidden" name="post[kinds]" value="stadium" />
                    <textarea name="post[body]" placeholder="投稿を作成する（最大250文字）">{{ old('post.body') }}</textarea>
                    <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <input type="submit" value="送信"/>
            </form>
            <!-- Google map -->
            <div id="map"></div>
            <!-- 球場情報一覧へ -->
            <p><a href="/stadiums">球場選択ページへ</a></p>
        </div>
        @endsection
    </body>
</html>