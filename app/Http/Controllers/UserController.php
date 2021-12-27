<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use Storage;
use Illuminate\Http\Request;
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
    public function create(Request $request, User $user)
    {
        // バリデーション
        $request->validate([
            'profile_image' => 'required|file|image|mimes:jpeg,jpg,png',
        ],
        [
            'profile_image.required' => 'ファイルを選択してください。',
            'profile_image.file' => '正しいファイルを選択してください。',
            'profile_image.image' => '画像をアップロードしてください（jpeg, jpg, png）。',
            'profile_image.mimes' => '正しい形式で画像をアップロードしてください（jpeg, jpg, png）。',
        ]);

        // リクエストの全データを取得
        $form = $request->all();
        // s3アップロード開始
        $profile_image = $request->file('profile_image');
        // バケットへアップロード
        $path = Storage::disk('s3')->putFile('/', $profile_image, 'public');
        // アップロードした画像のパスを取得
        $user->profile_image = $path;
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
