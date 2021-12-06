<!-- 球団トークの詳細画面（トーク画面）-->
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
        <div class="container">
            <!-- 球団名表示 -->
            <h2>トークテーマ「{{ $team_talk->title }}」</h2>
            <!--トークに属する投稿を取得-->
            @foreach($own_posts as $post)
            <div>
                <p>{{ $post->body }}</p>
                <p>{{ $post->created_at }}</p>
            </div>
            @endforeach
            <!-- ユーザーの投稿作成箇所 -->
            <form action="/team_posts" method="POST">
                @csrf
                <div class="create_team_post">
                    <input type="hidden" name="team_post[team_talk_id]" value="{{ $team_talk->id }}" />
                    <textarea name="team_post[body]" placeholder="投稿を作成する（最大100文字）">{{ old('team_post.body') }}</textarea>
                    <p class="body_error" style="color:red">{{ $errors->first('team_post.body') }}</p>
                </div>
                <input type="submit" value="送信"/>
            </form>
            <!-- 球団一覧画面へのリンク -->
            <p><a href="/team_talks">球団選択ページへ</a></p>
        </div>
    </body>
</html>