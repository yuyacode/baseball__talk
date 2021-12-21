<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
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
