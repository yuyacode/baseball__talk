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
            <h1>最新のトーク一覧</h1>
            <div class="talks_latest">
                @foreach($talks as $talk)
                    <div class="talk_latest">
                        <h2 class="talk_latest--title">{{ $talk->title }}</h2>
                        <p class="talk_latest--created_at">{{ $talk->created_at }}</p>
                    </div>
                @endforeach
            </div>
            <div class="paginate">
                {{ $talks->links() }}
            </div>
        </div>
    </body>
</html>