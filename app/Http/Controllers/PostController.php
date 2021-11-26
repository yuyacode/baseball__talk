<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $input += ['talk_id' => $request->talk()->id];    //この行を追加
        $post->fill($input)->save();
        return redirect('/posts/'.$post->id);
    }

    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['talk_id' => $request->talk()->id];    //この行を追加
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
}
