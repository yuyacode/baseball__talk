<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    // アクセスが来たマイページにて、そのユーザーのトークを取得する処理
    public function index(User $user)
    {
        return view('mypage/index')->with(['own_talks' => $user->getOwnPaginateByLimit()]);
    }
}
