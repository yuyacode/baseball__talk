<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    // マイページにて、そのユーザーのトークを取得
    public function index(User $user)
    {
        return view('mypage/index')->with(['talks' => $user->getPaginateByLimit()]);
    }
}
