<?php

namespace App\Http\Controllers;

use App\Post;
use App\Talk;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    // 投稿の保存処理
    public function store(PostRequest $request, Post $post, Talk $talk)
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        if ($post->kinds == 'general') {
            $current_talk = Talk::find($post->talk_id);
            $current_posts_number = $current_talk['posts_number'];
            $current_posts_number += 1;
            $current_talk->posts_number = $current_posts_number;
            $current_talk->save();
            return redirect('/talks/'.$post->talk_id);
        } elseif ($post->kinds == 'team') {
            return redirect('/teams/'.$post->talk_id);
        } else {
            return redirect('/stadiums/'.$post->talk_id);
        }
    }
    
    
    // 投稿の削除処理
    public function destroy(Post $post, Talk $talk)
    {
        $this->authorize('delete', $post);
        $post->delete();
        if ($post->kinds == 'general') {
            $current_talk = Talk::find($post->talk_id);
            $current_posts_number = $current_talk['posts_number'];
            $current_posts_number -= 1;
            $current_talk->posts_number = $current_posts_number;
            $current_talk->save();
            return redirect('/talks/'.$post->talk_id);
        } elseif ($post->kinds == 'team') {
            return redirect('/teams/'.$post->talk_id);
        } else {
            return redirect('/stadiums/'.$post->talk_id);
        }
    }

}
