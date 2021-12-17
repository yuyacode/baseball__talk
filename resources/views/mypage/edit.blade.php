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
            <p>マイページ 編集画面</p>
            <div class="content">
                <!-- マイページ編集フォーム -->
                <form action="/mypage/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <p>名前</p>
                        <input type="text" name="user[name]" placeholder="名前を変更する" value="{{ $user->name }}" />
                        <p class="error" style="color:red">{{ $errors->first('user.name') }}</p>
                    </div>
                    <div>
                        <p>プロフィール（自己紹介）</p>
                        <textarea name="user[profile]" placeholder="プロフィール（自己紹介）を追加する（最大200文字）">{{ $user->profile }}</textarea>
                        <p class="error" style="color:red">{{ $errors->first('user.profile') }}</p>
                    </div>
                    <input type="submit" value="保存">
                </form>
            </div>
        </div>
        @endsection
    </body>
</html>