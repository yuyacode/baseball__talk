<!-- マイページ 編集画面 -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mypage_edit.css') }}" rel="stylesheet">
    </head>
    <body class="body">
        @section('content')
            <div class="container_body">
                <h2 class="page_title">マイページ 編集画面</h2>
                <div class="mypage_edit_form">
                    <form action="/mypage/{{ $user->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mypage_edit_form_item">
                            <p class="form_title">名前</p>
                            <input type="text" name="user[name]" class="name_form" placeholder="名前を変更する" value="{{ $user->name }}" />
                            <p class="error">{{ $errors->first('user.name') }}</p>
                        </div>
                        <div class="mypage_edit_form_item">
                            <p class="form_title">好きな球団</p>
                            <select name="user[team_id]" class="team_form">
                                <option value="">未選択</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" @if($user->team_id == $team->id) selected @endif>{{ $team->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mypage_edit_form_item">
                            <p class="form_title">プロフィール（自己紹介）</p>
                            <textarea name="user[profile]" class="profile_form" placeholder="プロフィール（自己紹介）を追加する（最大200文字）">{{ $user->profile }}</textarea>
                            <p class="error">{{ $errors->first('user.profile') }}</p>
                        </div>
                        <input type="submit" class="save_btn" value="保存">
                    </form>
                </div>
                <p class="mypage_link"><a href="/mypage/{{ $user->id }}">マイページに戻る</a></p>
            </div>
        @endsection
    </body>
</html>