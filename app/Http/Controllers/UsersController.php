<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UsersController extends Controller
{

    public function otherProfile($id)
    {
        $users_profile = DB::table('users')
            ->where('id', $id)
            ->select('users.*')
            ->first();

        $users_posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('users.id', $id)
            ->select('users.*', 'posts.*')
            ->get();

        $followusers = DB::table('follows')
            ->where('follower', Auth::id())
            ->get()
            ->toArray();

        return view('users.profile', compact('users_profile', 'users_posts', 'followusers'));
    }


    public function userLists()
    {
        $user_lists = DB::table('users')
            ->where('id', '<>', Auth::id())
            ->get();
        $followusers = DB::table('follows')
            ->where('follower', Auth::id())
            ->get()
            ->toArray();


        return view('users.search', compact('user_lists', 'followusers'));
    }





    public function search()
    {
        $user_searchs = DB::table('users')
            ->where('id', '<>', Auth::id())
            ->select('users.images', 'users.username', 'users.id')
            ->get();
        $followusers = DB::table('follows')
            ->where('follower', Auth::id())
            ->get()
            ->toArray();
        return view('users.search', compact('user_searchs', 'followusers'));
    }


    public function userseach(Request $request)
    {
        $keyword = $request->input('keyword');
        $followusers = DB::table('follows')
            ->where('follower', Auth::id())
            ->get()
            ->toArray();
        $user_searchs = DB::table('users')
            ->where('username', 'like', "%$keyword%")
            ->get();
        return view('users.search', compact('keyword', 'user_searchs', 'followusers'));

    }
}
