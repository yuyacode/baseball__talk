<?php

namespace App\Http\Controllers;

use App\Post;
// use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    
    // ユーザーから新規投稿があった場合、入力した投稿内容と属するトークのIDをDBに保存し、トーク画面へリダイレクトする処理
    public function store(PostRequest $request, Post $post)
    {
        // talk_idとbodyを取得
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/talks_latest/'.$post->talk_id);
    }

    // 今後使用する可能性があるため、一応コメントアウトにて残しておく。
    // public function update(Request $request, Post $post)
    // {
    //     $input_post = $request['post'];
    //     // $input_post += ['talk_id' => $request['post']->talk()->id];    //この行を追加
    //     $post->fill($input_post)->save();
    //     return redirect('/talks_latest/'.$post->talk_id);
    // }
    
}
