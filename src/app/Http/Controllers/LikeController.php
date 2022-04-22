<?php

namespace App\Http\Controllers;

use App\Models\Like;

class LikeController extends Controller
{
    public function store($parent) {
        $user = 1;
        $likeExist = Like::where('item_id', $parent)->where('user_id', $user)->first();
        if ($likeExist) {
            $likeExist->delete();
            $status = false;
        } else {
            $like = new Like();
            $like->fill([
                'item_id' => $parent,
                'user_id' => $user
            ])->save();
            $status = true;
        }
        return $status;
    }
}
