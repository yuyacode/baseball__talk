<?php

namespace App\Http\Controllers;

use App\Stadium;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    
    // 球場情報の一覧画面にて、球場一覧を表示
    public function index(Stadium $stadium)
    {
        return view('stadiums/index')->with(['stadiums' => $stadium->get()]);  
    }
    
    // 球場情報の詳細画面を表示
    public function show(Stadium $stadium)
    {
        return view('stadiums/show')->with([
            'own_posts' => $stadium->getOwnPostsByLimit(),
            'stadium' => $stadium
        ]);
    }
}
