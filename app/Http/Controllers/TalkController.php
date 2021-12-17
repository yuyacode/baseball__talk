<?php

namespace App\Http\Controllers;

use App\Talk;
use App\Http\Requests\TalkRequest;
use Carbon\Carbon;

class TalkController extends Controller
{
    
    
    // TOPページにて、人気,最新のトークを5件表示
    public function index(Talk $talk)
    {
        return view('index')->with([
            'popular_talks' => $talk->getPopularTalksByLimit(),
            'latest_talks' => $talk->getLatestTalksByLimit()
        ]);
    }


    // 人気のトーク一覧画面を表示
    public function index_popular(Talk $talk)
    {
        return view('talks/index_popular')->with(['talks' => $talk->getPaginateByLimit_popular()]);
    }
    
    
    // 最新のトーク一覧画面を表示
    public function index_latest(Talk $talk)
    {
        return view('talks/index_latest')->with(['talks' => $talk->getPaginateByLimit_latest()]);
    }
    
    
    // 人気,最新のトーク一覧画面から、各トークの詳細画面を表示
    public function show(Talk $talk)
    {
        return view('talks/show')->with([
            'posts' => $talk->getPaginateByLimit(),
            'talk' => $talk
        ]);
    }
    
    // ユーザーがトークテーマを作成
    public function store(TalkRequest $request, Talk $talk)
    {
        $input = $request['talk'];
        $input += ['user_id' => $request->user()->id];
        $talk->fill($input)->save();
        return redirect('/talks/'.$talk->id);
    }
    
    // ユーザーがトークテーマを削除
    public function destroy(Talk $talk)
    {
        $this->authorize('delete', $talk);
        $talk->delete();
        return redirect('/mypage/'.$talk->user_id);
    }


}
