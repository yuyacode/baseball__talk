<?php

namespace App\Http\Controllers;

use App\Talk;
use App\Http\Requests\TalkRequest;
use Carbon\Carbon;

class TalkController extends Controller
{
    
    
    // TOPページにリクエストが来た際、人気と最新のトークを5件表示する処理
    public function index(Talk $talk)
    {
        return view('index')->with([
            'talks_popular' => $talk->getTalksByLimit_popular(),
            'talks_latest' => $talk->getTalksByLimit_latest()
        ]);
    }


    // 人気のトーク一覧画面にリクエストが来た場合の処理
    public function index_popular(Talk $talk)
    {
        return view('talks/index_popular')->with(['talks' => $talk->getPaginateByLimit_popular()]);
    }
    
    
    // 最新のトーク一覧画面にリクエストが来た場合の処理
    public function index_latest(Talk $talk)
    {
        return view('talks/index_latest')->with(['talks' => $talk->getPaginateByLimit_latest()]);
    }
    
    
    // 人気と最新のトーク一覧画面から、各トークの詳細画面（トークページ）にリクエストが来た場合の処理
    public function show(Talk $talk)
    {
        return view('talks/show')->with([
            'own_posts' => $talk->getOwnPostsByLimit(),
            'talk' => $talk
        ]);
    }
    
    // ユーザーがトークテーマを作成したときの処理
    public function store(TalkRequest $request, Talk $talk)
    {
        $input = $request['talk'];
        $input += ['user_id' => $request->user()->id];
        $talk->fill($input)->save();
        return redirect('/talks/'.$talk->id);
    }
    
    // ユーザーがトークテーマを削除したときの処理
    public function destroy(Talk $talk)
    {
        $this->authorize('delete', $talk);
        $talk->delete();
        return redirect('/mypage/'.$talk->user_id);
    }


}
