<!-- マイページ -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>baseball talk</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
    </head>
    <body class="body">
        @section('content')
            <div class="container_body">
                <h2 class="page_title">マイページ</h2>
                <div class="wrapper">
                    <div class="wrapper_left">
                        <div class="user_info">
                            <p class="user_name">{{ $user->name }}</p>
                            <p class="user_created_at">（登録日時：{{ $user->created_at }}）</p>
                        </div>
                        @if(isset($user->team_id))
                            <p class="user_favorite_team">好きな球団：<a href="/teams/{{ $user->team->id }}">{{ $user->team->title }}</a></p>
                        @endif
                        @if(isset($user->profile))
                            <p class="user_profile">{{ $user->profile }}</p>
                        @endif
                        <div class="talks">
                            <p class="talks_title">トーク一覧</p>
                            @foreach($talks as $talk)
                                <div class="talk">
                                    <div class="talk_info">
                                        <h2 class="talk_title"><a href="/talks/{{ $talk->id }}">{{ $talk->title }}</a></h2>
                                        <p class="talk_posts_number">（投稿数：{{ $talk->posts_number }}）</p>
                                    </div>
                                    <div class="talk_info">
                                        <p class="talk_created_at">（{{ $talk->created_at }}）</p>
                                        @if(Auth::user()->id === $talk->user_id)
                                            <form action="/talks/{{ $talk->id }}" id="form_{{ $talk->id }}" method="post" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete_btn">削除</button> 
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class='paginate'>
                            {{ $talks->links() }}
                        </div>
                    </div>
                    <div class="wrapper_right">
                        @if(isset($user->profile_image))
                            <p class="profile_image"><img src="https://s3.ap-northeast-1.amazonaws.com/baseballtalk.profile.image/{{ $user->profile_image }}"></p>
                        @else
                            <p class="profile_image"><img src="{{ asset('image/noimage.jpg') }}"></p>
                        @endif
                        @if(Auth::user()->id === $user->id)
                            @if(isset($user->profile_image))
                                <form action="/mypage/{{ $user->id }}" id="form_{{ $user->id }}" method="post" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete_profile_image">削除</button>
                                </form>
                            @endif
                            <div class="edit_profile_image">
                                <p class="edit_profile_image_text">プロフィール画像を編集</p>
                                <form action="/mypage/{{ $user->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="file_btn"><input type="file" name="profile_image"></div>
                                    <p class="error">{{ $errors->first('profile_image') }}</p>
                                    <input type="submit" value="アップロード" class="upload_btn">
                                </form>
                            </div>
                            <p class="edit_profile">プロフィールを編集</p>
                            <p class="edit_profile_btn"><a href="/mypage/{{ $user->id }}/edit">編集</a></p>
                            <div class="create_talk">
                                <form action="/talks" method="POST">
                                    @csrf
                                    <p class="create_talk_theme">トークテーマを作成</p>
                                    <input type="text" name="talk[title]" class="create_talk_area" value="{{ old('talk.title') }}" />
                                    <p class="error">{{ $errors->first('talk.title') }}</p>
                                    <input type="submit" class="create_talk_btn" value="作成"/>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endsection
    </body>
</html>