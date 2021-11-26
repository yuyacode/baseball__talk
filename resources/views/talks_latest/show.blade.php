<!--test-->
<!--トークの詳細画面（トーク画面）-->
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
            @foreach($own_posts as $post)
            <div>
                <p>{{ $post->body }}</p>
                <p>{{ $post->created_at }}</p>
            </div>
            @endforeach
        </div>
    </body>
</html>