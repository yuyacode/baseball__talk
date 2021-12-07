<?php

namespace App\Http\Controllers;

use App\StadiumPost;
// use Illuminate\Http\Request;
use App\Http\Requests\StadiumPostRequest;

class StadiumPostsController extends Controller
{

    // ユーザーから球場情報（スタジアムトーク）にて、新規投稿があった場合、入力した投稿内容を保存
    public function store(StadiumPostRequest $request, StadiumPost $stadium_post)
    {
        $input = $request['stadium_post'];
        $stadium_post->fill($input)->save();
        return redirect('/stadium_talks/' . $stadium_post->stadium_talk_id);
    }

}
