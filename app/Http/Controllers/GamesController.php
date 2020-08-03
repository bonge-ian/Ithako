<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    public function index()
    {
         
        return view('index');
    }


}
