<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index(Request $request)
    {
        $url = $request->url;

        $hero = Hero::select('image','title','desc','url')
            ->where('url','=',$url)
            ->first();
        return response()->json([
            'success'   => 1,
            'data'      => $hero
        ],201);
    }
}
