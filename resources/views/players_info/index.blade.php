<!-- 選手情報一覧を表示する手前の、チーム選択画面（一覧画面） -->
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
            <!-- 表示または登録したい選手が所属するチームを選択 -->
            <h1>表示または登録する選手の球団を選択</h1>
            <div class="teams">
                @foreach($teams as $team)
                    <div class="team">
                        <p class="team_name">・<a href="/players_info/{{ $team->id }}">{{ $team->name }}</a></p>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>