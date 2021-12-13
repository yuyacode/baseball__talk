<?php

namespace App\Http\Controllers;

use App\TeamPost;
use App\Http\Requests\TeamPostRequest;

class TeamPostsController extends Controller
{
    
    // ユーザーから球団トークにて、新規投稿があった場合、入力した投稿内容を保存
    public function store(TeamPostRequest $request, TeamPost $teamPost)
    {
        $input = $request['team_post'];
        $input += ['user_id' => $request->user()->id];
        $teamPost->fill($input)->save();
        return redirect('/team_talks/' . $teamPost->team_talk_id);
    }
    
    // ユーザーが投稿を削除
    public function destroy(TeamPost $teamPost)
    {
        $this->authorize('delete', $teamPost);
        $teamPost->delete();
        return redirect('/team_talks/'.$teamPost->team_talk_id);
    }

}
