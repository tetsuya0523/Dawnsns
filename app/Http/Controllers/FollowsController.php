<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class FollowsController extends Controller
{

    public function followCreate(Request $request)
    {
        $user_id = Auth::id();
        $follower_id = $request->input('id');

        DB::table('follows')
            ->insert([
            'follower' => $user_id,
            'follow' => $follower_id,
            'created_at' => now(),
        ]);
        return back();
    }

    public function followRemove(Request $request)
    {
        $user_id = Auth::user()->id;
        $follower_id = $request->input('id');

        DB::table('follows')
            ->where([
            'follower' => $user_id,
            'follow' => $follower_id
        ])->delete();

        return back();
    }

    public function FollowerList()
    {
        $followericons = DB::table('users')
            ->join('follows', 'users.id', '=', 'follows.follower')
            ->where('follow', Auth::id())
            ->select('users.id', 'users.images')
            ->get();

        $follower_id = DB::table('follows')
            ->where('follow', Auth::id())
            ->pluck('follower');

        $followerlists = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->whereIn('users.id', $follower_id)
            ->select('users.id as user_id', 'users.username', 'users.images', 'posts.*')
            ->get();
        return view('follows.followerList', compact('followericons', 'followerlists'));
    }

    public function FollowList()
    {
        $followicons = DB::table('users')
            ->join('follows', 'users.id', '=', 'follows.follow')
            ->where('follower', Auth::id())
            ->select('users.id', 'users.images')
            ->get();

        $follow_id = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');

        $followlists = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->whereIn('users.id', $follow_id)
            ->select('users.id as user_id', 'users.username', 'users.images', 'posts.*')
            ->get();

        return view('follows.followList', compact('followlists', 'followicons'));
    }


}
