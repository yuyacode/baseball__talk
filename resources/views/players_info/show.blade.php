<!-- 選択したチームに所属する選手を一覧で表示 -->
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
            <!-- チーム名 -->
            <h2>{{ $team->name }}</h2>
            <!-- 選択したチームに所属する選手を20人ずつ表示 -->
            <div class="players">
                @foreach($players as $player)
                    <div class="player">
                        <p class="player_number">{{ $player->number }}</p>
                        <p class="player_name">{{ $player->name }}</p>
                        <p class="player_position">{{ $player->position->name }}</p>
                    </div>
                    <form action="/players_info/{{ $player->id }}" id="form_{{ $player->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button> 
                    </form>
                @endforeach
            </div>
            <!-- 所属する選手の新規登録フォーム -->
            <form action="/players" method="POST">
                @csrf
                <div class="register_player">
                    <input type="hidden" name="player[team_id]" value="{{ $team->id }}" />
                    <div class="number">
                        <p>背番号</p>
                        <input type="text" name="player[number]" value="{{ old('player.number') }}" placeholder="背番号"/>
                        <p class="number_error" style="color:red">{{ $errors->first('player.number') }}</p>
                    </div>
                    <div class="name">
                        <p>選手名</p>
                        <textarea name="player[name]" placeholder="選手名">{{ old('player.name') }}</textarea>
                        <p class="name_error" style="color:red">{{ $errors->first('player.name') }}</p>
                    </div>
                    <div class="position">
                        <p>ポジション</p>
                        <select name="player[position_id]">
                            <option value="">選択されていません</option>
                            @foreach($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                        <p class="position_error" style="color:red">{{ $errors->first('player.position_id') }}</p>
                    </div>
                    <input type="submit" value="登録"/>
                </div>
            </form>
            <!-- ページネーション -->
            <div class="paginate">
                {{ $players->links() }}
            </div>
            <!-- チーム選択画面へ戻る -->
            <p><a href="/teams_info">チーム選択画面へ</a></p>
        </div>
    </body>
</html>