<!-- 球団トークの一覧ページ -->
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
            <!-- 球団のトーク一覧 -->
            <h2>球団のトーク一覧</h2>
            <p>球団を選ぶ</p>
            <div class="team_talks">
                @foreach($team_talks as $team_talk)
                    <div class="team_talk">
                        <p class="team_talk--title"><a href="/team_talks/{{ $team_talk->id }}">{{ $team_talk->title }}</a></p>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>