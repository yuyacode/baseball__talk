<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;

class TalkController extends Controller
{

    public function index_latest(Talk $talk)
    {
        return view('talks_latest/index')->with(['talks' => $talk->getPaginateByLimit_latest()]);
    }

}
