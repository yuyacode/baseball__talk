<?php

namespace App\Http\Controllers;

use App\TeamPost;
// use Illuminate\Http\Request;
use App\Http\Requests\TeamPostRequest;

class TeamPostsController extends Controller
{
    
    // ユーザーから球団トークにて、新規投稿があった場合、入力した投稿内容を保存
    public function store(TeamPostRequest $request, TeamPost $team_post)
    {
        $input = $request['team_post'];
        $team_post->fill($input)->save();
        return redirect('/team_talks/' . $team_post->team_talk_id);
    }

}
