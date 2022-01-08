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
        $request->validate(['profile_image' => 'required|file|image|mimes:jpeg,jpg,png']);
        // 変更前のプロフィール画像がある場合、S3から削除
        if (isset($user->profile_image)) {
            $profile_image__before = $user->profile_image;
            $s3_delete = Storage::disk('s3')->delete($profile_image__before);
        }
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
    
    
    // S3とDBから、プロフィール画像を削除
    public function delete(User $user)
    {
        $profile_image = $user->profile_image;
        $s3_delete = Storage::disk('s3')->delete($profile_image);
        $user->profile_image = NULL;
        $user->save();
        return redirect('/mypage/'.$user->id);
    }


    // マイページの編集画面を表示
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
