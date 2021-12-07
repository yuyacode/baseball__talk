<!-- 球場情報（スタジアムトーク）の一覧ページ -->
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
            <!-- スタジアムのトーク一覧 -->
            <h2>球場情報（スタジアムトーク）一覧</h2>
            <p>球場を選ぶ</p>
            <div class="stadium_talks">
                @foreach($stadium_talks as $stadium_talk)
                    <div class="stadium_talk">
                        <p class="stadium_talk--title"><a href="/stadium_talks/{{ $stadium_talk->id }}">{{ $stadium_talk->title }}</a></p>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>