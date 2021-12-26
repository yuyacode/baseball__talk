<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use Storage;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    
    // マイページにて、そのユーザーのトークを取得
    public function index(User $user)
    {
        return view('mypage/index')->with([
            'talks' => $user->getPaginateByLimit(),
            'user' => $user
        ]);
    }
    
    // S3にプロフィール画像をアップロード
    public function create(UserRequest $request, User $user)
    {
        $form = $request->all();
        // s3アップロード開始
        $profile_image = $request->file('profile_image');
        // バケットへアップロード
        $path = Storage::disk('s3')->putFile('/', $profile_image, 'public');
        // アップロードした画像のフルパスを取得
        $user->profile_image = Storage::disk('s3')->url($path);
        $user->save();
        return redirect('/mypage/'.$user->id);
    }
    
    // マイページの編集画面へ遷移
    public function edit(User $user, Team $team)
    {
        $this->authorize('update', $user);
        return view('mypage/edit')->with([
            'user' => $user,
            'teams' => $team->get()
        ]);
    }
    
    // マイページを編集（ユーザー情報を更新）
    public function update(UserRequest $request, User $user)
    {
        $input = $request['user'];
        $user->fill($input)->save();
        return redirect('/mypage/'.$user->id);
    }

}
