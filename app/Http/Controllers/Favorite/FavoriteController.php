<?php

namespace App\Http\Controllers\favorite;

use App\Model\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function favoriteList(){
        //展示收藏夹
    $favorite = Favorite::join('user','favorite.u_id','=','user.u_id')
        ->get()
        ->toArray();
        return view('favorite.favoriteList',['favorite'=>$favorite]);
    }
}
