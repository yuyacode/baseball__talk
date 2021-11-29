<?php

namespace App\Http\Controllers;

use App\Talk;
use App\Post;
use App\Http\Requests\PostRequest;
// use Illuminate\Http\Request;

class PostController extends Controller
{

    
    // ユーザーから新規投稿があった場合、入力した投稿内容と属するトークのIDをDBに保存＆属するtalkの投稿数に＋1し、トーク画面へリダイレクトする処理
    public function store(PostRequest $request, Post $post, Talk $talk)
    {
        // ユーザーからの入力(talk_idとbody)を取得し、投稿データを上書き
        $input = $request['post'];
        $post->fill($input)->save();
        // ユーザーが投稿しているトークを特定
        $belong_to_talk = Talk::find($post->talk_id);
        // 属するトークの直前までの投稿数を取得
        $current_posts_number = $belong_to_talk['posts_number'];
        // 投稿数に＋1
        $current_posts_number += 1;
        // ＋1した投稿数を、属するトークのposts_number(投稿数)カラムに代入(更新)
        $belong_to_talk->posts_number = $current_posts_number;
        // 保存
        $belong_to_talk->save();
        // トーク画面にリダイレクト
        return redirect('/talks/'.$post->talk_id);
    }


}
